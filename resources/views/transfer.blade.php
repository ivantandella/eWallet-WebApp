@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">Send Money</h3>
</div>
<div class="container">
    <form action="{{ route('transfer.send', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <div class="row mb-3">
                    <label for="no_hp_penerima" class="form-label fs-4">Receiver</label>
                    <input type="number" class="form-control @error('no_hp_penerima') is-invalid @enderror" name="no_hp_penerima" id="no_hp_penerima" value="{{ old('no_hp_penerima') }}" placeholder="08xxxxxx">

                    @error('no_hp_penerima')
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
                <div class="row mb-3">
                    <label for="deskripsi" class="form-label fs-4">Description</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="Optional.."></textarea>

                    @error('deskripsi')
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
                    <button type="submit" class="btn btn-outline-danger">Send</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
