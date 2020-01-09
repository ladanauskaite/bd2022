<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = admin::all();
        return view('admin.administratoriai.show', compact('admins'));
    }
    
    protected function create()
    {
       return view('admin/administratoriai/create');
    }

    public function store(Request $request)
    {
        $admin = new admin; 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;

        
        $admin->save();
        
        return redirect(route('administratoriai.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = admin::where('id',$id)->first();
        return view('admin.administratoriai.edit',compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = admin::find($id); 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        $admin->save();
        
        return redirect(route('administratoriai.index'));
    }

    public function destroy($id)
    {
        admin::where('id', $id)->delete();
        return redirect()->back();
    }
}
