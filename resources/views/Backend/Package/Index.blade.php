@extends('Backend.Layout.Main')
@section('title', 'Paket')
@section('content')
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <div class="my-3">
        <a href="/packages/create" class="btn btn-sm btn-success">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <form action="/packages" method="GET">
                        <td></td>
                        <td><input type="text" name="package" class="form-control"
                                value="{{ app('request')->input('package') }}"></td>
                        <td><input type="text" name="price" class="form-control"
                                value="{{ app('request')->input('price') }}"></td>
                        <td><input type="date" name="updated_at" class="form-control"
                                value="{{ app('request')->input('updated_at') }}"></td>
                        <td><input type="submit" class="btn btn-outline-secondary form-control" value="Cari"></td>
                    </form>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Paket</th>
                    <th>Harga</th>
                    <th>Tanggal Modifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->package }}</td>
                        <td>{{ currency($item->price) }}</td>
                        <td>{{ date_indo($item->updated_at) }}</td>
                        <td>
                            <a href="/packages/edit/{{ $item->slug }}"
                                class="d-inline btn btn-sm m-1 btn-primary">Ubah</a>
                            <form action="/packages/delete/{{ $item->slug }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm m-1 btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
