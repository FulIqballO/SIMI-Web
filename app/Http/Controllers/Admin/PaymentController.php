<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $payment = Payment::with('training_registration')->get();
        return view('admin.payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $training_registrations = TrainingRegistration::all();
        return view('admin.payment.create', compact( 'training_registrations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'training_registration_id' => 'required|exists:training_registrations,id',
            'invoice_code' => 'required|string|unique:payments,invoice_code',
            'transfer_date' => 'required|date',
            'transfer_time' => 'required',
            'proof_of_transfer' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);
        

        if ($request->hasFile('proof_of_transfer')) {
            $file = $request->file('proof_of_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $filename); 
            $validatedData['proof_of_transfer'] = 'payments/' . $filename;
        }

        Payment::create($validatedData);

        return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
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
    public function edit(Payment $payment)
    {   
        
        $training_registrations = TrainingRegistration::all();

        return view('admin.payment.edit', compact('payment', 'training_registrations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
       

        $validatedData = $request->validate([
            'training_registration_id' => 'required|exists:training_registrations,id',
            'invoice_code' => 'required|string|max:255|unique:payments,invoice_code,' . $payment->id,
            'transfer_date' => 'required|date',
            'transfer_time' => 'required',
            'proof_of_transfer' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);

        if ($request->hasFile('proof_of_transfer')) {
            $file = $request->file('proof_of_transfer');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/payments', $filename); 
            $validatedData['proof_of_transfer'] = 'payments/' . $filename;
        }

        $payment->update($validatedData);

        return redirect()->route('payment.index')->with('success', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        if ($payment->proof_of_transfer && file_exists('public/' . $payment->proof_of_transfer)) {
            Storage::delete('public/' . $payment->proof_of_transfer);
        }

         $payment->delete(); 
    
        return redirect()->route('payment.index')->with('success', 'Data berhasil dihapus!');
    }
}
