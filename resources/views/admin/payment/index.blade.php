@extends('admin.layouts.layout')

@section('admin_layout')

  <div class="col-lg-12">
    <div class="card rounded">
        <div class="card-header">
            <h2 class="fw-bold mb-2 mt-2">Konfirmasi Data Pembayaran</h2>
          

             <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <form class="d-flex" role="search" method="GET" action="{{ route('payment.index') }}">
                        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search"  value="{{ request()->query('cari') }}">

                    <div class="d-flex gap-2">
                        <button class="btn btn-sm rounded btn-outline-primary" type="submit">Search</button>
                        @if(request()->has('cari') && request()->get('cari') != '')
                        <a href="{{ route('payment.index') }}" class="btn btn-sm btn-outline-danger">Reset</a>
                    </div>
                    @endif
                      </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        
                        <th scope="col">Id</th>
                        {{-- <th scope="col">Nama Pengguna</th> --}}
                        <th scope="col">Status Registrasi</th>
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
                        {{-- <td>{{ $p->training_registrations->user->name }}</td> --}}
                        <td>
                              @if ($p->training_registration)
                                  {{ $p->training_registration->status }}
                              @else
                                  <span class="text-danger">Tidak ada data</span>
                              @endif
                          </td>
                        <td>{{ $p->invoice_code }}</td>
                        <td>{{ $p->transfer_date }}</td>
                        <td>{{ $p->transfer_time }}</td>
                        <td>
                            @if($p->proof_of_transfer)
                                <img src="{{ asset('payments/' . $p->proof_of_transfer) }}" alt="Bukti Transfer" width="100">
                            @else
                                <span>Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>{{ $p->payment_status }}</td>

                        <td>
                            <div class="d-flex gap-2">
                               
                            <a href="{{ route('payment.edit', $p->id) }}" class="btn btn-warning mb-3"><i class="bi bi-pencil-square"></i></a>

                            <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $p->id }}">
                                <i class="bi bi-trash"></i>
                            </button>

                             <div class="modal fade" id="deleteModal{{ $p->invoice_code }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $p->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <form action="{{ route('payment.destroy', $p->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $p->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                      </div>
                                      <div class="modal-body">
                                        Apakah Yakin Ingin Menghapus Kode Invoice Dari : <strong>{{ $p->invoice_code }}</strong>?
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