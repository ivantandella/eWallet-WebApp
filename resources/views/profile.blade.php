@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">Profile</h3>
</div>
<div class="container">
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">Nama</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">{{ $user->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">{{ $user->email }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">Phone Number</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">{{ $user->no_hp }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">PIN</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">@if ($user->pin) ****** @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 ms-3">
                        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary">Back</a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('pin', $user->id) }}" class="btn btn-sm btn-outline-danger">Update PIN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
