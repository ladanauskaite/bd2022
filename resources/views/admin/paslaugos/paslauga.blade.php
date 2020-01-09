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
              
              
                <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sukurti paslaugą</h3>
              </div>
             
                <form role="form" action="{{ route('paslaugos.store') }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="paslaugospavadinimas">Paslaugos pavadinimas</label>
                    <input type="text" class="form-control" id="paslaugospavadinimas" name="paslaugospavadinimas" placeholder="Įrašyti paslaugos pavadinimą...">
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
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
            </div>
          </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
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