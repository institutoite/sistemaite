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
          </div><!-- End Mobile Menu -->
    
    </header>
    <!-- End Main Header -->
    
    <!-- Sidebar Cart Item -->
    <div class="xs-sidebar-group info-group">
      <div class="xs-overlay xs-bg-black"></div>
      <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
          <div class="widget-heading">
            <a href="#" class="close-side-widget">
              X
            </a>
          </div>
          <div class="sidebar-textwidget">
            
            <!-- Sidebar Info Content -->
            <div class="sidebar-info-contents">
              <div class="content-inner">
                <div class="logo">
                  <a href="index.html"><img src="assets/images/logo-2.png" alt="" title=""></a>
                </div>
                <div class="content-box">
                  <h5>About Us</h5>
                  <p class="text">The argument in favor of using filler text goes something like this: If you use real content in the Process, anytime you reach a review point you’ll end up reviewing and negotiating the content itself and not the design.</p>
                  <a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
                </div>
                <div class="contact-info">
                  <h5>Contact Info</h5>
                  <ul class="list-style-one">
                    <li><span class="icon fas fa-map-marker"></span>Chicago 12, Melborne City, USA</li>
                    <li><span class="icon fas fa-phone"></span>(111) 111-111-1111</li>
                    <li><span class="icon fas fa-envelope"></span>aginco@gmail.com</li>
                    <li><span class="icon fas fa-clock"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
                  </ul>
                </div>
                <!-- Social Box -->
                <ul class="social-box">
                  <li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
                  <li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
                  <li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
                  <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <!-- END sidebar widget item -->
    
    <!-- Page Title -->
      {{-- <section class="page-title" style="background-image: url(assetshome/images/background/1.jpg)"> --}}
      <section class="page-title" style="background-image: url('{{ asset('assetshome/images/background/inicial.jpg')}}');">
        <div class="auto-container">
          <h2></h2>
          <ul class="bread-crumb clearfix">
            {{-- <li><a href="{{ url('/') }}"></a></li>
            <li></li> --}}
          </ul>
        </div>
      </section>
      <!--End Page Title-->
    
    <!-- About Section / Style Two -->
    
    <!-- End About Section -->
    
    <!-- Reward Section -->
    <section class="reward-section" style="background-image: url(assets/images/background/pattern-16.png)">
      <div class="color-layer"></div>
      <div class="auto-container">
        <div class="row clearfix">
        
          <!-- Content Column -->
          <div class="content-column col-lg-7 col-md-12 col-sm-12">
            <div class="inner-column">
              <!-- Sec Title -->
              <div class="sec-title">
                <div class="title style-two">Horarios y Precios</div>
                {{-- <h2>We Acheived <span>Success</span> <br> Awards & Reward</h2> --}}
                <h2>¿Te gustaría que tu hijo<br> <span>aprenda</span> mientras lo cuidan?</h2>
              </div>
              <!-- Award Box -->
              <div class="award-box">
                <div class="box-inner">
                  <span class="icon flaticon-bar-chart"></span>
                  <h5> Inscribite Hoy!!!</h5>
                  <div class="text">Cuidamos y atendemos a tus hijos mientras les enseñamos</div>
                </div>
              </div>
              <!-- End Award Box -->
              
              <!-- Revenue Box -->
              <h4> Horarios para clases de 1 Hora/Diaria</h5>
              <table class="table table-striped table-hover">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Mañana</th>
                    <th scope="col">Tarde</th>
                    <th scope="col">Noche</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>7:30 - 8:30</td>
                    <td>14:00 - 15:00</td>
                    <td>19:00 - 20:00</td>
                  </tr>
                  <tr>
                    <td>8:00 - 9:00</td>
                    <td>15:00 - 16:00</td>
                    <td>20:00 - 21:00</td>
                  </tr>
                  <tr>
                    <td>9:00 - 10:00</td>
                    <td>16:00 - 17:00</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>10:00 - 11:00</td>
                    <td>17:00 - 18:00</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>11:00 - 12:00</td>
                    <td>18:00 - 19:00</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <!-- End Revenue Box -->

              <!-- Revenue Box -->
              <h4> Horarios para clases de 1:30 Horas/Diaria</h5>
                <table class="table table-striped table-hover">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">Mañana</th>
                      <th scope="col">Tarde</th>
                      <th scope="col">Noche</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>7:30 - 9:00</td>
                      <td>14:00 - 15:30</td>
                      <td>18:30 - 20:00</td>
                    </tr>
                    <tr>
                      <td>9:00 - 10:30</td>
                      <td>15:30 - 17:00</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>10:30 - 12:00</td>
                      <td>17:00 - 18:30</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Revenue Box -->
              
            </div>
          </div>
          
          <!-- Years Column -->
          <div class="years-column col-lg-5 col-md-12 col-sm-12">
            <div class="inner-column">
            
              <!-- Year Block -->
              <div class="year-block">
                <div class="block-inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                  <span class="icon flaticon-notebook"></span>
                  <h3>Aprendizaje efectivo</h3>
                </div>
              </div>
              
              <!-- Year Block -->
              <div class="year-block">
                <div class="block-inner wow fadeInUp" data-wow-delay="150ms" data-wow-duration="1500ms">
                  <span class="icon flaticon-human-brain"></span>
                  <h3>Comprensión Completa </h3>
                </div>
              </div>
              
              <!-- Year Block -->
              {{-- <div class="year-block">
                <div class="block-inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                  <span class="icon flaticon-search-engine"></span>
                  <h3>( 2023 - 2024 )</h3>
                </div>
              </div> --}}
              
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!-- End Reward Section -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
        
        <div class="sidebar-side col-lg-8 col-md-12 col-sm-12">
          <aside class="sidebar sticky-top">

						<!-- Timing Widget -->
						<div class="sidebar-widget timing-widget">
							<div class="widget-content">
								
                {{--%%%%%%%%%%%%%%%%%%%% hora libre inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-secondary text-white text-center">
                    <h3 class="text-white"> HORA LIBRE </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($horalibre as $modalidad)
                        <tr>
                          <td>{{$modalidad->modalidad}}</td>
                          <td>{{$modalidad->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$modalidad->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                
                <hr>

                {{--%%%%%%%%%%%%%%%%%%%% semanal inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-primary text-white text-center">
                    <h3 class="text-white"> SEMANAL </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($semana as $inicial)
                        <tr>
                          <td>{{$inicial->modalidad}}</td>
                          <td>{{$inicial->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$inicial->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                <hr>
                {{--%%%%%%%%%%%%%%%%%%%% quincenal inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-secondary text-white text-center">
                    <h3 class="text-white"> MODALIDADES QUINCENALES </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($quincena as $inicial)
                        <tr>
                          <td>{{$inicial->modalidad}}</td>
                          <td>{{$inicial->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$inicial->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                <hr>
                {{--%%%%%%%%%%%%%%%%%%%% Mensual inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-primary text-white text-center">
                    <h3 class="text-white"> MODALIDADES MENSUALES </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mes as $inicial)
                        <tr>
                          <td>{{$inicial->modalidad}}</td>
                          <td>{{$inicial->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$inicial->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                <hr>
                {{--%%%%%%%%%%%%%%%%%%%% Mensual inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-secondary text-white text-center">
                    <h3 class="text-white"> MODALIDADES BIMESTRALES </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($bimestre as $inicial)
                        <tr>
                          <td>{{$inicial->modalidad}}</td>
                          <td>{{$inicial->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$inicial->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                <hr>
                {{--%%%%%%%%%%%%%%%%%%%% Mensual inicial %%%%%%%%%%%%%%%%%%  --}}
                <div class="card">
                  <div class="card-header bg-primary text-white text-center">
                    <h3 class="text-white"> MODALIDADES TRIMESTRALES </h3>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                      <thead class="text-secondary">
                        <tr>
                          <th scope="col">Modalidad</th>
                          <th scope="col">Horas</th>
                          <th scope="col">Costo</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($trimestre as $inicial)
                        <tr>
                          <td>{{$inicial->modalidad}}</td>
                          <td>{{$inicial->cargahoraria}} Hrs.</td>
                          <td>Bs. {{$inicial->costo}} </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div> 
                <hr>

                <div class="card">
                  <div class="card-header bg-secondary text-white text-center">
                   <h3 class="text-white"> TODAS LAS MODALIDADES </h3>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered table-striped table-hover">
                        <thead class="bg-primary text-white">
                          <tr>
                            <th scope="col">Modalidad</th>
                            <th scope="col">Horas</th>
                            <th scope="col">Costo</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($modalidadesinicial as $modalidad)
                          <tr>
                            <td>{{$modalidad->modalidad}}</td>
                            <td>{{$modalidad->cargahoraria}} Hrs.</td>
                            <td>Bs. {{$modalidad->costo}} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>

							</div>
						</div>
						
						<!-- Gallery Widget -->
						
						
					</aside>
				</div>
				
				<!-- Sidebar Side -->
        <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
          <aside class="sidebar sticky-top">
						
						<!-- Timing Widget -->
						<div class="sidebar-widget timing-widget">
							<div class="widget-content">
								<h3>Horarios</h3>
								<ul class="time-list">
									<li>Lunes a Viernes <span>7:30 - 21:00</span></li>
									<li>Sábados <span>7:30 - 17:00</span></li>
								</ul>
							</div>
						</div>

            <!-- Service Widget -->
						<div class="sidebar-widget service-widget">
							<div class="widget-content">
								<ul class="service-list">
									<li><a href="#">Lectura y Escritura</a></li>
								</ul>
							</div>
						</div>
						
						<!-- Gallery Widget -->
						
						
					</aside>
				</div>
				
        </div>
      </div>
    </div>
    
    <!-- Support Section -->
    <section class="support-section">
      <div class="auto-container">
        <div class="inner-container">
          <div class="row clearfix">
          
            <!-- Social Column -->
            <div class="social-column col-lg-4 col-md-12 col-sm-12">
              <div class="inner-column">
                <h3>Contactanos:</h3>
                <!-- Social Box -->
                <ul class="social-box">
                  <li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook-f"></a></li>
                  <li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
                  <li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
                  <li><a href="hhttps://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ" class="fa fa-youtube"></a></li>
                </ul>
              </div>
            </div>
            
            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
              <div class="inner-column" style="background-image: url(assets/images/background/pattern-12.png)">
                <div class="pattern-layer" style="background-image:url(assets/images/background/pattern-13.png)"></div>
                <div class="play-box">
                  <a href="https://www.youtube.com/watch?v=lFpc19KsYzs" class="lightbox-image play-button"><span class="flaticon-media-play-symbol"><i class="ripple"></i></span></a>
                </div>
                <div class="phone"><span class="icon fa fa-phone"></span>+591 71039910</div>
                <h2>¿Tienes alguna duda?</h2>
                <div class="text">Contactanos a traves de nuestras redes sociales o numeros telefonicos.</div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- End Support Section -->
    
    <!-- Clients Section -->
    <section class="clients-section-two">
      <div class="auto-container">
        <div class="inner-container">
          <div class="carousel-outer">
            <!--Sponsors Slider-->
            
          </div>
        </div>
      </div>
    </section>
    <!-- End Clients Section -->
    
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
										<a href="index.html"><img src="assets/images/logo-4.png" alt="" title=""></a>
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
    
    <!-- Search Popup -->
    <div class="search-popup">
      <button class="close-search style-two"><span class="flaticon-cancel-1"></span></button>
      <button class="close-search"><span class="flaticon-up-arrow"></span></button>
      <form method="post" action="blog.html">
        <div class="form-group">
          <input type="search" name="search-field" value="" placeholder="Search Here" required="">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <!-- End Header Search -->
    
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