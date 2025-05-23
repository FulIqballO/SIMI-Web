@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">Form Riview Data CPMI</h2>
        </div>
       <div class="card-body">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Nilai Ujian</th>
                <th>Paspor</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->personalData->nik ?? '-' }}</td>
                <td>
                    @if ($user->examScore)
                        {{ $user->examScore->score }} ({{ $user->examScore->remarks }})
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($user->userDocuments && $user->userDocuments->passport_number)
                        
                    @else
                        
                    @endif
                </td>
                <td>
                    @if ($user->userDetails && $user->userDetails->gender)
                        {{ $user->userDetails->gender }}
                    @else
                        
                    @endif
                </td>
                <td>
                    @if ($user->examScore)
                        <form action="{{ route('review_data.approve', $user->examScore->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                        </form>
                    @else
                        <span class="text-muted">Tidak ada skor</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Tidak ada data untuk direview.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>


    </div>
</div>

@endsection