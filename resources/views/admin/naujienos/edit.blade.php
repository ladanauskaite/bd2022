@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Naujienos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
              
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Redaguoti naujieną</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('naujienos.update', $naujiena->id) }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="naujienospavadinimas">Naujienos pavadinimas</label>
                    <input type="text" class="form-control" id="naujienospavadinimas" name="naujienospavadinimas" placeholder="Įrašyti naujienos pavadinimą..." value="{{ $naujiena->naujienospavadinimas }}">
                  </div>
                  <div class="form-group">
                    <label for="naujienosnuotrauka">Įkelti nuotrauką</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="naujienosnuotrauka" id="naujienosnuotrauka">
                        <label class="custom-file-label" for="naujienosnuotrauka">Pasirinkti nuotrauką</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie naujieną
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="naujienostekstas" placeholder="Įrašykite naujienos tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $naujiena->naujienostekstas }}</textarea>
              </div>
            </div>
          </div>
                     
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('naujienos.index') }}" class="btn btn-warning">Grįžti atgal</a>
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