
@extends('admin.layouts.layout')

@section('admin_layout')

            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h2>Form Create Input Data</h2>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('examscore.store') }}" method="POST">
                @csrf

                <div class="row">


            <div class="mb-3 col-md-6">
                <label for="user_id" class="form-label">Peserta CPMI</label>
                  <select name="user_id" class="form-control" required>
                    @foreach($training_registrations as $reg)
                        <option value="{{ $reg->user->id }}">{{ $reg->user->username }}</option>
                    @endforeach
                 </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="training_registration_id" class="form-label">Status Registrasi </label>
                <select name="training_registration_id" class="form-control" required>
                    @foreach($training_registrations as $reg)
                        <option value="{{ $reg->id }}">{{ $reg->status }}</option>
                    @endforeach
                </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="training_schedule_id" class="form-label">Jadwal Pelatihan</label>
                        <select name="training_schedule_id" class="form-control" required>
                    @foreach($training_schedule as $schedule)
                        <option value="{{ $schedule->id }}">{{ $schedule->training_material }}</option>
                    @endforeach
                </select>
                </div>

                <div class="mb-3 col-md-6">
                <label for="score" class="form-label">Nilai</label>
                <input type="number" name="score" class="form-control" placeholder="" required>
                </div>

            <div class="mb-3 col-md-6">
            <label for="remarks" class="form-label">Keterangan</label>
                <select name="remarks" class="form-control" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="input_date" class="form-lable">Tanggal Input</label>
                <input type="date" name="input_date" class="form-control" required>
            </div>

                <div class="mb-3 col-md-6">
                    <lable for="" class="form-label">Riview Status</lable>
                <select name="review_status" class="form-control" readonly>
                        @foreach ($reviewStatuses as $status)
                        <option value="{{ $status->value }}">
                        {{ ucfirst($status->value) }}
                    </option>
                @endforeach
                </select>
                </div>

            <div class="d-flex gap-2 mb-3 col-md-12">
            <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('examscore.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            </form>
            </div>

                    </div>
                </div>
        

@endsection