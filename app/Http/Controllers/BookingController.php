<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

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
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Perbarui Data ');
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
        $id = Booking::select('id')->where('slug', $slug)->first();
        if (empty($id)) abort(404);
        $data = [
            'data' => Gallery::where('booking_id', $id->id)->get(),
            'slug' => $slug,
        ];
        return view("Backend.Booking.Gallery", $data);
    }
    public function store_gallery(Request $req, $slug)
    {
        try {
            $id = Booking::select('id')->where('slug', $slug)->first();
            if (empty($id)) abort(404);
            foreach ($req->file('gallery') as $k => $r) {
                $data = new Gallery();
                $name = Carbon::now()->timestamp . '_' . $k . '.' . $r->getClientOriginalExtension();
                $r->storeAs('Gallery/' . $slug, $name);
                $data->file = $name;
                $data->booking_id = $id->id;
                $data->save();
            }
            session()->flash('msg', 'Data Berhasil di Simpan');
            session()->flash('bg', 'alert-success');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back()->withInput();
        }
    }
    public function destroy_gallery(Request $req, $slug)
    {
        try {
            $id = Booking::select('id')->where('slug', $slug)->first();
            if (empty($id)) abort(404);
            $data = Gallery::where('id', $req->input('id'))->first();
            if (Storage::exists('Gallery/' . $slug . '/' . $data->file)) {
                Storage::delete('Gallery/' . $slug . '/' . $data->file);
                session()->flash('msg', 'File Berhasil di Hapus');
                session()->flash('bg', 'alert-success');
            } else {
                session()->flash('msg', 'File tidak di temukan');
                session()->flash('bg', 'alert-warning');
            }
            $data->delete();
            return redirect()->back()->withInput();
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menyimpan Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back()->withInput();
        }
    }
}