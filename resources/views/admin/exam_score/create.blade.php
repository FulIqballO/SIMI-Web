@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Form Create Input Data</h2>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
            <div class="row">
                <!-- Admin ID (misal input manual sementara, bisa ganti dropdown) -->
                <div class="mb-3 col-md-6">
                    <label for="admin_id" class="form-label">Nama Admin</label>
                    <select name="admin_id" class="form-control" required>
                        <option value="">-- Pilih Admin --</option>
                        @foreach($adminData as $a)
                            <option value="{{ $a->id }}">{{ $a->admin_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="news_date" class="form-label">Tanggal Berita</label>
                    <input type="date" name="news_date" class="form-control" required>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection