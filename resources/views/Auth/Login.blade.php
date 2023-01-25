@extends('Frontend.Layout.Main')
@section('styles')
    <style>
        #form {
            margin: 10% 0
        }
    </style>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="border border-2 bg-dark text-light border-warning p-4" id="form">
            @if (session()->has('msg'))
                <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
            @endif
            <form action="/login" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        id="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-secondary form-control">Masuk</button>
                <div class="mt-2">
                    Belum ada Akun ?
                    <a href="/register" class="text-decoration-none">Daftar
                        Sekarang
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection