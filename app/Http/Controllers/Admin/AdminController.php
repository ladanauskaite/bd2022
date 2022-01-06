<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\sportoklubas;
use App\admin;
use App\admin_sportoklubas;
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
         $sportoklubas = sportoklubas::all();
         $admin_sportoklubas = admin_sportoklubas::all();
        return view('admin.administratoriai.show', compact('admins','sportoklubas','admin_sportoklubas'));
    }
    
    protected function create()
    {
        $admins = admin::all();
         $sportoklubas = sportoklubas::all();
         $admin_sportoklubas = admin_sportoklubas::all();
       return view('admin/administratoriai/create', compact('admins','sportoklubas','admin_sportoklubas'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
            ]);
        $admin = new admin; 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = $request->role;
        $admin->save();
        $admin->sportoklubas()->sync($request->sportoklubas);
        return redirect(route('administratoriai.index'));
    }

    public function edit($id)
    {
         $sportoklubas = sportoklubas::all();
        $admin = admin::where('id',$id)->first();
        return view('admin.administratoriai.edit',compact('admin','sportoklubas'));
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
       admin::find($id)->sportoklubas()->sync($request->sportoklubas);
          $admin->save();
        return redirect(route('administratoriai.index'));
    }

    public function destroy($id)
    {
                try {
        admin::where('id', $id)->delete();
        return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $e){

     return back()->with('error', 'Veiksmas negalimas');
        }
    }
}
