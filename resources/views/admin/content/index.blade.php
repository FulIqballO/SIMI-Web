@extends('admin.layouts.layout')

@section('admin_layout')


<div class="col-12">
    <div class="card shadow-lg bg-body-tertiary rouned">
        
        <div class="card-header justify-content-between align-items-center">

            <h2 class="fw-bold mb-3">Content Berita</h2>
            <a href="{{ route('content.create') }}" class="btn btn-success mt-2">
                <i class="fas fa-plus"></i> Tambah 
            </a>

            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('content.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search"
                            aria-label="Search" value="{{ request()->query('cari') }}">
            
                        <button class="btn btn-sm rounded btn-outline-primary me-2" type="submit">Search</button>
            
                        @if(request()->has('cari') && request()->get('cari') != '')
                            <a href="{{ route('content.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
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
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Tgl Berita</th>
                    <th scope="col">Foto Berita</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Deskripsi Berita</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($content as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->admin->admin_name ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($c->news_date)->format('d/m/Y') }}</td>
                        <td>
                            @if($c->news_image)
                                <img src="{{ asset($c->news_image) }}" alt="Foto Berita" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->description }}</td>
                        <td>
                            <a href="{{ route('content.edit', $c->id) }}" class="btn btn-warning mb-3">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                            <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $c->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('content.destroy', $c->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $c->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus berita <strong>{{ $c->title }}</strong>?
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
                      {{ $content->links() }}
                </div>
              
        </div>
    </div>
   
</div>	



@endsection
