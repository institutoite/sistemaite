<!-- Header Lower -->
<div class="header-lower">
    <div class="auto-container">
      <div class="inner-container d-flex justify-content-between align-items-center">
    
        <!-- Logo -->
        <div class="logo pull-left">
          
        </div>
        
        <!-- Nav Outer -->
        <div class="nav-outer clearfix">
          <!-- Mobile Navigation Toggler -->
          <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
          <!-- Main Menu -->
          <nav class="main-menu navbar-expand-md">
            <div class="navbar-header">
              <!-- Toggle Button -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            
            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
              <ul class="navigation clearfix">
                <li><a href="{{ url('/') }}">Inicio</a>
                </li>
                <li><a href="{{ route('about') }}">¿Quiénes somos?</a>
                </li>
                <li class="dropdown"><a href="#">Lo mas nuevo</a>
                  <ul>
                    <li><a href="{{ route('robotica') }}">Robótica</a></li>
                    <li><a href="{{ route('programacion') }}">Programación y Algoritmos</a></li>
                    <li><a href="{{ route('creacionapp') }}">Creación de App Móviles</a></li>
                    <li><a href="{{ route('disenoweb') }}">Diseño Web</a></li>
                    <li><a href="{{ route('ajedrez') }}">Ajedrez</a></li>
                    <li><a href="{{ route('cuborubik') }}">Cubo Rubik</a></li>
                    
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Servicios</a>
                  <ul>
                    <li><a href="{{ route('fotocopia') }}">Fotocopia e impresión</a></li>
                    <li><a href="{{ route('resolucionpracticos') }}">Resolución de practicos</a></li>
                    <li><a href="{{ route('asistenteite') }}">Asistente ite</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Carreras</a>
                  <ul>
                    <li><a href="{{ route('computacion') }}">Computación</a></li>
                    <li><a href="{{ route('disenografico') }}">Diseño gráfico</a></li>
                    <li><a href="{{ route('mantenimientocomputadoras') }}">Mantenimiento y Reparación de Computadoras</a></li>
                    
                  </ul>
                </li>
                <li class="dropdown"><a href="#">Niveles</a>
                  <ul>
                    <li><a href="{{ route('inicial') }}">Inicial</a></li>
                    <li><a href="{{ route('primaria') }}">Primaria</a></li>
                    <li><a href="{{ route('secundaria') }}">Secundaria</a></li>
                    <li><a href="{{ route('preuniversitario') }}">Preuniversitario</a></li>
                    <li><a href="{{ route('universitario') }}">Universitarios</a></li>
                  </ul>
                </li><li class="dropdown"><a href="#">Próximamente</a>
                  <ul>
                    <li><a href="#">Libros personalizados</a></li>
                    <li><a href="#">Creacion de dibujo</a></li>
                    <li><a href="#">ite restaurante</a></li>
                    
                  </ul>
                </li>
                @auth
                  <li><a href="{{ route('home') }}">Sistema</a></li>
                @else
                  <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
                @endauth
                <li><a href="{{ route('contact') }}">Contactenos</a></li>
              </ul>
            </div>
          </nav>
          
        </div>
        
        <!-- Main Menu End-->
        <div class="outer-box clearfix">
          
          <!-- User Box -->
          {{-- <a href="contact.html" class="user-box fas fa-user"></a> --}}

          @auth
            <div class="button-box">
              <a href="{{ route('home') }}" class="theme-btn btn-style-one"><span class="txt"><i class="fas fa-sign-in-alt"></i> Sistema</span></a>
            </div>
            
            <div class="button-box">
              <a class="theme-btn btn-style-one" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><span class="txt"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</span></a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @else
            <div class="button-box">
              <a href="{{ route('login') }}" class="theme-btn btn-style-one"><span class="txt"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</span></a>
            </div>
          @endauth

          <!-- Search Btn -->
          {{-- <div class="search-box-btn"><span class="fas fa-sign-out-alt"></span></div> --}}
          
        </div>
    
      </div>
    </div>
</div>
<!-- End Header Lower -->