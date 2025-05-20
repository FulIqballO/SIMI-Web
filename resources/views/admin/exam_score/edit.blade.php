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
                        <label for="training_registration_id" class="form-label">Status</label>
                        <input type="text" name="training_registration_id" class="form-control" placeholder="" value="{{ $examscore->training_registration->status }}" readonly/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="user_id" class="form-label">Nama CPMI</label>
                        <input type="text" name="user_id" class="form-control" placeholder="" value="{{ $examscore->user->username }}" readonly/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="training_schedule_id" class="form-label">Materi Pelatihan</label>
                        <input type="text" name="training_schedule_id" class="form-control" placeholder="" value="{{ $examscore->training_schedule->training_material }}" readonly/>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="score" class="form-label">Nilai</label>
                        <input type="number" name="score" class="form-control" placeholder="" value="{{ $examscore->score }}"/>
                         @error('score') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                        <div class="mb-3 col-md-6">
                                <label for="remarks" class="form-label">Status</label>
                                <select class="form-select form-select-lg" name="remarks" id="remarks">
                                    <option selected disabled>-- Pilih Status Kelulusan --</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->value }}" {{ old('remarks', $examscore->remarks ?? '') == $status->value ? 'selected' : '' }}>
                                           {{ ucfirst($status->value) }}
                                        </option>
                                    @endforeach
                                </select>
                                 @error('remarks') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                    <div class="mb-3 col-md-6">
                        <label for="input_date" class="form-label">Tgl Input Nilai</label>
                        <input type="date" name="input_date" class="form-control" placeholder="" value="{{ $examscore->input_date }}"/>
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