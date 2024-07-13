@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">User List</li>
            </ol>
            
            <table class="table table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Saldo</th>
                    <th><center> Aksi</center></th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($trash as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->no_hp }}</td>
                      <td>{{ $user->saldo }} IDR</td>
                      <td>
                          <center>
                          <div class="btn btn-info" ><a class="text-white" href="/admin/user/pulihkan/{{ $user->id }}" style="text-decoration: none">Pulihkan</a></div>
                          <div class="btn btn-success">Riwayat Transaksi</div>
                        </center>
                      </td>
                    </tr>
                    @endforeach
                    @foreach ($users as $user)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->no_hp }}</td>
                      <td>{{ $user->saldo }} IDR</td>
                      <td>
                          <center>
                          <div class="btn btn-danger" ><a class="text-white" href="/admin/user/hapus/{{ $user->id }}" style="text-decoration: none" >Hapus</a></div>
                          <a href="/admin/history/{{ $user->id }}" class="btn btn-success">Riwayat Transaksi</a>
                        </center>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

@endsection