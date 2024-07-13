@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">Top-Up</h3>
</div>
<div class="container">
    <form action="{{ route('topup.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
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
                    <label for="bukti_tf" class="form-label fs-4">Bukti Transfer</label>
                    <input type="file" class="form-control @error('bukti_tf') is-invalid @enderror" name="bukti_tf" id="bukti_tf">

                    @error('bukti_tf')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <button type="submit" class="btn btn-outline-danger">Submit</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
