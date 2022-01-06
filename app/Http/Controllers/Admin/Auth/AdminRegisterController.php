<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\sportoklubas;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminRegisterController extends Controller
{

    public function index()
    {
        
       $sportoklubas = sportoklubas::all();
        return view('admin.register', compact('sportoklubas'));
    }
    
    public function create()
    {
       $sportoklubas = sportoklubas::all();
       $admin_sportoklubas = admin_sportoklubas::all();
        return view('admin.register', compact('sportoklubas', 'admin_sportoklubas'));
    }
    

    public function store(Request $request)
    {
       $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'role' => 'required',
            ]);
        $admin = new admin; 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        $admin->save();
        $admin->sportoklubas()->sync($request->sportoklubas);

        return view('admin.login');
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'role' => 'required',
            ]);
        $admin = admin::find($id); 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
      
          $admin->save();
        return redirect(route('administratoriai.index'));
    }

}
