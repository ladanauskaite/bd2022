<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\rezervacija;
use App\Http\Controllers\Controller;
use App\treniruote;
use App\sale;
use Illuminate\Support\Carbon;
use App\user_rezervacija;
use App\sportoklubas;



class TvarkarascioController extends Controller
{
    public function index(sportoklubas $sportoklubopavadinimas, sale $salespavadinimas)
    {
        $rezervacijas = rezervacija::all();
        $sportoklubas = sportoklubas::all();
        $sales = sale::all();
        $user_rezervacijas = user_rezervacija::all();
        $treniruotes = treniruote::all();
        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $now = Carbon::now();
        $day2 = $now->addDays(2)->format('Y-m-d');
        $day3 = $now->addDays(1)->format('Y-m-d');
        $day4 = $now->addDays(1)->format('Y-m-d');
        $day5 = $now->addDays(1)->format('Y-m-d');
        $day6 = $now->addDays(1)->format('Y-m-d');
 
        return view('user/tvarkarastis', compact('rezervacijas', 'treniruotes', 'today', 'tomorrow', 'day2', 'day3', 'day4', 'day5', 'day6', 'user_rezervacijas','sportoklubas', 'sportoklubopavadinimas', 'sales', 'salespavadinimas'));
    }
    
    public function store(Request $request)
    {
        $user_rezervacija = new user_rezervacija;
         $user_rezervacija->user_id =  auth()->user()->id;
         $user_rezervacija->rezervacijos_id = $request->rezervacijos_id;
         $user_rezervacija->save();
         return redirect()->back();
    }
    
}
