@extends('admin.layouts.layout')

@section('admin_layout')


<div class="container-fluid">
   
        <div class="card">
            <div class="card-header">
                <h3>Form Create Table</h3>
            </div>
  
<div class="card-body">
    <form id="formCreate" action="{{ route('info_training.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

        <div class="mb-3 col-md-6">
            <label for="training_name" class="form-label">Nama Kelas Pelatihan</label>
            <input type="text" name="training_name" class="form-control" placeholder=""/>
        </div>

        <div class="mb-3 col-md-6">
            <label for="description" class="form-label">Deskripsi Kelas Pelatihan</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        
        
        <div class="mb-3 col-md-6">
            <label for="price">Harga Pelatihan</label>
            <input type="number" name="price" id="duration" class="form-control" min="1" required>
        </div>

    

        <div class="mb-3 col-12 mt-2">
            <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                Submit
            </button>
        <a href="{{ route('info_training.index') }}" class="btn btn-lg btn-outline-primary">Kembali </a>
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
          Apakah Anda yakin ingin menyimpan data Pelatihan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          
          <button type="submit" class="btn btn-success" form="formCreate">Simpan</button>
        </div>
      </div>
    </div>
  </div>
   
</div>


@endsection