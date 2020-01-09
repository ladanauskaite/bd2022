<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\skelbimas;
use App\Http\Controllers\Controller;

class SkelbimoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $skelbimas = skelbimas::all();
        return view('admin.skelbimai.show', compact('skelbimas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/skelbimai/skelbimas');
    }

    public function store(Request $request)
    {
        if($request->hasFile('skelbimonuotrauka')) {
            $nuotraukospavadinimas= $request->skelbimonuotrauka->store('public'); 
         }
        $skelbimas = new skelbimas;
        $skelbimas->skelbimopavadinimas = $request->skelbimopavadinimas;
        $skelbimas->skelbimonuotrauka = $nuotraukospavadinimas;
        $skelbimas->skelbimotekstas = $request->skelbimotekstas;
        $skelbimas->save();
        
        return redirect(route('skelbimai.index'));
    }

    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $skelbimas = skelbimas::where('id',$id)->first();
        return view('admin.skelbimai.edit',compact('skelbimas'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('skelbimonuotrauka')) {
            $nuotraukospavadinimas= $request->skelbimonuotrauka->store('public'); 
         }
        $skelbimas = skelbimas::find($id);
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
