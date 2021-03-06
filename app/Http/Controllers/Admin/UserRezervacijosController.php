<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user_rezervacija;
use App\User;
use App\rezervacija;

class UserRezervacijosController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $user_rezervacijas=user_rezervacija::all();
        $users=user::all();
        $rezervacijas=rezervacija::all();
        return view('admin.user_rezervacijos.show',compact('user_rezervacijas', 'users', 'rezervacijas'));
    }

    public function destroy($id)
    {
        
             try {
       
        user_rezervacija::where('id', $id)->delete();
        return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $e){

     return back()->with('error', 'Veiksmas negalimas');
        }
       
    }
}
