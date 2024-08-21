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
  <div class="top_container">
    <!-- Header section starts -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Inicio <span class="sr-only">(actual)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">Acerca de</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="features.html">Características</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pricing.html">Precios</a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="contact.html">Contacto</a>
                </li>
                <li class="nav-item">
					@auth
						<a class="nav-link" href="{{ route('home') }}">Sistema</a>
				  	@else
						<a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
				  	@endauth
					
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Header section ends -->
    


    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% seccion encabezado  --}}
    <div id="info-bar" class="info-bar">
        <h2 id="info-title"></h2>
        <p id="info-message"></p>
        <a id="whatsapp-button" href="#" class="whatsapp-button" target="_blank">Contáctanos en WhatsApp</a>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% seccion encabezado  --}}

    <!-- Hero section -->
    <section class="hero_section">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h1>
            Todo lo que necesitas
            en un solo enlace
          </h1>
          <p>
            Con ITE, centraliza todas tus redes sociales y enlaces importantes en un solo lugar. Ideal para Instagram, TikTok, Twitter, YouTube y más.
          </p>
          <div class="hero_btn-container">
            <a href="sign-up.html" class="call_to-btn btn_white-border">
              Comienza ahora
            </a>
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="{{asset('fanadesh/images/hero.jpg')}}" alt="ITE" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="common_style">

    <!-- Features section -->
    <section class="features_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="features_img-container">
              <img src="{{asset('fanadesh/images/features.png')}}" alt="Características">
            </div>
          </div>
          <div class="col-md-6">
            <div class="features_detail-box">
              <h3>
                Características de ITE
              </h3>
              <p>
                Conecta todas tus redes sociales, agrega tus enlaces favoritos y personaliza tu página de manera fácil y rápida. Diseñado para aumentar tu visibilidad y facilitar la gestión de tus perfiles.
              </p>
              <div class="">
                <a href="features.html" class="call_to-btn btn_white-border">
                  Aprende más
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Features section -->

    <!-- Pricing section -->
    <section class="pricing_section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="pricing_detail-box">
              <h3>
                Planes y Precios
              </h3>
              <p>
                Descubre nuestros planes flexibles para adaptarse a tus necesidades. Ya sea que estés comenzando o busques funcionalidades avanzadas, tenemos una opción para ti.
              </p>
              <div class="">
                <a href="pricing.html" class="call_to-btn btn_white-border">
                  Ver precios
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pricing_img-container">
              <img src="{{asset('fanadesh/images/pricing.png"')}} alt="Precios">
            </div>
          </div>
        </div>
      </div>
    </section>
	
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
