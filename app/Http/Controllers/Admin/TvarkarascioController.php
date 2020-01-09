<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\tvarkarastis;
use App\Http\Controllers\Controller;

class TvarkarascioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $tvarkarastis = tvarkarastis::all();
        return view('admin.treniruotes.show', compact('tvarkarastis'));
    }

    public function create()
    {
        return view('admin/treniruotes/tvarkarastis');
    }

    public function store(Request $request)
    {
        $tvarkarastis = new tvarkarastis;
        $tvarkarastis->treniruotespavadinimas = $request->treniruotespavadinimas;
        $tvarkarastis->data = $request->data;
        $tvarkarastis->laikas_nuo = $request->laikas_nuo;
        $tvarkarastis->laikas_iki = $request->laikas_iki;
        $tvarkarastis->save();
        
        return redirect(route('tvarkarastis.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tvarkarastis = tvarkarastis::where('id',$id)->first();
        return view('admin.treniruotes.edit',compact('tvarkarastis'));
    }

    public function update(Request $request, $id)
    {
        $tvarkarastis = tvarkarastis::find($id);
        $tvarkarastis->treniruotespavadinimas = $request->treniruotespavadinimas;
        $tvarkarastis->data = $request->data;
        $tvarkarastis->laikas_nuo = $request->laikas_nuo;
        $tvarkarastis->laikas_iki = $request->laikas_iki;
        $tvarkarastis->save();
        
        return redirect(route('tvarkarastis.index'));
    }

    public function destroy($id)
    {
        tvarkarastis::where('id', $id)->delete();
        return redirect()->back();
    }
}
