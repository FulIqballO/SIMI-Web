@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
            {{-- <div class="mb-3 col-md-6">
                <label for="training_registration_id" class="form-label">Nama User</label>
                <input type="text" name="training_registration_id" id="" class="form-control"  placeholder="" value="{{ $payment->training_registration->user->name }}" readonly>
            </div> --}}

            <div class="mb-3 col-md-6">
                <label class="form-label">Nama Pelatihan</label>
                <input type="text" name="training_registration_id" class="form-control"  placeholder="" value="{{ $payment->training_registration->status }}" readonly>
            </div>

            <div class="mb-3 col-md-6">
                <label for="invoice_code" class="form-label">Invoice Code</label>
                <input type="text" name="invoice_code" class="form-control"  placeholder="" value="{{ $payment->invoice_code}}" readonly>
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
                    <input type="file" name="proof_of_transfer" class="form-control">
                    @if ($payment->proof_of_transfer)
                        <p class="mt-2">Foto lama: <img src="{{ asset('storage/' . $payment->proof_of_transfer) }}" width="100"></p>
                    @endif
             </div>

              <div class="mb-3 col-md-6">
                <label for="payment_status" class="form-label">Status</label>
                    <select class="form-select form-select-lg" name="payment_status" id="payment_status">
                        @foreach($statuses as $status)
                            <option value="{{ $status->value }}">
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

@endsection