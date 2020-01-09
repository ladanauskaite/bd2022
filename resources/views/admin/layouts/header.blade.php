<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost:8000/admin/home" class="nav-link">Pagrindinis</a>
      </li>
    </ul>
                    <div class="btn-default btn-flat pull-right">
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"
                     class="btn btn-default btn-flat">Atsijungti</a>
                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     </form>
                </div>
          </div>
</ul>
  </nav>
  <!-- /.navbar -->