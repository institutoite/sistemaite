<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Instituto Ite</title>
<!-- Stylesheets -->
<link href="{{asset('assetshome/css/bootstrap.css')}}" rel="stylesheet">

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
 	
 	<!-- Main Header -->
    <header class="main-header">
    	
		<!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
					<!-- Top Left -->
					<div class="top-left clearfix">
						<div class="text">Apoyo escolar 2023</div>
					</div>
					
					<!-- Top Right -->
                    <div class="top-right pull-right clearfix">
						<div class="location">Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</div>
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
		
		<!-- Header Upper -->
		<div class="header-upper">
			<div class="auto-container">
				<div class="clearfix">
					
					{{-- <div class="logo pull-left">
						<div class="logo"><a href="{{ url('/') }}"><img src="assetshome/images/logo.png" alt="" title=""></a></div>
					</div>
					 --}}
					<div class="pull-right upper-right clearfix">
						
						<!--Info Box-->
						<div class="upper-column info-box">
							<div class="icon-box fas fa-envelope-open-text"></div>
							<ul>
								<li><strong>email</strong> <a href="mailto:mailto:info@ite.com">info@ite.com</a></li>
							</ul>
						</div>
						
						<!--Info Box-->
						<div class="upper-column info-box">
							<div class="icon-box fas fa-tty"></div>
							<ul>
								<li><strong>celular</strong> <a href="tel:+59171039910">+59171039910</a></li>
							</ul>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- End Header Upper -->
		
		<!-- Header Lower -->
        <div class="header-lower">
        	<div class="auto-container">
            	<div class="inner-container d-flex justify-content-between align-items-center">
					
					<!-- Nav Outer -->
					<div class="nav-outer clearfix">
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
						<!-- Main Menu -->
						<nav class="main-menu navbar-expand-md">
							<div class="navbar-header">
								<!-- Toggle Button -->
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li class="current dropdown"><a href="{{ url('/') }}">Inicio</a>
									</li>
									<li class="dropdown"><a href="#">Nosotros</a>
										<ul>
											<li><a href="#">Whatsapp</a></li>
											<li><a href="#">Telegram</a></li>
											<li><a href="#">Correo</a></li>
											<li><a href="#">Escríbenos</a></li>
											<li><a href="#">Facebook</a></li>
											<li><a href="#">Youtube</a></li>
											<li><a href="#">Todo</a></li>
											
										</ul>
									</li>
									<li class="dropdown"><a href="#">Especial</a>
										<ul>
											<li><a href="#">Robótica</a></li>
											<li><a href="#">Programación</a></li>
											<li><a href="#">Apps Móviles</a></li>
											<li><a href="#">Apps Webs</a></li>
											<li><a href="#">Libros personalizados</a></li>
											<li><a href="#">Creamos dibujo</a></li>
											
										</ul>
									</li>
									<li class="dropdown"><a href="#">Proyectos</a>
										<ul>
											<li><a href="#">ite 360</a></li>
											<li><a href="#">Asistente ite</a></li>
											<li><a href="#">ite ayuda</a></li>
											<li><a href="#">ite restaurante</a></li>
										</ul>
									</li>
									<li class="dropdown"><a href="#">Clases</a>
										<ul>
											<li><a href="{{ route('inicial') }}">Inicial</a></li>
											<li><a href="{{ route('primaria') }}">Primaria</a></li>
											<li><a href="{{ route('secundaria') }}">Secundaria</a></li>
											<li><a href="{{ route('preuniversitario') }}">Preuniversitario</a></li>
											<li><a href="#">Institutos</a></li>
											<li><a href="#">Colegios Militares</a></li>
											<li><a href="#">Escuela de policias</a></li>
											<li><a href="{{ route('universitario') }}">Universitarios</a></li>
											<li><a href="#">Profesionales</a></li>
										</ul>
									</li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</div>
						</nav>
						
					</div>
					
					<!-- Main Menu End-->
					<div class="outer-box clearfix">
						
						{{-- <!-- Nav Btn -->
						<div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-2"></span></div>
						
						
						<!-- Button Box -->
						<div class="button-box">
							<a href="{{ route('login') }}" class="theme-btn btn-style-one"><span class="txt"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</span></a>
						</div>
						<!-- End Button Box --> --}}
						@auth
                      <div class="cs-user_info text-center">
                        <h3><a href="{{ route('home')}}"> <img class="perfil" src="{{URL::to('/')."/storage/".Auth::user()->foto}}" alt=""> </a> </h3>
                        {{-- <h3><a class="btn btn-primary" href="{{ route('home')}}">Sistema </a> </h3> --}}
                      </div>
                      <div class="text-center">
                        <a class="btn form-inline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
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
					@auth
						<a href="{{ route('home')}}"> <img class="perfil" src="{{URL::to('/')."/storage/".Auth::user()->foto}}" alt=""> </a>
						<a class="btn form-inline" href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
							<i class="fas fa-sign-out-alt"></i>
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					@endauth
				</div>
            </div>
        </div>
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
        </div><!-- End Sticky Menu -->
    
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
								<a href="{{ url('/') }}"><img src="{{asset('assetshome/images/logo-2.png')}}" alt="" title=""></a>
							</div>
							<div class="content-box">
								<h5>Acerca de Nosotros</h5>
								<p class="text">ITE es un centro educativo que brinda clases de nivelación en diferentes materias y cursos de programación en todos los lenguajes y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.</p>
								<a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="theme-btn btn-style-two"><span class="txt">Consultar</span></a>
							</div>
							<div class="contact-info">
								<h5>Información de contacto</h5>
								<ul class="list-style-one">
									<li><span class="icon fas fa-map-marker"></span>Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.</li>
									<li><span class="icon fas fa-phone"></span>+59171039910</li>
									<li><span class="icon fas fa-phone"></span>+59175553338</li>
									<li><span class="icon fas fa-phone"></span>+59171324941</li>
									<li><span class="icon fas fa-envelope"></span>info@ite.com.bo</li>
									<li><span class="icon fas fa-clock"></span>Lu a Vi: 07:00 a 18:30 Sábados: 07:30 a 17:00</li>
								</ul>
							</div>
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook-f"></a></li>
								<li><a href="https://wa.me/59171039910" target="_blank" class="fa fa-whatsapp"></a></li>
								<li><a href="https://wa.me/59171324941" target="_blank" class="fa fa-whatsapp"></a></li>
								<li><a href="https://wa.me/59175553338" target="_blank" class="fa fa-whatsapp"></a></li>
								
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->
	
	<!-- Main Slider -->
	<section class="main-slider">
		<div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
			<div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
				<ul>
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1688" data-slotamount="default" data-thumb="" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src=""> 
						
						<div class="color-layer"></div>
						<div class="circle-layer"></div>
						<div class="vector-layer-one" style="background-image: url(assetshome/images/main-slider/vector-1.png)"></div>
						<div class="vector-layer-two" style="background-image: url(assetshome/images/main-slider/vector-2.png)"></div>
						<div class="vector-layer-three" style="background-image: url(assetshome/images/main-slider/vector-3.png)"></div>
						<div class="vector-layer-four" style="background-image: url(assetshome/images/main-slider/vector-4.png)"></div>
						
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
							data-hoffset="['-80','15','15','15']"
							data-voffset="['-80','-80','0','0']"
							data-x="['right','right','right','right']"
							data-y="['bottom','center','bottom','bottom']"
							data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
							style="">
							<figure class="content-image">
								<div class="border-layer"></div>
								<div class="dark-color-layer"></div>
								<div class="icon-one fas fa-signal"></div>
								<div class="icon-two fas fa-bullhorn"></div>
								<div class="icon-three fas fa-gem"></div>
								<div class="icon-four fas fa-bullseye"></div>
								<img src="assetshome/images/main-slider/content-image-1.png" alt="">
								<div class="vector-layer-five" style="background-image: url(assetshome/images/main-slider/vector-5.png)"></div>
							</figure>
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
						data-hoffset="['15','15','15','15']"
						data-voffset="['-50','-180','-140','-125']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="title">Aprende lo que realmente necesites, aprende a tu ritmo de compresión.</div>
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
						data-voffset="['90','-70','-40','-35']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<h1>Tú decides desde y hasta donde llegar.</h1>
						</div>
						
						<div class="tp-caption tp-resizeme"
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['700','700','700','500']"
						data-whitespace="normal"
						data-hoffset="['15','15','15','15']"
						data-voffset="['250','60','80','80']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":1200,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="button-box">
								<a href="#" class="theme-btn btn-style-three"><span class="txt">Contactanos<i class="flaticon-next-2"></i></span></a>
								<a href="#" class="theme-btn btn-style-four"><span class="txt">Leer mas <i class="flaticon-next-2"></i></span></a>
							</div>
						</div>
						
					</li>
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1689" data-slotamount="default" data-thumb="" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="">
					
						<div class="color-layer"></div>
						<div class="circle-layer"></div>
						<div class="vector-layer-one" style="background-image: url(assetshome/images/main-slider/vector-1.png)"></div>
						<div class="vector-layer-two" style="background-image: url(assetshome/images/main-slider/vector-2.png)"></div>
						<div class="vector-layer-three" style="background-image: url(assetshome/images/main-slider/vector-3.png)"></div>
						<div class="vector-layer-four" style="background-image: url(assetshome/images/main-slider/vector-4.png)"></div>
						
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
							data-hoffset="['-80','15','15','15']"
							data-voffset="['-80','-80','0','0']"
							data-x="['right','right','right','right']"
							data-y="['bottom','center','bottom','bottom']"
							data-frames='[{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
							style="">
							<figure class="content-image">
								<div class="border-layer"></div>
								<div class="dark-color-layer"></div>
								<div class="icon-one fas fa-signal"></div>
								<div class="icon-two fas fa-bullhorn"></div>
								<div class="icon-three fas fa-gem"></div>
								<div class="icon-four fas fa-bullseye"></div>
								<img src="assetshome/images/main-slider/content-image-1.png" alt="">
								<div class="vector-layer-five" style="background-image: url(assetshome/images/main-slider/vector-5.png)"></div>
							</figure>
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
						data-hoffset="['15','15','15','15']"
						data-voffset="['-50','-180','-140','-125']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":600,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="title">Your Trusted Agency</div>
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
						data-voffset="['90','-70','-40','-35']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":900,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<h1>Digital marketing agency.</h1>
						</div>
						
						<div class="tp-caption tp-resizeme"
						data-paddingbottom="[0,0,0,0]"
						data-paddingleft="[0,0,0,0]"
						data-paddingright="[0,0,0,0]"
						data-paddingtop="[0,0,0,0]"
						data-responsive_offset="on"
						data-type="text"
						data-height="none"
						data-width="['700','700','700','500']"
						data-whitespace="normal"
						data-hoffset="['15','15','15','15']"
						data-voffset="['250','60','80','80']"
						data-x="['left','left','left','left']"
						data-y="['middle','middle','middle','middle']"
						data-textalign="['top','top','top','top']"
						data-frames='[{"delay":1200,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
						style="">
							<div class="button-box">
								<a href="#" class="theme-btn btn-style-three"><span class="txt">Discover More <i class="flaticon-next-2"></i></span></a>
								<a href="#" class="theme-btn btn-style-four"><span class="txt">Learn More <i class="flaticon-next-2"></i></span></a>
							</div>
						</div>
						
					</li>
					
				</ul>
			</div>
		</div>
	</section>
	<!-- End Main Slider -->
	
	<!-- Clients Section -->
	{{-- <section class="clients-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="carousel-outer">
					<!--Sponsors Slider-->
					<ul class="sponsors-carousel owl-carousel owl-theme">
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/1.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/2.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/3.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/4.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/5.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/1.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/2.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/3.png" alt=""></a></div></li>
						<li><div class="image-box"><a href="#"><img src="assetshome/images/clients/4.png" alt=""></a></div></li>
					</ul>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Clients Section -->
	
	<!-- About Section -->
	{{-- <section class="about-section">
		<div class="pattern-layer" style="background-image: url(assetshome/images/background/pattern-1.png)"></div>
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Images Column -->
				<div class="images-column col-lg-6 col-md-12 col-sm-12">
					<div class="vector-layer-one" style="background-image: url(assetshome/images/icons/vector-1.png)"></div>
					<div class="vector-layer-two" style="background-image: url(assetshome/images/icons/vector-2.png)"></div>
					<div class="inner-column clearfix">
						<div class="image wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<img src="assetshome/images/resource/about-1.jpg" alt="" />
						</div>
						<div class="image-two wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
							<img src="assetshome/images/resource/about-2.jpg" alt="" />
						</div>
						<div class="image-three wow fadeInRight" data-wow-delay="450ms" data-wow-duration="1500ms">
							<img src="assetshome/images/resource/about-4.jpg" alt="" />
						</div>
						<div class="image-four wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<img src="assetshome/images/resource/about-3.jpg" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title">Planes Corporativos</div>
							<h2>Aprende a tu ritmo,<span>elige el plan</span> perfecto para ti.</h2>  
							<div class="text">Descubre nuevos horizontes con nuestros planes</div>
						</div>
						<ul class="about-list">
							<li>Plan familiar</li>
							<li>Plan empresarial</li>
							<li>Plan colegios</li>
							<li>Plan profesores</li>
							<li>Plan Referencia</li>
							<li>Plan Virtual</li>
							<li>Plan Adultos</li>
						</ul>
						<!-- Quote Box -->
						<div class="quote-box">
							<div class="box-inner">
								<span class="quote fas fa-quote-right"></span>
								<div class="content">
									<div class="text">“Los planes estan pensados para grupos de personas <br>  con un descuento especial en nuestras tarifas”</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section> --}}
	<!-- End About Section -->
	
	<!-- Business Section -->
	<section class="business-section" style="background-image: url(assetshome/images/background/pattern-4.png)">
		<div class="auto-container">
			<!-- Sec Title / Centered -->
			<div class="sec-title centered">
				<div class="title">Apoyo escolar</div>
				<h2>Te ayudamos en todos los <span>niveles</span> <br> que necesites</h2>
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
										<span class="icon flaticon-bulb"></span>
									</div>
									<h4><a href="{{ route('guarderia') }}">Guarderia</a></h4>
									<div class="text">El aprendizaje en la guardería es crucial para el desarrollo de los niños. En este entorno, los niños aprenden a través de juegos, actividades y experiencias interactivas</div>
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
									<div class="text">Es un período crucial en el desarrollo educativo de un niño. Durante esta etapa, los niños construyen las bases para su futuro aprendizaje y desarrollo.</div>
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
									<div class="text">Es una oportunidad para que los estudiantes desarrollen su pensamiento crítico, habilidades de investigación y resolución de problemas, y para que se preparen para el desafío académico de la universidad.</div>
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
										<span class="icon flaticon-learning-support"></span>
									</div>
									<h4><a href="{{ route('inicial') }}">Inicial</a></h4>
									<div class="text">Los niños aprenden habilidades y conocimientos básicos en áreas como lectura, escritura, matemáticas y ciencias.</div>
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
									<div class="text">Durante esta etapa, los estudiantes profundizan y amplían los conocimientos adquiridos en la escuela primaria, y se preparan para futuras oportunidades académicas o profesionales.</div>
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
									<div class="text">Los estudiantes profundizan en áreas de interés especializadas y desarrollan habilidades y conocimientos relevantes para su futuro profesional o académico.</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Business Section -->
	
	<!-- Services Section -->
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
											<span class="icon flaticon-social-reach"></span>
										</div>
										<h3><a href="#">Robótica</a></h3>
										<div class="text">Aprenderás cómo diseñar y construir circuitos para controlar y alimentar a los robots.</div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-analytics"></span>
										</div>
										<h3><a href="#">Programación y Algoritmos</a></h3>
										<div class="text">Aprenderás los conceptos básicos de la programación, como variables, tipos de datos, estructuras de control de flujo y funciones.</div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-web-search-engine"></span>
										</div>
										<h3><a href="#">Creacion de App</a></h3>
										<div class="text">Aprenderás cómo desarrollar aplicaciones para dispositivos móviles, como smartphones y tabletas, y cómo utilizar plataformas como Android o iOS.</div>
									</div>
								</div>
								
								<!-- Service Block -->
								<div class="service-block col-lg-6 col-md-6 col-sm-12">
									<div class="inner-box">
										<div class="icon-box">
											<span class="icon flaticon-seo"></span>
										</div>
										<h3><a href="#">Diseño Web</a></h3>
										<div class="text">Aprenderás los conceptos básicos y avanzados necesarios para crear y desarrollar sitios web.</div>
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
	<!-- End Services Section -->
	
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
													<li data-tab="#prod-integrity" class="tab-btn active-btn">¿Quienes somos?</li>
													<li data-tab="#prod-obejectives" class="tab-btn">Mision</li>
													<li data-tab="#prod-excellence" class="tab-btn">Vision</li>
												</ul>
												
												<!-- Tabs Container -->
												<div class="tabs-content">
												
													<!-- Tab / Active Tab -->
													<div class="tab active-tab" id="prod-integrity">
														<div class="content">
															ITE es un centro educativo que brinda clases de nivelación en diferentes materias y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.
														</div>
													</div>
													
													<!-- Tab -->
													<div class="tab" id="prod-obejectives">
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
													<div class="tab" id="prod-excellence">
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
									<strong>Nuestra direccion</strong>
									Av. 3 pasos al frente y che guevara, Santa Cruz, Bolivia.
								</li>
								<li>
									<strong>Contacto</strong>
									<a href="mailto:info@ite.com"><span class="icon fas fa-comment"></span>info@ite.com</a><br>
									<a href="tel:+406-555-0120"><span class="icon fas fa-phone"></span>(+591) 71039910</a><br>
                  <a href="tel:+406-555-0120"><span class="icon fas fa-phone"></span>(+591) 71324941</a><br>
                  <a href="tel:+406-555-0120"><span class="icon fas fa-phone"></span>(+591) 75553338</a><br>
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
	
	
	
	<!-- Team Section -->
	<section class="team-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">Mas cursos</div>
						<h2>Tenemos la solución de <br> <span>aprendizaje</span>  ideal para usted</h2>
					</div>
					
				</div>
			</div>
		</div>
		<!-- Outer Container -->
		<div class="outer-container">
			<div class="row clearfix">
			
				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<!-- Social Box -->
							{{-- <div class="social-outer">
								<span class="plus-icon fas fa-plus"></span>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
									<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
									<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
								</ul>
							</div> --}}

							<img src="assetshome/images/resource/team-1.png" alt="" />
							<div class="content">
								<div class="icon-layer-one" style="background-image: url(assetshome/images/icons/plus-icon.png)"></div>
								<div class="icon-layer-two" style="background-image: url(assetshome/images/icons/circle-icon.png)"></div>
								{{-- <div class="designation">Digital Marketer</div> --}}
								<h4><a href="#">Dactilografia</a></h4>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
						<div class="image">
							<!-- Social Box -->
							{{-- <div class="social-outer">
								<span class="plus-icon fas fa-plus"></span>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
									<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
									<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
								</ul>
							</div> --}}

							<img src="assetshome/images/resource/team-2.png" alt="" />
							<div class="content">
								<div class="icon-layer-one" style="background-image: url(assetshome/images/icons/plus-icon.png)"></div>
								<div class="icon-layer-two" style="background-image: url(assetshome/images/icons/circle-icon.png)"></div>
								{{-- <div class="designation">seo specialist</div> --}}
								<h4><a href="#">Operador de Computadoras</a></h4>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="image">
							<!-- Social Box -->
							{{-- <div class="social-outer">
								<span class="plus-icon fas fa-plus"></span>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
									<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
									<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
								</ul>
							</div> --}}

							<img src="assetshome/images/resource/team-3.png" alt="" />
							<div class="content">
								<div class="icon-layer-one" style="background-image: url(assetshome/images/icons/plus-icon.png)"></div>
								<div class="icon-layer-two" style="background-image: url(assetshome/images/icons/circle-icon.png)"></div>
								{{-- <div class="designation">INTERIOR DESIGNER</div> --}}
								<h4><a href="#">Diseño Gráfico</a></h4>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="450ms" data-wow-duration="1500ms">
						<div class="image">
							<!-- Social Box -->
							{{-- <div class="social-outer">
								<span class="plus-icon fas fa-plus"></span>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="https://www.facebook.com/educabolite" class="fa fa-facebook"></a></li>
									<li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fa fa-whatsapp"></a></li>
									<li><a href="https://msng.link/o/?@institutoite=tg" class="fa fa-telegram"></a></li>
								</ul>
							</div> --}}

							<img src="assetshome/images/resource/team-4.png" alt="" />
							<div class="content">
								<div class="icon-layer-one" style="background-image: url(assetshome/images/icons/plus-icon.png)"></div>
								<div class="icon-layer-two" style="background-image: url(assetshome/images/icons/circle-icon.png)"></div>
								{{-- <div class="designation">UI UX Designer</div> --}}
								<h4><a href="#">Diseño Web</a></h4>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</section>
	<!-- End Team Section -->
	
	<!-- Form Section -->
	<section class="form-section">
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
									
									<!-- Form Group -->
									{{-- <div class="form-group col-lg-12 col-md-12 col-sm-12">
										<div class="radio-box">
											<input type="radio" name="remember-password" id="type-1"> 
											<label for="type-1">Save my name, email, and website in this browser for the next time I comment.</label>
										</div>
									</div> --}}
									
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
	</section>
	<!-- End Form Section -->
	
	<!-- CTA Section -->
	<section class="cta-section">
		<div class="auto-container">
			<div class="inner-container clearfix">
				<div class="icon-layer-one" style="background-image: url(assetshome/images/icons/vector-7.png)"></div>
				<div class="icon-layer-two" style="background-image: url(assetshome/images/icons/vector-8.png)"></div>
				<div class="icon-layer-three" style="background-image: url(assetshome/images/icons/vector-9.png)"></div>
				<div class="pull-left">
					<h3>¿Te gustaria <span>aprender</span> a tu ritmo desde cualquier dispositivo?</h3>
				</div>
				<div class="pull-right">
					<div class="button-box">
						<a href="https://www.educabol.com/" class="theme-btn btn-style-five"><span class="txt">Ingresar <i class="flaticon-next-2"></i></span></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End CTA Section -->
	
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
	
	<!-- Counter Section -->
	{{-- <section class="counter-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="vector-layer-one" style="background-image: url(assetshome/images/icons/vector-11.png)"></div>
				<div class="vector-layer-two" style="background-image: url(assetshome/images/icons/vector-12.png)"></div>
				<div class="vector-layer-three" style="background-image: url(assetshome/images/icons/vector-13.png)"></div>
				<div class="vector-layer-four" style="background-image: url(assetshome/images/icons/vector-14.png)"></div>
				<div class="vector-layer-five" style="background-image: url(assetshome/images/icons/vector-14.png)"></div>
				<div class="vector-layer-six" style="background-image: url(assetshome/images/icons/vector-14.png)"></div>
				<!-- Fact Counter -->
				<div class="fact-counter">
					<div class="row clearfix">

						<!-- Column -->
						<div class="counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="content">
									<span class="icon flaticon-group"></span>
									<div class="count-outer count-box">
										<span class="count-text" data-speed="4000" data-stop="560">0</span>+
									</div>
									<h5>Worlds Clients</h5>
								</div>
							</div>
						</div>
						
						<!-- Column -->
						<div class="counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
								<div class="content">
									<span class="icon flaticon-notepad"></span>
									<div class="count-outer count-box">
										<span class="count-text" data-speed="5500" data-stop="2400">0</span>+
									</div>
									<h5>Project Done</h5>
								</div>
							</div>
						</div>

						<!-- Column -->
						<div class="counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
								<div class="content">
									<span class="icon flaticon-user-1"></span>
									<div class="count-outer count-box">
										<span class="count-text" data-speed="3500" data-stop="60">0</span>
									</div>
									<h5>Team Member</h5>
								</div>
							</div>
						</div>

						<!-- Column -->
						<div class="counter-column col-lg-3 col-md-6 col-sm-12">
							<div class="inner wow fadeInLeft" data-wow-delay="450ms" data-wow-duration="1500ms">
								<div class="content">
									<span class="icon flaticon-customer-review"></span>
									<div class="count-outer count-box">
										<span class="count-text" data-speed="3000" data-stop="50">0</span>%
									</div>
									<h5>Years Experince</h5>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section> --}}
	<!-- End Counter Section -->
	
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
									<div class="text">ITE es un centro educativo que brinda clases de nivelación en diferentes materias y cursos de programación en todos los lenguajes y niveles, con explicaciones detalladas y fáciles de comprender para asegurar un aprendizaje efectivo.</div>
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
										<li><a href="#">¿Quienes Somos?</a></li>
										<li><a href="#">Misión</a></li>
										<li><a href="#">Visión</a></li>
										<li><a href="#">Preguntas frecuentes</a></li>
										<li><a href="#">Terminos & condiciones</a></li>
										<li><a href="#">Politica de privacidad</a></li>
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
										<li><i class="icon fas fa-clock"></i> Lu a Vi: 07:00 a 18:30 Sábados: 07:30 a 17:00</li>
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
						<div class="copyright">Copyright &copy; 2023 . All Rights Reserved.</div>
					</div>
					
					<!-- Nav Column -->
					<div class="nav-column col-lg-6 col-md-6 col-sm-12">
						<ul class="footer-nav">
							<li><a href="#">Terminos & condiciones</a></li>
							<li><a href="#">Politica de privacidad</a></li>
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