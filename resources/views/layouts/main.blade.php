<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LinkAja</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ ('img/favicon.ico') }}" type="image/x-icon">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    {{-- Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>
    {{-- Navbar start --}}
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm p-2 mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/linkaja-logo.png') }}" alt="Logo-LinkAja" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="{{ route('home') }}" class="nav-link me-4 {{ Request::is('home*') ? 'text-danger' : '' }}">Home</a>
                    <a href="{{ route('history') }}" class="nav-link me-4 {{ Request::is('history*') ? 'text-danger' : '' }}">History</a>
                    <a href="{{ route('profile') }}" class="nav-link me-4 {{ Request::is('profile*') ? 'text-danger' : '' }}">Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    {{-- Navbar end --}}

    {{-- Content start --}}
    @yield('content')   
    {{-- Content end --}}

    {{-- Footer start --}}
    <footer class="footer p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 me-5">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/LinkAja.png') }}" alt="Logo-LinkAja" class="img-fluid">
                    </a>
                    <p class="mt-3">LinkAja adalah layanan keuangan elektronik berbasis aplikasi yang akan membuat transaksi keuanganmu lebih seru, lebih lancar dan bebas repot! Sekarang saatnya semua <span class="fw-bold">#BeresTanpaCash</span></p>
                </div>
                <div class="col-md-3 ms-5">
                    <h4>Follow us</h4>
                    <a href="https://www.facebook.com/linkaja.indonesia" target="_blank" class="text-dark fs-2 me-3"><i class="bi bi-facebook"></i></a>
                    <a href="https://twitter.com/linkaja" target="_blank" class="text-dark fs-2 me-3"><i class="bi bi-twitter"></i></a>
                    <a href="https://instagram.com/linkaja/" target="_blank" class="text-dark fs-2 me-3"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCVoM8DZXOxCSu2PWwxVQh5Q" target="_blank" class="text-dark fs-2 me-3"><i class="bi bi-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/linkaja/" target="_blank" class="text-dark fs-2 me-3"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    {{-- Footer end --}}

    @include('sweetalert::alert')
    
    {{-- Bootstrap JS --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
</body>
</html>