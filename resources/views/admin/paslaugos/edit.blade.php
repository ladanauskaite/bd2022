@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paslaugos</h1>
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
                <h3 class="card-title">Redaguoti paslaugą</h3>
              </div>
             
                <form role="form" action="{{ route('paslaugos.update', $paslauga->id) }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="paslaugospavadinimas">Paslaugos pavadinimas</label>
                    <input type="text" class="form-control" id="paslaugospavadinimas" name="paslaugospavadinimas" placeholder="Įrašyti paslaugos pavadinimą..." value="{{ $paslauga->paslaugospavadinimas }}">
                  </div>
                  <div class="form-group">
                    <label for="paslaugosnuotrauka">Įkelti nuotrauką</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="paslaugosnuotrauka" id="paslaugosnuotrauka">
                        <label class="custom-file-label" for="paslaugosnuotrauka">Pasirinkti nuotrauką</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie paslaugą
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="paslaugostekstas" placeholder="Įrašykite paslaugos tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $paslauga->paslaugostekstas }}</textarea>
              </div>
            </div>
          </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Redaguoti</button>
                  <a href="{{ route('paslaugos.index') }}" class="btn btn-warning">Grįžti atgal</a>
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