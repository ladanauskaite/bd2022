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
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('administratoriai.create') }}">Pridėti naudotoją</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
                @if(Auth::user()->role == "Administratorius")
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Administratoriaus numeris</th>
                  <th>Administratoriaus vardas</th>
                  <th>Administratoriaus elektroninis paštas</th>
                  <th>Rolė</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        @if($admin->role === "Administratorius")
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td><a href="{{ route('administratoriai.edit',$admin->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('administratoriai.destroy',$admin->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $admin->id }}').submit();
                          } 
                            else {
                                event.preventDefault();
                            }"
                               ><span class="ion-trash-a"></span></a>
                        </td>
                    </tr>
                        @endif
                    @endforeach
                
                </tbody>
              </table>
                @endif
                @if(Auth::user()->role == "Administratorius")
                <table id="example2" class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                  <th>Sporto klubo trenerio numeris</th>
                  <th>Sporto klubo trenerio pavadinimas</th>
                  <th>Sporto klubo trenerio elektroninis paštas</th>
                  <th>Rolė</th>
                  <th>Sporto klubai</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        @if($admin->role === "Sporto klubo treneris")
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>
                             @foreach ($admin->sportoklubas as $sportoklubas)
                        {{ $sportoklubas->sportoklubopavadinimas }};
                      @endforeach
                </td>
                        <td><a href="{{ route('administratoriai.edit',$admin->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('administratoriai.destroy',$admin->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $admin->id }}').submit();
                          } 
                            else {
                                event.preventDefault();
                            }"
                               ><span class="ion-trash-a"></span></a>
                        </td>
                    </tr>
                        @endif
                    @endforeach
                
                </tbody>
              </table>
                @endif
          
                @if(Auth::user()->role == "Administratorius")
                <table id="example2" class="table table-bordered table-hover mt-3">
                <thead>
                <tr>
                  <th>Individualaus trenerio numeris</th>
                  <th>Individualaus trenerio pavadinimas</th>
                  <th>Individualaus trenerio elektroninis paštas</th>
                  <th>Rolė</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        @if($admin->role === "Individualus treneris")
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td><a href="{{ route('administratoriai.edit',$admin->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$admin->id}}" method="post" action="{{ route('administratoriai.destroy',$admin->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $admin->id }}').submit();
                          } 
                            else {
                                event.preventDefault();
                            }"
                               ><span class="ion-trash-a"></span></a>
                        </td>
                    </tr>
                        @endif
                    @endforeach
                
                </tbody>
              </table>
                @endif
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