<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user_live_rezervacija;
use App\user;
use App\rezervacija;

class UserLiveRezervacijosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $user_live_rezervacijas=user_live_rezervacija::all();
        $users=user::all();
        $rezervacijas=rezervacija::all();
        return view('admin.user_live_rezervacijos.show',compact('user_live_rezervacijas', 'users', 'rezervacijas'));
    }

        public function destroy($id)
    {
             try {
       
       user_live_rezervacija::where('id', $id)->delete();
        return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $e){

     return back()->with('error', 'Veiksmas negalimas');
        }
        
        
    }
}
