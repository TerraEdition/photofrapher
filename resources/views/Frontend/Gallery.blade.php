@extends('Frontend.Layout.Main')
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
    <div class="container" style="margin-top: 10%">
        @if (session()->has('msg'))
            <div class="alert mt-3 {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
        @endif
        <div class="d-flex my-3 justify-content-between">
            <h3>Gallery</h3>
        </div>
        <table class="table">
            <tr>
                <td>Paket</td>
                <td>:</td>
                <td>{{ $data->Package->package }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>{{ currency($data->Package->price) }}</td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td>{{ $data->locate }}</td>
            </tr>
            <tr>
                <td>Tanggal / Jam</td>
                <td>:</td>
                <td>{{ date_indo($data->date . ' ' . $data->time) }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td> {!! badgeStatus($data->status) !!}</td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>:</td>
                <td>{{ $data->note }}</td>
            </tr>
        </table>
        <a href="{{ Request::url() }}/download" class="btn btn-primary mb-2">Download Semua Gallery</a>
        <div class="d-flex flex-wrap gap-2 justify-content-center">
            @foreach ($gallery as $r)
                <div id="pophover">
                    <img src="{{ asset('storage/gallery/' . $slug . '/' . $r->file) }}" class="img-thumbnail" id="thumb">
                    <div id="button">
                        <a href="{{ asset('storage/gallery/' . $slug . '/' . $r->file) }}"
                            class="btn btn-sm btn-outline-primary" download>Download</a>
                        <a href="{{ asset('storage/gallery/' . $slug . '/' . $r->file) }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">Buka</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
@endsection
