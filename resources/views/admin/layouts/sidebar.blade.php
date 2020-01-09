<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     
      <span class="brand-text font-weight-light">FITUS ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       
        <div class="info">
          <a href="#" class="d-block">VADOVAS</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <ul class="nav nav-treeview">
                
             
              <li class="nav-item">
                <a href="{{ route('tvarkarastis.index') }}" class="nav-link active">
                  <p>Tvarkaraštis</p>
                </a>
              </li>
           
            
            @if(Auth::user()->role == "Administratorius")
              <li class="nav-item">
                <a href="{{ route('skelbimai.index') }}" class="nav-link active">
                  Darbo skelbimai
                </a>
              </li>
            @endif
            
              @if(Auth::user()->role == "Administratorius")
              <li class="nav-item">
                <a href="{{ route('paslaugos.index') }}" class="nav-link active">
                  <p>Paslaugos</p>
                </a>
              </li>
            @endif
            
            @if(Auth::user()->role == "Administratorius")
              <li class="nav-item">
                <a href="{{ route('kainorastis.index') }}" class="nav-link active">
                  <p>Kainoraštis</p>
                </a>
              </li>
            @endif
            
            @if(Auth::user()->role == "Administratorius")
                <li class="nav-item">
                <a href="{{ route('naujienos.index') }}" class="nav-link active">
                  <p>Naujienos</p>
                </a>
              </li>
            @endif
            
            @if(Auth::user()->role == "Administratorius")
              <li class="nav-item">
                <a href="{{ route('klientai.index') }}" class="nav-link active">
                  <p>Klientai</p>
                </a>
              </li>
            @endif
            
            @if(Auth::user()->role == "Administratorius")
              <li class="nav-item">
                <a href="{{ route('administratoriai.index') }}" class="nav-link active">
                  <p>Administratoriai/treneriai</p>
                </a>
              </li>
            @endif
            </ul>
          </li>
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>