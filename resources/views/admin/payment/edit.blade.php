@extends('admin.layouts.layout')

@section('admin_layout')


<div class="containter-fluid">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="" id="" class="form-control"  placeholder="" aria-describedby="helpId"/>
            </div>
            
        </form>
    </div>
</div>

@endsection