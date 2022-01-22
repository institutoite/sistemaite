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
                            <a href="index-2.html" class="nav-link js-scroll-trigger">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link js-scroll-trigger">
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

@yield('banner')


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
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-1">
                   <div class="category-icon">
                        <i class="bi bi-target-arrow"></i>
                   </div>
                    <h4><a href="#">Guardería</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-2">
                    <div class="category-icon">
                        <i class="bi bi-pencil"></i>
                    </div>
                    <h4><a href="#">Lectura y escritura</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-3">
                    <div class="category-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h4><a href="#">Dactilografia</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-4">
                    <div class="category-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4><a href="#">Lenguaje</a></h4>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-5">
                    <div class="category-icon">
                        <i class="bi bi-calculation"></i>
                    </div>
                    <h4><a href="#">Matemática</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-6">
                   <div class="category-icon">
                        <i class="bi bi-compass-math"></i>
                   </div>
                    <h4><a href="#">Fisica</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-7">
                    <div class="category-icon">
                        <i class="bi bi-nuclear-circle"></i>
                    </div>
                    <h4><a href="#">Química</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-8">
                    <div class="category-icon">
                        <i class="bi bi-layer"></i>
                    </div>
                    <h4><a href="#">Inglés</a></h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="course-category style-9">
                    <div class="category-icon">
                        <i class="bi bi-slider-doc"></i>
                    </div>
                    <h4><a href="#">PSA</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-10">
                    <div class="category-icon">
                        <i class="bi bi-slider-doc"></i>
                    </div>
                    <h4><a href="#">CUP</a></h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-11">
                   <div class="category-icon">
                        <i class="bi bi-shield"></i>
                   </div>
                    <h4><a href="#">Oratoria</a></h4>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-6">
                <div class="course-category style-12">
                    <div class="category-icon">
                        <i class="bi bi-bulb"></i>
                    </div>
                    <h4><a href="#">Diseño gráfico</a></h4>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mt-5">
                    <div class="course-btn mt-4"><a href="#" class="btn btn-main"><i class="fa fa-grip-horizontal mr-2"></i>Ver todos los cursos</a></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--<section class="process section-padding mt-0">
    <div class="process-img"></div>
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
              
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading"></span>
                    <h3>Nuestros horarios</h3>
                </div>

                <div class="process-block">
                    <i class="bi bi-calendar"></i>
                    <div class="process-desc no-divider">
                        <h4>Horario Super Especial</h4>
                        <p>Lunes a Viernes 5.00 am - 6:00 am</p>
                    </div>
                </div>

                <div class="process-block">
                    <i class="bi bi-calendar"></i>
                    <div class="process-desc no-divider">
                        <h4>Turno Mañana</h4>
                        <p>Lunes a Sábado 7:30 - 12:00</p>
                    </div>
                </div>

                <div class="process-block ">
                    <i class="bi bi-calendar"></i>
                    <div class="process-desc no-divider">
                        <h4>Turno Tarde</h4>
                        <p>Lunes a Viernes 2:00pm - 6:30pm</p>
                    </div>
                </div>
            
                <div class="process-block ">
                    <i class="bi bi-calendar"></i>
                    <div class="process-desc no-divider">
                        <h4>Turno Noche</h4>
                        <p>Lu Ma Ju Vi 6:30pm - 21:00pm</p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section> -->
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

                     {{-- <a href="#" class="video-icon"><i class="fa fa-play"></i></a> --}}
                
                    {{-- <div class="video-block">
                        <img src="assets/images/bg/office01.jpg" alt="" class="img-fluid">
                        <a href="#" class="video-icon"><i class="fa fa-play"></i></a>
                    </div> --}}

                
            </div>
             
        </div>
    </div>
    <!--course-->
</section>
<!--course section end--> 
<section class="about-section section-padding">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
               <div class="about-img">
                   <img src="assets/images/bg/2-2.png" alt="" class="img-fluid">
               </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading"></span>
                    <h3>Nuestros horarios</h3>
                </div>

                <div class="about-content">
                    
                    @yield('schedule')

                    {{-- <a href="#" class="btn btn-main-2"><i class="fa fa-check mr-2"></i>Elige tu horario</a> --}}
                </div>
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
                </div>
            </div>
        </div>


        <div class="row">
           @yield('docente') 
        </div>
    </div>
</section>
{{-- <section class="testimonial section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading">Testimonios</span>
                    <h3>Lo que dicen nuestros estudiantes</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-1.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>

                     <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-2.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>


                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-3.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section> --}}
{{-- <section class="section-padding offer-course">
    <div class="container">
        <div class="row ">
            <div class="col-lg-4">
                <div class="section-heading">
                    <span class="subheading">50% Discount offer</span>
                    <h3>Hurry Up to get <span>50% off</span> courses</h3>
                    <p>Eum eligendi nihil labore nemo alias eos sapiente perferendis iste molestias explicabo.tempor incididunt ut labore et dolore magna aliqua tempor incididunt.  </p>
                    <a href="#" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-label">Beginner</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        <div class="course-price ">$50</div>   
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
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>    
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>
                        <div class="course-price ">$80 <span class="del">$120</span></div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Blog News</span>
                    <h3>Latest Blog News</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

       
        <div class="row">               
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="assets/images/blog/news-1.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Powerful tips to grow business manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="assets/images/blog/news-2.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Powerful tips to grow effective manner</a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <img src="assets/images/blog/news-3.jpg" alt="" class="img-fluid">
                    <div class="blog-content">
                        <div class="entry-meta">
                            <span><i class="fa fa-calendar-alt"></i>May 19, 2020</span>
                            <span><i class="fa fa-comments"></i>1 comment</span>
                        </div>
    
                        <h2><a href="#">Python may be you completed online </a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="#" class="btn btn-main btn-small"><i class="fa fa-plus-circle mr-2"></i>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading"></span>
                    <h3>Únete a nuestra comunidad de estudiantes</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Correo electrónico">
                        <a href="#" class="btn btn-main">Subscribete<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> --}}

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
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendors/jquery.isotope.js"></script>
    <script src="assets/vendors/imagesloaded.js"></script>
    <!--  Owlk Carousel-->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>


  </body>
  </html>
   