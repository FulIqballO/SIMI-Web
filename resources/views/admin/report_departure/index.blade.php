@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">Laporan Keberangkatan</h2>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama User</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">surat SKCK</th>
                        <th scope="col">Surat Izin</th>
                        <th scope="col">Sponsor</th>
                        <th scope="col">Nama Agensi</th>

                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">Nomer Passport</th>

                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $log)
                    <tr>
                        <td>{{ $log->user->id }}</td>
                        <td>{{ $log->user->username ?? '-' }}</td>
                        <td>{{ $log->user->jk ?? '-' }}</td>

                        <td>
                            @if($log->user->userDocuments && $log->user->userDocuments->police_clearancy)
                                <img src="{{ asset('user_documents/' . $log->user->userDocuments->police_clearancy) }}" alt="Foto Document User" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>

                        <td>
                            @if($log->user->userDocuments && $log->user->userDocuments->permit_letter)
                                <img src="{{ asset('user_documents/' . $log->user->userDocuments->permit_letter) }}" alt="Foto Document User" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>

                        <td>{{ $log->userDetails->sponsor ?? '-' }}</td>
                        <td>{{ $log->userDetails->agency_name ?? '-' }}</td>
                         <td>{{ $log->personalData->birth_date ?? '-' }}</td>
                        <td>{{ $log->personalData->passport_number ?? '-' }}</td>

                        <td>
                            <a href="{{ route('report.show', $log->user->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-info"></i></a>
                            <a href="{{ route('report.cetak', $user->id) }}" target="_blank" class="btn btn-info btn-sm">
                                Cetak
                            </a>
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection