@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card">
    <div class="card-header">
        <h2 class="fw-bold">Test Transaksi</h2>
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
                <label for="" class="form-label">Name</label>
                <input type="text" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId"/>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

@endsection