<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\skelbimas;
use App\Http\Controllers\Controller;

class SkelbimoController extends Controller
{
    public function index()
    {
        $skelbimai = skelbimas::orderBy('created_at','DESC')->paginate(4);
        return view('user/karjera', compact('skelbimai'));
    }
}
