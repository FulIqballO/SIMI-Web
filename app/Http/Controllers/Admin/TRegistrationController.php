<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TrainingSchedule;
use App\Enums\StatusRegistration;
use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use Illuminate\Pagination\Paginator;

class TRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');

        $trainingregistrationQuery = TrainingRegistration::with(['user', 'training'])
        ->whereHas('payment', function ($query) {
            $query->where('status', 'paid'); 
        });

    if ($cari) {
        $trainingregistrationQuery->where(function ($query) use ($cari) {
            $query->where('id', 'like', '%' . $cari . '%')
                ->orWhereHas('user', function ($q) use ($cari) {
                    $q->where('username', 'like', '%' . $cari . '%'); 
                })
                ->orWhereHas('training', function ($q) use ($cari) {
                    $q->where('training_name', 'like', '%' . $cari . '%'); 
                });
        });
    }
    Paginator::useBootstrap();
    $training_registration = $trainingregistrationQuery->orderBy('created_at', 'DESC')->paginate(4);
        // $training_registration = TrainingRegistration::with('user', 'training')->get();

        return view('admin.training_registration.index', compact('training_registration'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $training = Training::all();
        $payment = Payment::all();
        $statuses = StatusRegistration::cases();


        return view('admin.training_registration.create', compact('user', 'training', 'payment','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'training_id' => 'required|exists:trainings,id',
            'status' => [
             'required',
              Rule::in(array_column(StatusRegistration::cases(), 'value')),
],
            'registration_date' => 'required|date', 

        ]);

        TrainingRegistration::create($validatedData);

        return redirect()->route('admin.training_registration.index')->with('seccsess', 'Data Berhasil Di Buat');
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
    public function edit(TrainingRegistration $training_registration)
    {
        $user = User::all();
        $training = Training::all();
        $statuses = StatusRegistration::cases();

        return view('admin.training_registration.edit', compact('training_registration', 'user', 'training', 'statuses'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingRegistration $training_registration)
    {
    
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'training_id' => 'required|exists:trainings,id',
            'status' => [
             'required',
              Rule::in(array_column(StatusRegistration::cases(), 'value')),
                ],
            'registration_date' => 'required|date', 

        ]);

        $training_registration->update($validatedData);

        return redirect()->route('admin.training_registration.index')->with('success', 'Registrasi Pelatihan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingRegistration $training_registration)
    {
        $training_registration->delete();

        return redirect()->route('training_registration.index')->with('Data Berhasil Dihapus');
    }
}
