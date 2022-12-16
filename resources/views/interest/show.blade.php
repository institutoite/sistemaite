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

  <div class="cs-height_90 cs-height_lg_80"></div>

  <!-- Start Hero -->


  <!-- End Hero -->
    <div class="container">
        <h2 class="cs-section_title">NIVEL {{$interest->interest}}</h2>
        <div class="cs-height_30 cs-height_lg_30"></div>
        @if ($interest->id==1)
            <ul>
                <li>Favorecemos su desarrollo en el aspecto social e intelectual, respetando sus necesidades.</li>
                <li>Trabajamos todos los días para fomentar la autonomía del niño, estimulando su creatividad y autoestima, así como la adquisición de valores tales como el respeto, la empatía, la tolerancia, etc. por lo que tenemos en cuenta el principio del aprendizaje a través del juego sustentado siempre en pilares tan importantes como el cariño y el sentimiento de seguridad.</li>
                <li>Dentro del proyecto pedagógico incluimos, como parte importante en el logro de objetivos globales de la educación infantil, la colaboración y comunicación continuada con las familias, tanto en el proceso de adaptación inicial a la guardería, donde los padres participan activamente, como a posteriori en las reuniones anuales de evaluación del niño, o en el intercambio de información diario.</li>
            </ul>
            <div class="row">
              @foreach ($observaciones as $observacion)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  
                      <div class="card">
                        <div class="card-body">
                          {!!$observacion->observacion!!}
                        </div>
                      </div>
                    </div>    
              @endforeach
            </div>
        @else
                @foreach ($observaciones as $observacion)
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">  
                    <div class="card">
                      <div class="card-body">
                        {!!$observacion->observacion!!}
                      </div>
                    </div>
                  </div>      
                @endforeach
        @endif

      <div class="cs-height_30 cs-height_lg_30"></div>
      <div class="cs-section_heading cs-style4">
        <a name="servicios" id="servicios"></a>
        <h5 class="cs-section_subtitle">Elija el servio de su interest que se ajuste a tu necesidad</h5>
       
      </div>
      <div class="cs-height_30 cs-height_lg_30"></div>
      <div class="row text-primary">
        {{-- {{$modalidades}} --}}
        {{-- @foreach ($modalidades as $modalidad)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="card card-widget widget-user-2 shadow-sm tarjeta">
                    <div class="widget-user-header bg-primary">
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{asset('imagenes/apuntando.jpg')}}" alt="User Avatar">
                        </div>
                        <h3 class="widget-user-username">{{$modalidad->modalidad}}</h3>
                        <p class="widget-user-desc">{{$modalidad->descripcion}}</p>
                    </div>
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                              <a href="#" class="nav-link text-secondary">
                              Costo<span class="float-right badge bg-primary">{{"Bs. ".$modalidad->costo}}</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link text-secondary">
                              Carga horaria <span class="float-right badge bg-primary">{{$modalidad->cargahoraria.' Hras'}}</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link {{ $modalidad->vigente==1 ? "text-success" : "text-danger" }}">
                              Estado<span class="float-right badge {{ $modalidad->vigente==1 ? "bg-success" : "bg-danger" }}">{{ $resultado = $modalidad->vigente==1 ? 'Habilitado' : 'deshabilitado';}}</span>
                              </a>
                          </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                    <a class="btn form-inline btn-outline-primary boton-line-turqueza" target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Quiero%20mas%20información%20del%20sobre%20*{{$modalidad->modalidad}}*"><i class="fab fa-whatsapp"></i> Más info</a>    
                    <a class="btn form-inline btn-outline-primary boton-line-turqueza" target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Quiero%20inscribirme%20a%20la%20modalidad%20*{{$modalidad->modalidad}}*"><i class="fas fa-handshake"></i></i>Inscribir</a>    
                    </div>
                </div>
            </div>
        @endforeach --}}
      </div>
    </div>
    
    <div class="cs-height_95 cs-height_lg_70"></div>
  <!-- Start Icon Boxes -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center"></h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.71431 0.123112C1.85102 0.33329 1.06898 0.951317 0.621071 1.77739L0.273926 2.41758V16.8057C0.273926 30.1828 0.286738 31.2653 0.455836 32.2106C1.46778 37.8655 4.55853 42.44 9.98462 46.314C12.9501 48.4312 16.4617 50.1281 20.9155 51.5961C23.0438 52.2976 23.5931 52.2244 27.6155 50.7031C36.9293 47.1806 43.1717 41.2725 45.113 34.1426C45.7553 31.7837 45.7261 32.6085 45.7261 16.8057V2.41758L45.3786 1.77688C44.8372 0.778152 43.9532 0.180461 42.8469 0.0648477C41.9747 -0.0263616 41.328 0.20395 40.0143 1.07364C38.7 1.94374 37.2761 2.5454 35.7103 2.89234C34.7923 3.0958 34.3718 3.12824 32.7107 3.12377C30.9938 3.11919 30.6525 3.08889 29.6451 2.85227C28.1312 2.49659 26.736 1.89819 25.5293 1.08706C23.4193 -0.331105 22.5807 -0.331105 20.4708 1.08706C19.264 1.89819 17.8688 2.49659 16.3549 2.85227C15.3475 3.08889 15.0062 3.11919 13.2893 3.12377C11.6282 3.12824 11.2077 3.0958 10.2897 2.89234C8.72498 2.5457 7.29989 1.94364 5.98829 1.07537C4.52335 0.105521 3.73195 -0.124587 2.71431 0.123112ZM24.3662 13.1964C26.2201 13.589 27.9432 14.9226 28.7755 16.6088C29.3863 17.8463 29.5038 18.5265 29.506 20.836L29.5077 22.7819L29.9406 22.8467C31.0173 23.0082 31.9753 23.7282 32.4443 24.7282L32.7107 25.2962V29.3126V33.3291L32.4443 33.8971C32.1057 34.6192 31.5604 35.1645 30.8383 35.5031L30.2703 35.7695H23H15.7297L15.1617 35.5031C14.4396 35.1645 13.8943 34.6192 13.5557 33.8971L13.2893 33.3291V29.3126V25.2962L13.5557 24.7282C14.0247 23.7282 14.9827 23.0082 16.0594 22.8467L16.4923 22.7819L16.494 20.836C16.4962 18.5265 16.6137 17.8463 17.2245 16.6088C18.5052 14.0142 21.4912 12.5874 24.3662 13.1964ZM22.0137 16.4804C21.2787 16.743 20.7169 17.1574 20.3548 17.704C19.8379 18.4846 19.7462 18.9801 19.7462 20.9932V22.805H23.0076H26.2691L26.2361 20.7967C26.2044 18.8775 26.1912 18.7633 25.9366 18.2205C25.238 16.7308 23.4867 15.9541 22.0137 16.4804ZM22.3268 27.8262C22.1523 27.9053 21.8777 28.1426 21.7167 28.3538C21.4738 28.672 21.4239 28.8357 21.4239 29.3126C21.4239 29.7804 21.4751 29.9548 21.6979 30.2468C22.2702 30.9972 23.2444 31.1409 23.9762 30.5829C25.1523 29.6857 24.6084 27.8357 23.1346 27.7207C22.848 27.6983 22.5122 27.7422 22.3268 27.8262Z" fill="url(#paint0_linear_1448_22264)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22264" x1="0.273926" y1="0.0234375" x2="57.526" y2="25.3596" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>              
            </div>
            <h2 class="cs-iconbox_title">¿En que materia deseas optimizarte?</h2>
            <div class="cs-iconbox_subtitle">Aprende lo que realmente, necesitas, avanza a tu ritmo de comprensión.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="64" height="53" viewBox="0 0 64 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19269 0.857312C2.86134 1.18469 1.59468 2.294 1.0703 3.59191L0.789062 4.28792V26.6867V49.0854L1.08348 49.8178C1.49471 50.8406 2.60159 51.9382 3.59641 52.31C3.9991 52.4603 4.6995 52.6146 5.15273 52.6526L5.97678 52.7217L5.97886 33.9977C5.98117 13.4034 5.9481 14.3409 6.72882 12.7968C7.19803 11.8686 8.31016 10.6251 9.15703 10.0817C9.49869 9.86246 10.145 9.54033 10.5934 9.36578L11.4086 9.04841L20.4898 8.98738L29.5709 8.92635L27.1573 5.93578C24.189 2.25775 23.6039 1.6445 22.5802 1.13879L21.7896 0.748065L13.3033 0.725971C6.8344 0.709005 4.66874 0.740253 4.19269 0.857312ZM12.202 11.4462C10.7866 11.6805 9.43436 12.7185 8.8238 14.0396L8.47909 14.7854L8.44748 33.7376L8.41574 52.6897L34.0199 52.6575C58.1292 52.6271 59.656 52.6127 60.1732 52.4103C60.9805 52.0945 61.881 51.3647 62.3985 50.6068C63.2767 49.3206 63.2327 50.3662 63.1963 31.6165L63.1637 14.7802L62.7633 13.9669C62.0847 12.5885 60.8549 11.6852 59.3187 11.4367C58.313 11.2741 13.1875 11.2832 12.202 11.4462ZM46.964 19.7382C47.4435 19.9053 47.7227 20.3316 47.7227 20.8967C47.7227 21.3016 47.5834 21.4822 46.1358 22.9546C45.2631 23.8423 44.549 24.5979 44.549 24.6337C44.549 24.6694 45.0845 25.1045 45.7391 25.6004C47.1272 26.6522 48.7968 28.2249 50.2616 29.8603C52.0672 31.8763 52.1112 32.0782 51.0379 33.4226C48.0362 37.1829 43.7752 40.4185 40.0911 41.7351C36.5278 43.0084 32.9556 42.8291 29.1993 41.1885L28.3144 40.8019L26.4369 42.6549C24.7057 44.3637 24.5248 44.508 24.1135 44.508C23.2426 44.508 22.659 43.7388 22.9461 42.9693C23.0186 42.7749 23.7682 41.9221 24.612 41.074L26.1463 39.5321L24.9416 38.6416C23.668 37.7001 20.3169 34.4271 19.4224 33.251C18.5157 32.0588 18.5827 31.8535 20.6392 29.5289C24.2008 25.5028 28.438 22.7833 32.6065 21.8485C33.8951 21.5595 36.7529 21.5551 37.9575 21.8402C39.2037 22.1353 40.6765 22.6278 41.5576 23.044L42.2891 23.3897L44.0599 21.6256C45.5776 20.1136 46.1381 19.6544 46.5143 19.6146C46.5546 19.6105 46.757 19.666 46.964 19.7382ZM33.0888 24.1832C30.5717 24.7504 28.0187 26.0988 25.507 28.1879C24.4081 29.1019 21.9124 31.5817 21.7091 31.9615C21.6066 32.153 21.86 32.4577 23.3952 33.9884C24.3888 34.9792 25.8053 36.2412 26.543 36.7928L27.8841 37.7957L28.7653 36.9101L29.6463 36.0246L29.161 35.048C27.3743 31.4528 29.094 27.1266 32.9069 25.6243C33.6578 25.3283 33.9071 25.2931 35.2721 25.289C36.9173 25.2841 37.7909 25.4929 38.8044 26.1326L39.2659 26.424L39.8923 25.7896L40.5187 25.1554L39.6348 24.8236C38.0259 24.2196 37.3644 24.0934 35.5773 24.0496C34.3942 24.0205 33.6285 24.0617 33.0888 24.1832ZM41.8124 27.2871L40.9743 28.1317L41.2868 28.6649C42.0386 29.9477 42.3739 31.8214 42.1124 33.2781C41.883 34.555 41.1106 36.0105 40.1671 36.9433C37.9765 39.1091 34.8721 39.5798 32.093 38.1676L31.3289 37.7792L30.7379 38.3613C30.4129 38.6815 30.1878 38.9785 30.2377 39.0212C30.6936 39.4122 33.1571 40.0636 34.6079 40.1769C38.7966 40.5038 43.8792 37.839 48.1926 33.0542L49.0805 32.0693L47.6462 30.5925C46.8575 29.7801 45.7693 28.7406 45.2279 28.2825C44.2602 27.4636 42.8713 26.4425 42.725 26.4425C42.684 26.4425 42.2734 26.8225 41.8124 27.2871ZM34.5673 27.6768C32.5222 28.0174 31.0025 29.7385 30.8992 31.8312C30.8549 32.7293 31.1017 34.0301 31.345 34.1805C31.3987 34.2137 32.81 32.8727 34.4813 31.2005L37.5198 28.1601L36.9758 27.9259C36.291 27.6311 35.3974 27.5388 34.5673 27.6768ZM36.1258 32.9758C32.8422 36.2638 32.9644 36.0499 34.1644 36.4067C36.147 36.9961 38.3741 35.9708 39.3308 34.0283C39.6631 33.3534 39.7325 33.0641 39.7586 32.2435C39.7897 31.2615 39.5203 30.1098 39.2385 30.0207C39.171 29.9993 37.7703 31.3291 36.1258 32.9758Z" fill="url(#paint0_linear_1448_22255)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22255" x1="0.789062" y1="0.72168" x2="69.4526" y2="42.4529" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>                           
            </div>
            <h2 class="cs-iconbox_title">Logra tus objetivos</h2>
            <div class="cs-iconbox_subtitle">No sólo clases: Apoyo académico, motivaciones, orientaciones, sobre todo mucha práctica.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
       
        
        <div class="col-lg-4 col-sm-6">
          <div class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3609 1.13138C27.6679 1.49733 27.5724 1.84714 27.5724 4.02065C27.5724 5.71207 27.5936 5.95001 27.7769 6.30927C28.0069 6.76006 28.5922 7.11942 29.0963 7.11942C29.6005 7.11942 30.1858 6.76006 30.4158 6.30927C30.5991 5.95001 30.6203 5.71207 30.6203 4.02065C30.6203 2.32923 30.5991 2.09128 30.4158 1.73203C30.0409 0.997163 29.1232 0.728941 28.3609 1.13138ZM19.5477 4.58208C19.0945 4.68836 18.5631 5.26534 18.4722 5.74946C18.3386 6.46136 18.5314 6.77591 19.9749 8.20297C21.4271 9.63857 21.7337 9.81911 22.4464 9.65828C23.3516 9.45416 23.8862 8.34663 23.4659 7.54613C23.2241 7.08559 20.6208 4.57944 20.3841 4.57944C20.2676 4.57944 20.1113 4.56136 20.037 4.53921C19.9625 4.51716 19.7423 4.53636 19.5477 4.58208ZM37.8452 4.58005C37.5934 4.63939 37.1488 5.01114 36.1872 5.96647C35.4647 6.68437 34.808 7.39526 34.7281 7.54613C34.3052 8.34409 34.8403 9.45396 35.7463 9.65828C36.459 9.81911 36.7655 9.63857 38.2178 8.20297C39.6676 6.76982 39.8543 6.46299 39.7181 5.73726C39.6342 5.28982 38.9892 4.57944 38.6669 4.57944C38.5532 4.57944 38.3992 4.56136 38.3248 4.53921C38.2503 4.51716 38.0346 4.53545 37.8452 4.58005ZM28.0096 10.5633C27.8311 10.6755 27.6105 10.881 27.5194 11.02C27.4283 11.159 27.1762 12.1492 26.9591 13.2203C26.3092 16.4277 25.8504 17.7872 24.9655 19.1275C24.1062 20.4292 23.0592 21.1831 19.5968 22.9931C18.3675 23.6359 16.8725 24.4306 16.2744 24.759L15.5489 25.1577C15.3327 25.2766 15.2159 25.5198 15.2585 25.7628C15.2977 25.9864 15.3297 31.4498 15.3297 37.9039V48.8128C15.3297 49.3602 15.2475 49.9046 15.0858 50.4276C14.9516 50.8617 14.8622 51.2371 14.8871 51.262C14.912 51.2868 15.7305 51.5113 16.7058 51.7608C18.7334 52.2795 21.1901 52.6824 23.2544 52.8348C25.3746 52.9913 40.6895 52.9756 41.2256 52.8164C41.4769 52.7417 41.8274 52.5086 42.1039 52.2322C43.0479 51.2882 43.0479 50.021 42.1039 49.077C41.493 48.466 41.1163 48.3686 39.3674 48.3686C37.6672 48.3686 37.2664 48.2359 36.9208 47.5585C36.6636 47.0544 36.6616 46.639 36.9136 46.1449C37.3075 45.373 37.2844 45.3776 40.9326 45.3206C44.0463 45.272 44.2017 45.2603 44.6057 45.0442C45.3445 44.6492 45.8602 43.823 45.8602 43.0347C45.8602 42.1551 45.099 41.118 44.2736 40.8728C43.9859 40.7874 42.931 40.7487 40.8914 40.7487C38.1213 40.7487 37.9011 40.7353 37.5264 40.5442C37.0756 40.3142 36.7163 39.7288 36.7163 39.2247C36.7163 38.8036 37.0467 38.1818 37.3962 37.9449C37.6576 37.7677 37.9535 37.7473 40.9326 37.7007C44.0463 37.6521 44.2017 37.6404 44.6057 37.4243C45.3445 37.0293 45.8602 36.2031 45.8602 35.4147C45.8602 34.5352 45.099 33.4981 44.2736 33.2529C43.9859 33.1675 42.931 33.1288 40.8914 33.1288C38.1213 33.1288 37.9011 33.1154 37.5264 32.9242C37.0756 32.6942 36.7163 32.1089 36.7163 31.6048C36.7163 31.1837 37.0467 30.5619 37.3962 30.3249C37.6576 30.1478 37.9535 30.1273 40.9326 30.0808C44.0463 30.0321 44.2017 30.0204 44.6057 29.8043C45.3445 29.4093 45.8602 28.5831 45.8602 27.7948C45.8602 26.9153 45.099 25.8782 44.2736 25.633C43.963 25.5407 42.1696 25.5088 37.301 25.5088H31.6936C31.2339 25.5088 30.9146 25.0513 31.0733 24.6198C31.2531 24.131 31.6418 23.1594 31.9372 22.4609C33.271 19.306 33.602 18.0947 33.6029 16.3649C33.6036 14.9081 33.4352 14.2642 32.7488 13.099C31.67 11.2677 29.0878 9.88606 28.0096 10.5633ZM0.929135 22.6704C0.696981 22.793 0.469806 23.0267 0.344941 23.2714C0.143165 23.667 0.140625 23.8469 0.140625 37.7007C0.140625 51.5602 0.143063 51.7343 0.345144 52.1304C0.476816 52.3886 0.692612 52.6044 0.950776 52.7361C1.32852 52.9288 1.54472 52.9406 4.6947 52.9406C6.5436 52.9406 8.28196 52.8942 8.58442 52.8368C10.4091 52.4908 11.8827 51.0172 12.2288 49.1925C12.3707 48.4442 12.3707 26.9572 12.2288 26.209C11.8827 24.3842 10.4091 22.9106 8.58442 22.5646C8.2781 22.5065 6.55803 22.4628 4.67336 22.4653C1.52471 22.4696 1.28463 22.4827 0.929135 22.6704ZM8.47439 44.0012C8.92518 44.2312 9.28454 44.8165 9.28454 45.3206C9.28454 45.8248 8.92518 46.4101 8.47439 46.6401C8.25392 46.7526 7.93266 46.8446 7.76055 46.8446C6.98748 46.8446 6.23657 46.0937 6.23657 45.3206C6.23657 44.8321 6.59613 44.2326 7.02508 44.0062C7.51529 43.7474 7.97381 43.7459 8.47439 44.0012Z" fill="url(#paint0_linear_1448_22273)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22273" x1="0.140625" y1="0.944336" x2="57.6183" y2="26.5299" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>                          
            </div>
            <h2 class="cs-iconbox_title">Descubre tu potencialidad real</h2>
            <div class="cs-iconbox_subtitle">Te transformamos a una versión mejorada de ti mismo, para que seas mas <br> productivo.  </div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Icon Boxes -->

  
  {{-- <div class="cs-height_70 cs-height_lg_40"></div> --}}
  {{-- <div class="cs-height_95 cs-height_lg_70"></div> --}}
  
  
  <div class="cs-height_95 cs-height_lg_70"></div> 

  <!-- Start Membresias Ite-->
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="cs-section_heading cs-style4">
      <a name="servicios" id="servicios"></a>
      <h2 class="cs-section_title">Tenemos la solución de aprendizaje ideal para usted.</h2>
      <p class="cs-section_subtitle">Elige el mejor plan de acuerdo a tus necesidades.</p>
    </div>
    <div class="cs-height_45 cs-height_lg_45"></div>
    <div class="row text-primary">
           @yield('convenios')
    </div>
  </div>

  <div class="cs-height_95 cs-height_lg_70"></div>

<!-- Start Logo Carousel -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center">También puede interesarte </h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
    </div>
    <div class="cs-moving_carousel_1">
      {{-- {{dd($intereses)}} --}}
      @yield('intereses')
    </div>
  </section>
  <!-- End Logo Carousel -->


  
  <!-- Start CTA -->
  <section>
    <div class="container">
        <div class="cs-cta cs-style2 text-center cs-white_bg tarjeta">
          <h2 class="cs-cta_title">¿Te gustaría aprender a tu ritmo <br> desde cualquier dispositivo?</h2>
          <div class="cs-cta_subtitle">Ingresa a nuestra plataforma educativa Educabol para ver todos nuestros cursos online.</div>
          <a href="https://www.educabol.com" class="cs-btn cs-style2 cs-btn_lg"><span>Ingresar</span></a>
        </div>
      </div>
  </section>
  <!-- End CTA -->
  
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