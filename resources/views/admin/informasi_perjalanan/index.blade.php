@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="fw-bold">Informasi Keberangkatan</h3>
            <a href="{{ route('informasi_perjalanan.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Create
            </a>
        </div>
        <div class="class-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Status Kelulusan</th>
                        <th scope="col">nama user</th>
                        <th scope="col">tipe perjalanan</th>
                        <th scope="col">date</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($travelLog as $tv)
                    <tr>
                        <td>{{ $tv->id }}</td>
                        <td>{{ $tv->exam_score->status ?? '-' }}</td>
                        <td>{{ $tv->user->name ?? '-' }}</td>
                        <td>{{ $tv->travel_type }}</td>
                        <td>{{ $tv->date }}</td>
                        <td>
                            <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection