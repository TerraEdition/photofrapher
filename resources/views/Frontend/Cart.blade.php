@extends('Frontend.Layout.Main')
@section('content')
    <div class="container" style="margin-top: 10% ">
        @if (session()->has('msg'))
            <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
        @endif
        <div class="row">
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
                <form action="{{ Request::url() }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" autocomplete="off" name="tanggal" value="{{ old('tanggal') }}"
                                    min="{{ date('Y-m-d', strtotime('+3 days')) }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam"
                                    autocomplete="off" name="jam" value="{{ old('jam') }}">
                                @error('jam')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
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
