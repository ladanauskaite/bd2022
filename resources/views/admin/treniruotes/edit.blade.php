@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Klientai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    
    
<section class="content">
      <div class="row">
          <div class="col-md-12">
              
              
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Redaguoti treniruotės duomenis</h3>
              </div>
             
                <form role="form" action="{{ route('tvarkarastis.update', $tvarkarastis->id) }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="treniruotespavadinimas">Treniruotės pavadinimas</label>
                    <input type="text" class="form-control" id="treniruotespavadinimas" name="treniruotespavadinimas" placeholder="Įrašyti treniruotes pavadinimą..." value="{{ $tvarkarastis->treniruotespavadinimas }}">
                  </div>
                    <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" id="data" name="data" placeholder="Įrašyti datą..." value="{{ $tvarkarastis->data }}">
                  </div>
                    <div class="form-group">
                    <label for="laikas_nuo">Treniruotės pardžia</label>
                    <input type="time" class="form-control" id="laikas_nuo" name="laikas_nuo" placeholder="Įrašyti treniruotės pradžios laiką..." value="{{ $tvarkarastis->laikas_nuo }}">
                  </div>
                  <div class="form-group">
                    <label for="laikas_iki">Laikas pabaiga</label>
                    <input type="time" class="form-control" id="laikas_iki" name="laikas_iki" placeholder="Įrašyti treniruotės pabaigos laiką..."  value="{{ $tvarkarastis->laikas_iki }}">
                  </div>
               
                </div>
                <!-- /.card-body -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie treniruotę
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="aprasymas" placeholder="Įrašykite treniruotes aprašymą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $tvarkarastis->aprasymas }}</textarea>
              </div>
            </div>
          </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Redaguoti</button>
                  <a href="{{ route('tvarkarastis.index') }}" class="btn btn-warning">Grįžti atgal</a>
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