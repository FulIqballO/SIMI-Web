
@extends('admin.layouts.layout')

@section('admin_layout')


<div class="col-12">
    <div class="card shadow-lg bg-body-tertiary rouned">
        
        <div class="card-header justify-content-between align-items-center">

            <h2 class="fw-bold mb-3">Training Data</h2>
            <a href="{{ route('info_training.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah 
            </a>

            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('info_training.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search"  value="{{ request()->query('cari') }}">

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded btn-outline-primary" type="submit">Search</button>
                        @if(request()->has('cari') && request()->get('cari') != '')
                        <a href="{{ route('info_training.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                    </div>
                    @endif
                      </form>
                </div>
            </div>
        </div>
        <div class="card-body col-lg-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelatihan</th>
                    <th scope="col">Deskripsi Pelatihan</th>
                    <th scope="col">Price</th>
                    
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($trainings as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->training_name }}</td>
                        <td>{{ $t->description }}</td>
                        <td>Rp {{ number_format($t->price, 0, ',', '.') }}</td>
                    
                        <td>
                            <a href="{{ route('info_training.edit', $t->id) }}" class="btn btn-warning mb-3">
                                <i class="bi bi-pencil-square"></i></a>

                            {{-- <form action="{{ route('info_training.destroy', $t->id) }}" method="POST"  onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-3"><i class="bi bi-trash"></i></button>
                              </form> --}}

                              <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $t->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteModal{{ $t->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $t->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('info_training.destroy', $t->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $t->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data <strong>{{ $t->training_name }}</strong>?
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
                {{ $trainings->links() }}
            </div>
              
        </div>
    </div>
   
</div>	














		






















{{-- <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Anggota</h2>
        <a href="#" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Anggota
        </a>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Anggota</li>
        </ol>
    </nav>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}


@endsection