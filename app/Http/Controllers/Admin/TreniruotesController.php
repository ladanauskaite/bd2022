<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Auth;
use App\treniruote;

class TreniruotesController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $treniruotes = treniruote::all();
        $admins = admin::all();
        return view('admin.treniruotes.show', compact('treniruotes', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/treniruotes/treniruote', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'treniruotespavadinimas' => 'required',
            'treniruotestekstas' => 'required',
            ]);
        $treniruote = new treniruote;
        $treniruote->admin_id = Auth::id();
        $treniruote->treniruotespavadinimas = $request->treniruotespavadinimas;
        $treniruote->treniruotestekstas = $request->treniruotestekstas;
        $treniruote->save();
        
        return redirect(route('treniruotes.index'));
    }

    public function edit($id)
    {
        $treniruotes = treniruote::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.treniruotes.edit',compact('treniruotes', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'treniruotespavadinimas' => 'required',
            'treniruotestekstas' => 'required',
            ]);
        $treniruote = treniruote::find($id);
        $treniruote->admin_id = Auth::id();
        $treniruote->treniruotespavadinimas = $request->treniruotespavadinimas;
        $treniruote->treniruotestekstas = $request->treniruotestekstas;
        $treniruote->save();
        
        return redirect(route('treniruotes.index'));
    }

    public function destroy($id)
    {
         try {
       
        treniruote::where('id', $id)->delete();
        return redirect()->back();
        }
        catch(\Illuminate\Database\QueryException $e){

     return back()->with('error', 'Veiksmas negalimas');
        }
        
    }
}
