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
                <h3 class="card-title">Sukurti administratori┼│</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="container">      
        <form role="form" action="{{ route('administratoriai.store') }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <br>
                 <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vardas') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('El. pa┼íto adresas') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Slapta┼żodis') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Pakartoti slapta┼żod─»') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                 
                 <div class="form-group row">
                     <label for="role" class="col-md-4 col-form-label text-md-right">Priskirti pareigas</label>
                     <div class="col-md-6">
                     <select name="role" id="role" class="form-control"  onchange="yesnoCheck(this);">
                         @if(Auth::user()->role == "Administratorius")
                         <option value="Administratorius">Administratorius</option>
                         @endif
                         @if(Auth::user()->role == "Sporto klubas" || Auth::user()->role == "Administratorius")
                         <option value="Sporto klubo treneris">Sporto klubo treneris</option>
                         @endif
                         @if(Auth::user()->role == "Administratorius")
                         <option value="Individualus treneris">Individualus treneris</option>
                         @endif
                     </select>
                     </div>
                 </div>
                 <div class="form-group row" id="ifYes" style="display: none;">
                   <select class="form-select" multiple aria-label="multiple select example" name="sportoklubas[]" style="margin-left:390px">
                          @foreach($sportoklubas as $sportoklubas)
  <option value="{{$sportoklubas->id}}">{{$sportoklubas->sportoklubopavadinimas}}</option>
                   @endforeach

</select>
                 </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registruoti') }}
                                </button>
                                                  <a href="{{ route('administratoriai.index') }}" class="btn btn-warning">Gr─»┼żti atgal</a>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
            </div>

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection


