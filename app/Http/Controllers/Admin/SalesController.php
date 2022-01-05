<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\Auth;
use App\sale;

class SalesController extends Controller
{
    
        public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $sales = sale::all();
        $admins = admin::all();
        return view('admin.sales.show', compact('sales', 'admins'));
    }

    public function create()
    {
        $admins = admin::all();
        return view('admin/sales/sale', compact('admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'salespavadinimas' => 'required',
            ]);
        $sale = new sale;
        $sale->admin_id = Auth::id();
        $sale->salespavadinimas = $request->salespavadinimas;
        $sale->save();
        
        return redirect(route('sales.index'));
    }

    public function edit($id)
    {
        $sales = sale::where('id',$id)->first();
        $admins = admin::all();
        return view('admin.sales.edit',compact('sales', 'admins'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'salespavadinimas' => 'required',
            ]);
        $sale = sale::find($id);
        $sale->admin_id = Auth::id();
        $sale->salespavadinimas = $request->salespavadinimas;
        $sale->save();
        
        return redirect(route('sales.index'));
    }

    public function destroy($id)
    {
        sale::where('id', $id)->delete();
        return redirect()->back();
    }
}
