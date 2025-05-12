@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header">
            <h2 class="fw-bold">Testing Create Data</h2>
        </div>
        <div class="card-body">
            
                <form action="" method="POST">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label for="user_id" class="form-label">Nama User</label>
                            <select name="user_id" class="form-select">
                                <option disabled selected>-- Pilih User --</option>
                                @foreach($user as $u)
                                    <option value="{{ $u->id }}">
                                        {{ $u->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                         <div class="mb-3 col-md-6">
                            <label for="training_id" class="form-label">Nama Pelatihan</label>
                            <select name="training_id" id="training_id" class="form-select">
                                <option selected disabled>-- Pilih Pelatihan</option>
                                @foreach($training as $t)
                                <option value="{{ $t->id }}">{{ $t->training_name }}</option>
                                @endforeach
                            </select>        
                        </div>

                       <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-select-lg" name="status" id="status">
                                    <option selected disabled>-- Pilih Status --</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->value }}"
                                            {{ old('status') === $status->value ? 'selected' : '' }}>
                                            {{ ucfirst($status->value) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                         <div class="mb-3 col-md-6">
                            <label for="regiistration_date" class="form-label">Tgl Registration</label>
                            <input type="date" name="registration_date" class="form-control" placeholder="">
                        </div>

                            <div class="d-flex col-md-12 gap-4">
                                <button type="submit" class="btn btn-outline-success" method="POST">Submit</button>
                                <a href="{{ route('training_registration.index') }}" class="btn btn-outline-primary"><i class="fa-solid fa-backward"></i></a>
                            </div>
                        </div>
                </form>
            
        </div>
    </div>
</div>

@endsection