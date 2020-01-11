 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Fitus</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://193.219.91.103:15562/kainorastis">Kainoraštis</a>
          </li>
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="http://193.219.91.103:15562/tvarkarastis">Tvarkaraštis</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="http://193.219.91.103:15562/naujienos">Naujienos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="http://193.219.91.103:15562/karjera">Karjera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Kontaktai</a>
          </li>
          <li class="nav-item">
              @if(Auth::guest())
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Prisijungti</a>
              @else
              <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Atsijungti') }}
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