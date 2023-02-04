@extends('Backend.Layout.Main')
@section('title', 'Pemesanan')
@section('content')
    <div class="container my-3">
        <h3>Pemesanan</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <form action="/booking" method="GET">
                            <td></td>
                            <td><input type="text" name="user" class="form-control"
                                    value="{{ app('request')->input('user') }}"></td>
                            <td><input type="text" name="package" class="form-control"
                                    value="{{ app('request')->input('package') }}"></td>
                            <td><input type="text" name="locate" class="form-control"
                                    value="{{ app('request')->input('locate') }}"></td>
                            <td><select name="status" class="form-control">
                                    <option value="">Semua</option>
                                    <option value="1" {{ app('request')->input('status') == '1' ? 'selected' : '' }}>
                                        Pemesanan Baru</option>
                                    <option value="2" {{ app('request')->input('status') == '2' ? 'selected' : '' }}>
                                        Dalam Koordinasi</option>
                                    <option value="3" {{ app('request')->input('status') == '3' ? 'selected' : '' }}>
                                        Menunggu Bukti Pembayaran</option>
                                    <option value="4" {{ app('request')->input('status') == '4' ? 'selected' : '' }}>
                                        Pemesanan di Terima</option>
                                    <option value="5" {{ app('request')->input('status') == '5' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select></td>
                            <td><input type="date" name="date" class="form-control"
                                    value="{{ app('request')->input('date') }}"></td>
                            <td><input type="date" name="updated_at" class="form-control"
                                    value="{{ app('request')->input('updated_at') }}"></td>
                            <td><input type="submit" class="btn btn-outline-secondary form-control" value="Cari"></td>
                        </form>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Pengguna</th>
                        <th>Paket</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tanggal Acara</th>
                        <th>Tanggal Modifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->User->name }}</td>
                            <td>{{ $item->Package->package }}</td>
                            <td>{{ $item->locate }}</td>
                            <td>
                                {!! badgeStatus($item->status) !!}
                            </td>
                            <td>{{ date_indo($item->date . ' ' . $item->time) }}</td>
                            <td>{{ date_indo($item->updated_at) }}</td>
                            <td>
                                <a href="/booking/{{ $item->slug }}"
                                    class="d-inline btn btn-sm m-1 btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
@endsection
