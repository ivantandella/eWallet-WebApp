@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">Cash Out</h3>
</div>
<div class="container">
    <form action="{{ route('cashout.send', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="id_bank" class="form-label fs-4">Bank</label>
                    <select name="id_bank" id="id_bank" class="form-select @error('id_bank') is-invalid @enderror">
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id_bank }}">{{ $bank->nama_bank }}</option>
                        @endforeach
                    </select>

                    @error('id_bank')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="no_rekening" class="form-label fs-4">No. Rekening</label>
                    <input type="number" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" id="no_rekening" value="{{ old('no_rekening') }}">

                    @error('no_rekening')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="nama_rekening" class="form-label fs-4">Nama Rekening</label>
                    <input type="text" class="form-control @error('nama_rekening') is-invalid @enderror" name="nama_rekening" id="nama_rekening" value="{{ old('nama_rekening') }}">

                    @error('nama_rekening')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="nominal" class="form-label fs-4">Nominal</label>
                    <input type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" id="nominal" value="{{ old('nominal') }}">

                    @error('nominal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-5">
                    <label for="pin" class="form-label fs-4">PIN</label>
                    <input type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin" placeholder="Enter your PIN">

                    @error('pin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <button type="submit" class="btn btn-outline-danger">Cash Out</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
