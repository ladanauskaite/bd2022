<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\skelbimas;
use App\Http\Controllers\Controller;
use App\admin;
use Illuminate\Support\Facades\Auth;

class SkelbimoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $skelbimas = skelbimas::all();
        $admins = admin::all();
        return view('admin.skelbimai.show', compact('skelbimas', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/skelbimai/skelbimas', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'skelbimopavadinimas' => 'required',
            'skelbimotekstas' => 'required',
            ]);
        if($request->hasFile('skelbimonuotrauka')) {
            $nuotraukospavadinimas= $request->skelbimonuotrauka->store('public'); 
         }
        $skelbimas = new skelbimas;
        $skelbimas->admin_id = Auth::id();
        $skelbimas->skelbimopavadinimas = $request->skelbimopavadinimas;
        $skelbimas->skelbimonuotrauka = $nuotraukospavadinimas;
        $skelbimas->skelbimotekstas = $request->skelbimotekstas;
        $skelbimas->save();
        
        return redirect(route('skelbimai.index'));
    }

    
    public function edit($id)
    {
        $skelbimas = skelbimas::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.skelbimai.edit',compact('skelbimas', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'skelbimopavadinimas' => 'required',
            'skelbimotekstas' => 'required',
            ]);
        if($request->hasFile('skelbimonuotrauka')) {
            $nuotraukospavadinimas= $request->skelbimonuotrauka->store('public'); 
         }
        $skelbimas = skelbimas::find($id);
        $skelbimas->admin_id = Auth::id();
        $skelbimas->skelbimopavadinimas = $request->skelbimopavadinimas;
        $skelbimas->skelbimonuotrauka = $nuotraukospavadinimas;
        $skelbimas->skelbimotekstas = $request->skelbimotekstas;
        $skelbimas->save();
        
        return redirect(route('skelbimai.index'));
    }

    public function destroy($id)
    {
        skelbimas::where('id', $id)->delete();
        return redirect()->back();
    }
}
