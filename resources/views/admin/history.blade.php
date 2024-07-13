@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Riwayat Transaksi</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <th>No</th>
                    <th>Keterangan </th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($histories as $history)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $history->keterangan }}</td>
                      <td>Rp.{{ $history->nominal }}   </td>
                      <td>{{ $history->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

@endsection