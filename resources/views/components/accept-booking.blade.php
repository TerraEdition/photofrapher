<div>
    <form action="{{ Request::url() }}/{{ $status + 1 }}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-primary">
            @if ($status == 1)
                Terima Pemesanan
            @elseif ($status == 2)
                Minta Bukti Pembayaran
            @endif
        </button>
    </form>
</div>
