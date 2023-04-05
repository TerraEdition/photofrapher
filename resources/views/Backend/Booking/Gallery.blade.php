@extends('Backend.Layout.Main')
@section('title', 'Pemesanan')
@section('styles')
<style>
.img-thumbnail#thumb {
    max-height: 250px
}

#pophover #button {
    display: none;
    position: relative;
    top: -150px;
    left: 120px;
}

#pophover:hover #button {
    display: block;
}
</style>
@endsection
@section('content')
<h3 class="mb-2">Gallery Pemesanan</h3>
@if (session()->has('msg'))
<div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
@endif
<div class="d-flex gap-3 d-flex justify-content-between">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>
    <a href="/booking/{{ $slug }}" class="btn btn-danger">Kembali</a>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ Request::url() }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Gallery</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="gallery" name="gallery[]"
                            accept="image/png,image/jpg,image/jpeg" multiple>
                        <label class="input-group-text" for="gallery">Upload</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="d-flex flex-wrap gap-2 justify-content-center">
    @foreach ($data as $r)
    <div id="pophover">
        <img src="{{ asset('storage/gallery/' . $slug . '/' . $r->file) }}" class="img-thumbnail" id="thumb">
        <div id="button">
            <form action="{{ Request::url() }}" class="d-inline" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $r->id }}">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            <a href="{{ asset('storage/gallery/' . $slug . '/' . $r->file) }}" target="_blank"
                class="btn btn-sm btn-primary">Buka</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('scripts')

@endsection