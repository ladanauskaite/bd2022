<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\naujiena;
use App\Http\Controllers\Controller;

class NaujienosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $naujienas = naujiena::all();
        return view('admin.naujienos.show', compact('naujienas'));
    }

    public function create()
    {
        return view('admin/naujienos/naujiena');
    }


    public function store(Request $request)
    {
        if($request->hasFile('naujienosnuotrauka')) {
            $nuotraukospavadinimas= $request->naujienosnuotrauka->store('public'); 
         }
        $naujiena = new naujiena;
        $naujiena->naujienospavadinimas = $request->naujienospavadinimas;
        $naujiena->naujienosnuotrauka = $nuotraukospavadinimas;
        $naujiena->naujienostekstas = $request->naujienostekstas;
        $naujiena->save();
        
        return redirect(route('naujienos.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $naujiena = naujiena::where('id',$id)->first();
        return view('admin.naujienos.edit',compact('naujiena'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('naujienosnuotrauka')) {
            $nuotraukospavadinimas= $request->naujienosnuotrauka->store('public'); 
         }
        $naujiena = naujiena::find($id);
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
