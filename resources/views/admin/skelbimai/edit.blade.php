@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Darbo skelbimai</h1>
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
                <h3 class="card-title">Redaguoti darbo skelbimą</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('skelbimai.update', $skelbimas->id) }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="skelbimopavadinimas">Darbo skelbimo pavadinimas</label>
                    <input type="text" class="form-control" id="skelbimopavadinimas" name="skelbimopavadinimas" placeholder="Įrašyti darbo skelbimo pavadinimą..." value="{{ $skelbimas->skelbimopavadinimas }}">
                  </div>
                  <div class="form-group">
                    <label for="skelbimonuotrauka">Įkelti nuotrauką</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="skelbimonuotrauka" id="skelbimonuotrauka">
                        <label class="custom-file-label" for="skelbimonuotrauka">Pasirinkti nuotrauką</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                
           <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
               Apie darbo skelbimą
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="skelbimotekstas" placeholder="Įrašykite darbo skelbimo tekstą..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $skelbimas->skelbimotekstas }}</textarea>
              </div>
            </div>
          </div>
                
                
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('skelbimai.index') }}" class="btn btn-warning">Grįžti atgal</a>
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