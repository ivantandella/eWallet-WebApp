@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Transfer</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <td>No</td>
                    <th>Nama Pengirim</th>
                    <th>No Hp Penerima </th>
                    <th>Nominal</th>
                    <th>
                       Deskripsi
                    </th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($transfers as $transaksi)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $transaksi->user->name }}</td>
                      <td>{{ $transaksi->no_hp_penerima }}</td>
                      <td>{{ $transaksi->nominal }}</td>
                      <td>{{ $transaksi->deskripsi }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
           
            <img  width="500px" height="500px" src="/img/linkaja.png" alt="">
            
          </div>
        </div>
      </div>

@endsection