@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="training_registration_id" class="form-label">Nama User</label>
                <input type="text" name="training_registration_id" id="" class="form-control"  placeholder="" value="{{ $payment->training_registration->user->name }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pelatihan</label>
                <input type="text" name="training_registration_id" class="form-control"  placeholder="" value="{{ $payment->training_registration->training->training_name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="invoice_code" class="form-label">Name</label>
                <input type="text" name="invoice_code" class="form-control"  placeholder="" value="{{ $payment->invoice_code}}">
            </div>

             <div class="mb-3">
                <label for="transfer_date" class="form-label">Name</label>
                <input type="date" name="transfer_date" class="form-control"  placeholder="" value="{{ $payment->transfer_date}}">
            </div>

             <div class="mb-3 col-md-6">
                <label for="proof_of_transfer" class="form-label">Bukti Transfer</label>
                    <input type="file" name="proof_of_transfer" class="form-control">
                    @if ($payment->proof_of_transfer)
                        <p class="mt-2">Foto lama: <img src="{{ asset('storage/' . $payment->proof_of_transfer) }}" width="100"></p>
                    @endif
             </div>

             <div class="mb-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('payment.index') }}" class="btn btn-primary">Kembali</a>
             </div>
            
        </form>
    </div>
</div>

@endsection