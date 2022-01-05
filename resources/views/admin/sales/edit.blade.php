@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Salės</h1>
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
                <h3 class="card-title">Redaguoti salę</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" action="{{ route('sales.update', $sales->id) }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="salespavadinimas">Salės pavadinimas</label>
                    <input type="text" class="form-control" id="salespavadinimas" name="salespavadinimas" placeholder="Įrašyti sales pavadinimą..." value="{{ $sales->salespavadinimas }}">
                  </div>
                </div>
   
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('sales.index') }}" class="btn btn-warning">Grįžti atgal</a>
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