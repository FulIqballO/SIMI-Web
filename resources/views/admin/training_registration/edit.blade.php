@extends('admin.layouts.layout')


@section('admin_layout')

<div class="container-fluid">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
             <div class="row">
            <form action="" method="POST">
                @csrf
               
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="" id="" class="form-control" placeholder=""/>
                    </div>
                    
                
            </form>
            </div>
        </div>
    </div>
</div>



@endsection