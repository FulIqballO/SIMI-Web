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
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Nama User</label>
                <input type="text" name="name" class="form-control"  placeholder="" aria-describedby="helpId" readonly/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Nama Kelas Pelatihan</label>
                <input type="text" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId" readonly/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="invoice_code" class="form-label">Kode Invoice</label>
                <input type="text" name="invoice_code" class="form-control"  placeholder="" aria-describedby="helpId" disabled/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Name</label>
                <input type="text" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId" readonly/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="" class="form-label">Name</label>
                <input type="text" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId"/>
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