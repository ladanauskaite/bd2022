 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Sistema</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('kainos')}}">Kainoraštis</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('treniruotes')}}">Treniruotės</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('example1')}}">Tvarkaraštis</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('user_live_rezervacija')}}">LIVE tvarkaraštis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('naujienos')}}">Naujienos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('skelbimas')}}">Karjera</a>
          </li>
          @if(Auth::check()) 
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('paskyra')}}">Paskyra</a>
          </li>
          @endif
          <li class="nav-item">
              @if(Auth::guest())
            <a class="nav-link js-scroll-trigger" style="padding: 30px 20px;" href="{{ route('login') }}">Prisijungti</a>
              @else
              <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"  style="padding: 30px 20px;"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>