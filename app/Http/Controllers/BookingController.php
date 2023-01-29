<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view("Backend.Booking.Index");
    }

    public function store(Request $req)
    {
        try {
            $data = new Booking();
            $data->package = $req->paket;
            $data->price = $req->harga;
            $data->note = $req->keterangan;
            $data->save();
            session()->flash('msg', 'Data Berhasil di Tambah');
            session()->flash('bg', 'alert-success');
            return redirect()->to('Users');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back();
        }
    }
}
