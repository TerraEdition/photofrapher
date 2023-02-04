@extends('Backend.Layout.Main')
@section('title', 'Pemesanan')
@section('content')
    <h3 class="mb-2">Detail Pemesanan</h3>
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <div class="row">
        <div class="col col-sm-6 col-xs-12">
            <table class="table">
                <tr>
                    <td>Pengguna</td>
                    <td>:</td>
                    <td>{{ $data->User->name }}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td>{{ $data->User->phone }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{ $data->User->email }}</td>
                </tr>
            </table>
        </div>
        <div class="col col-sm-6 col-xs-12">
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
        </div>
    </div>
    <div class="d-flex gap-3 d-flex justify-content-between">
        <div class="d-flex gap-3">
            @if ($data->status == '1')
                <x-AcceptBooking :status="$data->status" />
                <x-RejectReasonBooking />
            @elseif($data->status == '2')
                <x-AcceptBooking :status="$data->status" />
                <x-RejectReasonBooking />
            @endif
        </div>
        <a href="/booking" class="btn btn-danger">Kembali</a>
    </div>
@endsection
@section('scripts')

@endsection
