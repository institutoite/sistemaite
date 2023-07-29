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
						<div class="text">Apoyo escolar 2023.<a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información">Contactanos</a></div>
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
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1688" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/home2.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/home2.jpg')}}"> 
						
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
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1689" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/home2.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/home2.jpg')}}">
					
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
		
	<!-- Nivels Section -->
	<section class="business-section" style="background-image: url(assetshome/images/background/pattern-4.png)">
		<div class="auto-container">
			<!-- Sec Title / Centered -->
			<div class="sec-title centered">
				<div class="title">¡Aprende de manera efectiva!</div>
				<h2>¡Todo lo que <span>necesitas</span> <br> para alcanzar tus metas académicas!</h2>
			</div>
			<div class="row clearfix">
			
				<!-- Left Column -->
				<div class="left-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column">
					
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-pen"></span>
									</div>
									<h4><a href="{{ route('guarderia') }}">Guarderia</a></h4>
									<div class="text">¡Juguemos y aprendamos juntos!</div>
									<a href="{{ route('guarderia') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-notebook"></span>
									</div>
									<h4><a href="{{ route('primaria') }}">Primaria</a></h4>
									<div class="text">¡Aprende y diviértete al mismo tiempo!</div>
									<a href="{{ route('primaria') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-search-engine"></span>
									</div>
									<h4><a href="{{ route('preuniversitario') }}">PreUniversitario</a></h4>
									<div class="text">¡Desafía tus límites y alcance tus metas universitarias!</div>
									<a href="{{ route('preuniversitario') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="circle-layer"></div>
						<div class="circle-layer-two"></div>
						<div class="pattern-layer" style="background-image: url(assetshome/images/background/pattern-5.png)"></div>
						<div class="image" data-tilt data-tilt-max="4">
							<img src="assetshome/images/resource/business-1.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Right Column -->
				<div class="right-column col-lg-4 col-md-6 col-sm-12">
					<div class="inner-column">
						
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-pencil-and-ruler"></span>
									</div>
									<h4><a href="{{ route('inicial') }}">Inicial</a></h4>
									<div class="text">¡Aprende y diviértete al mismo tiempo!</div>
									<a href="{{ route('inicial') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-human-brain"></span>
									</div>
									<h4><a href="{{ route('secundaria') }}">Secundaria</a></h4>
									<div class="text">¡Atrévete a ser el mejor de tu clases! te lo garantizamos</div>
									<a href="{{ route('secundaria') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
								<div class="content">
									<div class="icon-box">
										<span class="icon flaticon-seo"></span>
									</div>
									<h4><a href="{{ route('universitario') }}">Universitario</a></h4>
									<div class="text">¡Aprende y avanza en tu carrera con nuestras clases!</div>
									<a href="{{ route('universitario') }}"><button class="boton">Informarme</button></a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Nivels Section -->
	
	<!-- News Section -->
	<section class="services-section">
		<div class="pattern-layer-one" style="background-image: url(assetshome/images/background/pattern-2.png)"></div>
		<div class="pattern-layer-six" style="background-image: url(assetshome/images/background/pattern-3.png)"></div>
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="title">Nuevos Cursos</div>
								<h2>Elija entre nuestros <span>nuevos</span> cursos que te ofrecemos</h2>
							</div>
							<div class="row clearfix">
							
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-rocket"></span>
										</div>
										<h3><a href="{{ route('robotica') }}">Robótica</a></h3>
										<div class="text">Da vida a tus ideas con nuestro curso de robótica.</div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-squares"></span>
										</div>
										<h3><a href="{{ route('cuborubik') }}">Cubo Rubik</a></h3>
										<div class="text">Aprende los secretos para resolverlo en tiempo récord. </div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-trophy-1"></span>
										</div>
										<h3><a href="{{ route('ajedrez') }}">Ajedrez</a></h3>
										<div class="text">¡Aprende a moverte con inteligencia en el tablero!.</div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-web-search-engine"></span>
										</div>
										<h3><a href="{{ route('disenoweb') }}">Programación y Algoritmos</a></h3>
										<div class="text">Codifica tu camino hacia el futuro.</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- Images Column -->
					<div class="images-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column clearfix">
							<div class="color-box-one"></div>
							<div class="color-box-two"></div>
							<div class="pattern-layer-two" style="background-image: url(assetshome/images/icons/vector-3.png)"></div>
							<div class="pattern-layer-three" style="background-image: url(assetshome/images/icons/vector-4.png)"></div>
							<div class="pattern-layer-four" style="background-image: url(assetshome/images/icons/vector-5.png)"></div>
							<div class="pattern-layer-five" style="background-image: url(assetshome/images/icons/vector-6.png)"></div>
							<!-- Video Box -->
							<div class="video-box">
								<figure class="video-image">
									<img class="transition-500ms" src="assetshome/images/resource/service-1.jpg" alt="">
								</figure>
								<a href="https://www.youtube.com/embed/lFpc19KsYzs?autoplay=1" class="lightbox-image overlay-box"><span class="fas fa-play"><span class="dott"></span><i class="ripple"></i></span></a>
							</div>
							<div class="image wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
								<img src="assetshome/images/resource/service-2.jpg" alt="" />
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End News Section -->
	
	<!-- Servicios Ite Section -->
	<section class="process-section">
		<div class="pattern-layer-one" style="background-image: url(assets/images/background/pattern-14.png)"></div>
		<div class="pattern-layer-two" style="background-image: url(assets/images/background/pattern-15.png)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title style-two">Servicios Ite</div>
				<h2>Nuestros <span>Servicios</span> </h2>
			</div>
			<div class="row clearfix">
				
			</div>
		</div>
	</section>
	<!-- End Servicios Ite Section -->
	
	<!-- Imagenes servicios Ite Section -->
	<section class="project-section">
		<div class="left-curve-box"></div>
		<div class="right-curve-box"></div>
		<div class="auto-container">
			<div class="inner-container">
			
				<div class="gallery-carousel-two owl-carousel owl-theme">
			
					<!-- Project Block -->
					<div class="project-block">
						<div class="inner-box">
							<div class="image">
								<img src="assetshome/images/gallery/servfotocopias.jpg" alt="" />
								<div class="overlay-box">
									<div class="content">
										<h3><a href="{{ route('fotocopia') }}">Fotocopias</a></h3>
										<!-- <div class="text">Clases Vacacionales</div>
										<div class="icon icofont-horse-head-2"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Project Block -->
					<div class="project-block">
						<div class="inner-box">
							<div class="image">
								<img src="assetshome/images/gallery/servresolpracticos.jpg" alt="" />
								<div class="overlay-box">
									<div class="content">
										<h3><a href="{{ route('resolucionpracticos') }}">Resolución de prácticos</a></h3>
										<!-- <div class="text">Clases Vacacionales</div>
										<div class="icon icofont-horse-head-2"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Project Block -->
					<div class="project-block">
						<div class="inner-box">
							<div class="image">
								<img src="assetshome/images/gallery/servasistenteite.jpg" alt="" />
								<div class="overlay-box">
									<div class="content">
										<h3><a href="{{ route('asistenteite') }}">Asistente Ite</a></h3>
										<!-- <div class="text">High Standard of proffesional</div>
										<div class="icon icofont-horse-head-2"></div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Imagenes servicios Ite Section -->

	<!-- Principle Section -->
	<section class="principle-section">
		<div class="pattern-layer-one" style="background-image: url(assetshome/images/background/pattern-2.png)"></div>
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					
					<!-- Content Column -->
					<div class="content-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="title">¿Porque elegirnos?</div>
								<h2>Nuestra <span>Misión</span> Y <br> Visión.</h2>
							</div>
							<div class="row clearfix">
							
								<!-- Tab Column -->
								<div class="tab-column col-lg-7 col-md-6 col-sm-12">
									<div class="inner-column">
										
										<!-- Principle Info Tabs -->
										<div class="principle-info-tabs">
											<!-- Principle Tabs -->
											<div class="principle-tabs tabs-box">
											
												<!--Tab Btns-->
												<ul class="tab-btns tab-buttons clearfix">
													<li data-tab="#prod-integrity" class="tab-btn active-btn">Misión</li>
													<li data-tab="#prod-obejectives" class="tab-btn">Visión</li>
													<li data-tab="#prod-excellence" class="tab-btn">¿Quienes Somos?</li>
												</ul>
												
												<!-- Tabs Container -->
												<div class="tabs-content">
												
													<!-- Tab / Active Tab -->
													<div class="tab active-tab" id="prod-integrity">
														<div class="content">
															Nuestra misión es:
																<ul class="list">
																	<li>Proporcionar una educación de calidad y enfocada en el desarrollo integral de los estudiantes.</li>
																	<li>Fomentar el aprendizaje autónomo y la creatividad en los estudiantes.</li>
																	<li>Promover valores como la responsabilidad, la tolerancia, la solidaridad y el respeto.</li>
																	<li>Preparar a los estudiantes para enfrentar desafíos y oportunidades en el mundo actual y futuro.</li>
																	<li>Proporcionar un ambiente seguro, acogedor y inclusivo para todos los estudiantes.</li>
																</ul>
														</div>
													</div>
													
													<!-- Tab -->
													<div class="tab" id="prod-obejectives">
														<div class="content">

															Nuestra visión es:
															<ul class="list">
																<li>Ser reconocido como una institución de excelencia en educación y formación de jóvenes.</li>
																<li>Desarrollar un enfoque pedagógico innovador y adaptado a las necesidades de los estudiantes y la sociedad.</li>
																<li>Proporcionar una educación que prepare a los estudiantes para enfrentar los desafíos y oportunidades del mundo actual y futuro.</li>
																<li>Ser un modelo de excelencia en la educación integral y personalizada.</li>
																<li>Fomentar una cultura de aprendizaje continuo y desarrollo personal.</li>
															</ul>
															
														</div>
													</div>
													
													<!-- Tab -->
													<div class="tab" id="prod-excellence">
														<div class="content">
													
															ITE es un centro educativo que brinda clases de nivelación en diferentes materias y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.
															
														</div>
													</div>
													
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								<!-- List Column -->
								<div class="list-column col-lg-5 col-md-6 col-sm-12">
									<div class="inner-column">
										<ul class="number-list">
											<li>
												<span class="number">01</span>
												<strong>¿En que materia deseas optimizarte?</strong>
												Aprende lo que realmente, necesitas, avanza a tu ritmo de comprensión.
											</li>
											<li>
												<span class="number">02</span>
												<strong>Logra tus objetivos</strong>
												No sólo clases: Apoyo académico, motivaciones, orientaciones, sobre todo mucha práctica.
											</li>
											<li>
												<span class="number">03</span>
												<strong>Descubre tu potencial</strong>
												Te transformamos a una versión mejorada de ti mismo, para que seas mas productivo.
											</li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					
					<!-- Info Column -->
					<div class="info-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<ul class="info-list">
								<li>
									<strong>Nuestra dirección</strong>
									Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.
								</li>
								<li>
									<strong>Contacto</strong>
									<a href="mailto:info@ite.com.bo"><span class="icon fas fa-comment"></span>info@ite.com.bo</a><br>
									<a href="tel:+406-555-0120"><span class="icon fas fa-phone"></span>(+591) 71039910</a><br>
									<a href="tel:+591-71324941"><span class="icon fas fa-phone"></span>(+591) 71324941</a><br>
									<a href="tel:+59175553338"><span class="icon fas fa-phone"></span>(+591) 75553338</a><br>
									<a href="tel:+59133919050"><span class="icon fas fa-phone"></span>(3)-219050</a><br>
								</li>
							</ul>
							<div class="opening">
								<span class="icon far fa-clock"></span>
								<strong>Nuestros horarios</strong>
								Lu a Vi: 07:00 a 18:30 <br> Sábados: 07:30 a 17:00
							</div>
							
							<!-- Social Box -->
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
	</section>
	<!-- End Principle Section -->
	
	<!-- Project Page Section -->
	<section class="project-page-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title style-two">Nuestros Cursos</div>
				<h2>Tenemos la solución de <span>aprendizaje </span> ideal para usted</h2>
			</div>
			<div class="row clearfix">
			
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('inicial') }}"><img src="{{asset('assetshome/images/gallery/inicial.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('inicial') }}">Inicial</a></h3>
							<a href="{{ route('inicial') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('primaria') }}"><img src="{{asset('assetshome/images/gallery/primaria.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('primaria') }}">Primaria</a></h3>
							<a href="{{ route('primaria') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('secundaria') }}"><img src="{{asset('assetshome/images/gallery/secundaria.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							<h3><a href="{{ route('secundaria') }}">Secundaria</a></h3>
							<a href="{{ route('secundaria') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>

				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('preuniversitario') }}"><img src="{{asset('assetshome/images/gallery/preuniversitario.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('preuniversitario') }}">Pre-Universitario</a></h3>
							<a href="{{ route('preuniversitario') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('universitario') }}"><img src="{{asset('assetshome/images/gallery/universitario.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('universitario') }}">Universitario</a></h3>
							<a href="{{ route('universitario') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('computacion') }}"><img src="{{asset('assetshome/images/gallery/computacion.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							<h3><a href="{{ route('computacion') }}">Computación</a></h3>
							<a href="{{ route('computacion') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>

				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('robotica') }}"><img src="{{asset('assetshome/images/gallery/robotica.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('robotica') }}">Robótica</a></h3>
							<a href="{{ route('robotica') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('programacion') }}"><img src="{{asset('assetshome/images/gallery/programacion.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('programacion') }}">Programación y Algoritmos</a></h3>
							<a href="{{ route('programacion') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('disenoweb') }}"><img src="{{asset('assetshome/images/gallery/disenoweb.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							<h3><a href="{{ route('disenoweb') }}">Diseño Web</a></h3>
							<a href="{{ route('disenoweb') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>

				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('creacionapp') }}"><img src="{{asset('assetshome/images/gallery/creacionapp.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('creacionapp') }}">Creación de App</a></h3>
							<a href="{{ route('creacionapp') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('mantenimientocomputadoras') }}"><img src="{{asset('assetshome/images/gallery/mantenimientocomputadoras.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							
							<h3><a href="{{ route('mantenimientocomputadoras') }}">Mantemiento de Computadoras</a></h3>
							<a href="{{ route('mantenimientocomputadoras') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
				<!-- Project Block Two -->
				<div class="project-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('ajedrez') }}"><img src="{{asset('assetshome/images/gallery/ajedrez.jpg')}}" alt="" /></a>
						</div>
						<div class="lower-content">
							<h3><a href="{{ route('ajedrez') }}">Ajedrez</a></h3>
							<a href="{{ route('ajedrez') }}" class="view">Informarme</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- Project Page Section -->

	<!-- Team Section Two -->
	@include('home.fronted.docente')
	<!-- End Team Section Two -->

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
	
	<!-- Form Section -->
	{{-- <section class="form-section">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Form Column -->
				<div class="form-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title">Escribenos</div>
							<h2>Rellena nuestro <span>formulario</span> para contactarnos</h2>
						</div>
						
						<!-- Default Form -->
						<div class="default-form">
							<form method="post" action="contact.html">
								<div class="row clearfix">
								
									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="firstname" value="" placeholder="Ingrese su nombre*" required>
									</div>
									
									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="phone" value="" placeholder="Ingrese su numero*" required>
									</div>
									
									<!-- Form Group -->
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<textarea name="message" placeholder="Ingrese su mensaje*"></textarea>
									</div>
									
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<button type="submit" class="theme-btn btn-style-three"><span class="txt">Enviar <i class="flaticon-next-2"></i></span></button>
									</div>
									
								</div>
							</form>
						</div>
						<!-- End Default Form -->
						
					</div>
				</div>
				<!-- Image Column -->
				<div class="image-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="color-layer"></div>
						<div class="icon far fa-question-circle"></div>
						<div class="image">
							<img src="assetshome/images/resource/form-image.jpg" alt="" />
						</div>
						<div class="author-box-one">
							<img src="assetshome/images/resource/author-2.jpg" alt="" />
						</div>
						<div class="author-box-two">
							<img src="assetshome/images/resource/author-3.png" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Form Section -->
		
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