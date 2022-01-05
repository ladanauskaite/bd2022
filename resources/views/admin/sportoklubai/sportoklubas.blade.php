@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sporto klubai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sukurti sporto klubą</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form" action="{{ route('sportoklubai.store') }}" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="sportoklubopavadinimas">Sporto klubo pavadinimas</label>
                    <input type="text" class="form-control" id="sportoklubopavadinimas" name="sportoklubopavadinimas" placeholder="Įrašyti sporto klubo pavadinimą...">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('sportoklubai.index') }}" class="btn btn-warning">Grįžti atgal</a>
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