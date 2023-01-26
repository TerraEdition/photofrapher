<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @yield('styles')
    <style>
        .w-gotop {
            width: 10vw;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>

<body class="overflow-x-hidden d-flex flex-column" style="min-height:100vh;">
    <nav class="navbar fw-bold fixed-top text-light navbar-expand-md opacity-75" data-bs-theme="dark"
        style="background: black">
        <div class="container m-3">
            <a class="navbar-brand" href="#home">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ !Route::is('home') ? '/' : '' }}#paket">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ !Route::is('home') ? '/' : '' }}#tentang-saya">Tentang
                            Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ !Route::is('home') ? '/' : '' }}#gallery">Gallery</a>
                    </li>
                    @if (Auth::user())
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/dashboard">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/account">Akun</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/logout">Keluar</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/login">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/register">Daftar</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div data-bs-spy="scroll" data-bs-smooth-scroll="true" tabindex="0">
        @yield('content')
    </div>
    <footer id="footer" class="footer mt-auto bg-dark text-center text-light p-3">
        &#169; {{ date('Y') }} Copyright: {{ env('APP_NAME') }}
    </footer>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>
