@extends('admin.layouts.layout')

@section('admin_layout')


<div class="col-12">
    <div class="card">
        
        <div class="card-header justify-content-between align-items-center">

            <h2 class="fw-bold mb-3">Data Pekerjaan</h2>
            <a href="{{ route('job.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah 
            </a>

            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('job.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search"  value="{{ request()->query('cari') }}">

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded btn-outline-primary" type="submit">Search</button>
                        @if(request()->has('cari') && request()->get('cari') != '')
                        <a href="{{ route('job.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
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
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Nama Pekerjaan</th>
                    <th scope="col">Negara</th>
                    <th scop="col">Deskripsi Pekerjaan</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $j)
                    <tr>
                        <td>{{ $j->id }}</td>
                        <td>{{ $j->training->training_name ?? '-' }}</td>
                        <td>{{ $j->job_title }}</td>
                        <td>{{ $j->country }}</td>
                        <td>{{ $j->job_description }}</td>
                        <td>Rp {{ number_format($j->salary, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('job.edit', $j->id) }}" class="btn btn-warning mb-3"><i class="bi bi-pencil-square"></i></a>

                            <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $j->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteModal{{ $j->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $j->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('content.destroy', $j->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $j->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus berita <strong>{{ $j->title }}</strong>?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </td>
                         </tr>
                    @endforeach
                
               
                </tbody>
              </table>
                <div class="d-flex justify-content-end p-3">
                      {{ $jobs->links() }}
                </div>
              
        </div>
    </div>
   
</div>	



@endsection
