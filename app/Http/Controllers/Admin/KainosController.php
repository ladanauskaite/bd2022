<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\kainorastis;
use App\Http\Controllers\Controller;

class KainosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $kainorastis = kainorastis::all();
        return view('admin.kainos.show', compact('kainorastis'));
    }

    public function create()
    {
        return view('admin/kainos/kainorastis');
    }

    public function store(Request $request)
    {
        
        $kainorastis = new kainorastis;
        $kainorastis->kainospavadinimas = $request->kainospavadinimas;
        $kainorastis->suma = $request->suma;
        $kainorastis->laikotarpis = $request->laikotarpis;
        $kainorastis->kainostekstas = $request->kainostekstas;
        $kainorastis->save();
        
        return redirect(route('kainorastis.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kainorastis = kainorastis::where('id',$id)->first();
        return view('admin.kainos.edit',compact('kainorastis'));
    }

    public function update(Request $request, $id)
    {
        $kainorastis = kainorastis::find($id);
        $kainorastis->kainospavadinimas = $request->kainospavadinimas;
        $kainorastis->suma = $request->suma;
        $kainorastis->laikotarpis = $request->laikotarpis;
        $kainorastis->kainostekstas = $request->kainostekstas;
        $kainorastis->save();
        
        return redirect(route('kainorastis.index'));
    }

    public function destroy($id)
    {
        kainorastis::where('id', $id)->delete();
        return redirect()->back();
    }
}
