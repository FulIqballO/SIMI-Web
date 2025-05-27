<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamScore;
use App\Enums\RemarkStatus;
use App\Enums\RiviewStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TrainingSchedule;
use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use Illuminate\Pagination\Paginator;

class ExamScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

            $query = TrainingRegistration::with(['user', 'training', 'examScore'])
                ->where('status', 'active');

            if ($cari) {
                $query->whereHas('user', function ($q) use ($cari) {
                    $q->where('username', 'like', '%' . $cari . '%');
                });
            }

            Paginator::useBootstrap();
            $registrations = $query->orderBy('created_at', 'DESC')->paginate(4);

            return view('admin.exam_score.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
        $training_registrations = TrainingRegistration::with(['user', 'training'])
                ->where('status', 'active')
                ->doesntHave('examScore')
                ->get();
                $training_schedule = TrainingSchedule::all();

                $statuses = RemarkStatus::cases(); 
                $reviewStatuses = RiviewStatus::cases(); 

                return view('admin.exam_score.create', compact('training_registrations', 'training_schedule', 'statuses', 'reviewStatuses'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
            'training_registration_id' => 'required|exists:training_registrations,id',
            'user_id' => 'required|exists:users,id',
            'training_schedule_id' => 'required|exists:training_schedules,id',
            'score' => 'required|integer',
            'remarks' => ['required', Rule::in(array_column(RemarkStatus::cases(), 'value'))],
            'input_date' => 'required|date',
            // 'review_status' => ['required', Rule::in(array_column(RiviewStatus::cases(), 'value'))],
            
        ]);


        ExamScore::create([
            'training_registration_id' => $validatedData['training_registration_id'],
            'user_id' => $validatedData['user_id'],
            'training_schedule_id' => $validatedData['training_schedule_id'],
            'score' => $validatedData['score'],
            'remarks' => $validatedData['remarks'],
            'input_date' => $validatedData['input_date'],
            'review_status' => RiviewStatus::Pending,
            // 'riview_status' => RiviewStatus::Pending,
                
        ]);
        
            return redirect()->route('examscore.index')->with('success', 'Nilai ujian berhasil disimpan.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamScore $examscore)
    {
       $user = User::whereHas('training_registration', function ($query) {
            $query->where('status', 'active')
                ->whereHas('payment', function ($q) {
                    $q->where('payment_status', 'Paid');
                });
            })->get();

        $training_schedule = TrainingSchedule::all();
        $training_registration = TrainingRegistration::all();
        $statuses = RemarkStatus::cases();
        $reviewStatuses = RiviewStatus::cases(); 

        return view('admin.exam_score.edit', compact('examscore', 'user', 'training_schedule', 'training_registration', 'statuses', 'reviewStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamScore $examscore)
    {
       $validatedData = $request->validate([
        'training_registration_id' => 'required|exists:training_registrations,id',
        'user_id' => 'required|exists:users,id',
        'score' => 'required|integer',
        'remarks' => ['required', Rule::in(array_column(RemarkStatus::cases(), 'value'))],
        'input_date' => 'required|date',
        'training_schedule_id' => 'required|exists:training_schedules,id',
        'review_status' => ['required', Rule::in(array_column(RiviewStatus::cases(), 'value'))],
    ]);

    $examscore->update([
        'training_registration_id' => $validatedData['training_registration_id'],
        'user_id' => $validatedData['user_id'],
        'score' => $validatedData['score'],
        'remarks' => $validatedData['remarks'],
        'input_date' => $validatedData['input_date'],
        'training_schedule_id' => $validatedData['training_schedule_id'],
        'review_status' => $validatedData['review_status'],
    ]);

    //   if ($validatedData['remarks'] === 'Passed') {
    //     $examscore->review_status = 'pending'; 
    // } else {
    //     $examscore->review_status = null; 
    // }
    //  if ($validatedData['remarks'] === 'Passed') {
    //     $examscore->review_status = 'pending';
    //     $examscore->save();
    // }

    return redirect()->route('examscore.index')->with('success', 'Exam score updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
