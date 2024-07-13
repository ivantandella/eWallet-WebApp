@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mt-5 p-3 bg-danger text-white">
        <div class="col-md-6">
            <h3>Hi, {{ $user->name }}</h3>
        </div>
        <div class="col-md-6">
            <h3 class="text-end"><i class="bi bi-wallet2"></i> Rp.{{ $user->saldo }}</h3>
        </div>
    </div>
    <div class="row mb-5 p-5 border border-danger justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('topup') }}" class="btn btn-outline-danger"><i class="bi bi-plus-circle"></i> Top-up</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('transfer') }}" class="btn btn-outline-danger"><i class="bi bi-send"></i> Send</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('cashout') }}" class="btn btn-outline-danger"><i class="bi bi-cash"></i> Cash Out</a>
        </div>
        <div class="col-md-2">
            <a href="#more" class="btn btn-outline-danger"><i class="bi bi-three-dots-vertical"></i> More</a>
        </div>
    </div>
    <div class="row" id="more">
        <div class="col-md-5">
            <h3>Payment & Bills</h3>
        </div>
    </div>
    <div class="row mb-5 p-5 border border-dark justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('pln') }}" class="btn btn-outline-dark"><i class="bi bi-lightning-fill"></i> PLN</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('pdam') }}" class="btn btn-outline-dark"><i class="bi bi-droplet-fill"></i> PDAM</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('pulsa') }}" class="btn btn-outline-dark"><i class="bi bi-phone-fill"></i> Pulsa</a>
        </div>
        <div class="col-md-2">
            <a href="{{ route('internet') }}" class="btn btn-outline-dark"><i class="bi bi-router-fill"></i> Internet</a>
        </div>
    </div>
</div>
@endsection