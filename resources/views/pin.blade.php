@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">PIN</h3>
</div>
<div class="container">
    <form action="{{ route('updatePIN', $user->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                @if ($user->pin)
                <div class="row mb-3">
                    <label for="oldPin" class="form-label fs-4">Old PIN</label>
                    <input type="password" class="form-control @error('oldPin') is-invalid @enderror" name="oldPin" id="oldPin" autofocus>

                    @error('oldPin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="pin" class="form-label fs-4">New PIN</label>
                    <input type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin">

                    @error('pin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-5">
                    <label for="pin_confirmation" class="form-label fs-4">Confirm New PIN</label>
                    <input type="password" class="form-control @error('pin_confirmation') is-invalid @enderror" name="pin_confirmation" id="pin_confirmation" autofocus>

                    @error('pin_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                @else
                    <div class="row mb-3">
                        <label for="pin" class="form-label fs-4">New PIN</label>
                        <input type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" id="pin" autofocus>

                        @error('pin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-5">
                        <label for="pin_confirmation" class="form-label fs-4">Confirm New PIN</label>
                        <input type="password" class="form-control @error('pin_confirmation') is-invalid @enderror" name="pin_confirmation" id="pin_confirmation">

                        @error('pin_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif

            
                
                
                <div class="row mb-3">
                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
