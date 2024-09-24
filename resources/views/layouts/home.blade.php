<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="ITE, tecnología, educación" />
  <meta name="description" content="ITE - Conectamos tus redes sociales en un solo lugar" />
  <meta name="author" content="ITE" />

  <title>Grupo ite</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="{{ asset('fanadesh/css/style.css')}}" rel="stylesheet" />
  <link href="{{ asset('fanadesh/css/menu.css')}}" rel="stylesheet" />
  <link href="{{ asset('fanadesh/css/responsive.css')}}" rel="stylesheet" />

  {{-- smartEDU --}}
    <!-- Bootstrap CSS -->
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('smartEDU/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/versions.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/prettyPhoto.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/colors.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{ asset('smartEDU/secciones.css')}}" />


    <!-- Modernizer for Portfolio -->
    
</head>

<body>
  
<div id="contenedor">
  <nav>
      <ul>
         
          <!-- Primer Menu Desplegable -->
          <li><a href="#">Servicios<i class="down"></i></a>
           <!-- Primer Menu Desplegable -->
          <ul>
              <li><a>Apoyo Escolar</a>
                <ul>
                  <li><a href="#">Inicial</a></li>
                  <li><a href="#">Primaria</a></li>
                  <li><a href="#">Secundaria  </a>
                </ul>
              </li>
              <li><a href="{{ route('preuniversitario') }}">Preuniversitarios</a></li>
              <li><a href="{{ route('universitario') }}">Universitarios</a>
              <li><a href="{{ route('programacion') }}">Programación</a>
              <li><a href="{{ route('computacion') }}">Computación</a>
              <li><a href="{{ route('robotica') }}">Robótica</a>
              {{-- <li><a href="{{ route('practicos') }}">Prácticos</a> --}}
             <!-- Segudo Menu Desplegable -->
              {{-- <ul>
                  <li><a href="#">WhiteBoards</a></li>
                  <li><a href="#">Presentaciones</a></li>
                  <li><a href="#">Otros</a>
                       <!-- Tercer Menu Desplegable -->
                      <ul>
                          <li><a href="#">Stuff</a></li>
                          <li><a href="#">Things</a></li>
                          <li><a href="#">Other Stuff</a></li>
                      </ul>
                  </li>
              </ul> --}}
              </li>
          </ul>
          </li>
          @auth
            <li><a href="{{ route('home') }}"> Sistema </a></li>
          @endauth
          @guest
            <li><a href="{{ route('login') }}">Login </a></li>
          @endguest
      </ul>
  </nav>

  {{-- <p><a target="_blank" href="http://bcndos.com/5-mejores-menus-desplegables-gratis-css/">VER MAS</a></p> --}}
</div>
  {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% seccion encabezado  --}}
    @isset($feriado)
      <div id="date-banner" class="date-banner">
        <h2 id="date-title">{{ $feriado->festividad }}</h2>
        <p id="date-description">Descubre nuestras emocionantes novedades y eventos especiales. ¡No te lo pierdas!</p>
        <a id="whatsapp-link" class="whatsapp-link" href="https://wa.me/123456789" target="_blank">Contactar</a>
      </div>
    @endisset
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% seccion encabezado  --}}

    <!-- Hero section -->
    <div class="container">
      <section class="academic-excellence">
        <div class="container">
            <div class="content-box">
                <h1 class="section-title">Excelencia Académica</h1>
                <p class="section-description">
                    ITE se destaca por su compromiso con una educación de calidad, ofreciendo programas diseñados para potenciar las habilidades de cada estudiante.
                </p>
                <div class="button-container">
                    <a href="sign-up.html" class="cta-button">Comienza ahora</a>
                </div>
            </div>
            <div class="image-box">
                <img src="{{asset('fanadesh/images/hero.png')}}" alt="ITE" class="hero-image">
            </div>
        </div>
      </section>
      <section class="academic-excellence">
        <div class="container">
            <div class="image-box">
              <img src="{{asset('fanadesh/images/hero.png')}}" alt="ITE" class="hero-image">
            </div>

            <div class="content-box">
                <h1 class="section-title">Excelencia Académica</h1>
                <p class="section-description">
                    ITE se destaca por su compromiso con una educación de calidad, ofreciendo programas diseñados para potenciar las habilidades de cada estudiante.
                </p>
                <div class="button-container">
                    <a href="sign-up.html" class="cta-button">Comienza ahora</a>
                </div>
            </div>
            
        </div>
      </section>
    
    </div>

    
	<div id="teachers" class="section wb">
        <div class="container">
            <div class="row">
				@foreach ($docentes as $docente)
					<div class="col-lg-3 col-md-6 col-12">
						<div class="our-team">
							<div class="team-img">
								{{-- <img src="{{  asset('smartEDU/images/team-01.png')}}"> --}}
                <img src="{{URL::to('/')}}/storage/{{$docente->persona->foto}}" alt="" />
								<div class="social">
									<ul>
										<li><a href="#" class="fa fa-facebook"></a></li>
										<li><a href="#" class="fa fa-twitter"></a></li>
										<li><a href="#" class="fa fa-linkedin"></a></li>
										<li><a href="#" class="fa fa-skype"></a></li>
									</ul>
								</div>
							</div>
							<div class="team-content">
								<h3 class="title">{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h3>
								<span class="post">{{ $docente->perfil}}</span>
							</div>
						</div>
					</div>
				@endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->	

  </div>

  <!-- Footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2024 Todos los derechos reservados por
      <a href="https://www.ite.com">ITE</a>
    </p>
  </section>
  <!-- End Footer section -->

  <script type="text/javascript" src="{{ asset('fanadesh/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('fanadesh/js/bootstrap.js')}}"></script>

  <script type="text/javascript" src="{{ asset('smartEDU/js/all.js')}}"></script>
  <script type="text/javascript" src="{{ asset('smartEDU/js/custom.js')}}"></script>

  <script src="{{ asset('smartEDU/js/modernizer.js')}}"></script>
  <script src="{{ asset('smartEDU/js/secction.js')}}"></script>
  
</body>

</html>
