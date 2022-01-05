<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\kainorastis;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\admin;
class KainosController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $kainorastis = kainorastis::all();
        $admins = admin::all();
        return view('admin.kainos.show', compact('kainorastis', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/kainos/kainorastis', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kainospavadinimas' => 'required|max:255',
            'suma' => 'required|max:20',
            'laikotarpis' => 'required',
            'kainostekstas' => 'required',
            ]);
        $kainorastis = new kainorastis;
        $kainorastis->admin_id = Auth::id();
        $kainorastis->kainospavadinimas = $request->kainospavadinimas;
        $kainorastis->suma = $request->suma;
        $kainorastis->laikotarpis = $request->laikotarpis;
        $kainorastis->kainostekstas = $request->kainostekstas;
        $kainorastis->save();
        
        return redirect(route('kainorastis.index'));
    }

    public function edit($id)
    {
        $kainorastis = kainorastis::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.kainos.edit',compact('kainorastis', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kainospavadinimas' => 'required|max:255',
            'suma' => 'required|max:20',
            'laikotarpis' => 'required',
            'kainostekstas' => 'required',
            ]);
        $kainorastis = kainorastis::find($id);
        $kainorastis->admin_id = Auth::id();
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
