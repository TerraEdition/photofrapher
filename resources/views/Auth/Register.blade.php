@extends('Frontend.Layout.Main')
@section('styles')
    <style>
        #form {
            margin: 10% 0
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.1),
                    rgba(0, 0, 0, 0.1)),
                url("{{ asset('storage/Config/register.webp') }}");
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-5 d-flex justify-content-end">
        <div class="bg-light border border-3 border-gray w-50 p-4" id="form">
            @if (session()->has('msg'))
                <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
            @endif
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                        id="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                        min="0" id="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                        id="password" value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-secondary form-control">Daftar</button>
                <div class="mt-2">
                    Sudah ada Akun ?
                    <a href="/login" class="text-decoration-none">Masuk
                        Sekarang
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
