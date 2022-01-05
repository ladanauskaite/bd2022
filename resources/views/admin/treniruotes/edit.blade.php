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
             
                <form role="form" action="{{ route('treniruotes.update', $treniruotes->id) }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="treniruotespavadinimas">Treniruotės pavadinimas</label>
                    <input type="text" class="form-control" id="treniruotespavadinimas" name="treniruotespavadinimas" placeholder="Įrašyti treniruotes pavadinimą..." value="{{ $treniruotes->treniruotespavadinimas }}">
                  </div>
                     <label>Apie treniruotę</label>
            <div class="form-group">
              <div class="mb-3">
                <textarea class="textarea" name="treniruotestekstas" placeholder="Įrašykite darbo treniruotes tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $treniruotes->treniruotestekstas }}</textarea>
              </div>
            </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Redaguoti</button>
                  <a href="{{ route('treniruotes.index') }}" class="btn btn-warning">Grįžti atgal</a>
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