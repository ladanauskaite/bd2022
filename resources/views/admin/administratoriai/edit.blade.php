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
                <h3 class="card-title">Redaguoti administratoriaus duomenis</h3>
              </div>
             
                <form role="form" action="{{ route('administratoriai.update', $admin->id) }}" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <input name="_method" type="hidden" value="PUT">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Kliento vardas</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Įrašyti kliento vardą..." value="{{ $admin->name }}">
                  </div>
                    <div class="form-group">
                    <label for="email">Kliento el. paštas</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Įrašyti kliento el. paštą..." value="{{ $admin->email }}">
                  </div>
                    <div class="form-group">
                     <label for="role"">Pareigos</label>
                     <select name="role" id="role" class="form-control" onchange="yesnoCheck(this);">
                         <option 
                              @if($admin->role == "Administratorius")
                             selected
                             @endif
                             value="Administratorius">Administratorius</option>
                         <option 
                             @if($admin->role == "Individualus treneris")
                             selected
                             @endif
                             value="Individualus treneris">Individualus treneris</option>
                         <option 
                              @if($admin->role == "Sporto klubo treneris")
                             selected
                             @endif
                             value="Sporto klubo treneris">Sporto klubo treneris</option>
                     </select>
                 </div>
                 

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Redaguoti</button>
                  <a href="{{ route('administratoriai.index') }}" class="btn btn-warning">Grįžti atgal</a>
                </div>
            </div>
              </form>

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>

@endsection