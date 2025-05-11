<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;

class TRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $training_registration = TrainingRegistration::with('user', 'training')->get();

        return view('admin.training_registration.index', compact('training_registration'));
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
