@extends('layouts.app')

@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
            {{-- <img src="{{ asset('img/hero-image.jpeg') }}" alt="Hero-Image" class="img-fluid"> --}}
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/hero-image.jpeg') }}" class="d-block w-100" alt="hero-image">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/hero-image-2.jpg') }}" class="d-block w-100" alt="hero-image">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/hero-image-3.jpg') }}" class="d-block w-100" alt="hero-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5 justify-content-center">
        <div class="col-md-2">
            <a href="{{ route('login') }}" class="btn btn-lg btn-danger">Get Started!</a>
        </div>
    </div>
@endsection
    