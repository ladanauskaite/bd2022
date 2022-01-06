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
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('treniruotes.create') }}">Pridėti treniruotę</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Treniruotės numeris</th>
                  <th>Treniruotės pavadinimas</th>
                  <th>Treniruotės tekstas</th>
                  <th>Administrratoriaus ID</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($treniruotes as $treniruote)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $treniruote->treniruotespavadinimas }}</td>
                        <td>{{ $treniruote->treniruotestekstas }}</td>
                        <td>{{ $treniruote->admin_id }}</td>
                        <td><a href="{{ route('treniruotes.edit',$treniruote->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$treniruote->id}}" method="post" action="{{ route('treniruotes.destroy',$treniruote->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $treniruote->id }}').submit();
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection