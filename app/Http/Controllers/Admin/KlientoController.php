<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class KlientoController extends Controller
{
           public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = user::all();
        return view('admin.klientai.show', compact('users'));
    }
    
    protected function create()
    {
       return view('admin/klientai/create');
    }

    public function store(Request $request)
    {
        $user = new user; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        
        $user->save();
        
        return redirect(route('klientai.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = user::where('id',$id)->first();
        return view('admin.klientai.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = user::find($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect(route('klientai.index'));
    }

    public function destroy($id)
    {
        user::where('id', $id)->delete();
        return redirect()->back();
    }
}
