<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('currency')) {
    function currency($value)
    {
        if (!empty($value)) {
            if ($value == '-') {
                return 0;
            }
            if (is_int((int)$value)) {
                return 'Rp. ' . number_format((int)$value, 0, ".", ".");
            } else {
                return str_replace('.', '', str_replace('Rp. ', '', $value));
            }
        } else {
            return 'Rp. 0';
        }
    }
}

if (!function_exists('hasNote')) {
    function hasNote($text = false)
    {
        if (!$text) {
            return;
        } else {
            return '<span class="" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $text . '" style="border-color:transparent">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
        <path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
        <path d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
        </svg>
        </span>';
        }
    }
}
if (!function_exists('badgeStatus')) {
    function badgeStatus($val)
    {
        switch ($val) {
            case '1':
                $btn = "<div class='badge bg-info'>Menunggu di Terima</div>";
                break;
            case '2':
                $btn = "<div class='badge bg-success'>Pemesanan di Terima</div>";
                break;
            case '3':
                $btn = "<div class='badge bg-warning'>Menunggu Bukti Pembayaran</div>";
                break;
            case '4':
                $btn = "<div class='badge bg-success'>Bukti Pembayaran Sedang di Validasi</div>";
                break;
            case '5':
                $btn = "<div class='badge bg-success'>Pemesanan Telah di Setujui</div>";
                break;
            case '6':
                $btn = "<div class='badge bg-success'>Pemesanan Selesai</div>";
                break;
            default:
                $btn = "<div class='badge bg-dark'>Pemesanan di Batalkan</div>";
                break;
        }
        return $btn;
    }
}

if (!function_exists('buttonStatus')) {
    function buttonStatus($val, $id)
    {
        switch ($val) {
            case '1':
                $btn = "<a href='" . Request::url() . "/delete/" . $id . "' class='badge bg-danger text-decoration-none'>Batal</a>";
                break;
            case '3':
                $btn =  "3";
                break;
            case '6':
                $btn = "<a href='" . Request::url() . "/gallery/" . $id . "' class='badge bg-success text-decoration-none'>Gallery</a>";
                break;

            default:
                $btn = '';
                break;
        }
        return $btn;
    }
}
