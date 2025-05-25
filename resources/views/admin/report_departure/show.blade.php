@extends('admin.layouts.layout')

@section('admin_layout')
<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-header">
            <h4 class="fw-bold">Detail Laporan CPMI: {{ $user->username }}</h4>
        </div>
        <div class="card-body">

            {{-- SECTION: Data Pribadi --}}
            <div class="mb-4">
                <h5>Data Pribadi</h5>
                <p><strong>Nama:</strong> {{ $user->username }}</p>
                <p><strong>No Passport:</strong> {{ $user->personalData->passport_number ?? '-' }}</p>
                <p><strong>Tempat Lahir:</strong> {{ $user->personalData->birth_place ?? '-' }}</p>
            </div>

            {{-- SECTION: Dokumen --}}
            <div class="mb-4">
                <h5>Dokumen</h5>
                <p><strong>SKCK:</strong><br>
                    @if($user->userDocuments && $user->userDocuments->police_clearancy)
                        <a href="{{ asset('user_documents/' . $user->userDocuments->police_clearancy) }}" target="_blank">
                            <img src="{{ asset('user_documents/' . $user->userDocuments->police_clearancy) }}" width="150">
                        </a>
                    @else
                        Tidak tersedia
                    @endif
                </p>

                <p><strong>Surat Izin:</strong><br>
                    @if($user->userDocuments && $user->userDocuments->permit_letter)
                        <a href="{{ asset('user_documents/' . $user->userDocuments->permit_letter) }}" target="_blank">
                            <img src="{{ asset('user_documents/' . $user->userDocuments->permit_letter) }}" width="150">
                        </a>
                    @else
                        Tidak tersedia
                    @endif
                </p>
            </div>

            {{-- SECTION: Detail CPMI --}}
            <div class="mb-4">
                <h5>Data CPMI</h5>
                <p><strong>Agensi:</strong> {{ $user->userDetails->agency_name ?? '-' }}</p>
                <p><strong>Sponsor:</strong> {{ $user->userDetails->sponsor ?? '-' }}</p>
                <p><strong></strong></p>
            </div>

            {{-- CETAK SEMUA --}}
            <a href="{{ route('report.print', $user->id) }}" target="_blank" class="btn btn-primary mt-3">
                Cetak Seluruh Data
            </a>

        </div>
    </div>

</div>
@endsection
