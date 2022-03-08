<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Instituto Ite">
        
        <meta name="author" content="ite.com.bo">
      
        <title>Instituto Ite</title>
      
        <!-- Mobile Specific Meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap.min css -->
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
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
      
        <link href="assets/images/faviconite.ico" rel="shortcut icon">
    </head>

<body id="top-header">




    <header>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <ul class="header-contact">
                            <li>
                               Banner
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
    
        <!-- Main Menu Start -->
       
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
    
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cursos<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="course-grid.html">
                                       Course Style 1
                                   </a>
                                   <a class="dropdown-item " href="course-grid-2.html">
                                       Course Style 2
                                   </a> 
    
                                   <a class="dropdown-item " href="course-grid-3.html">
                                       Course Style 3
                                   </a> 
                                   <a class="dropdown-item " href="course-grid-4.html">
                                       Course Style 4
                                   </a> 
                                   <a class="dropdown-item " href="course-grid-5.html">
                                       Course Filter
                                   </a>
                                   <a class="dropdown-item " href="course-grid-6.html">
                                       Course List
                                   </a>
                                    <a class="dropdown-item " href="course-single.html">
                                       Course Details Style 1
                                   </a> 
                                   <a class="dropdown-item " href="course-single2.html">
                                       Course Details Style Tab
                                   </a> 
                                   <a class="dropdown-item " href="course-single3.html">
                                       Course Details Style Tab2
                                   </a> 
                                   <a class="dropdown-item " href="course-single4.html">
                                       Course Details Classic
                                   </a> 
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Paginas<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="instructors.html">
                                        Instructor
                                    </a>
                                    <a class="dropdown-item " href="login-registration.html">
                                        Login
                                    </a>
                                    <a class="dropdown-item " href="404.html">
                                        404
                                    </a> 
                                </div>
                            </li>
                        </ul>
    
                        @guest
                            @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="btn btn-main btn-small"><i class="fa fa-sign-in-alt mr-2"></i>
                                        Iniciar Sesion
                                    </a>
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
                            </li>
                        @endguest
                       <!-- <ul class="header-contact-right d-none d-lg-block">
                            <li> <a href="#" class="header-cart"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
                        </ul>-->
                       
                    </div> <!-- / .navbar-collapse -->
                </div> <!-- / .container -->
            </nav>
        </div>
    </header>

    <!--search overlay start-->
    <div class="search-wrap">
        <div class="overlay">
            <form action="" class="search-form">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-9">
                            <h3>Search Your keyword</h3>
                            <input type="text" class="form-control" placeholder="Search..." />
                        </div>
                        <div class="col-md-2 col-3 text-right">
                            <div class="search_toggle toggle-wrap d-inline-block">
                                <img class="search-close" src="assets/images/close.png"
                                    srcset="assets/images/close@2x.png 2x" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--search overlay end-->


    <section class="page-wrapper edutim-course-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="course-sidebar">

                        <div class="course-widget course-details-info">
                            <h4 class="course-title">Acerca de Instituto Ite</h4>
                            <p>Instituto ite es una empresas emergente dedicada a la capacitación académica de estudiantes de todos los niveles desde inicial hasta profesionales. Su misión es potenciar el ecosistema educativo con tecnología unificada que ayude a los educadores y estudiantes a desarrollar todo su potencial, a su manera según su ritmo de comprensión. Instituto ite, ampliamente reconocido en la ciudad de Santa Cruz como una empresa educativa más completo en soluciones educativas, conecta a estudiantes, maestros, administradores y padres, con el objetivo compartido de mejorar los resultados de aprendizaje de los estudiantes. Desde la recepción hasta el salón de clases y el hogar, ayuda a los centros educativos como ser colegios, institutos y universidades. Instituto ite apoya a miles de estudiantes por ahora en todo el país Bolivia próximamente en el mundo habla hispana, además cuenta con experiencia de más de una década en la enseñanza y formación.</p>
                        </div>


                        <div class="course-widget course-metarials">
                            <h4 class="course-title">Nuestra empresa</h4>
                            <p>Instituto ite cuenta con más de 1 años de innovación, comenzando como el primer sistema de información para estudiantes basado en la web, a través de una interfaz de usuario y aplicaciones móviles que cambiaron la industria educativa. Tenemos un historial de liderazgo en la industria de la tecnología educativa y nos complace ofrecer las primeras soluciones unificadas de la industria que rompen las barreras tecnológicas para las escuelas, colegios, institutos y universidades, brindando a los educadores un conjunto completo de herramientas para desbloquear el verdadero potencial de los estudiantes.

                                Nuestro equipo de más de 20 profesionales talentosos respalda con orgullo los productos, los servicios y nuestra compañía educativa.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="footer pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mr-auto col-sm-6 col-md-6">
                    <div class="widget footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title">Nuestras Redes Sociales</h5>
                        <p class="mt-3"></p>
                        <ul class="list-inline footer-socials">
                            <li class="list-inline-item"><a href="https://api.whatsapp.com/send?phone=59171039910&text=Tengo una pregunta"><i class="fab fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/institutoeducabol"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"> <a href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ"><i class="fab fa-youtube"></i></a></li>
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
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 col-md-6">
                    <div class="footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title">Materias</h5>
                        <ul class="list-unstyled footer-links">
                            <li><a href="#">Matemáticas</a></li>
                            <li><a href="#">Física</a></li>
                            <li><a href="#">Química</a></li>
                            <li><a href="#">Lenguaje</a></li>
                            <li><a href="#">Computación</a></li>
                            <li><a href="#">Cálculo</a></li>
                            <li><a href="#">Álgebra</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="footer-widget footer-contact mb-5 mb-lg-0">
                        <h5 class="widget-title">Contacto </h5>
                        
                        <ul class="list-unstyled">
                            <li><i class="bi bi-headphone"></i>
                                <div>
                                    <strong>Telefono</strong>
                                    71039910
                                </div>
                                
                            </li>
                            <li> <i class="bi bi-envelop"></i>
                                <div>
                                    <strong>Correo electrónico</strong>
                                    informaciones.ite@gmail.com
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
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="fixed-btm-top">
        <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
    </div>



    <!-- 
    Essential Scripts
    =====================================-->

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


</body>

</html>