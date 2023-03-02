@extends('Frontend.Layout.Main')
@section('content')
    <div class="container" style="margin-top: 10%">
        @if (session()->has('msg'))
            <div class="alert mt-3 {{ session()->get('bg') }}">{{ session()->get('msg') }}</div>
        @endif
        <div class="d-flex my-3 justify-content-between">
            <h3>Riwayat Transaksi</h3>
            <div>
                <x-FormChangePassword />
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Alur Kerja Kami
                </button>
            </div>
        </div>
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
                        @php($btnStat = buttonStatus($item->status, $item->slug))
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
                                @if ($btnStat == '3')
                                    <x-UploadPayment :slug="$item->slug" />
                                @else
                                    {!! $btnStat !!}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <div class="modal-title text-light" id="exampleModalLabel">
                        <h1 class="fs-5"> Alur Kerja</h1>
                        <small class="text-light">Silahkan di Klik untuk informasi lebih detail</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="d-flex gap-2 justify-content-start align-content-center flex-wrap">
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 1"
                                data-bs-content="Pemesanan sedang diproses. Mohon tunggu konfirmasi dari pihak kami.">
                                <p>1. Menunggu di Terima</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </div>
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 2"
                                data-bs-content=" Pemesanan telah diterima. Kami akan menghubungi anda untuk melengkapi informasi lebih lanjut.">
                                <p>2. Pemesanan di Terima</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </div>
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 3"
                                data-bs-content="Mohon segera melakukan pembayaran dan mengunggah bukti pembayaran di halaman Pembayaran.">
                                <p>3. Menunggu Bukti Pembayaran</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </div>
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 4"
                                data-bs-content="Bukti pembayaran sedang kami proses. Mohon tunggu konfirmasi dari pihak kami.">
                                <p>4. Bukti Pembayaran Sedang di Validasi</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </div>
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 5"
                                data-bs-content="Pemesanan sudah disetujui. Kami akan mulai bekerja sesuai informasi yang diberikan sebelumnya.">
                                <p>5. Pemesanan Telah di Setujui</p>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </div>
                            <div class="bg-primary badge text-center" data-bs-toggle="popover" data-bs-title="Langkah 6"
                                data-bs-content="Pemesanan selesai. Pada langkah ini kami akan mengupload foto ataupun video ke akun anda .">
                                <p>6. Pemesanan Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
@endsection
