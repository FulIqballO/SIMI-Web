<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiviewDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('examScore', function ($query) {
            $query->where('remarks', 'passed')
                  ->where('review_status', 'pending');
        })
        ->whereHas('personalData')
        ->whereHas('userDetails')
        ->whereHas('userDocuments')
        ->with(['examScore', 'personalData', 'userDetails', 'userDocuments'])
        ->get();

    return view('admin.riview_data.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function approve($id)
{
    $exam = \App\Models\ExamScore::findOrFail($id);
    $exam->review_status = 'approved';
    $exam->save();

    
    \App\Models\TravelLog::create([
        'user_id' => $exam->user_id,
        'exam_score_id' => $exam->id,
        'travel_type' => 'departure',
        'date' => now(),
    ]);

    return redirect()->back()->with('success', 'Data CPMI disetujui untuk keberangkatan.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
