<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view("Frontend.Index");
    }
    public function register()
    {
        return view("Auth.Register");
    }
    public function store_register(RegisterRequest $req)
    {
        try {
            $data = new User();
            $data->name = $req->nama;
            $data->role = 'user';
            $data->username = $req->username;
            $data->email = $req->email;
            $data->phone = $req->no_hp;
            $data->password = Hash::make($req->password);
            session()->flash('msg', 'Akun Berhasil Mendaftar');
            session()->flash('bg', 'alert-success');
            return redirect()->to('login');
        } catch (\Throwable $th) {
            session()->flash('msg', 'Akun Gagal di Mendaftar');
            session()->flash('bg', 'alert-danger');
            return redirect()->back();
        }
    }
    public function login()
    {
        return view("Auth.Login");
    }
    public function store_login(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        session()->flash('msg', 'Username dan Password tidak ditemukan');
        session()->flash('bg', 'alert-danger');
        return redirect()->back();
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        session()->flash('msg', 'Anda berhasil keluar dari aplikasi');
        session()->flash('bg', 'alert-success');
        return redirect('/login');
    }
}
