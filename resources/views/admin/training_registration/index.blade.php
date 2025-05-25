@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header">
            <h2>Form Registrasi Pelatihan</h2>

             <a href="{{ route('training_registration.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah 
            </a>
             <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('training_registration.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search"  value="{{ request()->query('cari') }}">

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded btn-outline-primary" type="submit">Search</button>
                        @if(request()->has('cari') && request()->get('cari') != '')
                        <a href="{{ route('training_registration.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                    </div>
                    @endif
                      </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Status Pembayaran</th>
                        <th>Materi Training </th>
                        <th>Status</th>
                        <th>Tgl Registrasi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                        @foreach($training_registration as $tr)
                    <tr>
                        <td scope="col">{{ $tr->id }}</td>
                        <td scope="col">{{ $tr->user->username }}</td>
                        <td scope="col">{{ $tr->payment->payment_status }}</td>
                        <td scope="col">{{ $tr->training->training_name }}</td>
                        <td scope="col">{{ $tr->status }}</td>
                        <td scope="col">{{ $tr->registration_date }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('training_registration.edit', $tr->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('training_registration.destroy', $tr->id) }}" method="POST">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection