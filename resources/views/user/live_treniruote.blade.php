<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
  <link href="{{ asset('user/css/lol.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:Condensed" />
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
                @include('user/layouts/head')

</head>
<body>
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


  <header class="cd-main-header text-center flex flex-column flex-center mt-5">
    <h1 class="text-xl">Treniruotė </h1>
  </header>
  
   <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6 mb-5 text-center">
            <div class="mb-2">
            @foreach($treniruotes as $treniruote)
            @if($treniruote->id == $id->treniruotes_id)
            <b>{{$treniruote->treniruotespavadinimas }}</b>
             @endif
             @endforeach
            </div>
            <div class="mb-2">
           {{$id->laikas_nuo}} - {{$id->laikas_iki}}
            </div>
          <div class="text-center h-100 project">
             
               {!! htmlspecialchars_decode($id->nuoroda) !!}
          </div>
        </div>
      </div>
  <script src="{{ asset('user/assets/js/util.js') }}"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="{{ asset('user/assets/js/main.js') }}"></script>
  @include('user/layouts/footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('user/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('user/js/grayscale.min.js') }}"></script>

 <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <script>
function change(){
    document.getElementById("myselect").submit();
}
</script>
</body>
</html>