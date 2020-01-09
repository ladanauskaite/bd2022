@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kainos</h1>
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
                <h3 class="card-title">Redaguoti kainą</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" action="{{ route('kainorastis.update', $kainorastis->id) }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kainospavadinimas">Kainos pavadinimas</label>
                    <input type="text" class="form-control" id="kainospavadinimas" name="kainospavadinimas" placeholder="Įrašyti kainos pavadinimą..." value="{{ $kainorastis->kainospavadinimas }}">
                  </div>
                    <div class="form-group">
                    <label for="suma">Suma</label>
                    <input type="text" class="form-control" id="suma" name="suma" placeholder="Įrašyti sumą..."  value="{{ $kainorastis->suma }}">
                  </div>
                    <div class="form-group">
                    <label for="laikotarpis">Laikotarpis</label>
                    <input type="text" class="form-control" id="laikotarpis" name="laikotarpis" placeholder="Įrašyti laikotarpį..."  value="{{ $kainorastis->laikotarpis }}">
                  </div>
                </div>
                <!-- /.card-body -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie kainą
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="kainostekstas" placeholder="Įrašykite kainos tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $kainorastis->kainostekstas }}</textarea>
              </div>
            </div>
          </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('kainorastis.index') }}" class="btn btn-warning">Grįžti atgal</a>
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