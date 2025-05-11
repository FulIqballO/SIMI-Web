@extends('admin.layouts.layout')

@section('admin_layout')


<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Edit Content Berita</h3>
        </div>
        <div class=card-body>
                <form id="formCreate" action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="admin_id" class="form-label">Nama Admin</label>
                            <select name="admin_id" class="form-control" required>
                                <option value="">-- Pilih Admin --</option>
                                @foreach($adminData as $a)
                                    <option value="{{ $a->id }}" {{ $content->admin_id == $a->id ? 'selected' : '' }}>{{ $a->admin_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="news_date" class="form-label">Tanggal Berita</label>
                             <input type="date" name="news_date" class="form-control" value="{{ \Carbon\Carbon::parse($content->news_date)->format('Y-m-d') }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="news_image" class="form-label">Foto Berita</label>
                             <input type="file" name="news_image" class="form-control">
                            @if ($content->news_image)
                                <p class="mt-2">Foto lama: <img src="{{ asset($content->news_image) }}" width="100"></p>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="title" class="form-label">Judul Berita</label>
                            <input type="text" name="title" value="{{ $content->title }}" class="form-control" required>
                        </div>

                        <div class="mb-3 col-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $content->description }}</textarea>
                        </div>

                        <div class="mb-3 col-12 mt-2">
                            <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                Submit
                            </button>
                            <a href="{{ route('content.index') }}" class="btn btn-lg btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                    </div>
                    
                </form>
            
        </div>
    </div> 
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin Melakukan Update data berita ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          
          <button type="submit" class="btn btn-success" form="formCreate">Simpan</button>
        </div>
      </div>
    </div>
  </div>
    





@endsection