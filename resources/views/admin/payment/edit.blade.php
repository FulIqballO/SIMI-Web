@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card">
    <div class="card-header">
        <h2 class="fw-bold"><strong>Form Edit Pembayaran</strong></h2>
    </div>
    <div class="card-body">
        <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
            

            <div class="mb-3 col-md-6">
                <label class="form-label">Status Reg</label>
                <input type="text" class="form-control" value="{{ $payment->training_registration->status }}" readonly>
                <input type="hidden" name="training_registration_id" value="{{ $payment->training_registration_id }}">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Invoice Code</label>
                <input type="text" class="form-control" value="{{ $payment->invoice_code }}" disabled>
                <input type="hidden" name="invoice_code" value="{{ $payment->invoice_code }}">
            </div>

             <div class="mb-3 col-md-6">
                <label for="transfer_date" class="form-label">Tgl Transfer</label>
                <input type="date" name="transfer_date" class="form-control"  placeholder="" value="{{ $payment->transfer_date}}" readonly>
            </div>

            <div class="mb-3 col-md-6">
                <label for="transfer_time" class="form-label">Jam Transfer</label>
                <input type="time" name="transfer_time" class="form-control"  placeholder="" value="{{ $payment->transfer_time}}" readonly>
            </div>

             <div class="mb-3 col-md-6">
                <label for="proof_of_transfer" class="form-label">Bukti Transfer</label>
                    @if ($payment->proof_of_transfer)
                        <p class="mt-2"><img src="{{ asset( $payment->proof_of_transfer) }}" width="100"></p>
                    @endif
             </div>

              <div class="mb-3 col-md-6">
                @error('payment_status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="payment_status" class="form-label">Status Pembayaran</label>
                    <select class="form-select form-select-lg" name="payment_status" id="payment_status">
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}" {{ old('payment_status', $payment->payment_status ?? '') == $status->value ? 'selected' : '' }}>
                                {{ ucfirst($status->value) }}
                            </option>
                             @endforeach
                    </select>
               </div>

             <div class="d-flex mb-3 gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('payment.index') }}" class="btn btn-primary">Kembali</a>
             </div>
             
            </div>
        </form>
    </div>
    </div>
</div>

@endsection