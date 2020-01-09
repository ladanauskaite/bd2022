<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\paslauga;
use App\Http\Controllers\Controller;

class PaslaugosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $paslaugas = paslauga::all();
        return view('admin.paslaugos.show', compact('paslaugas'));
    }

    public function create()
    {
        return view('admin/paslaugos/paslauga');
    }

    public function store(Request $request)
    {
        if($request->hasFile('paslaugosnuotrauka')) {
            $nuotraukospavadinimas= $request->paslaugosnuotrauka->store('public'); 
         }
         
        $paslauga = new paslauga;
        $paslauga->paslaugosnuotrauka = $nuotraukospavadinimas; 
        $paslauga->paslaugospavadinimas = $request->paslaugospavadinimas;
        $paslauga->paslaugostekstas = $request->paslaugostekstas;
        $paslauga->save();
        
        return redirect(route('paslaugos.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $paslauga = paslauga::where('id',$id)->first();
        return view('admin.paslaugos.edit',compact('paslauga'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('paslaugosnuotrauka')) {
            $nuotraukospavadinimas= $request->paslaugosnuotrauka->store('public'); 
         }
        $paslauga = paslauga::find($id);
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
