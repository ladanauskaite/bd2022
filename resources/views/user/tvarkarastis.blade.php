<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/layouts/head')
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
</head>

<body id="page-top">

 @include('user/layouts/header')

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Fitus</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5 text-uppercase">norintiems daugiau</h2>
      </div>
    </div>
  </header>


   <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
          <br>
          <br>
          <br>
          <br>
      <h1 class="mx-auto my-0 text-uppercase">Tvarkaraštis</h1>
      <br>
      <br>
      <br>
      </div>
        </div>

  

  
  
<div class="cd-schedule loading">
	<div class="timeline">
		<ul>
			<li><span>09:00</span></li>
			<li><span>09:30</span></li>
			<li><span>10:00</span></li>
			<li><span>10:30</span></li>
			<li><span>11:00</span></li>
			<li><span>11:30</span></li>
			<li><span>12:00</span></li>
			<li><span>12:30</span></li>
			<li><span>13:00</span></li>
			<li><span>13:30</span></li>
			<li><span>14:00</span></li>
			<li><span>14:30</span></li>
			<li><span>15:00</span></li>
			<li><span>15:30</span></li>
			<li><span>16:00</span></li>
			<li><span>16:30</span></li>
			<li><span>17:00</span></li>
			<li><span>17:30</span></li>
			<li><span>18:00</span></li>
         
		</ul>
	</div> 

	<div class="events">
		<ul>
                    
			<li class="events-group">
                            <div class="top-info"><span>
                                    Pirmadienis
                                    </span></div>

				<ul>
                                    @foreach($treniruotes as $tvarkarastis)
                                    @if(date('l', strtotime($tvarkarastis->data)) == "Monday")
					<li class="single-event" data-start="{{ $tvarkarastis->laikas_nuo }}" data-end="{{ $tvarkarastis->laikas_iki }}" data-event="event-1">
						<a href="">
							<em class="event-name">{{ $tvarkarastis->treniruotespavadinimas }}</em>
						</a>
					</li>
                                    @endif
                                    @endforeach
				</ul>
			</li>

                        
                        <li class="events-group">
                            <div class="top-info"><span>
                                    Antradienis
                                    </span></div>

				<ul>
                                    @foreach($treniruotes as $tvarkarastis)
                                    @if (date('l', strtotime($tvarkarastis->data)) == "Tuesday")
					<li class="single-event" data-start="{{ $tvarkarastis->laikas_nuo }}" data-end="{{ $tvarkarastis->laikas_iki }}" data-event="event-1">
						<a href="">
							<em class="event-name">{{ $tvarkarastis->treniruotespavadinimas }}</em>
						</a>
					</li>
                                    @endif
                                    @endforeach
				</ul>
			</li>
                       
                
                        <li class="events-group">
                            <div class="top-info"><span>
                                    Trečiadienis
                                    </span></div>

				<ul>
                                    @foreach($treniruotes as $tvarkarastis)
                                    @if (date('l', strtotime($tvarkarastis->data)) == "Wednesday")
					<li class="single-event" data-start="{{ $tvarkarastis->laikas_nuo }}" data-end="{{ $tvarkarastis->laikas_iki }}" data-event="event-1">
						<a href="">
                                                    <em class="event-name">{{ $tvarkarastis->treniruotespavadinimas }}</em>
						</a>
					</li>
                                    @endif
                                    @endforeach
				</ul>
			</li>
                       
                       
                        <li class="events-group">
                            <div class="top-info"><span>
                                    Ketvirtadienis
                                    </span></div>

				<ul>
                                    @foreach($treniruotes as $tvarkarastis)
                                    @if (date('l', strtotime($tvarkarastis->data)) == "Thursday")
					<li class="single-event" data-start="{{ $tvarkarastis->laikas_nuo }}" data-end="{{ $tvarkarastis->laikas_iki }}" data-event="event-1">
						<a href="">
							<em class="event-name">{{ $tvarkarastis->treniruotespavadinimas }}</em>
						</a>
					</li>
                                    @endif
                                    @endforeach
				</ul>
			</li>
                       

                        <li class="events-group">
                            <div class="top-info"><span>
                                    Penktadienis
                                    </span></div>

				<ul>
                                    @foreach($treniruotes as $tvarkarastis)
                                    @if (date('l', strtotime($tvarkarastis->data)) == "Friday")
					<li class="single-event" data-start="{{ $tvarkarastis->laikas_nuo }}" data-end="{{ $tvarkarastis->laikas_iki }}" data-event="event-1">
						<a href="">
                                                    <em class="event-name">{{ $tvarkarastis->treniruotespavadinimas }}</em>
                                                    <em>0</em>
						</a>
					</li>
                                    @endif
                                    @endforeach
				</ul>
			</li>
                   

			
		</ul>
	</div>

</div>


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
                <a href="#">fitus@fitus.lt</a>
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
        <a href="https://www.facebook.com/FITUS-Sporto-klubas-1714087255497694/" class="mx-2">
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
   <script src="{{ asset('user/js/style.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
<!--  <script src="{{ asset('user/js/main.js') }}"></script>-->

</body>

</html>
