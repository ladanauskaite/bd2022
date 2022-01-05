<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\live_rezervacija;
use App\Http\Controllers\Controller;
use App\treniruote;
use App\sale;
use Illuminate\Support\Carbon;
use App\user_live_rezervacija;
use App\sportoklubas;

class LiveController extends Controller
{
     public function index(sportoklubas $sportoklubopavadinimas, sale $salespavadinimas)
    {
        $live_rezervacijas = live_rezervacija::all();
        $sportoklubas = sportoklubas::all();
        $sales = sale::all();
        $user_live_rezervacijas = user_live_rezervacija::all();
        $treniruotes = treniruote::all();
        $today = Carbon::now()->format('Y-m-d');
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $now = Carbon::now();
        $day2 = $now->addDays(2)->format('Y-m-d');
        $day3 = $now->addDays(1)->format('Y-m-d');
        $day4 = $now->addDays(1)->format('Y-m-d');
        $day5 = $now->addDays(1)->format('Y-m-d');
        $day6 = $now->addDays(1)->format('Y-m-d');
 
        return view('user/live', compact('live_rezervacijas', 'treniruotes', 'today', 'tomorrow', 'day2', 'day3', 'day4', 'day5', 'day6', 'user_live_rezervacijas','sportoklubas', 'sportoklubopavadinimas', 'sales', 'salespavadinimas'));
    }
    
    public function store(Request $request)
    {
        $user_live_rezervacija = new user_live_rezervacija;
         $user_live_rezervacija->user_id =  auth()->user()->id;
         $user_live_rezervacija->live_rezervacijos_id = $request->live_rezervacijos_id;
         $user_live_rezervacija->save();
         return redirect()->back();
    }
    
    public function live(live_rezervacija $id) {
        $treniruotes = treniruote::all();
        return view('user/live_treniruote', compact('id', 'treniruotes'));
    }
    
}
