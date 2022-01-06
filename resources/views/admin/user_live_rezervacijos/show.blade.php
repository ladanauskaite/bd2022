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
            </div>
              
              
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Registracijos numeris</th>
                  <th>Kliento vardas</th>
                  <th>Rezervacijos id</th>
                  <th>Ištrinti</th>
                </tr>
                </thead>
                 <tbody>
                    @foreach($user_live_rezervacijas as $user_live_rezervacija)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td> 
                             @foreach ($users as $user)
                             @if ($user_live_rezervacija->user_id == $user->id)
                                  {{$user->name}}
                              @endif
                             @endforeach
                        </td>
                        <td> 
                             {{ $user_live_rezervacija->live_rezervacijos_id }}
                        </td>
                        <td>
                            <form id="delete-form-{{$user_live_rezervacija->id}}" method="post" action="{{ route('user-rezervacijos.destroy',$user_live_rezervacija->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $user_live_rezervacija->id }}').submit();
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