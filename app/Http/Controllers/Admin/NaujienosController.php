<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\naujiena;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\admin;

class NaujienosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $naujienas = naujiena::all();
        $admins = admin::all();
        return view('admin.naujienos.show', compact('naujienas', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/naujienos/naujiena', compact('admins'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'naujienospavadinimas' => 'required',
            'naujienostekstas' => 'required',
            ]);
        if($request->hasFile('naujienosnuotrauka')) {
            $nuotraukospavadinimas= $request->naujienosnuotrauka->store('public'); 
         }
        $naujiena = new naujiena;
        $naujiena->admin_id = Auth::id();
        $naujiena->naujienospavadinimas = $request->naujienospavadinimas;
        $naujiena->naujienosnuotrauka = $nuotraukospavadinimas;
        $naujiena->naujienostekstas = $request->naujienostekstas;
        $naujiena->save();
        
        return redirect(route('naujienos.index'));
    }

    public function edit($id)
    {
        $naujiena = naujiena::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.naujienos.edit',compact('naujiena', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'naujienospavadinimas' => 'required',
            'naujienostekstas' => 'required',
            ]);
        if($request->hasFile('naujienosnuotrauka')) {
            $nuotraukospavadinimas= $request->naujienosnuotrauka->store('public'); 
         }
        $naujiena = naujiena::find($id);
        $naujiena->admin_id = Auth::id();
        $naujiena->naujienospavadinimas = $request->naujienospavadinimas;
        $naujiena->naujienosnuotrauka = $nuotraukospavadinimas;
        $naujiena->naujienostekstas = $request->naujienostekstas;
        $naujiena->save();
        
        return redirect(route('naujienos.index'));
    }

    public function destroy($id)
    {
        naujiena::where('id', $id)->delete();
        return redirect()->back();
    }
}
