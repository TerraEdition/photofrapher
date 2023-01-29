<?php

namespace App\Http\Controllers;

use App\Http\Requests\Backend\User\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $data = [
            'data' => User::where('name', 'like', '%' . $req->name . '%')
                ->where('username', 'like', '%' . $req->username . '%')
                ->where('role', 'like', '%' . $req->role . '%')
                ->where('updated_at', 'like', '%' . $req->updated_at . '%')
                ->orderBy('id', 'desc')
                ->paginate('10'),
        ];
        return view('Backend.User.Index', $data);
    }
    public function create()
    {
        return view('Backend.User.Create');
    }
    public function store(Request $req)
    {
        try {
            $data = new User();
            $data->name = $req->nama;
            $data->username = $req->username;
            $data->password = Hash::make($req->password);
            $data->email = $req->email;
            $data->phone = $req->no_hp;
            $data->role = $req->peran;
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
            'data' => User::where('slug', $slug)->first(),
        ];
        if (empty($data['data'])) abort(404);
        return view('Backend.User.Edit', $data);
    }
    public function update(Request $req, $slug)
    {
        try {
            $data = User::where('slug', $slug)->first();
            if (empty($data)) abort(404);
            $data->name = $req->nama;
            $data->username = $req->username;
            if ($req->password) {
                $data->password = Hash::make($req->password);
            }
            $data->email = $req->email;
            $data->phone = $req->no_hp;
            $data->role = $req->peran;
            $data->update();
            session()->flash('msg', 'Data Berhasil di Perbarui');
            session()->flash('bg', 'alert-success');
            return redirect()->to('users');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Memperbarui Data');
            session()->flash('bg', 'alert-danger');
            return redirect()->back();
        }
    }
    public function destroy($slug)
    {
        try {
            $data = User::where('slug', $slug)->first();
            $data->delete();
            session()->flash('msg', 'Data Berhasil di Hapus');
            session()->flash('bg', 'alert-success');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Menghapus Data');
            session()->flash('bg', 'alert-danger');
        }
        return redirect()->back();
    }
    public function edit_password()
    {
        return view('Backend.User.Change-Password');
    }
    public function update_password(PasswordRequest $req)
    {
        try {
            $data = User::where('id', Auth::user()->id)->first();
            if (!Hash::check($req->password_lama, $data->password)) {
                session()->flash('msg', 'Password Lama Salah');
                session()->flash('bg', 'alert-warning');
            } else {
                $data->password = Hash::make($req->password_baru);
                $data->update();
                session()->flash('msg', 'Password Berhasil di Ganti');
                session()->flash('bg', 'alert-success');
            }
        } catch (\Throwable $th) {
            session()->flash('msg', 'Terjadi Kesalahan Pada Saat Mengganti Password');
            session()->flash('bg', 'alert-danger');
        }
        return redirect()->back();
    }
}
