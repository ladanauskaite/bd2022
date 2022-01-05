<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\user;
use App\sportoklubas;
use Illuminate\Support\Carbon;
use App\rezervacija;
use App\treniruote;
use App\live_rezervacija;
use App\user_live_rezervacija;
use App\atsaukta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaskyrosController extends Controller
{
    public function __construct()
   {
       $this->middleware('auth');
   }

    public function index()
    {
        $user_id = Auth::id();
        $user_rezervacijas=DB::table('user_rezervacijas')
                ->join('rezervacijas', 'user_rezervacijas.rezervacijos_id', '=','rezervacijas.id')
                ->where('user_id', '=', $user_id)
                ->get();
        $user_live_rezervacijas=user_live_rezervacija::all();
        $treniruotes=treniruote::all();
        $users=user::all();
        $today = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:i:s');
        $rezervacijas=rezervacija::all();
        $auth_id = auth()->user()->id;
        $sportoklubas = sportoklubas::all();
        $live_rezervacijas=live_rezervacija::all();
        $atsauktos=atsaukta::all();
        
        $atsauktos_user_rezervacijas = DB::table('atsauktas')
                ->join('user_rezervacijas', 'atsauktas.rezervacijos_id', '=', 'user_rezervacijas.rezervacijos_id')
                ->where('user_id', '=', $user_id)
                ->get();
        $award = DB::table('user_rezervacijas')
                ->join('rezervacijas', 'user_rezervacijas.rezervacijos_id', '=', 'rezervacijas.id')
                ->whereRaw('treniruotes_data < CURDATE()')
                ->where('user_id', '=', $user_id)
                ->count();
        $live_award = DB::table('user_live_rezervacijas')
                ->join('live_rezervacijas', 'user_live_rezervacijas.live_rezervacijos_id', '=', 'live_rezervacijas.id')
                ->whereRaw('treniruotes_data < CURDATE()')
                ->where('user_id', '=', $user_id)
                ->count();
        $record = rezervacija::select
                 (\DB::raw("COUNT(*) as count"),
                  \DB::raw("DAYNAME(treniruotes_data) as day_name"),
                  \DB::raw("DAY(treniruotes_data) as day"))
                       ->join('user_rezervacijas', 'rezervacijas.id', '=', 'user_rezervacijas.rezervacijos_id')
                        ->whereRaw('treniruotes_data < CURDATE()')
                       ->where('user_id', '=', $user_id)
                       ->where('treniruotes_data', '>', Carbon::today()->subDay(6))
                       ->groupBy('day_name','day')
                       ->orderBy('day')
                       ->get();
        $data = [];
        foreach($record as $row) {
           $data['label'][] = $row->day_name;
           $data['data'][] = (int) $row->count;
         }
        $data['chart_data'] = json_encode($data);
    
    $record1 = live_rezervacija::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(treniruotes_data) as day_name"), \DB::raw("DAY(treniruotes_data) as day"))
    ->join('user_live_rezervacijas', 'live_rezervacijas.id', '=', 'user_live_rezervacijas.live_rezervacijos_id')
    ->whereRaw('treniruotes_data < CURDATE()')
    ->where('user_id', '=', $user_id)
    ->where('statusas', '=', 1)
    ->where('treniruotes_data', '>', Carbon::today()->subDay(6))
    ->groupBy('day_name','day')
    ->orderBy('day')
    ->get();
     $data1 = [];
     foreach($record1 as $row1) {
        $data1['label1'][] = $row1->day_name;
        $data1['data1'][] = (int) $row1->count;
      }
    $data1['chart_data1'] = json_encode($data1);
        return view('user.paskyra', $data, compact('user_rezervacijas', 'users', 'rezervacijas', 'treniruotes','auth_id','today','time', 'sportoklubas','live_rezervacijas', 'user_live_rezervacijas','atsauktos', 'atsauktos_user_rezervacijas', 'award', 'live_award'))->with($data1);
    }

}
