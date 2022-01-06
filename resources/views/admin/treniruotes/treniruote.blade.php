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
              @if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
  @endforeach
@endif

@if (session()->has('message'))
	<p class="alert alert-success">{{ session('message') }}</p>
@endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sukurti treniruotę</h3>
              </div>

              <div class="container">      
        <form role="form" action="{{ route('treniruotes.store') }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="card-body">
                  <div class="form-group">
                    <label for="treniruotespavadinimas">Treniruotės pavadinimas</label>
                    <input type="text" class="form-control" id="treniruotespavadinimas" name="treniruotespavadinimas" placeholder="Įrašyti treniruotes pavadinimą...">
                  </div>
               
              <label>Apie treniruotę</label>
            <div class="form-group">
              <div class="mb-3">
                <textarea class="textarea" name="treniruotestekstas" placeholder="Įrašykite darbo treniruotes tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
                  </div>
            </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('treniruotes.index') }}" class="btn btn-warning">Grįžti atgal</a>
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