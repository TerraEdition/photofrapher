<?php
if (!function_exists('date_indo')) {
    function date_indo($date)
    {
        if (!$date) {
            return false;
        }
        $ex = explode(" ", $date);
        $d = explode("-", $ex[0]);
        return $d[2] . ' ' . month($d[1]) . ' ' . $d[0] . ' / ' . $ex[1];
    }
}

if (!function_exists('month')) {
    function month($bln, $angka = false)
    {
        if ($angka == false) {
            switch ($bln) {
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        } else {
            switch ($bln) {
                case "Januari":
                    return '01';
                    break;
                case "Februari":
                    return '02';
                    break;
                case "Maret":
                    return '03';
                    break;
                case "April":
                    return '04';
                    break;
                case "Mei":
                    return '05';
                    break;
                case "Juni":
                    return '06';
                    break;
                case "Juli":
                    return '07';
                    break;
                case "Agustus":
                    return '08';
                    break;
                case "September":
                    return '09';
                    break;
                case "Oktober":
                    return '10';
                    break;
                case "November":
                    return '11';
                    break;
                case "Desember":
                    return '12';
                    break;
            }
        }
    }
}

if (!function_exists('day')) {
    function day($bln, $tgl, $thn)
    {
        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari;
    }
}
