<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamScore;
use App\Models\TravelLog;
use App\Enums\TravelStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TravelLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $travelLog = TravelLog::whereHas('exam_score', function($query) {
                $query->where('remarks', 'Passed'); 
                })->with(['user', 'exam_score'])->get();

       
        return view('admin.informasi_perjalanan.index', compact('travelLog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
         $examscore = ExamScore::all();
         $user = User::all();
         $statuses = TravelStatus::cases();

        return view('admin.informasi_perjalanan.create', compact('examscore', 'user', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exam_score_id' => 'required|exists:exam_scores,id',
            'user_id' => 'required|exists:users,id',
            'travel_type' => ['required', Rule::in(array_column(TravelStatus::cases(), 'value'))],
            'date' => 'required|date',
        ]);

        TravelLog::create($validatedData);

        return redirect()->route('informasi_keberangkatan.index');
        
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
    public function edit(Request $request, TravelLog $travelLog)
    {
        $examscore = ExamScore::all();
        $user = User::all();
        $statuses = TravelStatus::cases();

        return view('admin.info_perjalanan.edit', compact('travelLog', 'examscore', 'user', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TravelLog $travelLog)
    {
        $validatedData = $request->validate([
            'exam_score_id' => 'required|exists:exam_scores,id',
            'user_id' => 'required|exists:users,id',
            'travel_type' => ['required', Rule::in(array_column(TravelStatus::cases(), 'value'))],
            'date' => 'required|date',
        ]);

        $travelLog->update($validatedData);

        return redirect()->route('informasi_keberangkatan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelLog $travelLog)
    {
        $travelLog->delete();

        return redirect()->route('informasi_keberangkatan.index');
    }
}
