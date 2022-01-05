<?php

namespace App\Http\Controllers\User;

use App\paslauga;
use App\Http\Controllers\Controller;

class PaslaugosController extends Controller
{
    public function index()
    {
        $paslaugos = paslauga::orderBy('created_at','DESC')->paginate(10);
        return view('user/welcome', compact('paslaugos'));
    }
}
