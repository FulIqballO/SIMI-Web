<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\TravelLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = TravelLog::where('travel_type', 'departure')
        ->with([
            'user.personalData', 
            'user.userDetails', 
            'user.userDocuments', 
            'exam_score'
        ])
        ->orderBy('date', 'desc')
        ->get();
        
        return view('admin.report_departure.index', compact('data'));
    }

    

// public function kepulangan()
// {
//     $data = TravelLog::where('travel_type', 'return')
//         ->with(['user', 'exam_score'])
//         ->orderBy('date', 'desc')
//         ->get();

//     return view('admin.report_return.index', compact('data: data'));
// }

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
    public function show($id)
    {
         $user = User::with(['userDetails', 'userDocuments', 'personalData', 'examScore'])
                ->findOrFail($id);

                 return view('admin.report_departure.show', compact('user'));

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
