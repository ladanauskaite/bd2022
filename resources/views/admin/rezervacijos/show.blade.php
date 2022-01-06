@extends('admin/layouts/app')

@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administratoriaus valdymas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
         <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <section class="content">
      <div class="row">
        <div class="col-12">
              @if(session()->has('error'))
              <div class="alert alert-danger m-3" role="alert">
                {{session()->get('error')}}
                </div>
              @endif
          <div class="card">
            <div class="card-header">
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('rezervacijos.create') }}">Pridėti rezervaciją</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Rezervacijos numeris</th>
                    <th>Trenerio vardas</th>
                    <th>Sporto klubas</th>
                    <th>Salė</th>
                    <th>Treniruotė</th>
                    <th>Data</th>
                    <th>Laikas nuo</th>
                    <th>Laikas iki</th>
                    <th>Kiekis</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($rezervacijas as $rezervacija)
                    <tr>
                        <td>{{ $rezervacija->id }}</td>
                         <td> 
                             @foreach ($admins as $admin)
                             @if ($rezervacija->admin_id == $admin->id)
                                  {{$admin->name}}
                              @endif
                             @endforeach
                        </td>
                        <td> 
                       @foreach ($sportoklubai as $sportoklubas)
                             @if ($rezervacija->sportoklubo_id == $sportoklubas->id)
                                  {{$sportoklubas->sportoklubopavadinimas}}
                              @endif
                             @endforeach
                        </td>
                        <td> 
                             @foreach ($sales as $sale)
                             @if ($rezervacija->sales_id == $sale->id)
                                  {{$sale->salespavadinimas}}
                              @endif
                             @endforeach
                        </td>
                        <td> 
                             @foreach ($treniruotes as $treniruote)
                             @if ($rezervacija->treniruotes_id == $treniruote->id)
                                  {{$treniruote->treniruotespavadinimas}}
                              @endif
                             @endforeach
                        </td>
                        <td>{{ $rezervacija->treniruotes_data }}</td>
                        <td>{{ $rezervacija->laikas_nuo }}</td>
                         <td>{{ $rezervacija->laikas_iki }}</td>
                          <td>{{ $rezervacija->kiekis }}</td>
                          
                          
                        <td><a href="{{ route('rezervacijos.edit',$rezervacija->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$rezervacija->id}}" method="post" action="{{ route('rezervacijos.destroy',$rezervacija->id) }}" style="display: none">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                                
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $rezervacija->id }}').submit();
                          } 
                            else {
                                event.preventDefault();
                            }"
                               ><span class="ion-trash-a"></span></a>
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    </section>
  </div>
  <!-- /.content-wrapper -->

@endsection