@extends('Backend.Layout.Main')
@section('title', 'Pengguna')
@section('content')
    @if (session()->has('msg'))
        <div class="alert {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
    @endif
    <div class="my-3">
        <a href="/users/create" class="btn btn-sm btn-success">Tambah</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <form action="/users" method="GET">
                        <td></td>
                        <td><input type="text" name="nama" class="form-control"
                                value="{{ app('request')->input('nama') }}"></td>
                        <td><input type="text" name="username" class="form-control"
                                value="{{ app('request')->input('username') }}"></td>
                        <td><select name="role" class="form-control">
                                <option value="">Semua</option>
                                <option value="user" {{ app('request')->input('role') == 'user' ? 'selected' : '' }}>
                                    User</option>
                                <option value="admin" {{ app('request')->input('role') == 'admin' ? 'selected' : '' }}>
                                    Administrator</option>
                            </select></td>
                        <td><input type="date" name="updated_at" class="form-control"
                                value="{{ app('request')->input('updated_at') }}"></td>
                        <td><input type="submit" class="btn btn-outline-secondary form-control" value="Cari"></td>
                    </form>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Peran</th>
                    <th>Tanggal Modifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->role == 'admin' ? 'Administrator' : 'User' }}</td>
                        <td>{{ date_indo($item->updated_at) }}</td>
                        <td>
                            <a href="/users/edit/{{ $item->slug }}" class="d-inline btn btn-sm m-1 btn-primary">Ubah</a>
                            <form action="/users/delete/{{ $item->slug }}" method="post" class="d-inline">
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
