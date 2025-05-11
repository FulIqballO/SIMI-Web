@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
        <div class="card">

            <div class="card-header fw-bold">
                <h3>Form Tambah Pekerjaan</h3>
            </div>
            <div class="card-body">
                <form  id="formCreate" action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                     <div class="mb-3 col-md-6">
                        <label for="trainings_id" class="form-label">Nama Kelas Pelatihan</label>
                        <select name="trainings_id" class="form-control" required>
                            <option value="">-- Pilih Pelatihan --</option>
                            @foreach($trainings as $t)
                            <option value="{{ $t->id }}">{{ $t->training_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="job_title" class="form-label">Nama Pekerjaan</label>
                        <input type="text" name="job_title" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="country" class="form-label">Negara</label>
                        <input type="text" name="country" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="job_description" class="form-label">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" name="job_description" rows="3"></textarea>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="salary" class="form-label">Gaji</label>
                        <input type="number" name="salary" class="form-control" placeholder="Contoh: 2500000" step="0.01" required/>
                    </div>

                    <div class="mb-3 col-12 mt-2">
                        <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                            Submit
                        </button>
                        <a href="{{ route('job.index') }}" class="btn btn-lg btn-outline-primary">Kembali </a>
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
          Apakah Anda yakin ingin menyimpan data Pekerjaan ini?
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