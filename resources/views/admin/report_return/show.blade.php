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
                <p><strong>Jenis Kelamin:</strong> {{ $user->jk }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>No Telfon:</strong> {{ $user->no_telf }}</p>
                <p><strong>Tgl Lahir:</strong> {{ $user->personalData->birth_date ?? '-' }}</p>
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
                <p><strong>Nama CPMI:</strong> {{ $user->username }}</p>
                {{-- <p><strong>No Ktp:</strong> {{ $user->personalData->citizen_id ?? '-' }}</p> --}}
                <p><strong>No Kartu Identitas:</strong> {{ $user->personalData->id_card_number ?? '-' }}</p>
                <p><strong>Tgl Lahir:</strong> {{ $user->personalData->family_card_number ?? '-' }}</p>
                <p><strong>No Ijazah:</strong> {{ $user->personalData->diploma_number ?? '-' }}</p>
                <p><strong>No Passport:</strong> {{ $user->personalData->passport_number ?? '-' }}</p>
                <p><strong>Sebelum Pemeriksaan Kesehatan:</strong> {{ $user->personalData->pre_medical_checkup ?? '-' }}</p>
                <p><strong>Sesudah Pemeriksaan Kesehatan:</strong> {{ $user->personalData->full_medical_checkup ?? '-' }}</p>
                <p><strong>Agensi:</strong> {{ $user->userDetails->agency_name ?? '-' }}</p>
                <p><strong>Posisi:</strong> {{ $user->userDetails->position ?? '-' }}</p>
                <p><strong>Visa Teto:</strong> {{ $user->userDetails->visa_teto ?? '-' }}</p>
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