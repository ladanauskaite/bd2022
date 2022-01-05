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
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('naujienos.create') }}">Pridėti naujieną</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Naujienos numeris</th>
                  <th>Naujienos pavadinimas</th>
               <th>Administratoriaus vardas</th>
                  <th>Naujienos nuotrauka</th>
                  <th>Naujienos tekstas</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($naujienas as $naujiena)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $naujiena->naujienospavadinimas }}</td>
                         <td> 
                             @foreach ($admins as $admin)
                             @if ($naujiena->admin_id == $admin->id)
                                  {{$admin->name}}
                              @endif
                             @endforeach
                        </td>
                        <td>{{ $naujiena->naujienosnuotrauka }}</td>
                        <td>{{ $naujiena->naujienostekstas }}</td>
                        <td><a href="{{ route('naujienos.edit',$naujiena->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$naujiena->id}}" method="post" action="{{ route('naujienos.destroy',$naujiena->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $naujiena->id }}').submit();
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