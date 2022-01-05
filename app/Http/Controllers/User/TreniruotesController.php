<?php

namespace App\Http\Controllers\User;

use App\treniruote;
use App\Http\Controllers\Controller;

class TreniruotesController extends Controller
{
    public function index()
    {
        $treniruotes = treniruote::orderBy('created_at','DESC')->paginate(4);
        return view('user/treniruotes', compact('treniruotes'));
    }
}
