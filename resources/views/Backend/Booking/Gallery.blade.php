@extends('Backend.Layout.Main')
@section('title', 'Pemesanan')
@section('content')
    <h3 class="mb-2">Gallery Pemesanan</h3>
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <div class="d-flex gap-3 d-flex justify-content-between">
        <a href="/booking/{{ $slug }}" class="btn btn-danger">Kembali</a>
    </div>
@endsection
@section('scripts')

@endsection
