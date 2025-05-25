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
                <th>No Passport</th>
                <th>Nilai Ujian</th>
                <th>Surat Izin</th>
                <th>Surat SKCK</th>
                 <th>Nama Agensi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->personalData->number_passport ?? '-' }}</td>
                <td>{{ $user->personalData->birth_place }}</td>
                <td>
                    @if ($user->examScore)
                        {{ $user->examScore->score }} ({{ $user->examScore->remarks }})
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    @if ($user->userDocuments && $user->userDocuments->permit_letter)
                        <a href="{{ asset('user_documents/' . $user->userDocuments->permit_letter) }}" target="_blank">
                            Lihat Surat Izin
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>

                 <td>
                    @if ($user->userDocuments && $user->userDocuments->police_clearancy)
                        <a href="{{ asset('user_documents/' . $user->userDocuments->police_clearancy) }}" target="_blank">
                            Lihat Surat SKCK
                        </a>
                    @else
                        <span>-</span>
                    @endif
                </td>
                <td>
                    @if ($user->userDetails && $user->userDetails->agency_name)
                        {{ $user->userDetails->agency_name }}
                    @else
                        <span>-</span>
                    @endif
                </td>
                <td>
    @if ($user->examScore)
       
        <form action="{{ route('review_data.konfirmasi', $user->examScore->id) }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="action" value="approved">
            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
        </form>

        
        <form action="{{ route('review_data.konfirmasi', $user->examScore->id) }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="action" value="rejected">
            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
        </form>

        
        <form action="{{ route('review_data.konfirmasi', $user->examScore->id) }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="action" value="pending">
            <button type="submit" class="btn btn-warning btn-sm">Tunda</button>
        </form>
    @else
        <span class="text-muted">Tidak ada skor</span>
    @endif
</td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">Tidak ada data untuk direview.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>


    </div>
</div>

@endsection