@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administartorius</h1>
          </div>
        </div>
      </div>
    </section>
    
    
    
<section class="content">
      <div class="row">
          <div class="col-md-12">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sukurti treniruotę</h3>
              </div>

              <div class="container">      
        <form role="form" action="{{ route('tvarkarastis.store') }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="card-body">
                  <div class="form-group">
                    <label for="treniruotespavadinimas">Treniruotės pavadinimas</label>
                    <input type="text" class="form-control" id="treniruotespavadinimas" name="treniruotespavadinimas" placeholder="Įrašyti treniruotes pavadinimą...">
                  </div>
                    <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" id="data" name="data" placeholder="Įrašyti datą...">
                  </div>
                    <div class="form-group">
                    <label for="laikas_nuo">Treniruotės pardžia</label>
                    <input type="time" class="form-control" id="laikas_nuo" name="laikas_nuo" placeholder="Įrašyti treniruotės pradžios laiką...">
                  </div>
                  <div class="form-group">
                    <label for="laikas_iki">Laikas pabaiga</label>
                    <input type="time" class="form-control" id="laikas_iki" name="laikas_iki" placeholder="Įrašyti treniruotės pabaigos laiką...">
                  </div>
               
                </div>
                <!-- /.card-body -->
<!--          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie treniruotę
              </h3>
            </div>
             /.card-header 
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="aprasymas" placeholder="Įrašykite treniruotes aprašymą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
          </div>-->
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('tvarkarastis.index') }}" class="btn btn-warning">Grįžti atgal</a>
                </div>
                    </form>
                </div>
            </div>
              </form>
            </div>

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection