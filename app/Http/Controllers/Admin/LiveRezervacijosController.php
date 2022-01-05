<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\live_rezervacija;
use Illuminate\Support\Facades\Auth;
use App\admin;
use App\sale;
use App\treniruote;
use App\admin_sportoklubas;
use App\sportoklubas;

class LiveRezervacijosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $live_rezervacijas = live_rezervacija::all();
        $admins = admin::all();
        $sportoklubai = sportoklubas::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
        return view('admin.live_rezervacijos.show', compact('live_rezervacijas', 'admins', 'sportoklubai', 'sales', 'treniruotes'));
    }

    public function create()
    {
        $admins = admin::all();
        $sportoklubas = sportoklubas::all();
        $live_rezervacijas = live_rezervacija::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
         $admin_sportoklubas = admin_sportoklubas::all();
        return view('admin/live_rezervacijos/live_rezervacija', compact('admins', 'sportoklubas', 'sales', 'treniruotes','live_rezervacijas', 'admin_sportoklubas'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'treniruotes_id' => 'required',
            'treniruotes_data' => 'required',
            'laikas_nuo' => 'required',
            'laikas_iki' => 'required',
            'nuoroda' => 'required',
            ]);
        $live_rezervacija = new live_rezervacija;
        $live_rezervacija->admin_id = Auth::id();
        $live_rezervacija->treniruotes_id = $request->get('treniruotes_id'); 
        $live_rezervacija->treniruotes_data = $request->treniruotes_data;
         $live_rezervacija->laikas_nuo = $request->laikas_nuo;
         $live_rezervacija->laikas_iki = $request->laikas_iki;
         $live_rezervacija->nuoroda = $request->nuoroda;
          $live_rezervacija->statusas = $request->statusas;
        $live_rezervacija->save(); 
        return redirect(route('live-rezervacijos.index'));
    }

    public function edit($id)
    {
        $live_rezervacijas = live_rezervacija::where('id',$id)->first();
        $admins = admin::all();
        $sportoklubas = sportoklubas::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
        return view('admin.live_rezervacijos.edit',compact('live_rezervacijas', 'admins', 'sportoklubas', 'sales', 'treniruotes'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'treniruotes_id' => 'required',
            'treniruotes_data' => 'required',
            'laikas_nuo' => 'required',
            'laikas_iki' => 'required',
            'nuoroda' => 'required',
            ]);
        $live_rezervacija = live_rezervacija::find($id);
        $live_rezervacija->admin_id = Auth::id();
        $live_rezervacija->treniruotes_id = $request->get('treniruotes_id');
        $live_rezervacija->treniruotes_data = $request->treniruotes_data;
         $live_rezervacija->laikas_nuo = $request->laikas_nuo;
         $live_rezervacija->laikas_iki = $request->laikas_iki;
         $live_rezervacija->nuoroda = $request->nuoroda;
         $live_rezervacija->statusas = $request->statusas;
        $live_rezervacija->save();
        
        return redirect(route('live-rezervacijos.index'));
    }

    public function destroy($id)
    {
        live_rezervacija::where('id', $id)->delete();
        return redirect()->back();
    }

}
