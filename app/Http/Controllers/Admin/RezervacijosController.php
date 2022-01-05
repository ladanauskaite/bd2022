<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\rezervacija;
use Illuminate\Support\Facades\Auth;
use App\admin;
use App\sale;
use App\treniruote;
use App\admin_sportoklubas;
use App\sportoklubas;
use App\atsaukta;
use Illuminate\Validation\Rule;


class RezervacijosController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $rezervacijas = rezervacija::all();
        $admins = admin::all();
        $sportoklubai = sportoklubas::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
        return view('admin.rezervacijos.show', compact('rezervacijas', 'admins', 'sportoklubai', 'sales', 'treniruotes'));
    }

    public function create()
    {
        $admins = admin::all();
        $sportoklubas = sportoklubas::all();
        $rezervacijas = rezervacija::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
         $admin_sportoklubas = admin_sportoklubas::all();
        return view('admin/rezervacijos/rezervacija', compact('admins', 'sportoklubas', 'sales', 'treniruotes','rezervacijas', 'admin_sportoklubas'));
    }

    public function store(Request $request)
    {
        $id = $request->sportoklubo_id;   $data = $request->treniruotes_data;  $sale = $request->sales_id; $nuo = $request->laikas_nuo; $iki = $request->laikas_iki;
          $this->validate($request,[
             
              'sportoklubo_id' => 'required',
              'sales_id' => 'required',
              'treniruotes_id' => 'required',
              'kiekis' => 'required|numeric',
              'treniruotes_data' => ['required',
              'laikas_nuo' => 'required',
              'laikas_iki' => 'required',
             //treniruote vyksta tuo paciu laiku
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_iki', $iki);}),
                  //treniruote vyksta tam tarpe
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '<', $nuo)->where('laikas_iki', '>', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<', $iki)->where('laikas_iki', '>', $iki);}),
                  //treniruotes pradzia isiterpia, bet veliau arba lygiai  baigiasi
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '<=', $nuo)->where('laikas_iki', '>', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_iki', '<=', $iki);}),
                  //treniruote prasideda anksciau, bet baigiasi tarpe
          Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '>=', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<', $iki)->where('laikas_iki', '>', $iki);}),
                  //treniruote prasideda anksciau ir baigiasi veliau
                  Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '>', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<', $iki);}),
                ],]);
        $rezervacija = new rezervacija; $rezervacija->sportoklubo_id = $request->get('sportoklubo_id');
        $rezervacija->admin_id = Auth::id(); $rezervacija->sales_id = $request->get('sales_id');
        $rezervacija->treniruotes_id = $request->get('treniruotes_id'); $rezervacija->treniruotes_data = $request->treniruotes_data;
         $rezervacija->laikas_nuo = $request->laikas_nuo;
         $rezervacija->laikas_iki = $request->laikas_iki;
         $rezervacija->kiekis = $request->kiekis;
        $rezervacija->save(); 
        return redirect(route('rezervacijos.index'));
    }

    public function edit($id)
    {
        $rezervacijas = rezervacija::where('id',$id)->first();
        $admins = admin::all();
        $sportoklubas = sportoklubas::all();
        $sales = sale::all();
        $treniruotes = treniruote::all();
        return view('admin.rezervacijos.edit',compact('rezervacijas', 'admins', 'sportoklubas', 'sales', 'treniruotes'));
    }

    public function update(Request $request, $id)
    {
       $data = $request->treniruotes_data;  $sale = $request->sales_id; $nuo = $request->laikas_nuo; $iki = $request->laikas_iki;
          $this->validate($request,[
         'treniruotes_data' => ['required',
             'laikas_nuo' => 'required',
             'laikas_iki' => 'required',
             'kiekis' => 'required',
             //treniruote vyksta tuo paciu laiku
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_iki', $iki);}),
                  //treniruote vyksta tam tarpe
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '<=', $nuo)->where('laikas_iki', '>=', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<=', $iki)->where('laikas_iki', '>=', $iki);}),
                  //treniruote isiterpia, bet veliau arba lygiai  baigiasi
         Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '<=', $nuo)->where('laikas_iki', '>=', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_iki', '<=', $iki);}),
                  //treniruote prasideda anksciau, bet baigiasi tarpe
          Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '>=', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<', $iki)->where('laikas_iki', '>=', $iki);}),
                  Rule::unique('rezervacijas')                     
          ->where(function ($query) use ($id) { $query->where('sportoklubo_id', $id);})                
          ->where(function ($query) use ($data) { $query->where('treniruotes_data', $data);})
          ->where(function ($query) use ($sale) { $query->where('sales_id', $sale); })
          ->where(function ($query) use ($nuo) { $query->where('laikas_nuo', '>=', $nuo);})
          ->where(function ($query) use ($iki) { $query->where('laikas_nuo', '<=', $iki);}),
                ],]);
        $rezervacija = rezervacija::find($id);
       $rezervacija->sportoklubo_id = $request->get('sportoklubo_id');
        $rezervacija->admin_id = Auth::id();
        $rezervacija->sales_id = $request->get('sales_id');
        $rezervacija->treniruotes_id = $request->get('treniruotes_id');
        $rezervacija->treniruotes_data = $request->treniruotes_data;
         $rezervacija->laikas_nuo = $request->laikas_nuo;
         $rezervacija->laikas_iki = $request->laikas_iki;
         $rezervacija->kiekis = $request->kiekis;
        $rezervacija->save();
        
        return redirect(route('rezervacijos.index'));
    }

    public function destroy($id)
    {
        $atsaukta = new atsaukta;
        $atsaukta->rezervacijos_id=rezervacija::where('id', $id)->first()->id;
        $atsaukta->sportoklubo_id = rezervacija::where('id', $id)->first()->sportoklubo_id;
        $atsaukta->sales_id = rezervacija::where('id', $id)->first()->sales_id;
        $atsaukta->treniruotes_id = rezervacija::where('id', $id)->first()->treniruotes_id;
        $atsaukta->treniruotes_data = rezervacija::where('id', $id)->first()->treniruotes_data;
        $atsaukta->laikas_nuo = rezervacija::where('id', $id)->first()->laikas_nuo;
        $atsaukta->laikas_iki = rezervacija::where('id', $id)->first()->laikas_iki;
        $atsaukta->save();
        rezervacija::where('id', $id)->delete();
        return redirect()->back();
    }
}
