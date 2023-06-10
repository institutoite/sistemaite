<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ite</title>
<!-- Stylesheets -->
{{-- <link href="{{asset('assetshome/css/bootstrap.css')}}" rel="stylesheet"> --}}
<link href="{{asset('dist/css/bootstrap/bootstrap.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">


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
						<div class="text">Apoyo escolar 2023. <a href="contact.html">Contactanos</a></div>
					</div>
					
					<!-- Top Right -->
                    <div class="top-right pull-right clearfix">
						<div class="location">Av. 3 pasos al frente esq. che guevara, Santa Cruz - Bolivia.</div>
						
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
                    <a href="index.html"><img src="assetshome/images/logo.png" alt="" title=""></a>
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
        </div><!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="assetshome/images/logo.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->
	
	<!-- Main Slider -->
	<section class="main-slider-two">
		<div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
			<div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
				<ul>
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1688" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/inglesportada.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/inglesportada.jpg')}}"> 
						
						<div class="color-layer"></div>
						<div class="vector-layer-one" style="background-image: url(assetshome/images/main-slider/vector-6.png)"></div>
						<div class="vector-layer-two" style="background-image: url(assetshome/images/main-slider/vector-7.png)"></div>
						
						<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
							data-paddingbottom="[0,0,0,0]"
							data-paddingleft="[0,0,0,0]"
							data-paddingright="[0,0,0,0]"
							data-paddingtop="[0,0,0,0]"
							data-responsive_offset="on"
							data-type="shape"
							data-height="auto"
							data-whitespace="nowrap"
							data-width="none"
							data-hoffset="['220','15','15','15']"
							data-voffset="['320','0','0','0']"
							data-x="['right','right','right','right']"
							data-y="['bottom','center','bottom','bottom']"
							data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
							style="">
							
						</div>
						
						
						
						<div class="tp-caption" 
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['800','800','800','500']"
						data-whitespace="normal"
						data-hoffset="['15','15','15','15']"
						data-voffset="['50','-30','-10','-10']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<h1></h1>
						</div>
						
						<div class="tp-caption" 
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['1100','800','800','500']"
						data-whitespace="normal"
						data-hoffset="['-470','-280','-360','-440']"
						data-voffset="['-350','-400','-800','-800']"
						data-x="['right','right','right','right']"
						data-y="['bottom','bottom','bottom','bottom']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="play-outer">
								<a href="https://www.youtube.com/watch?v=lFpc19KsYzs&ab_channel=INSTITUTOITE" class="lightbox-image play-box"><span class="fas fa-play"><span class="dott"></span><i class="ripple"></i></span></a>
							</div>
						</div>
						
					</li>
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1689" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/inglesportada.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/inglesportada.jpg')}}">
					
						<div class="color-layer"></div>
						<div class="vector-layer-one" style="background-image: url(assetshome/images/main-slider/vector-6.png)"></div>
						<div class="vector-layer-two" style="background-image: url(assetshome/images/main-slider/vector-7.png)"></div>
						
						<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
							data-paddingbottom="[0,0,0,0]"
							data-paddingleft="[0,0,0,0]"
							data-paddingright="[0,0,0,0]"
							data-paddingtop="[0,0,0,0]"
							data-responsive_offset="on"
							data-type="shape"
							data-height="auto"
							data-whitespace="nowrap"
							data-width="none"
							data-hoffset="['220','15','15','15']"
							data-voffset="['320','0','0','0']"
							data-x="['right','right','right','right']"
							data-y="['bottom','center','bottom','bottom']"
							data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
							style="">
							
						</div>
						
						
						
						<div class="tp-caption" 
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['800','800','800','500']"
						data-whitespace="normal"
						data-hoffset="['15','15','15','15']"
						data-voffset="['50','-30','-10','-10']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<h1></h1>
						</div>
						
						<div class="tp-caption" 
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['1100','800','800','500']"
						data-whitespace="normal"
						data-hoffset="['-470','-280','-360','-440']"
						data-voffset="['-350','-400','-800','-800']"
						data-x="['right','right','right','right']"
						data-y="['bottom','bottom','bottom','bottom']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="play-outer">
								<a href="https://www.youtube.com/watch?v=lFpc19KsYzs&ab_channel=INSTITUTOITE" class="lightbox-image play-box"><span class="fas fa-play"><span class="dott"></span><i class="ripple"></i></span></a>
							</div>
						</div>
						
					</li>
					
				</ul>
			</div>
		</div>
		
		<!-- Social List -->
		{{-- <div class="social-list">
			<a href="#">Twitter</a>
			<a href="#">Facebook</a>
			<a href="#">Youtube</a>
		</div> --}}
		
	</section>
	<!-- End Main Slider -->

  	<!-- Featured Section -->
	<section class="featured-section" style="background-image: url(assets/images/background/pattern-10.png)">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<span class="number">01</span>
						<span class="icon flaticon-learning-support"></span>
						<h4><a href="#">Clases Personalizadas</a></h4>
						<div class="text">Ofrecemos clases personalizadas adaptadas a las necesidades de cada estudiante. </div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
						<span class="number">02</span>
						<span class="icon flaticon-reload"></span>
						<h4><a href="#">Horarios Flexibles</a></h4>
						<div class="text">Ofrecemos horarios flexibles para adaptarnos a los horarios de los estudiantes. </div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<span class="number">03</span>
						<span class="icon flaticon-notebook"></span>
						<h4><a href="#">Solución de problemas</a></h4>
						<div class="text">Resolvemos cualquier problema y ofrecemos soluciones a los estudiantes para asegurar su éxito. </div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="450ms" data-wow-duration="1500ms">
						<span class="number">04</span>
						<span class="icon flaticon-bar-chart"></span>
						<h4><a href="#">Experiencia</a></h4>
						<div class="text">Nuestro instructores estan altamente capacitados para ayudar a los estudiantes a alcanzar su máximo potencial. </div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Featured Section -->

  <!-- About Section Two -->
	<section class="about-section-two">
		<div class="pattern-layer" style="background-image: url(assets/images/background/pattern-11.png)"></div>
		<div class="pattern-layer-two" style="background-image: url(assets/images/icons/vector-18.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title style-two">Inglés</div>
              				<h2>Abre puertas a un mundo de oportunidades con el <span>inglés</span></h2>
							<div class="text">En este curso nos centraremos en los fundamentos del idioma
							inglés, como la gramática, el vocabulario, la pronunciación y la comprensión auditiva.
							Aprenderemos a comunicarnos en situaciones cotidianas como
							presentaciones personales, hacer compras, pedir direcciones,
							hablar sobres nuestras aficiones y mucho más. 
							Este curso está diseñado para aquellos que están comenzando
							desde cero, no se preocupen si no tiene ningún conocimiento
							previo del idioma.</div>
						</div>
						<!-- Employe Box -->
						<div class="employe-box">
							<div class="box-inner">
								<span class="globe-icon flaticon-earth-globe-with-continents-maps"></span>
								<ul class="list">
									<li>Nivel Básico</li>
									<li>Nivel Intermedio</li>
									<li>Nivel Avanzado</li>
									<li>Nivel Experto</li>
								</ul>
								<div class="employe">
									<div class="count-outer count-box">
										<span class="count-text" data-speed="4000" data-stop="14">0</span><sup>+</sup>
									</div>
									<div class="text">años de experiencia</div>
								</div>
							</div>
						</div>
						<!-- End Employe Box -->
						
            <!-- Fact Counter Two -->
            <div class="fact-counter-two">
              <div class="row clearfix">

                <!-- Column -->
                <div class="counter-column col-lg-4 col-md-6 col-sm-12">
                  <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="content">
                      <span class="icon flaticon-notebook"></span>
                      <!-- <div class="count-outer count-box">
                        <span class="count-text" data-speed="4000" data-stop="320">0</span>m
                      </div> -->
                      <h5>Aprendizaje efectivo</h5>
                    </div>
                  </div>
                </div>
                
                <!-- Column -->
                <div class="counter-column col-lg-4 col-md-6 col-sm-12">
                  <div class="inner wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
                    <div class="content">
                      <span class="icon flaticon-human-brain"></span>
                      <!-- <div class="count-outer count-box">
                        <span class="count-text" data-speed="5500" data-stop="980">0</span>+
                      </div> -->
                      <h5>Comprensión Completa</h5>
                    </div>
                  </div>
                </div>

                <!-- Column -->
                <div class="counter-column col-lg-4 col-md-6 col-sm-12">
                  <div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="content">
                      <span class="icon flaticon-user-1"></span>
                      <!-- <div class="count-outer count-box">
                        <span class="count-text" data-speed="3500" data-stop="1278">0</span>
                      </div> -->
                      <h5>Profesores capacitados</h5>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
					</div>
				</div>

        <!-- Images Column -->
				<div class="content-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								
							</div>
							<div class="row clearfix">
							
								<!-- Service Block -->
								<div class="service-block col-lg-12 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-rocket"></span>
										</div>
										<h3><a href="{{ route('robotica') }}">Robótica</a></h3>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-12 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-trophy-1""></span>
										</div>
										<h3><a href="{{ route('ajedrez') }}">Ajedrez</a></h3>
									</div>
								</div>

								<!-- Service Block -->
								<div class="service-block col-lg-12 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-squares""></span>
										</div>
										<h3><a href="{{ route('cuborubik') }}">Cubo Rubik</a></h3>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-12 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-web-search-engine"></span>
										</div>
										<h3><a href="{{ route('creacionapp') }}">Creación de App</a></h3>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-12 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-seo"></span>
										</div>
										<h3><a href="{{ route('disenoweb') }}">Diseño Web</a></h3>
									</div>
								</div>
								
								
								
							</div>
						</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Section Two -->
	
	<!-- Process Section -->
	<section class="process-section">
		
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title style-two">Horarios y Precios</div>
        <h2><span>Horarios flexibles</span> para <br> adaptarnos a tu ritmo de vida </h2>
			</div>

      <div class="auto-container">
        <div class="row clearfix">
        
          <!-- Title Column -->
          <div class="content-column col-lg-7 col-md-12 col-sm-12">
            <div class="inner-column">
              <!-- Sec Title -->
              
              <div class="row mt-none-30">
                <div class="col-lg-6">
                  <ul class="experiance_list mt-30">
                    <h4>CONTENIDO INGLÉS BÁSICO</h4>
                      <li>El Alfabeto</li>
					  <li>Pronunciación de “TH”</li>
					  <li>Diferencias entre Inglés Británico y el Inglés Americano</li>
					  <li>Pronombres Personales</li>
					  <li>La Puntuación Inglesa</li>
					  <li>Saludos y Despedidas.</li>
					  <li>Números Cardinales y Ordinales</li>
					  <li>Días, Meses y Estaciones del Año.</li>
					  <li>Fechas y Hora.</li>
					  <li>Colores, Ropa y Accesorios.</li>
					  <li>La Casa y los Muebles.</li>
					  <li>Partes del Cuerpo.</li>
					  <li>Miembros de la Familia</li>
					  <li>Comidas y Bebidas.</li>
					  <li>Preposiciones.</li>
					  <li>Verbo TO BE.</li>
					  <li>Tiempo Libre y Hoobies</li>
					  <li>Presentarse y Presentar a Otros.</li>
					  <li>Rutinas Diarias.</li>
                  </ul>
                  
                </div>
                
                <div class="col-lg-6">  
                  <div class="experiance_item mt-30">
                    <div class="icon">
                      <img src="{{asset('assetshome/images/icons/a_01.png')}}" alt="">
                    </div>
                    <div class="content">
                      <h4>Opción 1</h4>
                      <p>Lunes, Miercoles y Viernes</p>
                    </div>
                  </div>
                  <div class="experiance_item mt-30">
                    <div class="icon">
                      <img src="{{asset('assetshome/images/icons/a_01.png')}}" alt="">
                    </div>
                    <div class="content">
                      <h4>Opción 2</h4>
                      <p>Martes, Jueves y Sábado</p>
                    </div>
                  </div> 
                  <div class="counter_wrap mt-30">
                    <h1><span class="number">Bs.350<span class="plus">+</span></span> <span class="text">asignatura</span></h1>
                  </div>
                </div>
              </div>
            </div>  

            <div class="content-column col-lg-12 col-md-12 col-sm-12">
              <div class="inner-column">
                <!-- Sec Title -->
                <div class="sec-title">
                  <h4></h4>
                </div>
                <div class="row clearfix">
                
                  <!-- Service Block -->
                  <div class="service-block col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                      <div class="icon-box">
                        <span class="icon flaticon-pdf"></span>
                      </div>
                      <h3><a href="https://drive.google.com/file/d/1Qkic_BGYCDv7WGbG3LnbjnDa_hZuVQTY/view?usp=drive_link">Visualizar Contenido Analítico</a></h3>
                     
                    </div>
                  </div>
                
                  <!-- Service Block -->
                  <!-- <div class="service-block col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box">
                      <div class="icon-box">
                        <span class="icon flaticon-learning-support"></span>
                      </div>
                      <h3><a href="https://online.pubhtml5.com/potf/iygd">Descargar manual de Computación</a></h3>
                     
                    </div>
                  </div> -->
                  
                </div>
              </div>
            </div>     
                
          </div>
          
          <!-- Blocks Column -->
          <div class="sidebar-side col-lg-5 col-md-12 col-sm-12">
            <aside class="sidebar sticky-top">
  
              <!-- Timing Widget -->
              <div class="sidebar-widget timing-widget">
                <div class="widget-content">
  
                    {{--%%%%%%%%%%%%%%%%%%%% Lunes - Viernes %%%%%%%%%%%%%%%%%%  --}}
                    <div class="card">
                      <div class="card-header bg-primary text-white text-center">
                        <h3 class="text-white"> Lunes a Viernes</h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                          <thead class="text-secondary">
                            <tr>
                              <th scope="col">Mañana</th>
                              <th scope="col">Tarde</th>
                              <th scope="col">Noche</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>x</td>
                              <td>14:00 - 15:30</td>
                              <td>x</td>
                            </tr>
                            <tr>
                              <td>x</td>
                              <td>15:30 - 17:00</td>
                              <td>x</td>
                            </tr>
                            <tr>
                              <td>x</td>
                              <td>17:00 - 18:00</td>
                              <td>x</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div> 
                    <hr>

                    {{--%%%%%%%%%%%%%%%%%%%% Sabados %%%%%%%%%%%%%%%%%%  --}}
                    <div class="card">
                      <div class="card-header bg-secondary text-white text-center">
                        <h3 class="text-white"> Solo Sabados</h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                          <thead class="text-secondary">
                            <tr class="text-center">
                              <th scope="col">7:30 - 12:00</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div> 
                    <hr>
  
                </div>
              </div>
              
              <!-- Gallery Widget -->
              
              
            </aside>
          </div>

        </div>
      </div>

		</div>
	</section>
	<!-- End Process Section -->
			
	<!-- About Section -->
	<section class="about-section style-two">
		<div class="pattern-layer" style="background-image: url(assets/images/background/pattern-1.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Content Column -->
				<div class="content-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title">Planes Corporativos</div>
							<h2>¡Ahorra en grande con nuestros <span>planes corporativos!</span></h2>
							<div class="text"></div>
						</div>
						<div class="row mt-none-30">
							<div class="col-lg-6">
								
								<ul class="experiance_list mt-30">
									<li>Plan Empresarial </li>
									<li>Plan Colegios </li>
									<li>Plan Profesores </li>
									<li>Plan Familiar </li>
								</ul>
								<div class="button-box">
									<a href="{{ route('planescorporativos') }}" class="theme-btn btn-style-seven"><span class="txt">Informarme <i class="flaticon-next-2"></i></span></a>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="counter_wrap mt-30">
									<h1><span class="number">20%<span class="plus">+</span></span> <span class="text">descuento</span></h1>
								</div>
								<div class="experiance_item mt-30">
									<!-- <div class="icon">
										<img src="assets/images/icons/a_02.png" alt="">
									</div> -->
									<div class="content">
										<h4>¡No te pierdas esta oportunidad!</h4>
										<p>Lanzamos planes corporativos con un descuento del 20% en ITE</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar Side -->
                <div class="info-column sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						
						<div class="inner-column project_widget mt-35">
							<ul class="info-list">
								<li>
									<strong>Nuestra Dirección</strong>
									Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.
								</li>
								<li>
									<strong>Contacto</strong>
									<a href="mailto:info@ite.com"><span class="icon fas fa-comment"></span>info@ite.com.bo</a><br>
									<a href="tel:+59171039910"><span class="icon fas fa-phone"></span>(+591) 71039910</a><br>
									<a href="tel:+591771324941"><span class="icon fas fa-phone"></span>(+591) 71324941</a><br>
									<a href="tel:+59171324941"><span class="icon fas fa-phone"></span>(+591) 71324941</a><br>
								</li>
							</ul>
							<div class="opening">
								<span class="icon far fa-clock"></span>
								<strong>Nuestros Horarios</strong>
								Lu a Vi: 07:00 a 18:30 <br>
								Sábados: 07:30 a 17:00
							</div>
							
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
								<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-twitter"></a></li>
								<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-instagram"></a></li>
								<li><a href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ" class="fa fa-youtube"></a></li>
							</ul>
							
						</div>
						
					</aside>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Contact Page Section -->
    <section class="contact-page-section">
    	<div class="auto-container">
        	<div class="row clearfix mt-none-30">
			
				<!-- Contact Info Block -->
				<div class="contact-info-block col-lg-4 col-md-5 col-sm-12">
					<div class="inner-box mt-30">
						<div class="content">
							<span class="icon flaticon-email-3"></span>
							<h4>Correo electrónico </h4>
							<a href="#">info@ite.com</a>
						</div>
					</div>
					<div class="inner-box mt-30">
						<div class="content">
							<span class="icon flaticon-map"></span>
							<h4>Dirección</h4>
							<div class="text">Av. 3 Pasos al Frente esquina Av. Che Guevara.</div>
						</div>
					</div>
					<div class="inner-box mt-30">
						<div class="content">
							<span class="icon flaticon-telephone"></span>
							<h4>Teléfonos</h4>
							<a href="#">+591 71039910</a>
							<a href="#">+591 75553338</a>
							<a href="#">+591 71324941</a>
						</div>
					</div>
				</div>
				
				<!-- Contact Map -->
				<div class="contact-map-section col-lg-8 col-md-7 col-sm-12">
					<div class="map-boxed mt-30">
						<!--Map Outer-->
						<div class="map-outer">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1899.3919022955802!2d-63.13662465664707!3d-17.801855004536545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e9d3360e592d%3A0xbb1ce56a94dcace2!2site!5e0!3m2!1ses-419!2sbo!4v1677855301119!5m2!1ses-419!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			
			</div>
				
        </div>
    </section>
    <!-- End Contact Page Section -->

	<!-- Testimonials Section -->
    <section class="testimonials-section">
		
		<div class="pattern-layer" style="background-image: url(assetshome/images/background/pattern-6.png)"></div>
		<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Thumbs Column -->
				<div class="thumbs-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">

						<div class="author_img_wrap pos-rel">
							<!-- <div class="tm_bg" style="background-image: url(assetshome/images/background/tm-bg.png);"></div> -->
							<div class="author_img">
								<img src="assetshome/images/resource/author_img.png" alt="">
							</div>
							
						</div>
					</div>
				</div>
				
				<!-- Carousel Column -->
				<div class="carousel-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title">Experiencias verdaderas de nuestros clientes</div>
							<h2>Historias <span>de éxito</span> de nuestros <br>súper clientes</h2>
							   
						</div>
						<!-- Slides -->
						<div class="testimonial-carousel-three owl-carousel owl-theme">
							
							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Desde que comencé a tomar las clases de nivelación, he visto una gran mejora en mis habilidades matemáticas. Los tutores son muy pacientes y explican las cosas de manera clara y fácil de entender. ¡Recomiendo este servicio a cualquiera que busque mejorar sus habilidades matemáticas!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Rosly</h4>
											<span class="designation">Estudiante Nivelada</span>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Mi experiencia con los cursos de computación e informática ha sido excelente. He aprendido tanto sobre programación y tecnología y ahora tengo muchas más oportunidades de empleo. ¡Gracias por estas excelentes clases!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Nahomy</h4>
											<span class="designation">Alumna de Computación</span>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Testimonial Block -->
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Mi hijo ha mejorado mucho en su lectura y escritura gracias a las clases que ha tomado con esta compañía. Los tutores son muy pacientes y han hecho que mi hijo disfrute aprendiendo. ¡Recomendamos altamente este servicio!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Emma</h4>
											<span class="designation">Estudiante de Lectura y Escritura</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Mi hija está encantada con las clases de robótica que ha tomado. Los tutores son muy entusiastas y hacen que las clases sean divertidas y educativas al mismo tiempo. ¡Recomendamos este servicio sin duda alguna!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Soledad Francia</h4>
											<span class="designation">Estudiante de Robótica</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Desde que comencé a tomar las clases de oratoria, he mejorado mucho en mi confianza y habilidades de comunicación. Los tutores son muy profesionales y han ayudado a mejorar mis habilidades de manera efectiva. ¡Gracias por estas excelentes clases!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Daria</h4>
											<span class="designation">Estudiante de Oratoria</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>He mejorado mucho en mis habilidades académicas y he obtenido una mejor comprensión de los temas gracias a las clases preuniversitarias que he tomado con esta compañía. Los tutores son muy knowledgeable y explican las cosas de manera clara. ¡Recomiendo este servicio a cualquiera que busque mejorar sus habilidades académicas!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Alejandra</h4>
											<span class="designation">Postulante PSA</span>
										</div>
									</div>
								</div>
							</div>
							<div class="testimonial-block">
								<div class="inner-box">
									<div class="text"><span class="quote-left fas fa-quote-left"></span>Mi experiencia con los cursos universitarios ha sido excelente. He aprendido tanto y estoy mucho más preparado para mis exámenes y tareas. ¡Gracias por estas excelentes clases!<span class="quote-right fas fa-quote-right"></span></div>
									<div class="author-box">
										<div class="box-inner">
											{{-- <div class="author-image">
												<img src="assetshome/images/resource/author-11.jpg" alt="">
											</div> --}}
											<h4>Yohan</h4>
											<span class="designation">Estudinate universitario</span>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			    
        </div>
    </section>
	<!-- End Testimonials Section -->
	
	<!-- Main Footer -->
    <footer class="main-footer">
		<div class="pattern-layer-one" style="background-image:url(assetshome/images/background/pattern-7.png)"></div>
		<div class="pattern-layer-two" style="background-image:url(assetshome/images/background/pattern-8.png)"></div>
		<div class="pattern-layer-three" style="background-image:url(assetshome/images/background/pattern-9.png)"></div>
		<div class="pattern-layer-four" style="background-image:url(assetshome/images/icons/vector-15.png)"></div>
		<div class="pattern-layer-five" style="background-image:url(assetshome/images/icons/vector-16.png)"></div>
		<span class="circle-one"></span>
		<span class="circle-two"></span>
		<span class="circle-three"></span>
    	<div class="auto-container">
			
			<!-- Upper Box -->
			<div class="upper-box">
				<div class="row clearfix">
				
					<!-- Title Column -->
					<div class="title-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<h2>Contactanos a través de nuestras <span>redes sociales</span> </h2>
							{{-- <div class="text">Don’t wait make a smart & logical quote here. Its pretty easy.</div> --}}
						</div>
					</div>
					
					<!-- Social Column -->
					<div class="social-column col-lg-5 col-md-12 col-sm-12">
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
			<!-- End Upper Box -->
			
        	<!-- Widgets Section -->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!-- Column -->
                    <div class="big-column col-lg-7 col-md-12 col-sm-12">
						<div class="row clearfix">
							
                        	<!-- Footer Column -->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
									{{-- <div class="logo"><a href="{{ url('/') }}"><img src="assetshome/images/footer-logo.png" alt="" title=""></a></div> --}}
									<div class="text">ITE es un centro educativo que brinda clases de nivelación en diferentes materias y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.</div>
									<!-- Subscribe Form -->

									{{-- <ul class="footer_info">
										<li><i class="fa fa-map-marker-alt"></i> Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</li>
										<li><i class="fa fa-phone-alt"></i> +591 71039910</li>
									</ul> --}}
									
									{{-- <div class="subscribe-form">
										<form method="post" action="contact.html">
											<div class="form-group">
												<input type="email" name="email" value="" placeholder="Enter Your Email" required="">
												<button type="submit" class="theme-btn btn-style-two"><span class="txt">Subscribe Now</span></button>
											</div>
										</form>
									</div> --}}
								</div>
							</div>
							
							{{-- <!-- Footer Column --> --}}
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
                    <div class="big-column col-lg-5 col-md-12 col-sm-12">
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
										<li><a href="{{ route('preuniversitario') }}">Preuniversitario</a></li>
										<li><a href="{{ route('universitario') }}">Universitarios</a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-8 col-md-6 col-sm-12">
                                <div class="footer-widget news-widget">
									<h3>Contacto</h3>
									<ul class="footer_info">
										<li><i class="fa fa-map-marker-alt"></i> Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</li>
										<li><i class="fa fa-phone-alt"></i> +59171039910</li>
										<li><i class="fa fa-phone-alt"></i> +59175553338</li>
										<li><i class="fa fa-phone-alt"></i> +59171324941</li>
										<li><i class="icon fas fa-envelope"></i> info@ite.com.bo</li>
										<li><i class="icon fas fa-clock"></i> Lu a Vi: 07:00 a 21:00 Sábados: 07:30 a 17:00</li>
									</ul>
									
								</div>
							</div>
						
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Footer Bootom -->
		<div class="footer-bottom-two">
			<div class="auto-container">
				<div class="row clearfix">
				
					<!-- Copright Column -->
					<div class="copyright-column col-lg-6 col-md-6 col-sm-12">
						<div class="copyright">Copyright &copy; 2023. All Rights Reserved.</div>
					</div>
					
					<!-- Nav Column -->
					<div class="nav-column col-lg-6 col-md-6 col-sm-12">
						<ul class="footer-nav">
							<li><a href="{{ route('termscondition') }}">Términos & condiciones</a></li>
							<li><a href="{{ route('privacy') }}">Politica de privacidad</a></li>
						</ul>
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
