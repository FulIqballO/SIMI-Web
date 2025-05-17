<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamScore;
use App\Enums\RemarkStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TrainingSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class ExamScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        
        $examscoreQuery = ExamScore::with('user', 'training_schedule');
    
        if ($cari) {
            $examscoreQuery->whereHas('username', function ($query) use ($cari) {
                $query->where('username', 'like', '%' . $cari . '%');
            });
                
        }

        Paginator::useBootstrap(); 
        $examscore = $examscoreQuery->orderBy('created_at', 'DESC')->paginate(4); 

        // $content = News::with('admin')->get();
        return view('admin.exam_score.index', compact('examscore'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $training_schedule = TrainingSchedule::all();

        return view('admin.exam_score.create', compact('user', 'training_schedule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ExamScore $examscore)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'score' => 'required|integer',
            'remarks' => ['required', Rule::in(array_column(RemarkStatus::cases(), 'value'))],
            'input_date' => 'required|date',
            'training_schedule_id' => 'required|exists:training_schedules,id',
        ]);
    
        ExamScore::create($validatedData);
    
        return redirect()->route('exam_score.index')->with('success', 'Nilai ujian berhasil disimpan.');
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
        $user = User::all();
        $training_schedule = TrainingSchedule::all();

        return view('admin.exam_score.edit', compact('examscore', 'user', 'training_schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamScore $examscore)
    {
        $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'score' => 'required|integer',
        'remarks' => ['required', Rule::in(array_column(RemarkStatus::cases(), 'value'))],
        'input_date' => 'required|date',
        'training_schedule_id' => 'required|exists:training_schedules,id',
    ]);


        $examscore->update($validatedData);
        return redirect()->route('exam_score.index')->with('success', 'Exam score updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
