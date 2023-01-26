@extends('Frontend.Layout.Main')
@section('content')
    <div style="margin: 10% 0">
        <div class="container">
            <x-FormChangePassword />
            <div class="table-responsive mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Acara</th>
                            <th>Paket</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>20 Januri 2023</td>
                            <td>Paket 1</td>
                            <td>
                                <div class="badge bg-success w-100"> Selesai </div>
                            </td>
                            <td><button class="btn btn-outline-success btn-sm">Gallery</button></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>27 February 2023</td>
                            <td>Paket 2</td>
                            <td>
                                <div class="badge bg-primary w-100"> Pemesanan </div>
                            </td>
                            <td><button class="btn btn-outline-danger btn-sm">Batal</button></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>27 February 2023</td>
                            <td>Paket 2</td>
                            <td>
                                <div class="badge w-100" style="background: purple"> Telah Terima </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>27 February 2023</td>
                            <td>Paket 1</td>
                            <td>
                                <div class="badge bg-dark w-100"> Batal </div>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
