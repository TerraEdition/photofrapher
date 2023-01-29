<?php

use App\Models\Booking;

if (!function_exists('fk_user')) {
    function fk_user($slug)
    {
        $cek = Booking::where('slug', $slug)->first();
        return empty($cek);
    }
}
