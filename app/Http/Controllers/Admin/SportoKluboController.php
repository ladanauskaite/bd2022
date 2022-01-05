<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Auth;
use App\sportoklubas;

class SportoKluboController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sportoklubas = sportoklubas::all();
        $admins = admin::all();
        return view('admin.sportoklubai.show', compact('sportoklubas', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/sportoklubai/sportoklubas', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'sportoklubopavadinimas' => 'required',
            ]);
        $sportoklubas = new sportoklubas;
        $sportoklubas->admin_id = Auth::id();
        $sportoklubas->sportoklubopavadinimas = $request->sportoklubopavadinimas;
        $sportoklubas->save();
        
        return redirect(route('sportoklubai.index'));
    }

    public function edit($id)
    {
        $sportoklubas = sportoklubas::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.sportoklubai.edit',compact('sportoklubas', 'admins'));
    }

    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'sportoklubopavadinimas' => 'required',
            ]);
        $sportoklubas = sportoklubas::find($id);
        $sportoklubas->admin_id = Auth::id();
        $sportoklubas->sportoklubopavadinimas = $request->sportoklubopavadinimas;
        $sportoklubas->save();
        
        return redirect(route('sportoklubai.index'));
    }

    public function destroy($id)
    {
        sportoklubas::where('id', $id)->delete();
        return redirect()->back();
    }
}
