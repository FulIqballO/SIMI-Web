<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $jobsQuery = Job::with('training');

    if ($cari) {
        $jobsQuery->where('job_title', 'like', '%' . $cari . '%');
    }
         Paginator::useBootstrap();
        $jobs = $jobsQuery->orderBy('created_at', 'DESC')->paginate(4);
        
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainings = Training::all();
        return view('admin.job.create', compact('trainings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trainings_id' => 'required|exists:trainings,id',
            'job_title' => 'required|max:1000',
            'country' => 'required|max:500',
            'job_description' => 'required|max:1000',
            'salary' => 'required|numeric',
        
        ]);

        Job::create($validatedData);

        return redirect()->route('job.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Job $job)
    {
        $trainings = Training::all();
        return view('admin.job.edit', compact('job', 'trainings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'trainings_id' => 'required|exists:trainings,id',
            'job_title' => 'required|max:1000',
            'country' => 'required|max:500',
            'job_description' => 'required|max:1000',
            'salary' => 'required|numeric',
        
        ]);

        $job->update($validatedData);

        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete(); 
    
        return redirect()->route('job.index')->with('success', 'Data berhasil dihapus!'); 
    }
}
