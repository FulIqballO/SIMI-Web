@extends('admin.layouts.layout')

@section('admin_layout')


<div class="col-lg-12">
    <div class="card rounded">
        <div class="card-header">
            <h2>Form Input Nilai User</h2>
            <a href="{{ route('examscore.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
           <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Status</th>
            <th>Nama User</th>
            <th>Materi Pelatihan</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Tanggal Input</th>
            <th>Riview Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registrations as $key => $reg)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reg->status }}</td>
                <td>{{ $reg->user->username }}</td>
                <td>{{ $reg->training->training_name }}</td>
                <td>{{ $reg->examScore->score ?? '-' }}</td>
                <td>{{ $reg->examScore->remarks }}</td>
                <td>{{ \Carbon\Carbon::parse($reg->examScore->input_date)->format('d-m-Y') }}</td>
                <td>{{ $reg->examScore->review_status }}</td>
                <td>
                    @if($reg->examScore)
                        <a href="{{ route('examscore.edit', $reg->examScore->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    @else
                        <span class="text-muted">Belum Dinilai</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
</div>

@endsection