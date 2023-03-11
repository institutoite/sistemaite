<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ite</title>
<!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">

<!-- Revolution Slider -->
<link href="{{asset('assetshome/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="{{asset('assetshome/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="{{asset('assetshome/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

<link href="{{asset('assetshome/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assetshome/css/responsive.css')}}" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
{{-- <link href="{{asset('assetshome/fonts/GlyphaLTStd-Bold')}}" rel="stylesheet"> --}}


<link rel="shortcut icon" href="{{asset('assetshome/images/favicon.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('assetshome/images/favicon.png')}}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</head>

<body class="hidden-bar-wrapper">

  <div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="loader-wrap">
      <div class="preloader">
        <div class="preloader-close">x</div>
        <div id="handle-preloader" class="handle-preloader">
          <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
              <span data-text-preloader="i" class="letters-loading">
                i
              </span>
              <span data-text-preloader="t" class="letters-loading">
                t
              </span>
              <span data-text-preloader="e" class="letters-loading">
                e
              </span>
            </div>
          </div>  
        </div>
      </div>
    </div>
    <!-- Preloader End -->
     
    <!-- Main Header / Hedare Style Two -->
    <header class="main-header header-style-two">
        
      <!-- Header Top -->
        <div class="header-top-two">
          <div class="auto-container">
            <div class="inner-container clearfix">
              <!-- Top Left -->
              <div class="top-left clearfix">
                <div class="text">Apoyo escolar 2023. <a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información">Contactanos</a></div>
              </div>
              
              <!-- Top Right -->
              <div class="top-right pull-right clearfix">
                <div class="location">Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</div>
              </div>
            </div>
          </div>
        </div>
      
      <!-- Header Lower -->
      @include('home.fronted.header')
      <!-- End Header Lower -->

      <!-- Sticky Header  -->
      <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ url('/') }}"><img src="{{asset('assetshome/images/logo.png')}}" alt="" title=""></a>
            </div>
            <!--Right Col-->
            <div class="pull-right">
    
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
                <!-- Main Menu End-->
                
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
                
              </div>
          </div>
      </div>
      <!-- End Sticky Menu -->
      
      <!-- Mobile Menu  -->
      <div class="mobile-menu">
          <div class="menu-backdrop"></div>
          <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
          
          <nav class="menu-box">
              <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{asset('assetshome/images/logo.png')}}" alt="" title=""></a></div>
              <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
          </nav>
      </div>
      <!-- End Mobile Menu -->
    
    </header>
    <!-- End Main Header -->
        
    <!-- Page Title -->
      {{-- <section class="page-title" style="background-image: url(assets/images/background/1.jpg)"> --}}
      <section class="page-title" style="background-image: url('{{ asset('assetshome/images/background/fotocopia.jpg')}}');">
        <div class="auto-container">
          <h2></h2>
          <ul class="bread-crumb clearfix">
            {{-- <li><a href="{{ url('/') }}">Inicio</a></li>
            <li>Primaria</li> --}}
          </ul>
        </div>
      </section>
      <!--End Page Title-->
    
    <!-- Agency Section -->
    <section class="agency-section">
      <div class="auto-container">
        <div class="row clearfix">
        
          <!-- Title Column -->
          <div class="content-column col-lg-7 col-md-12 col-sm-12">
            <div class="inner-column">
              <!-- Sec Title -->
              <div class="sec-title">
                <div class="title">Fotocopia e impresión</div>
                <h2>¡Al mismo <span>precio</span> que en la Universidad!</h2>
                <div class="text">Ya no vayas a la universidad, fotocopias e impresiones desde 9 centavos.</div>
              </div>
              <div class="row mt-none-30">
                <div class="col-lg-6">
                  <div class="experiance_item mt-30">
                    {{-- <div class="icon">
                      <img src="{{asset('')}}" alt="">
                    </div> --}}
                    <div class="content">
                      <h4>También hacemos:</h4>
                      {{-- <p>Sin Materiales</p> --}}
                      <ul class="experiance_list mt-30">
                        <li> Anillado </li>
                        <li> Plastificado </li>
                        <li> Transcripciones </li>
                        <li> Escaner </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="experiance_list mt-30">
                    <li> </li>
                  </ul>
                  <div class="button-box">
                    <a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información de fotocopia" class="theme-btn btn-style-seven"><span class="txt">Contactanos <i class="flaticon-next-2"></i></span></a>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="counter_wrap mt-30">
                    <h1><span class="number">09 ctvs.<span class="plus">+</span></span> <span class="text"></span></h1>
                  </div>
                  {{-- <div class="experiance_item mt-30">
                    <div class="icon">
                      <img src="{{asset('assetshome/images/icons/a_02.png')}}" alt="">
                    </div>
                    <div class="content">
                      <h4>Mensual</h4>
                      <p>Sin Materiales</p>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
          
          <!-- Blocks Column -->

          <div class="sidebar-side col-lg-5 col-md-12 col-sm-12">
            <aside class="sidebar sticky-top">
              
              <!-- Sidebar Widget / Search Widget -->
              <div class="sidebar-widget search-widget timing-widget">
                <div class="widget-content">
                  <!-- Sidebar Title -->
                  <div class="sidebar-title">
                    <h3>HORARIOS</h3>
                  </div>
                  
                  <ul class="time-list">
                    <li>Lunes a Viernes <span>7:30 - 21:00</span></li>
                    <li>Sábados <span>7:30 - 17:00</span></li>
                  </ul>
                  
                </div>
              </div>
              <!-- End Sidebar Widget / Search Widget -->
              
              <!-- Sidebar Widget / Social Widget -->
              <div class="sidebar-widget sidebar-social-widget">
                <div class="widget-content">
                  <!-- Sidebar Title -->
                  <div class="sidebar-title">
                    <h3>Siguenos</h3>
                  </div>
                  
                  <!-- Social Box -->
                  <ul class="social-box">
                    {{-- <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li> --}}
                    <li><a href="https://www.facebook.com/" class="fa fa-facebook"></a></li>
                    {{-- <li><a href="https://www.instagram.com/" class="fa fa-instagram"></a></li> --}}
                    <li><a href="https://youtube.com/" class="fa fa-youtube"></a></li>
                  </ul>
                  
                </div>
              </div>
              
            </aside>
          </div>

        </div>
      </div>
    </section>
    <!-- End Agency Section -->

    
    
   <!-- Main Footer / Style Two -->
   <footer class="main-footer">
		<div class="pattern-layer-six" style="background-image:url(assets/images/icons/vector-24.png)"></div>
		<div class="pattern-layer-seven" style="background-image:url(assets/images/icons/vector-25.png)"></div>
		<div class="auto-container">

		<!-- Upper Box -->
		<div class="upper-box">
			<div class="row clearfix">
			
				<!-- Title Column -->
				<div class="title-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>¡Descubre el poder de la <span>inteligencia artificial</span> con nuestro Asistente ITE!</h2>
					</div>
				</div>
				
				<!-- Button Column -->
				<div class="button-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column text-center text-md-end">
						<div class="button-box">
							<a href="https://asistente.ite.com.bo/" class="theme-btn btn-style-eight"><span class="txt">Ingresar<i class="flaticon-next-2"></i></span></a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- End Upper Box -->
			
        	<!-- Widgets Section -->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!-- Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
							
              <!-- Footer Column -->
              <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                <div class="footer-widget about-widget">
									<div class="logo">
										{{-- <a href="index.html"><img src="assets/images/logo-4.png" alt="" title=""></a> --}}
									</div>
									<div class="text">ITE es un centro educativo que brinda clases de nivelación en diferentes materias y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.</div>
									<div class="opening">
										<span class="icon far fa-clock"></span>
										<strong>Horarios</strong>
										<div class="time">Lunes - Viernes 7:30 - 21:00 <br> Sabados 7:30 - 17:00 </div>
									</div>
								</div>
							</div>
							
							<!-- Footer Column -->
              <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                <div class="footer-widget links-widget">
									<h3>Informaciones</h3>
									<ul class="nav-list">
										<li><a href="{{ route('about') }}">¿Quienes Somos?</a></li>
										<li><a href="{{ route('about') }}">Misión</a></li>
										<li><a href="{{ route('about') }}">Visión</a></li>
										<li><a href="{{ route('preguntasfrecuentes') }}">Preguntas Frecuentes</a></li>
										<li><a href="{{ route('termscondition') }}">Términos & condiciones</a></li>
										<li><a href="{{ route('privacy') }}">Politica de privacidad</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
						<div class="row clearfix">
						
							<!-- Footer Column -->
              <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                <div class="footer-widget links-widget style-two">
									<h3>Niveles</h3>
									<ul class="nav-list">
										<li><a href="{{ route('guarderia') }}">Guardería</a></li>
										<li><a href="{{ route('inicial') }}">Inicial</a></li>
                    <li><a href="{{ route('primaria') }}">Primaria</a></li>
										<li><a href="{{ route('secundaria') }}">Secundaria</a></li>
										<li><a href="{{ route('preuniversitario') }}">Pre-Universitarios</a></li>
										<li><a href="{{ route('universitario') }}">Universitarios</a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                <div class="footer-column col-lg-8 col-md-6 col-sm-12">
                    <div class="footer-widget social-widget">
									<h3>Contacto</h3>
									<!-- Footer Column -->
									<ul class="footer_info">
										<li><i class="fa fa-map-marker-alt"></i> Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</li>
										<li><i class="fa fa-phone-alt"></i> +59171039910</li>
										<li><i class="fa fa-phone-alt"></i> +59175553338</li>
										<li><i class="fa fa-phone-alt"></i> +59171324941</li>
										<li><i class="icon fas fa-envelope"></i> info@ite.com.bo</li>
									</ul>
								</div>
							</div>
						
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Footer Bootom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="row clearfix align-items-center">
				
					<!-- Copright Column -->
					<div class="copyright-column col-lg-6 col-md-6 col-sm-12">
						<div class="copyright">Copyright &copy; 2023. All Rights Reserved.</div>
					</div>
					
					<!-- Social Column -->
					<div class="social-column col-lg-6 col-md-6 col-sm-12">
						<div class="inner-column text-center text-md-end">
							<ul class="social-box">
								<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
								<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
								<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
								<li><a href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ" class="fa fa-youtube"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Main Footer -->
    
  </div>

<!-- End PageWrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('assetshome/js/jquery.js')}}"></script>
<script src="{{asset('assetshome/js/popper.min.js')}}"></script>
<script src="{{asset('assetshome/js/bootstrap.min.js')}}"></script>

<!-- Revolution Slider -->
<script src="{{asset('assetshome/plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('assetshome/plugins/revolution/js/main-slider-script.js')}}"></script>
<!-- For Js Library -->

<script src="{{asset('assetshome/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assetshome/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assetshome/js/appear.js')}}"></script>
<script src="{{asset('assetshome/js/parallax.min.js')}}"></script>
<script src="{{asset('assetshome/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('assetshome/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('assetshome/js/owl.js')}}"></script>
<script src="{{asset('assetshome/js/wow.js')}}"></script>
<script src="{{asset('assetshome/js/validate.js')}}"></script>
<script src="{{asset('assetshome/js/nav-tool.js')}}"></script>
<script src="{{asset('assetshome/js/jquery-ui.js')}}"></script>
<script src="{{asset('assetshome/js/script.js')}}"></script>

</body>
</html>