@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
        <div class="card">

            <div class="card-header fw-bold">
                <h3>Form Tambah Pekerjaan</h3>
            </div>
            <div class="card-body">
                <form id="formCreate" action="{{ route('trainingschedule.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="training_id" class="form-label">Nama Kelas Pelatihan</label>
                            <select name="training_id" class="form-control" required>
                                <option value="">-- Pilih Pelatihan --</option>
                                @foreach($trainings as $t)
                                <option value="{{ $t->id }} ">{{ $t->training_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="training_material" class="form-label">Nama Materi Pelatihan</label>
                            <input type="text" name="training_material" class="form-control" placeholder="" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-control" placeholder="" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label for="day" class="form-label">Hari</label>
                            <input type="text" name="day" class="form-control" placeholder="" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label for="time" class="form-label">Waktu</label>
                            <input type="time" name="time" class="form-control" placeholder="" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label for="duration" class="form-label">Durasi (jam)</label>
                            <input type="number" name="duration" class="form-control" placeholder="Contoh: 2" required/>
                        </div>
    
                        <div class="mb-3 col-md-6">
                            <label for="start_date" class="form-label">Tgl Mulai</label>
                            <input type="date" name="start_date" class="form-control" placeholder="" required/>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="end_date" class="form-label">Tgl Selesai</label>
                            <input type="date" name="end_date" class="form-control" placeholder="" required/>
                        </div>

                    <div class="mb-3 col-12 mt-2">
                        <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                Submit
                            </button>
                        <a href="{{ route('trainingschedule.index') }}" class="btn btn-lg btn-outline-primary">Kembali </a>
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
          Apakah Anda yakin ingin menyimpan data Jadwal Pelatihan ini?
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







{{-- @extends('admin.layouts.layout')

@section('layout_admin')

<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h2 class="fw-bold">Form Tambah Jadwal Pelatihan</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('trainingschedule.store') }}" method="POST">
            @csrf
            <div class="row">

           

                    <div class="mb-3 col-md-6">
                        <label for="training_material" class="form-label">Nama Materi Pelatihan</label>
                        <input type="text" name="training_material" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" name="location" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="day" class="form-label">Hari</label>
                        <input type="text" name="day" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="time" class="form-label">Waktu</label>
                        <input type="text" name="time" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="duration" class="form-label">Durasi</label>
                        <input type="text" name="duration" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="duration" class="form-label">Durasi</label>
                        <input type="text" name="duration" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="start_date" class="form-label">Tgl Mulai</label>
                        <input type="text" name="start_date" class="form-control" placeholder="" required/>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="end_date" class="form-label">Tgl Selesai</label>
                        <input type="date" name="end_date" class="form-control" placeholder="" required/>
                    </div>

                    <div class="mb-3 col-12 mt-2">
                        <button type="submit" class="btn btn-lg btn-outline-success">Submit</button>
                        <a href="{{ route('trainingschedule.index') }}" class="btn btn-lg btn-outline-primary">Kembali </a>
                    </div>

               </div>

        </form>
    </div>
</div>
</div>

@endsection --}}