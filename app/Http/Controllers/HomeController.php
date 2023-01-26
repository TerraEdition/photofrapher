<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

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
        return view("Frontend.Cart", $data);
    }

    public function account()
    {
        return view('Frontend.Account');
    }
}
