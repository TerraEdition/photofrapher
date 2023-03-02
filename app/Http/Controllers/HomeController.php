<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\Booking\StorePaymentRequest;
use App\Http\Requests\Backend\Booking\StoreRequest;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use ZipArchive;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'paket' => Package::all(),
        ];
        return view("Frontend.Index", $data);
    }

    public function cart($slug)
    {
        $data = [
            'paket' => Package::where('slug', $slug)->first(),
        ];
        if (empty($data['paket'])) abort(404);

        return view("Frontend.Cart", $data);
    }
    public function store_cart(StoreRequest $req, $slug)
    {
        /* status
        0 => batal
        1 => mulai pesan
        2 => pesanan diterima
        3 => menunggu bukti pembayaran
        4 => menunggu acara dimulai
        5 => selesai
        */
        try {
            $paket = Package::where('slug', $slug)->first();
            if (empty($paket)) abort(404);
            $data = Booking::where();
            $data->user_id = Auth::user()->id;
            $data->package_id = $paket->id;
            $data->date = $req->tanggal;
            $data->created_at = date("Y-m-d");
            $data->time = $req->jam;
            $data->locate = $req->lokasi;
            $data->status = '1';
            $data->note = $req->catatan;
            $data->save();
            session()->flash('msg', 'Data Berhasil di Simpan');
            session()->flash('bg', 'alert-success');
            return redirect()->to('account');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back()->withInput();
        }
    }
    public function store_payment(StorePaymentRequest $req, $slug)
    {
        try {
            $data = Booking::where('slug', $slug)->first();
            if (empty($data)) abort(404);
            $data->user_id = Auth::user()->id;
            $name = Carbon::now()->timestamp . '.' . $req->file('bukti')->getClientOriginalExtension();
            $req->file('bukti')->storeAs('Payment/' . $slug, $name);
            $data->payment = $name;
            $data->status = '4';
            $data->update();
            session()->flash('msg', 'Data Berhasil di Simpan');
            session()->flash('bg', 'alert-success');
            return redirect()->to('account');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back()->withInput();
        }
    }
    public function cancel_cart($slug)
    {
        try {
            $data = Booking::where('slug', $slug)->first();
            if (empty($data)) abort(404);
            $data->status = '0';
            $data->note = "Pesanan telah dibatalkan pada tanggal " . date("Y-m-d H:i:s") . " Oleh Pengguna";
            $data->update();
            session()->flash('msg', 'Data Berhasil di Simpan');
            session()->flash('bg', 'alert-success');
            return redirect()->to('account');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back();
        }
    }

    public function account()
    {
        $data = [
            'booking' => Booking::with('Package:id,package')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10),
        ];
        return view('Frontend.Account', $data);
    }

    public function gallery($slug)
    {
        $booking = Booking::with('Package:id,package')->where('slug', $slug)->where('user_id', Auth::user()->id)->first();
        $data = [
            'data' => $booking,
            'gallery' => Gallery::where('booking_id', $booking->id)->get(),
            'slug' => $slug,
        ];
        return view('Frontend.Gallery', $data);
    }
    public function download_gallery($slug)
    {
        $zip = new ZipArchive();
        $fileName = 'gallery.zip';
        if ($zip->open(public_path($fileName), \ZipArchive::CREATE) == TRUE) {
            $files = File::files(public_path('storage/gallery/' . $slug));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }

        return response()->download(public_path($fileName));
    }
}
