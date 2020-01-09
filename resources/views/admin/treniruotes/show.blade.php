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
              <a class="col-md-offset-5 btn btn-primary" href="{{ route('tvarkarastis.create') }}">Pridėti treniruotę</a>
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Treniruotės numeris</th>
                  <th>Treniruotės pavadinimas</th>
                  <th>Treniruotės data</th>
                  <th>Treniruotės laikas nuo</th>
                  <th>Treniruotės laikas iki</th>
                  <th>Koreguoti</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tvarkarastis as $tvarkarastis)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $tvarkarastis->treniruotespavadinimas }}</td>
                        <td>{{ $tvarkarastis->data }}</td>
                        <td>{{ $tvarkarastis->laikas_nuo }}</td>
                        <td>{{ $tvarkarastis->laikas_iki }}</td>
                        <td><a href="{{ route('tvarkarastis.edit',$tvarkarastis->id) }}"><span class="ion-edit"></span></a></td>
                        <td>
                            <form id="delete-form-{{$tvarkarastis->id}}" method="post" action="{{ route('tvarkarastis.destroy',$tvarkarastis->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $tvarkarastis->id }}').submit();
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