@extends('admin.layouts.layout')

@section('admin_layout')

<div class="col-lg-12">
    <div class="card rounded">
        <div class="card-header">
            <h2 class="fw-bold mb-2 mt-2">Konfirmasi Data Pembayaran</h2>
            
            <a href="{{ route('payment.create') }}" class="btn btn-success mt-2"> 
                <i class="fas fa-plus"></i> Tambah
             </a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th scope="col">Id</th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col">Kelas Pelatihan</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Tgl Transfer</th>
                        <th scope="col">Jam Transfer</th>
                        <th scope="col">Bukti Transfer</th>
                        <th scope="col">Status Bayar</th>
                        <th scope="col">Aksi</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payment as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->training_registration->user->name }}</td>
                        <td>{{ $p->training_registration->training->training_name }}</td>
                        <td>{{ $p->invoice_code }}</td>
                        <td>{{ $p->transfer_date }}</td>
                        <td>{{ $p->transfer_time }}</td>
                        <td>
                            @if($p->proof_of_transfer)
                                <img src="{{ asset('storage/' . $p->proof_of_transfer) }}" alt="Bukti Transfer" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $p->payment_status }}</td>
                        <td>
                            <div class="d-flex gap-2">
                               
                            <a href="{{ route('payment.edit', $p->invoice_code) }}" class="btn btn-warning mb-3"><i class="bi bi-pencil-square"></i></a>

                            <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $p->invoice_code }}">
                                <i class="bi bi-trash"></i>
                            </button>

                             <div class="modal fade" id="deleteModal{{ $p->invoice_code }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $p->invoice_code }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('payment.destroy', $p->invoice_code) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $j->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus <strong>{{ $p->invoice_code }}</strong>?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection