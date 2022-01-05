@extends('admin.layouts.app')

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rezervacijos</h1>
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
                <h3 class="card-title">Sukurti treniruotės rezervaciją</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('rezervacijos.update', $rezervacijas->id) }}" method="post"  enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input name="_method" type="hidden" value="PUT">
 
                <div class="card-body">
        
                    <div class="row">
                         <div class="col">
                        <div class="form-group">
                            <label>Pasirinkti sporto klubą</label>
                            <select class="custom-select" name="sportoklubo_id">
                          @foreach ($sportoklubas as $sportoklubas)
                                @if( $rezervacijas->sportoklubo_id == $sportoklubas->id )
                                    <option value="{{ $sportoklubas->id }}" selected>
                                        {{ $sportoklubas->sportoklubopavadinimas }}
                                    </option>
                                @else
                                    <option value="{{ $sportoklubas->id }}">
                                        {{ $sportoklubas->sportoklubopavadinimas }}
                                    </option>
                                @endif
                          @endforeach
                        </select>
                        </div>
                         </div>
                        <div class="col">
                    <div class="form-group">
                            <label>Pasirinkti salę</label>
                            <select class="custom-select" name="sales_id">
                          @foreach ($sales as $sale)
                                @if( $rezervacijas->sales_id == $sale->id )
                                    <option value="{{ $sale->id }}" selected>
                                        {{ $sale->salespavadinimas }}
                                    </option>
                                @else
                                    <option value="{{ $sale->id }}">
                                        {{ $sale->salespavadinimas }}
                                    </option>
                                @endif
                          @endforeach
                        </select>
                       </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col">
                    <div class="form-group">
                            <label>Pasirinkti treniruotę</label>
                            <select class="custom-select" name="treniruotes_id">
                          @foreach ($treniruotes as $treniruote)
                                @if( $rezervacijas->treniruotes_id == $treniruote->id )
                                    <option value="{{ $treniruote->id }}" selected>
                                        {{ $treniruote->treniruotespavadinimas }}
                                    </option>
                                @else
                                    <option value="{{ $treniruote->id }}">
                                        {{ $treniruote->treniruotespavadinimas }}
                                    </option>
                                @endif
                          @endforeach
                        </select>
                       </div>
                         </div>
                        <div class="col">
                    <div class="form-group">
                    <label for="kiekis">Vietos</label>
                    <input type="number" class="form-control" id="kiekis" name="kiekis" placeholder="Įrašyti vietų skaičių..." value="{{ $rezervacijas->kiekis }}">
                  </div>
                              </div>
                          </div>
                    <div class="form-group">
                    <label>Data:</label>
                    <div class="input-group date" id="data">
                        <input type="date" class="form-control" name="treniruotes_data" value="{{ $rezervacijas->treniruotes_data }}"/>
                    </div>
                  </div>
                    <div class="row">
                         <div class="col">
                    <div class="form-group">
                    <label>Laikas nuo:</label>
                    <div class="input-group date" id="laikas_nuo">
                        <input type="time" id="appt" name="laikas_nuo" min="09:00" max="18:00" class="form-control" value="{{ $rezervacijas->laikas_nuo }}">
                    </div>
                  </div>
                         </div>
                             <div class="col">
                    <div class="form-group">
                    <label>Laikas iki:</label>
                    <div class="input-group date" id="laikas_iki">
                        <input type="time" id="appt" name="laikas_iki" min="09:00" max="18:00" class="form-control" value="{{ $rezervacijas->laikas_iki }}">
                    </div>
                  </div>
                             </div>
                    </div>
  
                    
                </div>
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sukurti</button>
                  <a href="{{ route('rezervacijos.index') }}" class="btn btn-warning">Grįžti atgal</a>
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