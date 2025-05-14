@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Testing Create User Data</h2>
        </div>
        <div class="card-header">
            <form action="{{ route('informasi_perjalanan.store') }}" method="POST">
                @csrf
                <div class="row">

                 <div class="mb-3 col-md-6">
                    <label for="news_date" class="form-label">Tanggal</label>
                    <input type="date" name="news_date" class="form-control" required>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <a href="{{ route('informasi_perjalanan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection