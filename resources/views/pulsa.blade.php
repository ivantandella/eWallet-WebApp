@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">Pulsa</h3>
</div>
<div class="container">
    <form action="{{ route('payPulsa', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="id_layanan" class="form-label fs-4">Operator</label>
                    <select name="id_layanan" id="id_layanan" class="form-select @error('id_layanan') is-invalid @enderror">
                        @foreach ($layanan as $layanan)
                            <option value="{{ $layanan->id_layanan }}">{{ $layanan->nama_perusahaan }}</option>
                        @endforeach
                    </select>

                    @error('id_layanan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="nomor" class="form-label fs-4">Phone Number</label>
                    <input type="number" class="form-control @error('nomor') is-invalid @enderror" name="nomor" id="nomor" value="{{ old('nomor') }}">

                    @error('nomor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="nominal" class="form-label fs-4">Nominal</label>
                    <select name="nominal" id="nominal" class="form-select @error('nominal') is-invalid @enderror">
                        <option value="6000">5K (Rp. 6.000)</option>
                        <option value="11000">10K (Rp. 11.000)</option>
                        <option value="16000">15K (Rp. 16.000)</option>
                        <option value="21000">20K (Rp. 21.000)</option>
                        <option value="50000">50K (Rp. 50.000)</option>
                        <option value="100000">100K (Rp. 100.000)</option>
                    </select>

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
                    <button type="submit" class="btn btn-outline-danger">Buy</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
