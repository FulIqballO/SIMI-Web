@extends('admin.layouts.layout')


@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
             <div class="row">
            <form action="{{ route('training_registration.update', $training_registration->id) }}" method="POST">
                @csrf
                @method('PUT')
                
               <div class="row">    

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Nama User</label>
                        <input type="text" name="user_id" id="" placeholder="" value="{{ $training_registration->user->name }}"/>
                    </div>

                        <div class="mb-3 col-md-6">
                            <label for="training_id" class="form-label">Nama Pelatihn</label>
                            <select name="training_id" class="form-control" required>
                                @foreach($training as $t)
                                    <option value="{{ $t->id }}"  {{ $training_registration->training_id == $t->id ? 'selected' : '' }}>>{{ $t->training_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-select-lg" name="status" id="status">
                                    <option selected disabled>-- Pilih Status --</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->value }}" {{ $training_registration->status == $status->value ? 'selected' : '' }}>
                                           {{ ucfirst($status->value) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    
                    
                             <div class="mb-3">
                                <label for="registration_date" class="form-label">Tgl Registrasi</label>
                                 <input type="date" name="registration_date" id="" class="form-control" placeholder="" value="{{ Carbon\Carbon::parse($training_registration->date)->format('d/m/Y') }}" readonly/>
                             </div>
                             
                             <div class="mb-3 col-md-6">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('training_registration.index') }}" class="btn btn-primary">Kembali</a>
                             </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection