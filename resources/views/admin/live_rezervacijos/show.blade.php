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
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('live-rezervacijos.create') }}">Pridėti video rezervaciją</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Video rezervacijos numeris</th>
                    <th>Trenerio vardas</th>
                    <th>Treniruotė</th>
                    <th>Data</th>
                    <th>Laikas nuo</th>
                    <th>Laikas iki</th>
                    <th>Nuoroda</th>
                     <th>Statusas</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
               <tbody>
                    @foreach($live_rezervacijas as $live_rezervacija)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                         <td> 
                             @foreach ($admins as $admin)
                             @if ($live_rezervacija->admin_id == $admin->id)
                                  {{$admin->name}}
                              @endif
                             @endforeach
                        </td>
                 
                        <td> 
                             @foreach ($treniruotes as $treniruote)
                             @if ($live_rezervacija->treniruotes_id == $treniruote->id)
                                  {{$treniruote->treniruotespavadinimas}}
                              @endif
                             @endforeach
                        </td>
                        <td>{{ $live_rezervacija->treniruotes_data }}</td>
                        <td>{{ $live_rezervacija->laikas_nuo }}</td>
                         <td>{{ $live_rezervacija->laikas_iki }}</td>
                          <td>{{ $live_rezervacija->nuoroda }}</td>
                          <td>
                          @if($live_rezervacija->statusas == 1)
                          <b class="text-success">Aktyvi</b>
                          @else
                          <b class="text-danger">Atšaukta</b>
                          @endif
                          </td>
                         
                        <td><a href="{{ route('live-rezervacijos.edit',$live_rezervacija->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$live_rezervacija->id}}" method="post" action="{{ route('live-rezervacijos.destroy',$live_rezervacija->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $live_rezervacija->id }}').submit();
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