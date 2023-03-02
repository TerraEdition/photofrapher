<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function index()
    {
        $data = [
            'data' => Booking::with(['User:id,name', 'Package:id,package'])
                ->orderBy('id', 'desc')
                ->paginate(10),
        ];
        return view("Backend.Booking.Index", $data);
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
    public function detail($slug)
    {
        $data = [
            'data' => Booking::with(['User:id,name,phone,email', 'Package:id,package,price'])
                ->where('slug', $slug)
                ->orderBy('id', 'desc')
                ->first(),
        ];
        return view("Backend.Booking.Detail", $data);
    }
    public function update(Request $req, $slug, $status)
    {
        try {
            $data = Booking::where('slug', $slug)->first();
            if (empty($data)) abort(404);
            if (in_array($status, [0])) {
                $req->validate([
                    'alasan' => 'required',
                ]);
                $data->note = "Pesanan telah dibatalkan pada tanggal " . date("Y-m-d H:i:s") . " : " . $req->alasan;
            }
            $data->status = $status;
            $data->update();
            session()->flash('msg', 'Data Berhasil di Ubah');
            session()->flash('bg', 'alert-success');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data ');
            session()->flash('bg', 'alert-danger');
        }
        return redirect()->back();
    }

    public function chart($month)
    {
        $status = ['0', '5', '6'];
        $month = explode('-', $month);
        $data = [];
        foreach ($status as $k => $s) {
            $da = Booking::select(DB::raw('count(id) as total'))
                ->where(DB::raw("MONTH(created_at)"), $month[1])
                ->where(DB::raw("YEAR(created_at)"), $month[0]);
            if ($k == 1) {
                $da->where('status', '>=', '1');
                $da->where('status', '<=', '5');
            } else {
                $da->where('status', $s);
            }
            $data[$k] = $da->get();
        }

        return Response::json($data);
    }

    public function gallery($slug)
    {
        $data = [
            'data' => Booking::with(['User:id,name,phone,email', 'Package:id,package,price'])
                ->where('slug', $slug)
                ->orderBy('id', 'desc')
                ->first(),
            'slug' => $slug
        ];
        return view("Backend.Booking.Gallery", $data);
    }
}
