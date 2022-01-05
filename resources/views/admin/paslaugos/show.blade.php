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
          <div class="card">
            <div class="card-header">
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('paslaugos.create') }}">Pridėti paslaugą</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Paslaugos numeris</th>
                  <th>Paslaugos pavadinimas</th>
                   <th>Administratoriaus vardas</th>
                  <th>Paslaugos nuotrauka</th>
                  <th>Paslaugos tekstas</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($paslaugas as $paslauga)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $paslauga->paslaugospavadinimas }}</td>
                        <td> 
                             @foreach ($admins as $admin)
                             @if ($paslauga->admin_id == $admin->id)
                                  {{$admin->name}}
                              @endif
                             @endforeach
                        </td>
                        <td>{{ $paslauga->paslaugosnuotrauka }}</td>
                        <td>{{ $paslauga->paslaugostekstas }}</td>
                        <td><a href="{{ route('paslaugos.edit',$paslauga->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$paslauga->id}}" method="post" action="{{ route('paslaugos.destroy',$paslauga->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $paslauga->id }}').submit();
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