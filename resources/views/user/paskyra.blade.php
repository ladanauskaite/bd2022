<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/layouts/head')
      <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
      <link href="https://player.castr.com/live_cbde3390581411ec93ce378913bab7c6"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
</head>
<style>
    
    a.disabled {
  pointer-events: none;
  cursor: default;
  color:gray;
}
</style>

<body id="page-top">

 @include('user/layouts/header')

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Sportinės veiklos</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5 text-uppercase">valdymo sistema</h2>
      </div>
    </div>
  </header>


  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light p-5">
    <div class="container">

        <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
      <h1 class="mx-auto my-0 text-uppercase">Paskyra</h1>
      <br>
      </div>
        </div>
        <h3 class="ml-3">Sporto klubo treniruotės</h3>
  <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>Kliento vardas</th>
                  <th>Sporto klubas</th>
                  <th>Treniruotė</th>
                  <th>Data</th>
                  <th>Laikas nuo</th>
                  <th>Laikas iki</th>
                  <th>Atšaukti</th>
                </tr>
                </thead>
                 <tbody>
                    @foreach($user_rezervacijas as $user_rezervacija)
                  
                    @if($auth_id == $user_rezervacija->user_id)
                    <tr>
                       
                        <td> 
                             @foreach ($users as $user)
                             @if ($user_rezervacija->user_id == $user->id)
                                  {{$user->name}}
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             @foreach($sportoklubas as $sportokluba)
                                @if($rezervacija->sportoklubo_id == $sportokluba->id)
                                {{$sportokluba->sportoklubopavadinimas}}
                                @endif
                             @endforeach
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             @foreach($treniruotes as $treniruote)
                                @if($rezervacija->treniruotes_id == $treniruote->id)
                                {{$treniruote->treniruotespavadinimas}}
                                @endif
                             @endforeach
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             {{$rezervacija->treniruotes_data}}
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             {{$rezervacija->laikas_nuo}}
                              @endif
                             @endforeach
                        </td>
                             <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             {{$rezervacija->laikas_iki}}
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($rezervacijas as $rezervacija)
                             @if ($user_rezervacija->rezervacijos_id == $rezervacija->id)
                             
                             @if($rezervacija->treniruotes_data < $today)
                            <a class="disabled" href="" o
                               ><i class="fas fa-trash"></i> Treniruotė jau įvyko</a>
                               @elseif($rezervacija == $today && $rezervacija->laikas_nuo < $time)
                               <a class="disabled" href="" o
                               ><i class="fas fa-trash"></i> Treniruotė jau įvyko</a>
                             @else
                             <form id="delete-form-{{$user_rezervacija->id}}" method="post" action="{{ route('user-rezervacijos.destroy',$user_rezervacija->id) }}" style="display: none">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE"/>
                            </form>
                            <a href="" onclick="
                               if(confirm('Ar tikrai?'))
                          {
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $user_rezervacija->id }}').submit();
                          } 
                            else {
                                event.preventDefault();
                            }"
                               ><i class="fas fa-trash"></i></a>
                             @endif
                              @endif
                             @endforeach
                        </td>
                    </tr>
                    @endif
                    @endforeach
                
                </tbody>
                 <tbody>
                    @foreach($atsauktos_user_rezervacijas as $atsauktos_user_rezervacija)
                    @if($auth_id == $atsauktos_user_rezervacija->user_id)
                    
                    <tr>
                       
                        <td> 
                            @foreach ($users as $user)
                             @if ($atsauktos_user_rezervacija->user_id == $user->id)
                                  {{$user->name}}
                              @endif
                             @endforeach
                            
                        </td>
                        <td>
                             @foreach($sportoklubas as $sportokluba)
                                @if($atsauktos_user_rezervacija->sportoklubo_id == $sportokluba->id)
                                {{$sportokluba->sportoklubopavadinimas}}
                                @endif
                             @endforeach
                        </td>
                        <td>
                             @foreach($treniruotes as $treniruote)
                                @if($atsauktos_user_rezervacija->treniruotes_id == $treniruote->id)
                                {{$treniruote->treniruotespavadinimas}}
                                @endif
                             @endforeach
                        </td>
                        <td>
                           
                             
                             {{$atsauktos_user_rezervacija->treniruotes_data}}
                        </td>
                        <td>
                            
                             
                             {{$atsauktos_user_rezervacija->laikas_nuo}}
                           
                        </td>
           <td>
                            
                             
                             {{$atsauktos_user_rezervacija->laikas_iki}}
                             
                        </td>
                        <td><b class="text-danger">Treniruotė atšaukta</b></td>
                    </tr>
                    @endif
                    @endforeach
                
                </tbody>
              </table>
            </div>
     
        <h3 class="ml-3">LIVE treniruotės</h3>
        <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nr.</th>
                  <th>Kliento vardas</th>
                  <th>Treniruotė</th>
                  <th>Data</th>
                  <th>Laikas nuo</th>
                  <th>Laikas iki</th>
                  <th>Žiūrėti treniruotę</th>
                  <th>Atšaukti</th>
                </tr>
                </thead>
                 <tbody>
                    @foreach($user_live_rezervacijas as $user_live_rezervacija)
                  
                    @if($auth_id == $user_live_rezervacija->user_id)
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
                            @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             @foreach($treniruotes as $treniruote)
                                @if($live_rezervacija->treniruotes_id == $treniruote->id)
                                {{$treniruote->treniruotespavadinimas}}
                            
                                @endif
                                
                             @endforeach
                              @endif
                             
                             @endforeach
                             
                        </td>
                        <td>
                            @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             {{$live_rezervacija->treniruotes_data}}
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             {{$live_rezervacija->laikas_nuo}}
                              @endif
                             @endforeach
                        </td>
                             <td>
                            @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             {{$live_rezervacija->laikas_iki}}
                              @endif
                             @endforeach
                        </td>
                        <td>
                            @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             @if($live_rezervacija->statusas == null)
                                <a class="disabled" href="{{ route('exm_live',$user_live_rezervacija->live_rezervacijos_id) }}"
                                   ><b class="text-danger">Treniruotė atšaukta</b></a>
                             @elseif($live_rezervacija->treniruotes_data < $today)
                            <a class="disabled" href="{{ route('exm_live',$user_live_rezervacija->live_rezervacijos_id) }}"
                               ><i class="fas fa-play"></i> Treniruotė jau įvyko</a>
                                @elseif($live_rezervacija == $today && $live_rezervacija->laikas_nuo < $time)
                                <a class="disabled" href="{{ route('exm_live',$user_live_rezervacija->live_rezervacijos_id) }}"
                               ><i class="fas fa-play"></i>Treniruotė jau įvyko</a>
                               
                               @else
                                  <a href="{{ route('exm_live',$user_live_rezervacija->live_rezervacijos_id) }}"
                               ><i class="fas fa-play"></i></a>
                               @endif
                              @endif
                             @endforeach       
                        </td>
                       
                        <td>
                             @foreach ($live_rezervacijas as $live_rezervacija)
                             @if ($user_live_rezervacija->live_rezervacijos_id == $live_rezervacija->id)
                             @if($live_rezervacija->treniruotes_data < $today)
                            <a class="disabled" href="" o
                               ><i class="fas fa-trash"></i></a>
                               @elseif($live_rezervacija == $today && $live_rezervacija->laikas_nuo < $time)
                               <a class="disabled" href="" o
                               ><i class="fas fa-trash"></i></a>
                               @elseif($live_rezervacija->statusas == null)
                                <a class="disabled" href="{{ route('exm_live',$user_live_rezervacija->live_rezervacijos_id) }}"
                                   ><i class="fas fa-trash"></i></a>
                             @else
                             <form id="delete-form-{{$user_live_rezervacija->id}}" method="post" action="{{ route('user-live-rezervacijos.destroy',$user_live_rezervacija->id) }}" style="display: none">
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
                               ><i class="fas fa-trash"></i></a>
                             @endif
                              @endif
                             @endforeach       
                        </td>
                    </tr>
                    @endif
                    @endforeach
                
                </tbody>
              </table>
            <div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>
            <div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="pie-chart1"></canvas>
    </div>
  </div>
            </div>
        <div class="card mb-2">
  <div class="card-header">
    Sporto klubų pasiekimai
  </div>
  <div class="card-body">
            <div class="row">
                <div class="col" style="display: flex; justify-content: center;">
                    @if ( $award < 5 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height: 100px" src="\user\img\1award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>5 treniruotės</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\1award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>5 treniruotės</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
             @if ( $award < 10 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0);  height: 100px" src="\user\img\2award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>10 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\2award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>10 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
           @if ( $award < 10 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\3award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>20 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\3award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>20 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
            @if ( $award < 50 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\4award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>50 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\4award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>50 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                <div class="col"  style="display: flex; justify-content: center;">
            @if ( $award < 100 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\5award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>100 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\5award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>100 treniruočių</p>
                </div>
                 </div>
                    @endif
            </div>
            </div>
  </div>
</div>
         <div class="card">
  <div class="card-header">
    LIVE treniruočių pasiekimai
  </div>
  <div class="card-body">
            <div class="row">
                <div class="col" style="display: flex; justify-content: center;">
                    @if ( $live_award < 5 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height: 100px" src="\user\img\6award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>5 treniruotės</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\6award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>5 treniruotės</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
             @if ( $live_award < 10 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0);  height: 100px" src="\user\img\7award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>10 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\7award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>10 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
           @if ( $live_award < 10 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\8award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>20 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\8award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>20 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                 <div class="col" style="display: flex; justify-content: center;">
            @if ( $live_award < 50 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\9award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>50 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\9award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>50 treniruočių</p>
                </div>
                 </div>
                    @endif
                </div>
                <div class="col"  style="display: flex; justify-content: center;">
            @if ( $live_award < 100 )
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
               <img style="filter: grayscale(1.0); height:100px" src="\user\img\10award.jpg">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>100 treniruočių</p>
                </div>
                 </div>
                @else
                 <div class="row">
                <div class="col-12" style="display: flex; justify-content: center;">
                <img src="\user\img\10award.jpg" style="height: 100px">
                </div>
                <div class="col-12" style="display: flex; justify-content: center;">
                <p>100 treniruočių</p>
                </div>
                 </div>
                    @endif
            </div>
            </div>
  </div>
</div>
    </div>
  </section>
  <!-- Signup Section -->
  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
          <h2 class="text-white mb-5">Prenumeruoti naujienas!</h2>

          <form class="form-inline d-flex">
            <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Įvesti el. pašto adresą...">
            <button type="submit" class="btn btn-primary mx-auto">Prenumeruoti</button>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Adresas</h4>
              <hr class="my-4">
              <div class="small text-black-50">Bieliūnų gatvė 1, Vilnius</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">El. paštas</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">example@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Telefono numeris</h4>
              <hr class="my-4">
              <div class="small text-black-50">+37067608081</div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="" class="mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
      </div>

    </div>
  </section>

 @include('user/layouts/footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('user/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('user/js/grayscale.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$(document).ready(function() {
    $('#example2').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );

$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
    </script>
    <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Savaitės treniruočių rezervacijos",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>
 <script>
  $(function(){
      //get the pie chart canvas
      var cData1 = JSON.parse(`<?php echo $chart_data1; ?>`);
      var ctx1 = $("#pie-chart1");
 
      //pie chart data
      var data1 = {
        labels: cData1.label1,
        datasets: [
          {
            label: "Users Count",
            data: cData1.data1,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Savaitės LIVE treniruočių rezervacijos",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx1, {
        type: "pie",
        data: data1,
        options: options
      });
 
  });
</script>
</body>

</html>
