@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Video rezervacijos</h1>
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
                <h3 class="card-title">Sukurti treniruotės rezervaciją</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('live-rezervacijos.store') }}" method="post"  enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card-body">
                    <div class="row">
                   
                    </div>
                    <div class="row">
                         <div class="col">
                    <div class="form-group">
                            <label>Pasirinkti treniruotę</label>
                            <select class="custom-select" name="treniruotes_id">
                          @foreach ($treniruotes as $treniruote)
                          <option value="{{ $treniruote->id }}">{{ $treniruote->treniruotespavadinimas }}</option>
                          @endforeach
                        </select>
                       </div>
                         </div>
                   
                          </div>
                    <div class="form-group">
                    <label>Data:</label>
                    <div class="input-group date" id="data">
                        <input type="date" class="form-control" name="treniruotes_data" id="datefield" min='2000-12-13' max='2000-12-13'/>
                    </div>
                  </div>
                    <div class="row">
                         <div class="col">
                    <div class="form-group">
                    <label>Laikas nuo:</label>
                    <div class="input-group date" id="laikas_nuo">
                        <input type="time" id="appt" name="laikas_nuo" min="09:00" max="18:00" class="form-control">
                    </div>
                  </div>
                         </div>
                             <div class="col">
                    <div class="form-group">
                    <label>Laikas iki:</label>
                    <div class="input-group date" id="laikas_iki">
                        <input type="time" id="appt" name="laikas_iki" min="09:00" max="18:00" class="form-control">
                    </div>
                  </div>
                             </div>
                    </div>
                   <div class="form-group">
                    <label for="nuoroda">Nuoroda</label>
                    <input type="text" class="form-control" id="nuoroda" name="nuoroda" placeholder="Nuoroda">
                  </div>
                    <div class="checkbox pull-left">
                                  <label>
                                    <input type="checkbox" name="statusas" id="statusas" value="1"> Aktyvi
                                  </label>
                                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('live-rezervacijos.index') }}" class="btn btn-warning">Grįžti atgal</a>
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
