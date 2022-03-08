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
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.css')}}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bicon/css/bicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/themify/themify-icons.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/animate-css/animate.css')}}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce-layouts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce-small-screen.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce.css')}}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl/assets/owl.theme.default.min.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link href="assets/images/faviconite.ico" rel="shortcut icon">
</head>

<body id="top-header">




    <header>
        <!--<div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <ul class="header-contact">
                            <li>
                               Ite te desea una Feliz navidad y un prospero año nuevo
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>-->

        <!-- Main Menu Start -->

        <div class="site-navigation main_menu " id="mainmenu-area">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('assets/images/logoite.png')}}" alt="Ite" class="img-fluid">
                    </a>

                    <!-- Toggler -->

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                        aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a href="{{ route('login') }}" class="btn btn-main btn-small"><i
                                class="fa fa-sign-in-alt mr-2"></i>
                            Iniciar Sesion
                        </a>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


    <section class="page-wrapper edutim-course-single course-single-style-3">
        <div class="course-single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="course-single-header white-text">
                            <span class="subheading"></span>
                            <h3 class="single-course-title">Operador de Computadoras</h3>
                            <p>El curso  de capacitación de Operador en Computadoras forma al estudiante   con conocimientos significativos  en el dominio  de  uso de paquetes de Microsoft Office, para generar un  óptimo desempeño en el área de ofimática en cualquier ámbito laboral</p>
                            {{-- <div class="d-flex align-items-center ">
                                <div class="single-top-meta">
                                    <i class="fa fa-user"></i><span> 3450 Students Enrolled</span>
                                </div>
                                <div class="single-top-meta">
                                    <div class="rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <span>5.00 (500 ratings)</span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <nav class="course-single-tabs">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Aprendizaje</a>
                                <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Requisitos</a>
                            <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Temario</a>
                            
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="single-course-details ">
                                <div class="course-widget course-info">
                                    <h4 class="course-title">Lo que aprenderás</h4>
                                    <ul>
                                        @foreach ($metas as $meta)
                                            <li>
                                                <i class="fa fa-check"></i>
                                                {{$meta->nombre}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                            <div class="single-course-details ">
                                <div class="course-widget course-info">
                                    <h4 class="course-title">Requisitos</h4>
                                    <ul>
                                        @foreach ($requisitos as $requisito)
                                            <li>
                                                <i class="fa fa-check"></i>
                                                {{$requisito->nombre}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                            <!--  Course Topics -->
                            <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                                <div class="edutim-course-topics-header d-lg-flex justify-content-between">
                                    <div class="edutim-course-topics-header-left">
                                        <h4 class="course-title">Temario</h4>
                                    </div>
                                    {{-- <div class="edutim-course-topics-header-right">
                                        <span> Total learning: <strong>14 Lessons</strong></span>
                                        <span> Time: <strong>13h 20m 20s</strong> </span>
                                    </div> --}}
                                </div>

                                <div class="edutim-course-topics-contents">
                                    <div class="edutim-course-topic ">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0">
                                                        <button
                                                            class="btn-block text-left collapsed curriculmn-title-btn"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            <h4 class="curriculmn-title"> Introducción</h4>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordionExample">
                                                    <div class="course-lessons">
                                                        <div class="single-course-lesson">
                                                            <div class="course-topic-lesson">
                                                                <i class="fab fa-file"></i>
                                                                <span>Introducción al curso</span>
                                                            </div>
                                                        </div>
                                                        <div class="single-course-lesson">
                                                            <div class="course-topic-lesson">
                                                                <i class="fab fa-file"></i>
                                                                <span>funcionamiento de la computadora</span>
                                                            </div>
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
                        
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar">
                        <div class="course-single-thumb">
                            <img src="{{asset('assets/images/course/course14.jpg')}}" alt="" class="img-fluid w-100">

                            <div class="course-price-wrapper">
                                <div class="course-price">
                                    <h4>Precio: <span>Bs.850</span> </h4>
                                </div>
                                <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Contactanos</a></div>
                            </div>
                        </div>

                        <div class="course-widget course-details-info">
                            <h4 class="course-title">Este curso incluye:</h4>
                            <ul>
                                <li>
                                    <div class="">
                                        <span><i class="bi bi-flag"></i>Carga Horaria :</span>

                                    </div>
                                </li>
                                <li>
                                    <div class="">
                                        <span><i class="bi bi-paper"></i>Lecciones :</span>

                                    </div>
                                </li>

                                <li>
                                    <div class="">
                                        <span><i class="bi bi-madel"></i>Certificado :</span>
                                        Si
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="course-widget course-share d-flex justify-content-between align-items-center">
                            <span>Compartir Curso</span>
                            <ul class="social-share list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>

                        {{-- <div class="course-widget">
                            <h4 class="course-title">Tags</h4>
                            <div class="single-course-tags">
                                <a href="#">Web Deisgn</a>
                                <a href="#">Development</a>
                                <a href="#">Html</a>
                                <a href="#">css</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    {{-- <section class="section-padding related-course">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h4>Related Courses You may Like</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                            <span class="course-label">Beginner</span>
                        </div>

                        <div class="course-content">
                            <div class="course-price ">$50</div>

                            <h4><a href="#">Information About UI/UX Design Degree</a></h4>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                                </div>

                                <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                            <span class="course-label">Advanced</span>
                        </div>

                        <div class="course-content">
                            <div class="course-price ">$80 <span class="del">$120</span></div>

                            <h4><a href="#">Photography Crash Course for Photographer</a></h4>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                                </div>

                                <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="assets/images/course/course3.jpg" alt="" class="img-fluid">
                            <span class="course-label">Expert</span>
                        </div>

                        <div class="course-content">
                            <div class="course-price ">$100 <span class="del">$180</span></div>

                            <h4><a href="#">React – The Complete Guide (React Router)</a></h4>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <span>(5.00)</span>
                            </div>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                                </div>

                                <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



   {{--  <section class="cta-2">
        <div class="container">
            <div class="row align-items-center subscribe-section ">
                <div class="col-lg-6">
                    <div class="section-heading white-text">
                        <span class="subheading">Newsletter</span>
                        <h3>Join our community of students</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="subscribe-form">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Email Address">
                            <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 --}}
 
    <section class="footer pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mr-auto col-sm-6 col-md-6">
                    <div class="widget footer-widget mb-5 mb-lg-0">
                        <h5 class="widget-title">Nuestras Redes Sociales</h5>
                        <p class="mt-3"></p>
                        <ul class="list-inline footer-socials">
                            <li class="list-inline-item"><a
                                    href="https://api.whatsapp.com/send?phone=59171039910&text=Tengo una pregunta"><i
                                        class="fab fa-whatsapp"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/institutoeducabol"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"> <a
                                    href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ"><i
                                        class="fab fa-youtube"></i></a></li>
                        </ul>

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
                            <img src="{{asset('assets/images/logoite.png')}}" alt="Ite" class="img-fluid">
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