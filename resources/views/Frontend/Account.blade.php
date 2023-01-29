@extends('Frontend.Layout.Main')
@section('content')
    <div class="container" style="margin-top: 10%">
        <x-FormChangePassword />
        @if (session()->has('msg'))
            <div class="alert mt-3 {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
        @endif
        <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Acara</th>
                        <th>Lokasi</th>
                        <th>Paket</th>
                        <th>Status</th>
                        <th>Tanggal Modifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }} {!! hasNote($item->note) !!}</td>
                            <td>{{ date_indo($item->date . ' ' . $item->time) }}</td>
                            <td>{{ $item->locate }}</td>
                            <td>{{ $item->Package->package }}</td>
                            <td>
                                {!! badgeStatus($item->status) !!}
                            </td>
                            <td>{{ date_indo($item->updated_at) }}</td>
                            <td>
                                {!! buttonStatus($item->status, $item->slug) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
