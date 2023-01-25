<?php
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
