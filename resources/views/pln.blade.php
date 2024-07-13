@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">PLN</h3>
</div>
<div class="container">
    <form action="{{ route('payPLN', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <input type="hidden" name="id_layanan" value="{{ $layanan->id_layanan }}">
                <div class="row mb-3">
                    <label for="nomor" class="form-label fs-4">Customer ID</label>
                    <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor" id="nomor" value="{{ old('nomor') }}">

                    @error('nomor')
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
                    <button type="submit" class="btn btn-outline-danger">Pay</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
