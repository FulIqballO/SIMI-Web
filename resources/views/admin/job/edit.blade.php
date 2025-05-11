@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Edit Data Pekerjaan</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('job.update', $job->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="trainings_id" class="form-label">Nama Pelatihan</label>
                        <select name="trainings_id" class="form-control">
                            <option value="">-- Pilih Pelatihan --</option>
                            @foreach ($trainings as $t)
                                <option value="{{ $t->id }}" 
                                    @if ($t->id == $job->trainings_id) selected @endif>
                                    {{ $t->training_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

              <div class="mb-3 col-md-6">
                <label for="job_title" class="form-label">Nama Pekerjaan</label>
                <input type="text" name="job_title" class="form-control" value="{{ $job->job_title }}" placeholder="" required/>
            </div>

            <div class="mb-3 col-md-6">
                <label for="country" class="form-label">Negara</label>
                <input type="text" name="country" class="form-control" value="{{ $job->country }}" placeholder="" required/>
            </div>

            <div class="mb-3 col-md-6">
                <label for="job_description" class="form-label">Deskripsi Pekerjaan</label>
                <textarea type="text" name="job_description" class="form-control" placeholder="" rows="3" required>{{ $job->job_description }}</textarea>
            </div>

            <div class="mb-3 col-md-6">
                <label for="salary" class="form-label">Gaji</label>
                <input type="text" name="salary" class="form-control" value="{{ $job->salary }}" placeholder="" required/>
            </div>

       <div class="mb-3 col-12 mt-2">
        <button type="submit" class="btn btn-lg btn-outline-success">Submit </button>
        <a href="{{ route('job.index') }}" class="btn btn-lg btn-outline-primary">Kembali</a>
            </div>

            </form>
            </div>
        </div>
    </div>
</div>



@endsection