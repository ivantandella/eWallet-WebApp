@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Transaksi List</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Nomor </th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($transactions as $transaksi)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>
                         <p>  Jenis : {{ $transaksi->layanan->jenis_layanan}}</p>
                         <p>  Nama Perusahaan : {{ $transaksi->layanan->nama_perusahaan}}</p>
                      </td>
                      <td>{{ $transaksi->nomor }}   </td>
                      <td>Rp. {{ $transaksi->nominal     }}</td>
                      <td>{{ $transaksi->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

@endsection