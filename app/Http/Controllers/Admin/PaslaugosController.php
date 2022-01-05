<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\paslauga;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\admin;

class PaslaugosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $paslaugas = paslauga::all();
        $admins = admin::all();
        return view('admin.paslaugos.show', compact('paslaugas', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/paslaugos/paslauga', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'paslaugospavadinimas' => 'required',
            'paslaugostekstas' => 'required',
            ]);
        if($request->hasFile('paslaugosnuotrauka')) {
            $nuotraukospavadinimas= $request->paslaugosnuotrauka->store('public'); 
         }
         
        $paslauga = new paslauga;
        $paslauga->admin_id = Auth::id();
        $paslauga->paslaugosnuotrauka = $nuotraukospavadinimas; 
        $paslauga->paslaugospavadinimas = $request->paslaugospavadinimas;
        $paslauga->paslaugostekstas = $request->paslaugostekstas;
        $paslauga->save();
        
        return redirect(route('paslaugos.index'));
    }

    public function edit($id)
    {
        $paslauga = paslauga::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.paslaugos.edit',compact('paslauga', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'paslaugospavadinimas' => 'required',
            'paslaugostekstas' => 'required',
            ]);
        if($request->hasFile('paslaugosnuotrauka')) {
            $nuotraukospavadinimas= $request->paslaugosnuotrauka->store('public'); 
         }
        $paslauga = paslauga::find($id);
        $paslauga->admin_id = Auth::id();
        $paslauga->paslaugosnuotrauka = $nuotraukospavadinimas; 
        $paslauga->paslaugospavadinimas = $request->paslaugospavadinimas;
        $paslauga->paslaugostekstas = $request->paslaugostekstas;
        $paslauga->save();
        
        return redirect(route('paslaugos.index'));
    }

    public function destroy($id)
    {
        paslauga::where('id', $id)->delete();
        return redirect()->back();
    }
}
