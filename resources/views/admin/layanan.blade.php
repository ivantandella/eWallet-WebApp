@extends('admin.main')

@section('kontent')

<div id="layoutSidenav_content">
    <main >
        <div class="container-fluid col-5" style="float:left; margin:20px">
            <h1 class="mt-4">Layanan</h1>
            <ol class="breadcrumb mb-4 ">
                <button class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Layanan
                </button>
            </ol>

            
            
            <table class="table table-hover ">
                <thead class="bg-secondary">
                  <tr>
                    <th>No</th>
                    <th>Jenis Layanan</th>
                    <th>Nama Perusahaan </th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($layanan as $l)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $l->jenis_layanan }}</td>
                      <td>{{ $l->nama_perusahaan     }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            
        </div>
    </main>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="col-sm-10 bordered" method="post" action="/admin/tambah/layanan">
                @csrf
                <label for="nominal" class="form-label fs-4">Jenis layanan</label>
                    <select name="jenis_layanan" id="nominal" class="form-select @error('nominal') is-invalid @enderror">
                        <option value="pulsa">Pulsa</option>
                        <option value="internet">Internet</option>
                    </select>
                <div class="form-group row">
                  <label for="perusahaan" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-10 mt-2">
                    <input type="name" name="nama_perusahaan" class="form-control" id="perusahaan" placeholder="Nama perusahaan">
                  </div>
                </div>
                <div class="form-group row" style="margin-top: 20px">
                  <div class="col-sm-8">
                    <button type="submit" class="btn btn-primary">Tambah Layanan</button>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>

@endsection