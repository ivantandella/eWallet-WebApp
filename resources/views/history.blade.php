@extends('layouts.main')

@section('content')
<div class="row mb-3 p-3 text-center bg-danger">
    <h3 class="text-white">History</h3>
</div>
<div class="container">
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            @foreach ($histories as $history)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $history->keterangan }}</h5>
                        <div class="row">
                            <div class="col-md-6 text-muted"><small>{{ $history->created_at }}</small></div>
                            <div class="col-md-6 text-end pull-right"><small>Rp.{{ $history->nominal }}</small></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
