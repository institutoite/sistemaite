<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Instituto Ite">
  
  <meta name="author" content="ite.com.bo">

  <title>Instituto Ite</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.css')}}">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/bicon/css/bicon.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/themify/themify-icons.css')}}">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/redes.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/botones.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/botonTurqueza.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="assets/css/responsive.css">

  <link href="assets/images/faviconite.ico" rel="shortcut icon">

  {{--  css de booth --}}
<link href="{{asset('dist/css/booth/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('dist/css/booth/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<link href="//fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">

</head>
<body id="top-header">

    <header>
        
        <!-- Main Menu Start -->
        
        @yield('banner')
        <div class="site-navigation main_menu " id="mainmenu-area">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="assets/images/logoite.png" alt="Edutim" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="{{ url('/') }}" class="nav-link js-scroll-trigger">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('about') }}" class="nav-link js-scroll-trigger">
                                Acerca de nosotros
                            </a>
                        </li>
                        @auth
                            <li class="nav-item ">
                                <a href="{{ route('home') }}" class="nav-link js-scroll-trigger">
                                    Sistema
                                </a>
                            </li>
                        @endauth
                        
                    </ul>

                    @guest
                        @if (Route::has('login'))
                                <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt mr-2"></i>
                                    <button class="boton-azul">Iniciar sesion</button>
                                </a>
                        @endif
                    @else
                    
                        <a class="btn btn-main btn-small" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                   
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                    @endguest
                   {{-- <!-- <ul class="header-contact-right d-none d-lg-block">
                        <li> <a href="#" class="header-cart"><i class="fa fa-shopping-cart"></i></a></li>
                        <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
                    </ul>!--> --}}
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>

<!-- Messenger plugin del chat Code -->
    <div id="fb-root"></div>

    <!-- Your plugin del chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

   
    
 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->

@yield('header')



<section class="feature">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>¿En que materia deseas optimizarte?</h4>
                        <p>Aprende lo que realmente, necesitas, avanza a tu ritmo de comprensión. </p>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Logra tus objetivos</h4>
                        <p>No sólo clases: Apoyo académico, motivaciones, orientaciones, sobre todo mucha práctica. </p>
                    </div>
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="bi bi-graph-bar"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Descubre tu potencialidad real</h4>
                        <p>Te transformamos a una versión mejorada de ti mismo, para que seas mas productivo. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--course section start-->
    
    <!--course section end-->

    <!--course section start-->
    
    <!--course section end--> 

<section class="section-padding category-section">
    <div class="container">
        @yield('heading')
        
        <div class="row no-gutters">
            
            @foreach ($cursos as $curso)
                <div class="col-lg-3 col-md-6">
                    
                        <div class="course-category" style="background-image: url('{{ Storage::url("{$curso->picture}") }}');">
                        <div class="category-icon">
                                {{-- <i class="bi bi-target-arrow"></i> --}}
                        </div>
                            <h4><a href="#">{{ $curso->name }}</a></h4>
                        </div>
                    
                </div>
            @endforeach
      
        </div>

       
    
    </div>

    </div>
</section>


<!--course section start-->
<section class="section-padding video-section" >
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading text-center center-heading">
                    <span class="subheading"></span>
                    <h3>Video de Presentación</h3>
                </div>
            </div>
        </div>

        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">

                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/fN4OVcOlyxI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
             
        </div>
    </div>
    <!--course-->
</section>

@include('home.programacion')







<section class="page-wrapper edutim-course-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!--  Course Topics -->
                <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                    <div class="single-course-details ">
                        <h4 class="course-title">Nuestros Precios</h4>
                        <p>Los precios son de acuerdo a los niveles. Elija un nivel:</p>
                    </div>

                    <div class="edutim-course-topics-contents">
                        <div class="edutim-course-topic ">
                            <div class="accordion" id="accordionExample">

                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="false" aria-controls="collapseOne">
                                                <h4 class="curriculmn-title"> Guarderia</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons bg-primary">
                                            <div class="single-course-lesson">
                                                @yield('guarderia')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                <h4 class="curriculmn-title"> Inicial</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('inicial')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                <h4 class="curriculmn-title"> Primaria</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('primaria')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <h4 class="curriculmn-title"> Secundaria</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('secundaria')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <h4 class="curriculmn-title"> Pre-Universiratio</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('preuniversitario')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                <h4 class="curriculmn-title"> Instituto</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('instituto')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                <h4 class="curriculmn-title"> Universitario</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('universidad')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingEight">
                                        <h2 class="mb-0">
                                            <button class="btn-block text-left collapsed curriculmn-title-btn"
                                                type="button" data-toggle="collapse" data-target="#collapseEight"
                                                aria-expanded="false" aria-controls="collapseEight">
                                                <h4 class="curriculmn-title"> Profesional</h4>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                        data-parent="#accordionExample">
                                        <div class="course-lessons">
                                            <div class="single-course-lesson">
                                                @yield('profesional')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  COurse Topics End -->
            </div>

            <div class="col-lg-6">
                <h4 class="course-title">Nuestros horarios</h4>

                <div class="about-content">
                    
                    @yield('schedule')

                    {{-- <a href="#" class="btn btn-main-2"><i class="fa fa-check mr-2"></i>Elige tu horario</a> --}}
                </div>
            </div> 
        </div>
    </div>
</section>

<section class="feature-2">
    <div class="container">
        <div class="section-heading center-heading">
            <span class="subheading"></span>
            <h3>Días que no trabajamos</h3>
        </div>
        @yield('feriado')
    </div>
</section>

<section class="feature-2">
    <div class="container">
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('home.redesprincipal')
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('home.formcontacto')
            </div>
        </div>
    </div>
</section>


<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-12">
                <div class="section-heading">
                    <span class="h2">Plataforma educativa Educabol</span>
                    <p class="h5 text-default">¿Te gustaria aprender a tu ritmo desde cualquier dispositivo?</p>
                </div>

                <p class="h5 text-white">Ingresa a nuestra plataforma educativa Educabol para ver todos nuestros cursos online.</p>

                <a href="https://www.educabol.com/"><button class="boton-azul"><i class="fa fa-check mr-2"></i> Ingresar</button> </a>
                
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-grey team-2">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">

                    <h3>Nuestro equipo</h3>
                    {{-- <a class="boton-turqueza"><i class="fa fa-check mr-2"></i>Ingresar</a> --}}
                </div>
            </div>
        </div>


        <div class="row">
           @yield('docente') 
        </div>
        
    </div>
</section>




<section class="footer pt-120">
	<div class="container">
        
		<div class="row">
			<div class="col-lg-2 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Nuestras Redes Sociales</h5>
					{{-- <ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=59171039910&text=Tengo una pregunta"><i class="fab fa-whatsapp"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/institutoeducabol"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"> <a href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ"><i class="fab fa-youtube"></i></a></li>
					</ul> --}}
                    @include('home.redes')
                    
				</div>
			</div>
			
            <div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Informaciones</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="{{ route('about') }}">¿Quienes Somos?</a></li>
						<li><a href="{{ route('questions') }}">Preguntas frecuentes</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Niveles</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">Guardería</a></li>
						<li><a href="#">Primaria</a></li>
						<li><a href="#">Secundaria</a></li>
						<li><a href="#">Pre-Universitarios</a></li>
						<li><a href="#">Universidad</a></li>
                        <li><a href="#">Profesionales</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contacto </h5>
					
					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Telefonos</strong>
								+591 71039910
                                <br>
                                +591 71324941
                                <br>
                                +591 75553338
                                <br>
                                3-219050
							</div>
							
						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Correo electrónico</strong>
								info@ite.com.bo
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Dirección</strong>
								Villa 1 de mayo avenida tres pasos al frente esquina Che Guevara 4710
                                <br> 
                                Santa Cruz de la Sierra, Bolivia
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
						<img src="assets/images/logoite.png" alt="Ite" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<h6>Desarrollado por Instituto ITE</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



   
    
    <!-- Main jQuery -->
    <script src="{{asset('assets/vendors/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('assets/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery.isotope.js')}}"></script>
    <script src="{{asset('assets/vendors/imagesloaded.js')}}"></script>
    <!--  Owlk Carousel-->
    <script src="{{asset('assets/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    
    {{-- js de booth --}}
    <script src="{{asset('dist/js/booth/jquery-1.9.1.min.js')}}"></script> 
	<script src="{{asset('dist/js/booth/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function() { 
			$("#owl-demo").owlCarousel({
				
                autoPlay: 3000, //Set AutoPlay to 3 seconds 
                items : 3,
                itemsDesktop : [640,5],
                itemsDesktopSmall : [414,4]
			});
            
            $.ajax({
                url: 'interests/get',
                type: 'GET',
                success: function(json) {
                    $html="";
                    $html+="<div class='table-responsive text-left'><table class='table table-bordered'><tbody><tr>";
                    k=1;
                    for (let j in json.interests) {
                        if(k % 4 !=0 ){
                            $html+="<td class='p-4'><div class='form-check form-switch'>";
                            $html+="<input class='form-check-input' id="+ json.interests[j].interest +"  name='interests[]' type='checkbox'>";
                            $html+="<label class='form-check-label' for='"+ json.interests[j].interest +"'>"+json.interests[j].interest+"</label>";
                            $html+="</div></td>";
                            console.log("entro al SI "+json.interests[j].interest);
                        }
                        else{
                            console.log("entro al NO "+json.interests[j].interest);
                            $html+="</tr>";
                            $html+="<tr>";
                        }
                        //console.log("TERMINO...");
                        //if(k % 3 ==0 )
                        
                        k++;
                    }
                    $html+="</tbody></table></div>";
                    $("#interests").append($html);
                    //console.log($html);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                   
                }
            });

        
            $("#formulario").submit(function(event) {
                event.preventDefault();
                var token = $("input[name=_token]").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $msg="";
                $("input:checkbox:checked").each(function() {
                    $msg+=$(this).attr('id')+',';
                });

                $("#error").empty();

                console.log("mesg ="+$msg);

                jQuery.ajax({
                   headers:{'X-CSRF-TOKEN':token},
                    url: "comentario/guardar",
                    data:{
                        token:token,
                        nombre:$("#nombre").val(),
                        telefono:$("#telefono").val(),
                        comentario:$("#comentario").val(),
                        interests:$msg,
                    },
                    success: function(data)
                    {

                        console.log(data);

                        if(data.error)
                        $("#error").append("<li class='text-danger'>"+ data.error +"</li>");
                        else{
                            $("#nombre").val("");
                            $("#telefono").val("");
                            $("input:checkbox").each(function() {
                                $(this).attr('checked',false);
                            });
                            $("#error").append("<li class='text-success'>Se envio correctamente tus datos</li>");
                            
                            console.log(data.vector_intereses);
                            contardor=1;
                            $msg="Hola. mi nombre es:%0A*"+data.comentario.nombre+"*%0A y mi telefono es:%0A*"+data.comentario.telefono+"*%0A Requerimiento: %0A*"+data.comentario.comentario+"* %0AVisite su página estoy interesado en los siguientes servicios o productos:%0A";
                            $.each( data.vector_intereses, function( key, value ) {
                                $msg+="*"+contardor+".- "+value +'*%0A';
                                contardor++;
                            });
                            $msg+="%0A Descargar contacto:%0A";
                            $msg+="http://localhost/sistemaite/public/crear/contacto/"+data.comentario.id;
                            $msg+="%0A Link del cliente:%0A";
                            $msg+="https://api.whatsapp.com/send?phone=591"+data.comentario.telefono;
                            $url="https://api.whatsapp.com/send?phone=591"+data.comentario.telefono+"&text="+$msg;
                            let a= document.createElement('a');
                                a.target= '_blank';
                                a.href=$url;
                                a.click();
                        }
                    }
                });
            });

            // $("#enviar").on("click",function(e){
            //     e.preventDefault();
            //     contardor =1;

            //     a

            //     var Nombre =$("#nombre").val();
            //     var Telefono =$("#telefono").val();
            //     $msg="Hola. mi nombre es:%0A*"+Nombre+"*%0A y mi telefono es:%0A*"+Telefono+"* %0AVisite su página estoy interesado en los siguientes servicios o productos:%0A";
            //     $("input:checkbox:checked").each(function() {
            //         $msg+="*"+contardor+".- "+$(this).attr('id')+'*%0A';
            //         contardor++;
            //     });

            //     $url="https://api.whatsapp.com/send?phone=59171324941&text="+$msg;
            //     $url+='Mas información por favor';
            //     let a= document.createElement('a');
            //         a.target= '_blank';
            //         a.href=$url;
            //         a.click();
                
            // });
        
		}); 
	</script> 
	<!-- //js -->
	<!-- popup js --> 
	<script src="{{asset('dist/js/booth/jquery.magnific-popup.js')}}" type="text/javascript"></script>  
	<script src="{{asset('assets/js/botones.js')}}" type="text/javascript"></script> 
	<script src="{{asset('assets/js/botonTurqueza.js')}}" type="text/javascript"></script> 
	<script>
		$(document).ready(function() {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			}); 															
		});
	</script>
    </body>
</html>
   