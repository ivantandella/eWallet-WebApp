@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Top Up</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                      <td>No</td>
                    <th>Nama</th>
                    <th>Nominal </th>
                    <th>Bukti Tf</th>
                    <th>
                        <center>
                        Status
                    </center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($topups as $transaksi)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>
                         {{ $transaksi->user->name }}
                      </td>
                      <td>Rp. {{ $transaksi->nominal }}   </td>
                      <td>
                          <img width="50px" height="50px" src="{{ asset('storage/' . $transaksi->bukti_tf) }}" alt="">
                            
                          <button style="" class="btn-sm btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $transaksi->id_top_up }}">
                                Perbesar
                            </button>
                      </td>
                      <td>
                        <center>
                        @if ($transaksi->status == 0)    
                        <div class="btn btn-danger" ><a class="text-white" href="/admin/topup/tolak/{{ $transaksi->id_top_up }}" style="text-decoration: none" >Tolak</a></div>
                        <div class="btn btn-primary"><a class="text-white" href="/admin/topup/konfirmasi/{{ $transaksi->id_top_up }}" style="text-decoration: none" >Konfirmasi</a></div>
                        @elseif($transaksi->status == 1)
                        <div class="badge bg-success">Terkonfimasi</div>
                        @elseif($transaksi->status == 2)
                        <div class="badge bg-danger">Ditolak</div>
                        @endif
                        
                      </center>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

    @foreach ($topups as $transaksi)    
    <div class="modal fade" id="exampleModal{{ $transaksi->id_top_up }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
           
            <img  width="500px" height="500px" src="{{ asset('storage/' . $transaksi->bukti_tf) }}" alt="">
            
          </div>
        </div>
      </div>
    @endforeach

@endsection