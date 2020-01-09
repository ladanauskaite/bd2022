<!DOCTYPE html>
<html lang="en">

<head>
    @include('user/layouts/head')
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


  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">
              <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
      <h1 class="mx-auto my-0 text-uppercase">Karjera</h1>
      <br>
      <br>
      <br>
      </div>
        </div>
@foreach($skelbimai as $skelbimas)
      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="{{ Storage::url("$skelbimas->skelbimonuotrauka") }}" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">{{ $skelbimas->skelbimopavadinimas }}</h4>
                <p class="mb-0 text-white-50">{{ $skelbimas->skelbimotekstas }}</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>
      
@endforeach
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

</body>

</html>
