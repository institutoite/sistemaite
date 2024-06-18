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
<link href="{{asset('assetshome/css/niveles.css')}}" rel="stylesheet">

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
						<span data-text-preloader="P" class="letters-loading">
							P
						</span>
						<span data-text-preloader="r" class="letters-loading">
							r
						</span>
						<span data-text-preloader="i" class="letters-loading">
							i
						</span>
						<span data-text-preloader="m" class="letters-loading">
							m
						</span>
						<span data-text-preloader="a" class="letters-loading">
							a
						</span>
						<span data-text-preloader="r" class="letters-loading">
							r
						</span>
						<span data-text-preloader="i" class="letters-loading">
							i
						</span>
						<span data-text-preloader="a" class="letters-loading">
							a
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
						<div class="text">Apoyo escolar 2024. <a href="contact.html">Contactanos</a></div>
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
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1688" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/primariaportada.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/primariaportada.jpg')}}"> 
						
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
					
					<li data-transition="fadefromleft" data-description="Slide Description"  data-index="rs-1689" data-slotamount="default" data-thumb="{{ asset('assetshome/images/main-slider/primariaportada.jpg')}}" data-title="Slide Title">
					<img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('assetshome/images/main-slider/primariaportada.jpg')}}">
					
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
								<a href="https://www.youtube.com/@ite_educabol" class="lightbox-image play-box"><span class="fas fa-play"><span class="dott"></span><i class="ripple"></i></span></a>
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


  <div id="pricing-table" class="clear">
	<!-- Turno Mañana -->
	<div class="plan">
		<h3>Turno Mañana</h3>
		<a class="signup" href="https://api.whatsapp.com/send?phone=59171039910&text=Hola, estoy interesado en el Turno Mañana."> 
			¡Empieza! 
			<i class="fa-brands fa-whatsapp fa-beat"></i>
		</a>         
		<ul>
			<li><b>07:30 - 09:00</b></li>
			<li><b>09:00 - 10:30</b></li>
			<li><b>10:30 - 12:00</b></li>
		</ul> 
	</div>

	<!-- Turno Tarde -->
	<div class="plan" id="most-popular">
		<h3>Turno Tarde</h3>
		<a class="signup" href="https://api.whatsapp.com/send?phone=59171039910&text=Hola, estoy interesado en el Turno Tarde."> 
			¡Empieza! 
			<i class="fa-brands fa-whatsapp fa-beat"></i>
		</a>        
		<ul>
			<li><b>14:00 - 15:30</b></li>
			<li><b>15:30 - 17:00</b></li>
			<li><b>17:00 - 18:30</b></li>			
		</ul>    
	</div>

	<!-- Turno Noche -->
	<div class="plan">
		<h3>Turno Noche</h3>
		<a class="signup" href="https://api.whatsapp.com/send?phone=59171039910&text=Hola, estoy interesado en el Turno Noche."> 
			¡Empieza! 
			<i class="fa-brands fa-whatsapp fa-beat"></i>
		</a>
		<ul>
			<li><b>18:30 - 20:00</b></li>
			<li><b>19:00 - 20:30</b></li>
			<li><b>19:30 - 21:00</b></li>		
			<li><b>Excepto Miércoles</b></li>		
		</ul>
	</div>

	<!-- Horario Especial -->
	<div class="plan">
		<h3>Horario Especial</h3>
		<a class="signup" href="https://api.whatsapp.com/send?phone=59171039910&text=Hola, estoy interesado en el Horario Especial."> 
			¡Empieza! 
			<i class="fa-brands fa-whatsapp fa-beat"></i>
		</a>		
		<ul>
			<li>Clases desde el alba, únete ahora </li>
			<li><b>05:00 - 06:30</b></li>
			<li><b>05:30 - 07:00</b></li>
			<li><b>Sujeto a reserva</b></li>			
		</ul>
	</div> 	
</div>
<br>

{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%            MODALIDAD           %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}


<section class="custom-image-text-section">
    <div class="custom-overlay"></div>
    <div class="custom-content">
        <h1>Modalidades</h1>
        <p>Elije la modalidad que se acomode a tu necesidad</p>
        <a href="#" class="custom-button">Inscríbete ahora</a>
    </div>
</section>


<section class="about-section-two">
	<table class="table table-bordered table-striped table-hover">
		<thead class="table-head">
			<tr>
				<th class="text-center">MODALIDAD</th>
				<th class="text-center">INVERSION</th>
				{{-- <th class="text-center">HORAS</th> --}}
				<th class="text-center">ACTION</th>
			</tr>
		</thead>
		<tbody class="table-hover">
			@foreach ($modalidadesprimaria as $modalidad)
			<tr>
				<tr>
					<td class="text-left">
						<div class="info-container">
							<h1 class="info-title">{{ $modalidad->modalidad }}</h1>
							<p class="info-description">{{ $modalidad->descripcion }}</p>
						</div>
						{{-- {{ $modalidad->modalidad." ".$modalidad->descripcion  }} --}}
					</td>
					<td class="text-center">{{ "Bs. ".$modalidad->costo }}</td>
					{{-- <td class="text-center"> {{ " (".$modalidad->cargahoraria. " horas)"}}</td> --}}
					<td class="text-center">
						<button class="reservar-button">Reservar</button>
					</td>
				</tr>
			</tr>
			
			@endforeach
		
		
			
			<!-- Otras filas de datos -->
		</tbody>
	</table>
</section>
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%            DIAS ASISTENCIA          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}


<div class="speakers-section">
	<div class="row">
		<div class="col-12">
			<div class="section-title">
				<h3 class="wow zoomIn" data-wow-delay=".2s">--Flexibilidad-- </h3>
				<h2 class="wow fadeInUp" data-wow-delay=".4s">Elige Tus Días y Horarios Favoritos</h2>
				<p class="wow fadeInUp" data-wow-delay=".6s">
					En nuestra institución, te damos la libertad de personalizar tu experiencia de aprendizaje. Selecciona los días de la semana y los horarios que mejor se adapten a tu agenda para asistir a nuestras clases.
				</p>
				<div class="auto-container mt-2">
					<div class="schedule-list">
						<div class="schedule-item mt-3">
							<div class="card">
								<ul>
									<li>Lunes</li>
									<li>Miércoles</li>
									<li>Viernes</li>
								</ul>
								<button>¡Reserva ahora!</button>
							</div>


						</div>
						<div class="schedule-item mt-3">
							<div class="card">
								<ul>
									<li>Martes</li>
									<li>Jueves</li>
									<li>Sábado</li>
								</ul>
								<button>¡Reserva ahora!</button>
							</div>


						</div>
						<div class="schedule-item mt-3">
							<div class="card">
								<ul>
									<li>Lunes</li>
									<li>Martes</li>
									<li>Miércoles</li>
									<li>Jueves</li>
									<li>Viernes</li>
								</ul>
								<button>¡Reserva ahora!</button>
							</div>
						</div>
						<div class="schedule-item mt-3">
							<div class="card">
								<ul>
									<li>Sólo</li>
									<li>Sabados</li>
								</ul>
								<button>¡Reserva ahora!</button>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%            DIAS ASISTENCIA          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
{{-- /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/ --}}
<section class="corporate-plans">
	<div class="content-container">
		<div class="section-title">
			<h1 class="section-heading">Planes Corporativos</h1>
			<h2 class="discount-info">Descuentos del <span>20%</span> en nuestros planes corporativos</h2>
		</div>

		<div class="plans-container">
			<div class="plan-card">
				<h3 class="plan-title">Modalidad Hora Libre</h3>
				<ul class="plan-details">
					<li class="plan-item">1er estudiante <span>Bs.40</span></li>
					<li class="plan-item active">2do estudiante <span>Bs.32</span></li>
					<li class="plan-item">3er estudiante <span>Bs.25</span></li>
					<li class="plan-item">4to estudiante <span>Bs.20</span></li>
				</ul>
			</div>

			<div class="plan-card">
				<h3 class="plan-title">Modalidad Semanal</h3>
				<ul class="plan-details">
					<li class="plan-item">1er estudiante <span>Bs.216</span></li>
					<li class="plan-item active">2do estudiante <span>Bs.172</span></li>
					<li class="plan-item">3er estudiante <span>Bs.138</span></li>
					<li class="plan-item">4to estudiante <span>Bs.110</span></li>
				</ul>
			</div>

			<div class="plan-card">
				<h3 class="plan-title">Modalidad Quincenal</h3>
				<ul class="plan-details">
					<li class="plan-item">1er estudiante <span>Bs.350</span></li>
					<li class="plan-item active">2do estudiante <span>Bs.280</span></li>
					<li class="plan-item">3er estudiante <span>Bs.224</span></li>
					<li class="plan-item">4to estudiante <span>Bs.179</span></li>
				</ul>
			</div>

			<div class="plan-card">
				<h3 class="plan-title">Modalidad Mensual</h3>
				<ul class="plan-details">
					<li class="plan-item">1er estudiante <span>Bs.550</span></li>
					<li class="plan-item active">2do estudiante <span>Bs.440</span></li>
					<li class="plan-item">3er estudiante <span>Bs.352</span></li>
					<li class="plan-item">4to estudiante <span>Bs.281</span></li>
				</ul>
			</div>
		</div>
	</div>
</section>



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
							<a href="#">info@ite.com.com</a>
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
							<a href="https://wa.me/59171039910">+591 71039910</a>
							<a href="https://wa.me/59175553338">+591 75553338</a>
							<a href="https://wa.me/59171324941">+591 71324941</a>
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
	<footer class="footer">
        <div class="container">
            <div class="footer-upper">
                <div class="footer-title">
                    <h2>Contactanos a través de nuestras <span>redes sociales</span></h2>
                </div>
                <div class="footer-social">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/ite.educabol" class="fab fa-facebook-f"></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=59171039910&amp;text=Visite su pagina. Quiero mas información" class="fab fa-whatsapp"></a></li>
                        <li><a href="https://msng.link/o/?@institutoite=tg" class="fab fa-telegram"></a></li>
                        <li><a href="https://www.youtube.com/@ite_educabol" class="fab fa-youtube"></a></li>
                        <li><a href="https://www.tiktok.com/ite_educabol" class="fa-brands fa-tiktok"></a></li>
                        <li><a href="https://www.instagram.com/ite.educabol/" class="fa-brands fa-square-instagram"></a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-widgets">
                <div class="footer-column">
					<h3>Proyectos</h3>
                    <ul class="footer-links">
                        <li><a href="https://propuestos.ite.com.bo">Propuestos</a></li>
                        <li><a href="https://formula.ite.com.bo/">Formulas</a></li>
                        <li><a href="https://tools.ite.com.bo/">Primos</a></li>
                        <li><a href="htps://educabol.com">Educabol</a></li>
                        <li><a href="https://whaio.ite.com.bo">Whaio</a></li>
                        <li><a href="https://asistente.ite.com.bo">ite ia</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Informaciones</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}">¿Quienes Somos?</a></li>
                        <li><a href="{{ route('about') }}">Misión</a></li>
                        <li><a href="{{ route('about') }}">Visión</a></li>
                        <li><a href="{{ route('preguntasfrecuentes') }}">Preguntas Frecuentes</a></li>
                        <li><a href="{{ route('termscondition') }}">Términos & condiciones</a></li>
                        <li><a href="{{ route('privacy') }}">Politica de privacidad</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Niveles</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('inicial') }}">Inicial</a></li>
                        <li><a href="{{ route('primaria') }}">Primaria</a></li>
                        <li><a href="{{ route('secundaria') }}">Secundaria</a></li>
                        <li><a href="{{ route('preuniversitario') }}">Preuniversitario</a></li>
                        <li><a href="{{ route('universitario') }}">Universitarios</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Contacto</h3>
					<ul class="footer-links">
                        <li><a href=""><i class="fas fa-map-marker-alt"></i>Av. 3 pasos al frente y Che Guevara, Santa Cruz</a></li>
                        <li><a href=""><i class="fas fa-phone-alt"></i>+59171039910</a></li>
                        <li><a href=""><i class="fas fa-phone-alt"></i>+59175553338</a></li>
                        <li><a href=""><i class="fas fa-phone-alt"></i>+59171324941</a></li>
                        <li><a href=""><i class="fa-solid fa-envelope"></i>info@ite.com.bo</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>Copyright &copy; 2024. All Rights Reserved.</p>
                <ul class="footer-nav">
                    <li><a href="{{ route('termscondition') }}">Términos & condiciones</a></li>
                    <li><a href="{{ route('privacy') }}">Politica de privacidad</a></li>
                </ul>
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