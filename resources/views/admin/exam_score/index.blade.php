@extends('admin.layouts.layout')

@section('admin_layout')


<div class="col-lg-12">
    <div class="card rounded">
        <div class="card-header">
            <h2>Input Nilai User</h2>
            <a href="{{ route('examscore.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nilai</th>
                        <th>Keterangan</th>
                        <th>Tanggal Input</th>
                        <th>Materi Pelatihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($examscore as $ex)
                    <tr>
                        <td>{{ $ex->id }}</td>
                        <td>{{ $ex->user->name }}</td>
                        <td>{{ $ex->score }}</td>
                        <td>{{ $ex->remarks }}</td>
                        <td>{{ $ex->input_date }}</td>
                        <td>{{ $ex->training_schedule->training_name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                            <a href="{{ route('examscore.edit', $ex->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('examscore.destroy', $ex->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
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