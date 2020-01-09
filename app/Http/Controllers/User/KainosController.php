<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\kainorastis;
use App\Http\Controllers\Controller;

class KainosController extends Controller
{
    public function index()
    {
        $kainos = kainorastis::orderBy('created_at','DESC')->paginate(4);
        return view('user/kainorastis', compact('kainos'));
    }
}
