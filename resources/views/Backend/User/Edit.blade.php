@extends('Backend.Layout.Main')
@section('title', 'Pengguna')
@section('content')
    <h3 class="mb-2">Ubah Pengguna</h3>
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" autocomplete="off"
                name="nama" value="{{ old('nama', $data->name) }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                autocomplete="off" name="email" value="{{ old('email', $data->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                autocomplete="off" name="no_hp" value="{{ old('no_hp', $data->phone) }}" min='0'>
            @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                autocomplete="off" name="username" value="{{ old('username', $data->username) }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                autocomplete="off" name="password" value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="peran" class="form-label">Peran</label>
            <select name="peran" id="peran" class="form-control @error('peran') is-invalid @enderror">
                <option value="admin" {{ old('peran', $data->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                <option value="user" {{ old('peran', $data->role) == 'user' ? 'selected' : '' }}>User</option>
            </select>
            @error('peran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/users" class="btn btn-danger">Kembali</a>
    </form>
@endsection
@section('scripts')

@endsection
