@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">Edit Nilai Ujian</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('examscore.update', $examscore->id) }}"  method="POST">
                @csrf
                @method('PUT')

                <div class="row">

            <div class="mb-3 col-md-6">
                <label class="form-label">Nama CPMI</label>
                <input type="text" class="form-control" value="{{ $examscore->user->username }}" readonly>
                <input type="hidden" name="user_id" value="{{ $examscore->user->id }}">
            </div>

              <div class="mb-3 col-md-6">
                <label class="form-label">Status Registrasi</label>
                <input type="text" class="form-control" value="{{ $examscore->training_registration->status }}" readonly>
                <input type="hidden" name="training_registration_id" value="{{ $examscore->training_registration->id }}">
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Jadwal Pelatihan</label>
                <input type="text" class="form-control" value="{{ $examscore->training_schedule->training_material }}" readonly>
                <input type="hidden" name="training_schedule_id" value="{{ $examscore->training_schedule->id }}">
            </div>

                 <div class="mb-3 col-md-6">
                        <label for="score" class="form-label">Nilai</label>
                        <input type="number" name="score" class="form-control" value="{{ old('score', $examscore->score) }}">
                        @error('score') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                  
                    {{-- <div class="mb-3 col-md-6">
                        <label for="training_schedule_id" class="form-label">Materi Pelatihan</label>
                        <input type="text" class="form-control" value="{{ $examscore->training_schedule->training_material }}" readonly/>
                        <input type="hidden" name="training_schedule_id" value="{{ $examscore->training_schedule->id }}">
                    </div> --}}

                      

                    <div class="mb-3 col-md-6">
                        <label for="remarks" class="form-label">Status</label>
                        <select class="form-select" name="remarks" required>
                            <option disabled>-- Pilih Status Kelulusan --</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->value }}"
                                    {{ old('remarks', $examscore->remarks) == $status->value ? 'selected' : '' }}>
                                    {{ ucfirst($status->value) }}
                                </option>
                            @endforeach
                        </select>
                        @error('remarks') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>

            <div class="mb-3 col-md-6">
                <label for="input_date" class="form-label">Tgl Input Nilai</label>
                <input type="date" name="input_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($examscore->input_date)->format('Y-m-d') }}">
                @error('input_date') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label for="review_status" class="form-label">Review Status</label>
                  <select class="form-select" name="review_status">
                    <option disabled>-- Pilih Status Review --</option>
                    @foreach($reviewStatuses as $status)
                        <option value="{{ $status->value }}"
                            {{ old('review_status', $examscore->review_status) == $status->value ? 'selected' : '' }}>
                            {{ ucfirst($status->value) }}
                        </option>
                    @endforeach
                </select>
                @error('review_status') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

                    <div class="d-flex gap-2 mb-3 col-md-12">
                        <button type="submit" class="btn btn-success">Update</button>

                        <a href="{{ route('examscore.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>
</div>


@endsection