<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ExamScore;
use App\Models\TravelLog;
use App\Enums\RiviewStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RiviewDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('examScore', function ($query) {
            $query->where('remarks', 'Passed')
                  ->where('review_status', 'pending');
        })
        ->whereHas('personalData')
        ->whereHas('userDetails')
        ->whereHas('userDocuments')
        ->with(['examScore', 'personalData', 'userDetails', 'userDocuments'])
        ->get();

    return view('admin.riview_data.index', compact('users'));
    }

             public function konfirmasi(Request $request, $examScoreId)
        {
                 $exam = ExamScore::findOrFail($examScoreId);

   
    $user = $exam->user;
    if (
        !$user->personalData ||
        !$user->userDetails 
    ) {
        return redirect()->back()->with('error', 'Data pengguna belum lengkap. Silakan lengkapi sebelum proses konfirmasi.');
    }

  
    $request->validate([
        'action' => ['required', Rule::in(array_column(RiviewStatus::cases(), 'value'))],
    ]);

    $status = $request->input('action');
    $exam->review_status = RiviewStatus::from($status);
    $exam->save();

    
    if ($status === 'approved') {
        TravelLog::firstOrCreate([
            'user_id' => $exam->user_id,
            'exam_score_id' => $exam->id,
        ], [
            'travel_type' => 'departure',
            'date' => now(),
        ]);
    }

    return redirect()->back()->with('success', 'Status berhasil diubah menjadi: ' . ucfirst($status));
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

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
