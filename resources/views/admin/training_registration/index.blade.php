@extends('admin.layouts.layout')

@section('admin_layout')

<div class="container-fluid col-12">
    <div class="card">
        <div class="card-header justify-content-between align-items-center">
            <h2>Form Registrasi Pelatihan</h2>
        </div>
        <div class="card-body col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama USer</th>
                        <th>Materi Training </th>
                        <th>Status</th>
                        <th>Tgl Registrasi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                        
                    <tr>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td scope="col"></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                            </div>
                        </td>



                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection