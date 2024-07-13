@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cashout</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bank </th>
                    <th>No rek</th>
                    <th>Nama rek</th>
                    <th>Nominal</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($cashouts as $transaksi)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $transaksi->user->name }}</td>
                      <td>{{ $transaksi->bank->nama_bank}}</td>
                      <td>{{ $transaksi->no_rekening }}   </td>
                      <td>{{ $transaksi->nama_rekening }}</td>
                      <td>Rp. {{ $transaksi->nominal }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

@endsection