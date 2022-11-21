<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Site Title -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.css')}}">
  {{-- admin lte --}}
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.min.css')}}">

  {{-- fin adminlte --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="assets/css/responsive.css">

  <link href="assets/images/faviconite.ico" rel="shortcut icon">

  {{--  css de booth --}}
{{-- <link href="{{asset('dist/css/booth/style.css')}}" rel="stylesheet" type="text/css" media="all" /> --}}
<link href="{{asset('dist/css/booth/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<link href="//fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">


  <title>Educabol</title>
  <link rel="stylesheet" href="{{asset('fronted/assets/css/plugins/fontawesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('fronted/assets/css/plugins/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('fronted/assets/css/plugins/slick.css')}}">
  <link rel="stylesheet" href="{{asset('fronted/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
  
</head>

<body class="cs-dark">

  <div class="cs-preloader cs-center">
    <div class="cs-preloader_in"></div>
    <span>Cargando</span>
  </div>

  <!-- Start Header Section -->
  <header class="cs-site_header cs-style1 cs-sticky-header cs-white_bg">
    <div class="cs-main_header">
      <div class="container-fluid">
        <div class="cs-main_header_in">
          <div class="cs-main_header_left">
            <a class="cs-site_branding" href="index.html"><img src="{{asset('fronted/assets/img/logoite.png')}}" alt="Logo"></a>
          </div>
          <div class="cs-main_header_right">
            <div class="cs-search_wrap">
            </div>
            <div class="cs-nav_wrap">
              <div class="cs-nav_out">
                <div class="cs-nav_in">
                  <div class="cs-nav">
                    <ul class="cs-nav_list">
                        <li><a href="{{ url('/') }}" class="cs-hero_btn text-secondary cs-style2 cs-color2">Inicio</a></li>
                        <li><a href="{{ route('about') }}" class="cs-hero_btn text-secondary cs-style2 cs-color2">Acerca de Nosotros</a></li>
                        <li><a href="{{ route('contact') }}" class="cs-hero_btn text-secondary cs-style2 cs-color2">Contactenos</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="cs-header_btns_wrap">
              <div class="cs-header_btns">
                <div class="cs-header_icon_btn cs-center cs-mobile_search_toggle">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>  
                </div>
                <div class="cs-toggle_box cs-profile_box">
                  <div class="cs-toggle_btn cs-header_icon_btn cs-center">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.5 15.75V14.25C15.5 13.4544 15.1839 12.6913 14.6213 12.1287C14.0587 11.5661 13.2956 11.25 12.5 11.25H6.5C5.70435 11.25 4.94129 11.5661 4.37868 12.1287C3.81607 12.6913 3.5 13.4544 3.5 14.25V15.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M9.5 8.25C11.1569 8.25 12.5 6.90685 12.5 5.25C12.5 3.59315 11.1569 2.25 9.5 2.25C7.84315 2.25 6.5 3.59315 6.5 5.25C6.5 6.90685 7.84315 8.25 9.5 8.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                  </div>
                  <div class="cs-toggle_body">
                    @auth
                      <div class="cs-user_info text-center">
                        <h3><a href="{{ route('home')}}"> <img class="perfil img-thumbnail" src="{{URL::to('/')."/storage/".Auth::user()->foto}}" alt=""> </a> </h3>
                      </div>
                      <div class="text-center">
                        <a class="btn form-inline btn-outline-primary boton-line-turqueza" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        
                      </div>
                    @else
                      <div class="cs-user_info">
                        <h3 class="cs-user_balance">Ingresar al sistema</h3>
                      </div>
                      
                      <div class="text-center">
                        <a class="cs-btn cs-style1" href="{{ route('login') }}" ><span>Iniciar Sesion</span></a>
                      </div>
                    @endauth
              
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  <!-- Start Footer -->
  <footer class="cs-footer cs-style1">
    <div class="cs-footer_bg"></div>
    <div class="cs-height_100 cs-height_lg_60"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-4 col-sm-4">
              <div class="cs-footer_widget">
                <h2 class="cs-widget_title">Informaciones</h2>
                <ul class="cs-widget_nav">
                  <li><a href="explore-1.html">¿Quienes Somos?</a></li>
                  <li><a href="explore-2.html">Preguntas frecuentes</a></li>
                </ul>
              </div>
            </div><!-- .col -->
            <div class="col-lg-4 col-sm-4">
              <div class="cs-footer_widget">
                <h2 class="cs-widget_title">Niveles</h2>
                <ul class="cs-widget_nav">
                  <li><a href="#">Guardería</a></li>
                  <li><a href="#">Primaria</a></li>
                  <li><a href="#">Secundaria</a></li>
                  <li><a href="#">Pre-Universitarios</a></li>
                  <li><a href="#">Universidad</a></li>
                  <li><a href="#">Profesionales</a></li>
                </ul>
              </div>
            </div><!-- .col -->
            <div class="col-lg-4 col-sm-4">
              <div class="cs-footer_widget">
                <h2 class="cs-widget_title">Contacto</h2>
                <ul class="cs-widget_nav">
                  <li><a href="blog.html">+591 71039910</a></li>
                  <li><a href="how-it-works.html">+591 71324941</a></li>
                  <li><a href="about.html">+591 75553338</a></li>
                  <li><a href="contact.html">3-219050</a></li>
                  <li><a href="faq.html">info@ite.com.bo</a></li>
                </ul>
              </div>
            </div><!-- .col -->
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="cs-footer_widget">
            <h2 class="cs-widget_title">Nuestras Redes Sociales</h2>
            {{-- <form class="cs-footer_newsletter">
              <input type="text" placeholder="Enter Your Email" class="cs-newsletter_input">
              <button class="cs-newsletter_btn">
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24.7014 9.03523C25.0919 8.64471 25.0919 8.01154 24.7014 7.62102L18.3374 1.25706C17.9469 0.866533 17.3137 0.866533 16.9232 1.25706C16.5327 1.64758 16.5327 2.28075 16.9232 2.67127L22.5801 8.32812L16.9232 13.985C16.5327 14.3755 16.5327 15.0087 16.9232 15.3992C17.3137 15.7897 17.9469 15.7897 18.3374 15.3992L24.7014 9.03523ZM0.806641 9.32812H23.9943V7.32812H0.806641V9.32812Z" fill="white"/>
                </svg>                  
              </button>
            </form> --}}
            <div class="cs-footer_social_btns">
              <a target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Visite su pagina. Quiero mas información"><i class="fab fa-whatsapp fa-fw"></i></a>
              <a target="_blank" href="https://msng.link/o/?@institutoite=tg"><i class="fab fa-telegram fa-fw"></i></a>
              <a target="_blank" href="https://www.facebook.com/educabolite"><i class="fab fa-facebook-f fa-fw"></i></a>
              <a target="_blank" href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ"><i class="fab fa-youtube fa-fw"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs-height_60 cs-height_lg_20"></div>
    <div class="cs-footer_bottom">
      <div class="container">
        <div class="cs-footer_separetor"></div>
        <div class="cs-footer_bottom_in">
          <div class="cs-copyright">Copyright 2022. Desarrollado por David Eduardo Flores.</div>
          <ul class="cs-footer_menu">
            <li><a href="{{ route('privacy') }}">Privacidad</a></li>
            <li><a href="{{ route('termscondition') }}">Términos y Condiciones</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

 

 
  <!-- End Modal -->

  <!-- Start Video Popup -->
  <div class="cs-video_popup">
    <div class="cs-video_popup_overlay"></div>
    <div class="cs-video_popup_content">
      <div class="cs-video_popup_layer"></div>
      <div class="cs-video_popup_container">
        <div class="cs-video_popup_align">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="about:blank"></iframe>
          </div>
        </div>
        <div class="cs-video_popup_close"></div>
      </div>
    </div>
  </div>
  <!-- End Video Popup -->

  <!-- Script -->
  <script src="{{asset('fronted/assets/js/plugins/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('fronted/assets/js/plugins/isotope.pkg.min.js')}}"></script>
  <script src="{{asset('fronted/assets/js/plugins/jquery.slick.min.js')}}"></script>
  <script src="{{asset('fronted/assets/js/main.js')}}"></script>

   {{-- js de booth --}}
    
	<script src="{{asset('dist/js/booth/owl.carousel.js')}}"></script>
    
    {{-- <script src="{{asset('assets/vendors/jquery/jquery.js')}}"></script> --}}
    <!-- Bootstrap 4.5 -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('assets/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery.isotope.js')}}"></script>
    {{-- <script src="{{asset('assets/vendors/imagesloaded.js')}}"></script> --}}
    <!--  Owlk Carousel-->
    <script src="{{asset('assets/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('vistas/layout/home/home.js')}}"></script>
    
 
	<script>

	</script>
</body>
</html>
