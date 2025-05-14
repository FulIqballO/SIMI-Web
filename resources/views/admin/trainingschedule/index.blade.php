@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header justify-content-between align-items-center">
                <h3>Data Materi Pelatihan</h3>
                <a href="{{ route('trainingschedule.create') }}" class="btn btn-success mt-2">
                    <i class="fas fa-plus"></i> Tambah 
                </a>
            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">

                    <form class="d-flex" role="search" method="GET" action="{{ route('trainingschedule.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search"  value="{{ request()->query('cari') }}">

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded btn-outline-primary" type="submit">Search</button>
                        @if(request()->has('cari') && request()->get('cari') != '')
                        <a href="{{ route('trainingschedule.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                    </div>
                    @endif
                      </form>

                </div>

            </div>
        </div>
        <div class="card-body col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas Pelatihan</th>
                        <th scope="col">Materi Training</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Tgl Mulai</th>
                        <th scope="col">Tgl Selesai</th>
                        <th scope="col">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach( $trainingschedule as $ts )
                <tr>
                    <td>{{ $ts->id }}</td>
                    <td>{{ $ts->training->training_name ?? '' }}</td>
                    <td>{{ $ts->training_material }}</td>
                    <td>{{ $ts->location }}</td>
                    <td>{{ $ts->day }}</td>
                    <td>{{ \Carbon\Carbon::parse($ts->time)->format('H:i') }}</td>
                    <td>{{ $ts->duration }} Jam</td>
                    <td>{{ \Carbon\Carbon::parse($ts->start_date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($ts->end_date)->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                        <a href="{{ route('trainingschedule.edit', $ts->id) }}" class="btn btn-warning mb-3"><i class="bi bi-pencil-square"></i></a>

                         <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $ts->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteModal{{ $ts->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $ts->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('trainingschedule.destroy', $ts->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $ts->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data <strong>{{ $ts->training_material }}</strong>?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                      
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end p-3">
                {{ $trainingschedule->links() }}
          </div>
        </div>
    </div>
</div>


@endsection