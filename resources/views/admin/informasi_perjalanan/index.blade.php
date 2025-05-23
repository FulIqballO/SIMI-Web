@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="fw-bold">Informasi Keberangkatan</h3>
            <a href="{{ route('informasi_perjalanan.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Create
            </a>

            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('informasi_perjalanan.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search"
                            aria-label="Search" value="{{ request()->query('cari') }}">
            
                        <button class="btn btn-sm rounded btn-outline-primary me-2" type="submit">Search</button>
            
                        @if(request()->has('cari') && request()->get('cari') != '')
                            <a href="{{ route('informasi_perjalan.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                        @endif
                    </form>
                </div>
            </div>

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
                    @foreach($travelLog as $index => $log)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $log->exam_score->status ?? '-' }}</td>
                        <td>{{ $log->user->username ?? '-' }}</td>
                        <td>{{ ucfirst($log->travel_type) }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->date)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('infor_perjalana.edit', $log->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                             <form action="{{ route('info_perjalanan.destroy', $log->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end p-3">
                {{ $travelLog->links() }}
            </div>
        </div>
    </div>
</div>

@endsection