@extends('Backend.Layout.Main')
@section('content')
    <div class="container my-3">
        <h3>Artikel</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pengguna</th>
                        <th>Paket</th>
                        <th>Lokasi</th>
                        <th>Tanggal Acara</th>
                        <th>Tanggal Modifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>{{ $item->updated_user->name }}</td>
                            <td>{{ $item->category->category }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
@endsection
