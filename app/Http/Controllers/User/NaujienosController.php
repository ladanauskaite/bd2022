<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\naujiena;
use App\Http\Controllers\Controller;

class NaujienosController extends Controller
{
    public function index()
    {
        $naujienos = naujiena::orderBy('created_at','DESC')->paginate(4);
        return view('user/naujienos', compact('naujienos'));
    }
}
