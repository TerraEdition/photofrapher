<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\Package\StoreRequest;
use App\Http\Requests\Package\UpdateRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(Request $req)
    {
        $data = [
            'data' => Package::where('package', 'like', '%' . $req->package . '%')
                ->where('price', 'like', '%' . $req->price . '%')
                ->where('updated_at', 'like', '%' . $req->updated_at . "%")
                ->orderBy('id', 'desc')
                ->paginate(10),
        ];
        return view('Backend.Package.Index', $data);
    }

    public function create()
    {
        return view('Backend.Package.Create');
    }
    public function store(StoreRequest $req)
    {
        try {
            $data = new Package();
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
    public function edit($slug)
    {
        $data = [
            'data' => Package::where('slug', $slug)->first(),
        ];
        if (empty($data['data'])) abort(404);
        return view('Backend.Package.Edit', $data);
    }
    public function update(UpdateRequest $req, $slug)
    {
        try {
            $data = Package::where('slug', $slug)->first();
            if (empty($data)) abort(404);
            $data->package = $req->paket;
            $data->price = $req->harga;
            $data->note = $req->keterangan;
            $data->update();
            session()->flash('msg', 'Data Berhasil di Perbarui');
            session()->flash('bg', 'alert-success');
            return redirect()->to('packages');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Memperbarui Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back();
        }
    }
    public function destroy($slug)
    {
        $data = Package::where('slug', $slug)->first();
        $data->delete();
        session()->flash('msg', 'Data Berhasil di Hapus');
        session()->flash('bg', 'alert-success');
        return redirect()->back();
    }
}
