@extends('Frontend.Layout.Main')
@section('content')
    <div class="container">
        <div class="row" style="margin: 10% 0">
            <div class="col-4 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h6>{{ $paket->package }}</h6>
                            <small class="fw-bold">{{ currency($paket->price) }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $paket->note }}
                    </div>
                </div>
            </div>
            <div class="col-8 col-xs-12">
                <form action="">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal_jam" class="form-label">Tanggal / Jam</label>
                        <input type="datetime-local" class="form-control @error('tanggal_jam') is-invalid @enderror"
                            id="tanggal_jam" autocomplete="off" name="tanggal_jam" value="{{ old('tanggal_jam') }}">
                        @error('tanggal_jam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                            autocomplete="off" name="lokasi" value="{{ old('lokasi') }}">
                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Tambahan</label>
                        <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                            autocomplete="off" name="catatan" value="{{ old('catatan') }}">
                        @error('catatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-secondary w-100">Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
