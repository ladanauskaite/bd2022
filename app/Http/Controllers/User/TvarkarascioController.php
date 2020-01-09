<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\tvarkarastis;
use App\Http\Controllers\Controller;

class TvarkarascioController extends Controller
{
    public function index()
    {
        $treniruotes = tvarkarastis::orderBy('data','ASC')->paginate(20);
        return view('user/tvarkarastis', compact('treniruotes'));
    }
}
