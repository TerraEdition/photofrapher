@extends('Backend.Layout.Main')
@section('title', 'Pengguna')
@section('content')
    <h3 class="mb-2">Ganti Password</h3>
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <form action="" method="POST">
        @csrf
        <div class="mb-4">
            <label for="password_lama" class="form-label">Password Lama</label>
            <input type="password" name="password_lama" class="form-control @error('password_lama') is-invalid @enderror ">
            @error('password_lama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_baru" class="form-label">Password Baru</label>
            <input type="password" name="password_baru" class="form-control @error('password_baru') is-invalid @enderror ">
            @error('password_baru')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
            <input type="password" name="konfirmasi_password"
                class="form-control @error('konfirmasi_password') is-invalid @enderror ">
            @error('konfirmasi_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
@section('scripts')

@endsection
