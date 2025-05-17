@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card">
    <div class="card-header">
        <h2 class="fw-bold">Test Data Transaksi</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            @method('PUT')

         <div class="row">
            
          
            {{-- <div class="mb-3 col-md-6">
                <label for="" class="form-label">Status Registrasi</label>
               <select name="training_registration_id" class="form-select">
                <option disabled selected>-- Pilih Nama Pelatihan --</option>
                    @foreach($training_registrations as $tr)
                        <option value="{{ $tr->id }}">{{ $tr->status }}</option>
                    @endforeach
                </select>
            </div> --}}


            <div class="mb-3 col-md-6">
                <label for="invoice_code" class="form-label">Kode Invoice</label>
                <input type="text" name="invoice_code" class="form-control"  placeholder=""/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Tgl Transfer</label>
                <input type="date" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Jam Transfer</label>
                <input type="time" name="transfer_time" class="form-control"  placeholder="" aria-describedby="helpId"/>
            </div>

            <div class="mb-3 col-md-6">
                    <label for="proof_of_transfer" class="form-label">Bukti Transfer</label>
                    <input type="file" name="proof_of_transfer" class="form-control" accept="image/*">
            </div>

             <div class="mb-3 col-md-6">
                                <label for="payment_status" class="form-label">Status</label>
                                <select class="form-select form-select-lg" name="payment_status" id="payment_status">
                                    <option selected disabled>-- Pilih Status Pembayaran --</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->value }}">
                                           {{ ucfirst($status->value) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

            <div class="mb-3 mt-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('payment.index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-backward"></i></a>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection