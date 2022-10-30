<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Site Title -->
  <title>Instituto Educabol</title>
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
              {{-- <form action="#" class="cs-search">
                <input type="text" class="cs-search_input" placeholder="Search">
                <button class="cs-search_btn">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.16667 16.3333C12.8486 16.3333 15.8333 13.3486 15.8333 9.66667C15.8333 5.98477 12.8486 3 9.16667 3C5.48477 3 2.5 5.98477 2.5 9.66667C2.5 13.3486 5.48477 16.3333 9.16667 16.3333Z" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.5 18L13.875 14.375" stroke="currentColor" stroke-opacity="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>                  
                </button>
              </form> --}}
            </div>
            <div class="cs-nav_wrap">
              <div class="cs-nav_out">
                <div class="cs-nav_in">
                  <div class="cs-nav">
                    <ul class="cs-nav_list">
                        <!--
                      <li class="menu-item-has-children">
                        <a href="index.html">Home</a>
                        <ul>
                          <li><a href="index.html">Home Default</a></li>
                          <li><a href="index_2.html">Home Style 2</a></li>
                          <li><a href="index_3.html">Home Style 3</a></li>
                          <li><a href="index_4.html">Home Style 4</a></li>
                          <li><a href="index_5.html">Home Style 5</a></li>
                        </ul>
                      </li>
                      <li class="menu-item-has-children">
                        <a href="explore-1.html">Explore</a>
                        <ul>
                          <li><a href="explore-1.html">Explore Style 1</a></li>
                          <li><a href="explore-2.html">Explore Style 2</a></li>
                          <li><a href="explore-details.html">Explore Details</a></li>
                          <li><a href="live-action.html">Live Auction</a></li>
                          <li><a href="collection.html">Collection</a></li>
                          <li><a href="collection-details.html">Collection Details</a></li>
                        </ul>
                      </li>
                      <li><a href="how-it-works.html">How It Works</a></li>
                      <li class="menu-item-has-children">
                        <a href="blog.html">Community</a>
                        <ul>
                          <li><a href="blog.html">Blog</a></li>
                          <li><a href="blog-with-sidebar.html">Blog With Sidebar</a></li>
                          <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                      </li>
                      <li><a href="activity.html">Activity</a></li>
                      <li class="menu-item-has-children cs-mega-menu">
                        <a href="#">Pages</a>
                        <ul class="cs-mega-wrapper">
                          <li class="menu-item-has-children">
                            <a href="">Column One</a>
                            <ul>
                              <li><a href="connect-wallet.html">Connect Wallet</a></li>
                              <li><a href="about.html">About Us</a></li>
                              <li><a href="help-center.html">Help Center</a></li>
                              <li><a href="help-center-browser-by-category.html">Help Center Catagory</a></li>
                              <li><a href="help-details.html">Help Center Details</a></li>
                              <li><a href="terms-condition.html">Terms & Conditions</a></li>
                              <li><a href="privacy-policy.html">Privacy Policy</a></li>
                              <li><a href="faq.html">FAQ</a></li>
                              <li><a href="404.html">404</a></li>
                            </ul>
                          </li>
                          <li class="menu-item-has-children">
                            <a href="">Column Two</a>
                            <ul>
                              <li><a href="user-profile.html">Edit Profile</a></li>
                              <li><a href="user-account-settings.html">Profile Settings</a></li>
                              <li><a href="user-items.html">My Item</a></li>
                              <li><a href="create-items.html">Create Items</a></li>
                              <li><a href="user-activity.html">My Activity</a></li>
                              <li><a href="user-wallet.html">My Wallet</a></li>
                              <li><a href="login.html">Login</a></li>
                              <li><a href="register.html">Register</a></li>
                              <li><a href="forget-password.html">Forget Password</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li><a href="contact.html">Contact</a></li>
                        -->
                        <li><a href="{{ url('/') }}" class="cs-hero_btn cs-style1 cs-color1">Inicio</a></li>
                        <li><a href="{{ route('about') }}" class="cs-hero_btn cs-style1 cs-color1">Acerca de Nosotros</a></li>
                        <li><a href="{{ route('contact') }}" class="cs-hero_btn cs-style1 cs-color1">Contactenos</a></li>
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
                <div class="cs-toggle_box cs-notification_box">
                  {{-- <div class="cs-toggle_btn cs-header_icon_btn cs-center">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 6.63916C14 5.44569 13.5259 4.30109 12.682 3.45718C11.8381 2.61327 10.6935 2.13916 9.5 2.13916C8.30653 2.13916 7.16193 2.61327 6.31802 3.45718C5.47411 4.30109 5 5.44569 5 6.63916C5 11.8892 2.75 13.3892 2.75 13.3892H16.25C16.25 13.3892 14 11.8892 14 6.63916Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M10.7981 16.3887C10.6663 16.616 10.477 16.8047 10.2493 16.9358C10.0216 17.067 9.76341 17.136 9.50063 17.136C9.23784 17.136 8.97967 17.067 8.75196 16.9358C8.52424 16.8047 8.33498 16.616 8.20312 16.3887" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                  
                    <span class="cs-btn_badge">8</span>
                  </div> --}}
                  {{-- <div class="cs-toggle_body">
                    <h3 class="cs-notification_title">Notificaciones 10</h3>
                    
                  </div> --}}
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
                      <div class="cs-user_info">
                        <h3 class="cs-user_balance">{{ Auth::user()->name }} </h3>
                      </div>
                      <div class="text-center">
                        <a class="cs-btn cs-style1" href="{{ route('logout') }}" onclick="event.preventDefault();
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
  <section class="cs-hero cs-style4 cs-bg cs-center" data-src="fronted/assets/img/hero_bg4.jpeg">
    <div class="container-fluid">
      <div class="cs-hero_in">
        <div class="cs-hero_in_left">
          <div class="cs-hero_text">
            <h1 class="cs-hero_title cs-white_color">{{ $hometext->first()->subheading }}</h1>
            <div class="cs-hero_subtitle cs-medium cs-white_color">{{$hometext->first()->header}}</div>
            <div class="cs-hero_btns">
              <a href="https://api.whatsapp.com/send?phone=59171039910" target="_blank" class="cs-hero_btn cs-style1 cs-color2"><span>Contactanos</span></a>
              <a href="#servicios" class="cs-hero_btn cs-style1 cs-color1"><span>Leer mas...</span></a>
            </div>
          </div>
        </div>
        <div class="cs-hero_in_right">
          <div class="cs-slider cs-style1">
            <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="1" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="3" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
              <div class="cs-slider_wrapper">
                
                  @yield('docente')
                
              </div>
            </div><!-- .cs-slider_container -->
            <div class="cs-slider_arrows cs-style1 cs-center cs-hidden_mobile">
              <div class="cs-left_arrow cs-center cs-box_shadow">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.0269 7.55957H0.817552" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.92188 1.45508L0.817222 7.55973L6.92188 13.6644" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                                   
              </div>
              <div class="cs-right_arrow cs-center cs-box_shadow">
                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.816895 7.55957H13.0262" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M6.92188 1.45508L13.0265 7.55973L6.92188 13.6644" stroke="currentColor" stroke-width="1.16474" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                  
              </div>
            </div>
            <div class="cs-pagination cs-style1 cs-hidden"></div>
          </div><!-- .cs-slider -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
  
  <!-- Start Icon Boxes -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center"></h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            {{-- <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.71431 0.123112C1.85102 0.33329 1.06898 0.951317 0.621071 1.77739L0.273926 2.41758V16.8057C0.273926 30.1828 0.286738 31.2653 0.455836 32.2106C1.46778 37.8655 4.55853 42.44 9.98462 46.314C12.9501 48.4312 16.4617 50.1281 20.9155 51.5961C23.0438 52.2976 23.5931 52.2244 27.6155 50.7031C36.9293 47.1806 43.1717 41.2725 45.113 34.1426C45.7553 31.7837 45.7261 32.6085 45.7261 16.8057V2.41758L45.3786 1.77688C44.8372 0.778152 43.9532 0.180461 42.8469 0.0648477C41.9747 -0.0263616 41.328 0.20395 40.0143 1.07364C38.7 1.94374 37.2761 2.5454 35.7103 2.89234C34.7923 3.0958 34.3718 3.12824 32.7107 3.12377C30.9938 3.11919 30.6525 3.08889 29.6451 2.85227C28.1312 2.49659 26.736 1.89819 25.5293 1.08706C23.4193 -0.331105 22.5807 -0.331105 20.4708 1.08706C19.264 1.89819 17.8688 2.49659 16.3549 2.85227C15.3475 3.08889 15.0062 3.11919 13.2893 3.12377C11.6282 3.12824 11.2077 3.0958 10.2897 2.89234C8.72498 2.5457 7.29989 1.94364 5.98829 1.07537C4.52335 0.105521 3.73195 -0.124587 2.71431 0.123112ZM24.3662 13.1964C26.2201 13.589 27.9432 14.9226 28.7755 16.6088C29.3863 17.8463 29.5038 18.5265 29.506 20.836L29.5077 22.7819L29.9406 22.8467C31.0173 23.0082 31.9753 23.7282 32.4443 24.7282L32.7107 25.2962V29.3126V33.3291L32.4443 33.8971C32.1057 34.6192 31.5604 35.1645 30.8383 35.5031L30.2703 35.7695H23H15.7297L15.1617 35.5031C14.4396 35.1645 13.8943 34.6192 13.5557 33.8971L13.2893 33.3291V29.3126V25.2962L13.5557 24.7282C14.0247 23.7282 14.9827 23.0082 16.0594 22.8467L16.4923 22.7819L16.494 20.836C16.4962 18.5265 16.6137 17.8463 17.2245 16.6088C18.5052 14.0142 21.4912 12.5874 24.3662 13.1964ZM22.0137 16.4804C21.2787 16.743 20.7169 17.1574 20.3548 17.704C19.8379 18.4846 19.7462 18.9801 19.7462 20.9932V22.805H23.0076H26.2691L26.2361 20.7967C26.2044 18.8775 26.1912 18.7633 25.9366 18.2205C25.238 16.7308 23.4867 15.9541 22.0137 16.4804ZM22.3268 27.8262C22.1523 27.9053 21.8777 28.1426 21.7167 28.3538C21.4738 28.672 21.4239 28.8357 21.4239 29.3126C21.4239 29.7804 21.4751 29.9548 21.6979 30.2468C22.2702 30.9972 23.2444 31.1409 23.9762 30.5829C25.1523 29.6857 24.6084 27.8357 23.1346 27.7207C22.848 27.6983 22.5122 27.7422 22.3268 27.8262Z" fill="url(#paint0_linear_1448_22264)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22264" x1="0.273926" y1="0.0234375" x2="57.526" y2="25.3596" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>              
            </div> --}}
            <h2 class="cs-iconbox_title">¿En que materia deseas optimizarte?</h2>
            <div class="cs-iconbox_subtitle">Aprende lo que realmente, necesitas, avanza a tu ritmo de comprensión.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            {{-- <div class="cs-iconbox_icon">
              <svg width="64" height="53" viewBox="0 0 64 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19269 0.857312C2.86134 1.18469 1.59468 2.294 1.0703 3.59191L0.789062 4.28792V26.6867V49.0854L1.08348 49.8178C1.49471 50.8406 2.60159 51.9382 3.59641 52.31C3.9991 52.4603 4.6995 52.6146 5.15273 52.6526L5.97678 52.7217L5.97886 33.9977C5.98117 13.4034 5.9481 14.3409 6.72882 12.7968C7.19803 11.8686 8.31016 10.6251 9.15703 10.0817C9.49869 9.86246 10.145 9.54033 10.5934 9.36578L11.4086 9.04841L20.4898 8.98738L29.5709 8.92635L27.1573 5.93578C24.189 2.25775 23.6039 1.6445 22.5802 1.13879L21.7896 0.748065L13.3033 0.725971C6.8344 0.709005 4.66874 0.740253 4.19269 0.857312ZM12.202 11.4462C10.7866 11.6805 9.43436 12.7185 8.8238 14.0396L8.47909 14.7854L8.44748 33.7376L8.41574 52.6897L34.0199 52.6575C58.1292 52.6271 59.656 52.6127 60.1732 52.4103C60.9805 52.0945 61.881 51.3647 62.3985 50.6068C63.2767 49.3206 63.2327 50.3662 63.1963 31.6165L63.1637 14.7802L62.7633 13.9669C62.0847 12.5885 60.8549 11.6852 59.3187 11.4367C58.313 11.2741 13.1875 11.2832 12.202 11.4462ZM46.964 19.7382C47.4435 19.9053 47.7227 20.3316 47.7227 20.8967C47.7227 21.3016 47.5834 21.4822 46.1358 22.9546C45.2631 23.8423 44.549 24.5979 44.549 24.6337C44.549 24.6694 45.0845 25.1045 45.7391 25.6004C47.1272 26.6522 48.7968 28.2249 50.2616 29.8603C52.0672 31.8763 52.1112 32.0782 51.0379 33.4226C48.0362 37.1829 43.7752 40.4185 40.0911 41.7351C36.5278 43.0084 32.9556 42.8291 29.1993 41.1885L28.3144 40.8019L26.4369 42.6549C24.7057 44.3637 24.5248 44.508 24.1135 44.508C23.2426 44.508 22.659 43.7388 22.9461 42.9693C23.0186 42.7749 23.7682 41.9221 24.612 41.074L26.1463 39.5321L24.9416 38.6416C23.668 37.7001 20.3169 34.4271 19.4224 33.251C18.5157 32.0588 18.5827 31.8535 20.6392 29.5289C24.2008 25.5028 28.438 22.7833 32.6065 21.8485C33.8951 21.5595 36.7529 21.5551 37.9575 21.8402C39.2037 22.1353 40.6765 22.6278 41.5576 23.044L42.2891 23.3897L44.0599 21.6256C45.5776 20.1136 46.1381 19.6544 46.5143 19.6146C46.5546 19.6105 46.757 19.666 46.964 19.7382ZM33.0888 24.1832C30.5717 24.7504 28.0187 26.0988 25.507 28.1879C24.4081 29.1019 21.9124 31.5817 21.7091 31.9615C21.6066 32.153 21.86 32.4577 23.3952 33.9884C24.3888 34.9792 25.8053 36.2412 26.543 36.7928L27.8841 37.7957L28.7653 36.9101L29.6463 36.0246L29.161 35.048C27.3743 31.4528 29.094 27.1266 32.9069 25.6243C33.6578 25.3283 33.9071 25.2931 35.2721 25.289C36.9173 25.2841 37.7909 25.4929 38.8044 26.1326L39.2659 26.424L39.8923 25.7896L40.5187 25.1554L39.6348 24.8236C38.0259 24.2196 37.3644 24.0934 35.5773 24.0496C34.3942 24.0205 33.6285 24.0617 33.0888 24.1832ZM41.8124 27.2871L40.9743 28.1317L41.2868 28.6649C42.0386 29.9477 42.3739 31.8214 42.1124 33.2781C41.883 34.555 41.1106 36.0105 40.1671 36.9433C37.9765 39.1091 34.8721 39.5798 32.093 38.1676L31.3289 37.7792L30.7379 38.3613C30.4129 38.6815 30.1878 38.9785 30.2377 39.0212C30.6936 39.4122 33.1571 40.0636 34.6079 40.1769C38.7966 40.5038 43.8792 37.839 48.1926 33.0542L49.0805 32.0693L47.6462 30.5925C46.8575 29.7801 45.7693 28.7406 45.2279 28.2825C44.2602 27.4636 42.8713 26.4425 42.725 26.4425C42.684 26.4425 42.2734 26.8225 41.8124 27.2871ZM34.5673 27.6768C32.5222 28.0174 31.0025 29.7385 30.8992 31.8312C30.8549 32.7293 31.1017 34.0301 31.345 34.1805C31.3987 34.2137 32.81 32.8727 34.4813 31.2005L37.5198 28.1601L36.9758 27.9259C36.291 27.6311 35.3974 27.5388 34.5673 27.6768ZM36.1258 32.9758C32.8422 36.2638 32.9644 36.0499 34.1644 36.4067C36.147 36.9961 38.3741 35.9708 39.3308 34.0283C39.6631 33.3534 39.7325 33.0641 39.7586 32.2435C39.7897 31.2615 39.5203 30.1098 39.2385 30.0207C39.171 29.9993 37.7703 31.3291 36.1258 32.9758Z" fill="url(#paint0_linear_1448_22255)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22255" x1="0.789062" y1="0.72168" x2="69.4526" y2="42.4529" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>                           
            </div> --}}
            <h2 class="cs-iconbox_title">Logra tus objetivos</h2>
            <div class="cs-iconbox_subtitle">No sólo clases: Apoyo académico, motivaciones, orientaciones, sobre todo mucha práctica.</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        {{-- <div class="col-lg-3 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
              <svg width="54" height="53" viewBox="0 0 54 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.5459 0.389513C28.1281 0.538039 26.9221 1.69532 20.3563 8.24874C11.9205 16.6685 12.1918 16.3559 12.198 17.6457C12.2038 18.8617 12.2454 18.9138 16.9795 23.6351C19.802 26.45 21.4749 28.038 21.7947 28.2059C22.469 28.5599 23.7179 28.571 24.3536 28.2286C24.6078 28.0917 27.9909 24.7817 32.4755 20.2821C40.8107 11.9194 40.4149 12.3745 40.4149 11.1548C40.4149 9.96876 40.5229 10.104 35.687 5.23924C33.0353 2.57166 31.0376 0.648018 30.7813 0.515281C30.2099 0.219319 29.1864 0.161716 28.5459 0.389513ZM18.2558 3.70684C17.795 3.9697 15.6933 6.15326 15.5848 6.48211C15.4249 6.96689 15.564 7.23138 16.4245 8.07789L17.1708 8.81213L18.9645 7.01611L20.7581 5.21997L19.9929 4.4548C19.1855 3.64739 18.7151 3.44485 18.2558 3.70684ZM33.6087 21.7721L31.8685 23.5147L40.4156 32.0643C46.3338 37.9842 49.1038 40.6826 49.4215 40.8373C50.0121 41.1247 50.9136 41.1315 51.5427 40.8531C52.8078 40.2936 53.3894 38.6699 52.7687 37.4303C52.5774 37.0481 35.6489 20.0293 35.46 20.0293C35.399 20.0293 34.5658 20.8135 33.6087 21.7721ZM9.43573 31.9881C9.13629 32.0934 7.33536 33.0765 5.4336 34.1724C1.71883 36.3134 1.44769 36.5243 1.15696 37.4987C0.920448 38.2915 0.923062 45.7663 1.16022 46.5647C1.45074 47.5431 1.83 47.8347 5.66096 50.0248C7.59746 51.1319 9.36147 52.0876 9.58099 52.1486C10.1088 52.2952 10.6545 52.2825 11.1295 52.1127C11.589 51.9484 17.8502 48.3836 18.4756 47.9302C18.7141 47.7574 19.0561 47.3503 19.2358 47.0256L19.5625 46.4351V42.0795V37.7239L19.2545 37.0969C19.0852 36.752 18.7912 36.3514 18.6012 36.2068C17.9614 35.7197 11.5093 32.0818 11.0245 31.9349C10.3991 31.7453 10.0968 31.7554 9.43573 31.9881ZM11.1393 34.2274C11.6701 34.417 16.4071 37.0953 16.8072 37.4321C16.981 37.5782 17.2555 37.9486 17.4172 38.2553L17.7114 38.8128V42.025C17.7114 45.1642 17.7056 45.2489 17.4589 45.7497C17.3201 46.0315 17.0475 46.4018 16.853 46.5726C16.5363 46.8507 12.7785 49.036 11.5724 49.6436C10.9653 49.9494 10.0859 50.0435 9.53308 49.8619C8.76965 49.611 4.12311 46.9111 3.64944 46.4431C2.92369 45.7261 2.84791 45.3086 2.84791 42.025C2.84791 38.7542 2.91716 38.3716 3.64269 37.6306C4.09785 37.1657 8.59064 34.5429 9.46894 34.2293C9.98029 34.0467 10.6314 34.046 11.1393 34.2274ZM7.53027 37.37C5.77018 38.3646 4.93445 38.8974 4.83972 39.085C4.73997 39.2825 4.70175 40.1105 4.70066 42.1006C4.69903 44.7938 4.70349 44.849 4.94403 45.1151C5.23107 45.4327 9.73823 48.0027 10.1557 48.0868C10.4923 48.1545 10.5291 48.1368 13.386 46.5192C15.0292 45.589 15.6352 45.1898 15.7544 44.9592C15.8821 44.7122 15.9147 44.1315 15.9147 42.1011C15.9147 40.54 15.8686 39.4209 15.7958 39.212C15.6624 38.8294 15.5391 38.7483 12.4808 37.0304C11.4008 36.4236 10.4194 35.9272 10.3002 35.9272C10.1809 35.9272 8.9344 36.5764 7.53027 37.37Z" fill="url(#paint0_linear_1448_22282)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22282" x1="0.980957" y1="0.25" x2="63.3538" y2="31.8515" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>                           
            </div>
            <h2 class="cs-iconbox_title">Multichain minting</h2>
            <div class="cs-iconbox_subtitle">It is a long established fact that a reader will be distracted by the readable</div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div> --}}
        <div class="col-lg-4 col-sm-6">
          <div class="cs-iconbox cs-style1 cs-white_bg">
            {{-- <div class="cs-iconbox_icon">
              <svg width="46" height="53" viewBox="0 0 46 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.3609 1.13138C27.6679 1.49733 27.5724 1.84714 27.5724 4.02065C27.5724 5.71207 27.5936 5.95001 27.7769 6.30927C28.0069 6.76006 28.5922 7.11942 29.0963 7.11942C29.6005 7.11942 30.1858 6.76006 30.4158 6.30927C30.5991 5.95001 30.6203 5.71207 30.6203 4.02065C30.6203 2.32923 30.5991 2.09128 30.4158 1.73203C30.0409 0.997163 29.1232 0.728941 28.3609 1.13138ZM19.5477 4.58208C19.0945 4.68836 18.5631 5.26534 18.4722 5.74946C18.3386 6.46136 18.5314 6.77591 19.9749 8.20297C21.4271 9.63857 21.7337 9.81911 22.4464 9.65828C23.3516 9.45416 23.8862 8.34663 23.4659 7.54613C23.2241 7.08559 20.6208 4.57944 20.3841 4.57944C20.2676 4.57944 20.1113 4.56136 20.037 4.53921C19.9625 4.51716 19.7423 4.53636 19.5477 4.58208ZM37.8452 4.58005C37.5934 4.63939 37.1488 5.01114 36.1872 5.96647C35.4647 6.68437 34.808 7.39526 34.7281 7.54613C34.3052 8.34409 34.8403 9.45396 35.7463 9.65828C36.459 9.81911 36.7655 9.63857 38.2178 8.20297C39.6676 6.76982 39.8543 6.46299 39.7181 5.73726C39.6342 5.28982 38.9892 4.57944 38.6669 4.57944C38.5532 4.57944 38.3992 4.56136 38.3248 4.53921C38.2503 4.51716 38.0346 4.53545 37.8452 4.58005ZM28.0096 10.5633C27.8311 10.6755 27.6105 10.881 27.5194 11.02C27.4283 11.159 27.1762 12.1492 26.9591 13.2203C26.3092 16.4277 25.8504 17.7872 24.9655 19.1275C24.1062 20.4292 23.0592 21.1831 19.5968 22.9931C18.3675 23.6359 16.8725 24.4306 16.2744 24.759L15.5489 25.1577C15.3327 25.2766 15.2159 25.5198 15.2585 25.7628C15.2977 25.9864 15.3297 31.4498 15.3297 37.9039V48.8128C15.3297 49.3602 15.2475 49.9046 15.0858 50.4276C14.9516 50.8617 14.8622 51.2371 14.8871 51.262C14.912 51.2868 15.7305 51.5113 16.7058 51.7608C18.7334 52.2795 21.1901 52.6824 23.2544 52.8348C25.3746 52.9913 40.6895 52.9756 41.2256 52.8164C41.4769 52.7417 41.8274 52.5086 42.1039 52.2322C43.0479 51.2882 43.0479 50.021 42.1039 49.077C41.493 48.466 41.1163 48.3686 39.3674 48.3686C37.6672 48.3686 37.2664 48.2359 36.9208 47.5585C36.6636 47.0544 36.6616 46.639 36.9136 46.1449C37.3075 45.373 37.2844 45.3776 40.9326 45.3206C44.0463 45.272 44.2017 45.2603 44.6057 45.0442C45.3445 44.6492 45.8602 43.823 45.8602 43.0347C45.8602 42.1551 45.099 41.118 44.2736 40.8728C43.9859 40.7874 42.931 40.7487 40.8914 40.7487C38.1213 40.7487 37.9011 40.7353 37.5264 40.5442C37.0756 40.3142 36.7163 39.7288 36.7163 39.2247C36.7163 38.8036 37.0467 38.1818 37.3962 37.9449C37.6576 37.7677 37.9535 37.7473 40.9326 37.7007C44.0463 37.6521 44.2017 37.6404 44.6057 37.4243C45.3445 37.0293 45.8602 36.2031 45.8602 35.4147C45.8602 34.5352 45.099 33.4981 44.2736 33.2529C43.9859 33.1675 42.931 33.1288 40.8914 33.1288C38.1213 33.1288 37.9011 33.1154 37.5264 32.9242C37.0756 32.6942 36.7163 32.1089 36.7163 31.6048C36.7163 31.1837 37.0467 30.5619 37.3962 30.3249C37.6576 30.1478 37.9535 30.1273 40.9326 30.0808C44.0463 30.0321 44.2017 30.0204 44.6057 29.8043C45.3445 29.4093 45.8602 28.5831 45.8602 27.7948C45.8602 26.9153 45.099 25.8782 44.2736 25.633C43.963 25.5407 42.1696 25.5088 37.301 25.5088H31.6936C31.2339 25.5088 30.9146 25.0513 31.0733 24.6198C31.2531 24.131 31.6418 23.1594 31.9372 22.4609C33.271 19.306 33.602 18.0947 33.6029 16.3649C33.6036 14.9081 33.4352 14.2642 32.7488 13.099C31.67 11.2677 29.0878 9.88606 28.0096 10.5633ZM0.929135 22.6704C0.696981 22.793 0.469806 23.0267 0.344941 23.2714C0.143165 23.667 0.140625 23.8469 0.140625 37.7007C0.140625 51.5602 0.143063 51.7343 0.345144 52.1304C0.476816 52.3886 0.692612 52.6044 0.950776 52.7361C1.32852 52.9288 1.54472 52.9406 4.6947 52.9406C6.5436 52.9406 8.28196 52.8942 8.58442 52.8368C10.4091 52.4908 11.8827 51.0172 12.2288 49.1925C12.3707 48.4442 12.3707 26.9572 12.2288 26.209C11.8827 24.3842 10.4091 22.9106 8.58442 22.5646C8.2781 22.5065 6.55803 22.4628 4.67336 22.4653C1.52471 22.4696 1.28463 22.4827 0.929135 22.6704ZM8.47439 44.0012C8.92518 44.2312 9.28454 44.8165 9.28454 45.3206C9.28454 45.8248 8.92518 46.4101 8.47439 46.6401C8.25392 46.7526 7.93266 46.8446 7.76055 46.8446C6.98748 46.8446 6.23657 46.0937 6.23657 45.3206C6.23657 44.8321 6.59613 44.2326 7.02508 44.0062C7.51529 43.7474 7.97381 43.7459 8.47439 44.0012Z" fill="url(#paint0_linear_1448_22273)"/>
                <defs>
                <linearGradient id="paint0_linear_1448_22273" x1="0.140625" y1="0.944336" x2="57.6183" y2="26.5299" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#26BAA5"/>
                <stop offset="1" stop-color="#022136"/>
                </linearGradient>
                </defs>
              </svg>                          
            </div> --}}
            <h2 class="cs-iconbox_title">Descubre tu potencialidad real</h2>
            <div class="cs-iconbox_subtitle">Te transformamos a una versión mejorada de ti mismo, para que seas mas <br> productivo.  </div>
          </div>
          <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Icon Boxes -->

  <div class="cs-height_70 cs-height_lg_40"></div>
  
  <!-- Start New Items -->
  {{-- <section>
    <div class="container">
      <div class="cs-section_heading cs-style2">
        <div class="cs-section_left">
          <h2 class="cs-section_title">Nuestros Cursos</h2>
        </div>
      </div>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="cs-isotop cs-style1 cs-isotop_col_5 cs-has_gutter_30">
        <div class="cs-grid_sizer"></div>
        <div class="cs-isotop_item fashion">
          <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
            <span class="cs-card_like cs-primary_color">
              2.1K
            </span>
            <a href="explore-details.html" class="cs-card_thumb cs-zoom_effect">
              <img src="fronted/assets/img/explore/1.jpeg" alt="Image" class="cs-zoom_item">
            </a>
            <div class="cs-card_info">
              <a href="#" class="cs-avatar cs-white_bg">
                <img src="fronted/assets/img/avatar/avatar_12.png" alt="Avatar">
                <span>Johny E.</span>
              </a>
              <h3 class="cs-card_title"><a href="explore-details.html">Art work #2134</a></h3>
              <div class="cs-card_price">Fecha Ingreso: <b class="cs-primary_color">0.29 ETH 7/21</b></div>
              <hr>
              <div class="cs-card_footer">
                <span class="cs-card_btn_1" data-modal="#history_1">
                  <i class="fas fa-redo fa-fw"></i>
                  View History
                </span>
                <span class="cs-card_btn_2" data-modal="#bid_1"><span>Leer mas...</span></span>
              </div>
            </div>
          </div>
        </div>
        <div class="cs-isotop_item music">
          <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
            <span class="cs-card_like cs-primary_color">
              3.3K
            </span>
            <a href="explore-details.html" class="cs-card_thumb cs-zoom_effect">
              <img src="fronted/assets/img/explore/2.jpeg" alt="Image" class="cs-zoom_item">
            </a>
            <div class="cs-card_info">
              <a href="#" class="cs-avatar cs-white_bg">
                <img src="fronted/assets/img/avatar/avatar_13.png" alt="Avatar">
                <span>debit alex</span>
              </a>
              <h3 class="cs-card_title"><a href="explore-details.html">Cool octopus traveling</a></h3>
              <div class="cs-card_price">Fecha Ingreso: <b class="cs-primary_color">0.24 ETH 4/17</b></div>
              <hr>
              <div class="cs-card_footer">
                <span class="cs-card_btn_1" data-modal="#history_1">
                  <i class="fas fa-redo fa-fw"></i>
                  View History
                </span>
                <span class="cs-card_btn_2" data-modal="#bid_1"><span>Leer mas...</span></span>
              </div>
            </div>
          </div>
        </div>
        <div class="cs-isotop_item fashion">
          <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
            <span class="cs-card_like cs-primary_color">
              3.1K
            </span>
            <a href="explore-details.html" class="cs-card_thumb cs-zoom_effect">
              <img src="fronted/assets/img/explore/3.jpeg" alt="Image" class="cs-zoom_item">
            </a>
            <div class="cs-card_info">
              <a href="#" class="cs-avatar cs-white_bg">
                <img src="fronted/assets/img/avatar/avatar_12.png" alt="Avatar">
                <span>robert Alex</span>
              </a>
              <h3 class="cs-card_title"><a href="explore-details.html">Octopus eating icecrem</a></h3>
              <div class="cs-card_price">Fecha Ingreso: <b class="cs-primary_color">0.09 ETH 1/9</b></div>
              <hr>
              <div class="cs-card_footer">
                <span class="cs-card_btn_1" data-modal="#history_1">
                  <i class="fas fa-redo fa-fw"></i>
                  View History
                </span>
                <span class="cs-card_btn_2" data-modal="#bid_1"><span>Leer mas...</span></span>
              </div>
            </div>
          </div>
        </div>
        <div class="cs-isotop_item video">
          <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
            <span class="cs-card_like cs-primary_color">
              2.1K
            </span>
            <a href="explore-details.html" class="cs-card_thumb cs-zoom_effect">
              <img src="fronted/assets/img/explore/4.jpeg" alt="Image" class="cs-zoom_item">
            </a>
            <div class="cs-card_info">
              <a href="#" class="cs-avatar cs-white_bg">
                <img src="fronted/assets/img/avatar/avatar_12.png" alt="Avatar">
                <span>johny e.</span>
              </a>
              <h3 class="cs-card_title"><a href="explore-details.html">Panda with fish</a></h3>
              <div class="cs-card_price">Fecha Ingreso: <b class="cs-primary_color">0.19 ETH 5/11</b></div>
              <hr>
              <div class="cs-card_footer">
                <span class="cs-card_btn_1" data-modal="#history_1">
                  <i class="fas fa-redo fa-fw"></i>
                  View History
                </span>
                <span class="cs-card_btn_2" data-modal="#bid_1"><span>Leer mas...</span></span>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </section> --}}
  <!-- End New Items -->

  <div class="cs-height_95 cs-height_lg_70"></div> 

  <!-- Start Category -->
  {{-- <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center">Lo más nuevo de Ite</h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
      <div class="cs-slider cs-style1 cs-gap-30">
        <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="6">
          <div class="cs-slider_wrapper">
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_38.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Robotica</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_39.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Programacion</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_40.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Video</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_41.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Fashion</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_42.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Sports</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_43.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Collectibles</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_38.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Art</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
            <div class="cs-slide">
              <a href="#" class="cs-card cs-style6 cs-box_shadow cs-white_bg text-center">
                <span class="cs-avatar"><img src="fronted/assets/img/avatar/avatar_40.png" alt="Avatar"></span>
                <div class="cs-card_info">
                  <h3 class="cs-card_title">Video</h3>
                  <div class="cs-card_subtitle">Descripcion del Curso</div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- .cs-slider_container -->
        <div class="cs-height_10 cs-height_lg_10"></div>
        <div class="cs-pagination cs-style1"></div>
      </div><!-- .cs-slider -->
    </div>
  </section> --}}
  <!-- End Category -->

  {{-- <div class="cs-height_95 cs-height_lg_70"></div> --}}

  <!-- Start Video Section -->
  <div class="container">
    <h2 class="cs-section_heading cs-style1 text-center">Nuestros Servicios</h2>
    <div class="cs-height_45 cs-height_lg_45"></div>
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <a href="https://www.youtube.com/embed/lFpc19KsYzs?autoplay=1" class="cs-video_block cs-style1 cs-zoom_effect cs-video_open">
          <div class="cs-video_block_in">
            <div class="cs-video_block_bg cs-bg cs-zoom_item" data-src="{{asset('fronted/assets/img/video_bg.png')}}"></div>
          </div>
          <div class="cs-play_btn cs-center">
            <svg width="28" height="33" viewBox="0 0 28 33" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.98474 0.457254C2.24375 -0.616351 0 0.63608 0 2.68148V30.3185C0 32.3639 2.24375 33.6164 3.98474 32.5427L26.3932 18.7242C28.0485 17.7034 28.0485 15.2966 26.3932 14.2758L3.98474 0.457254Z" fill="currentColor"/>
            </svg>              
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- End Video Seciton -->

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
            @foreach ($convenios as $convenio)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-2">
                    <div class="card text-blue p-2 card-items">
                      <img class="card-img-top img-fluid img-thumbnail" src="{{URL::to('/')."/storage/".$convenio->foto}}" alt="">
                      <div class="card-body">
                        <h5 class="card-title text-secondary">{{$convenio->titulo}}</h5>
                        <p class="card-text">{!!$convenio->descripcion!!}</p>
                      </div>
                      <div class="card-footer text-center">
                          <a class="btn form-inline btn-outline-primary boton-line-turqueza" href="{{route('plans.convenio',$convenio)}}"> &nbsp;&nbsp;Planes&nbsp;&nbsp; </a>
                          <a class="btn form-inline btn-outline-secondary boton-line-azul" target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Quiero%20mas%20información%20del%20sobre%20*{{$convenio->titulo}}*"> llámenme </a>
                      </div>
                    </div>
                </div> 
            @endforeach
    </div>
  </div>
  <div class="cs-height_70 cs-height_lg_40"></div>
  <!-- End Membresias Ite -->

  <div class="cs-height_95 cs-height_lg_70"></div>

<!-- Start Logo Carousel -->
  <section>
    <div class="container">
      <h2 class="cs-section_heading cs-style1 text-center">Colegios y Universidades que confían en educabol ite</h2>
      <div class="cs-height_45 cs-height_lg_45"></div>
    </div>
    <div class="cs-moving_carousel_1">
      
      @yield('colegios')

    </div>
    
  </section>
  <!-- End Logo Carousel -->

  <div class="cs-height_95 cs-height_lg_70"></div>

  <div class="container">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <h2 class="cs-section_heading cs-style1 text-center">Nuestros Horarios</h2>
    <div class="cs-height_45 cs-height_lg_45"></div>
    <div class="row">
      <div class="col-xl-3 col-lg-4">
        <a href="#" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>Horario Especial</h3>
          <p>Lunes a Viernes 5.00 am - 6:00 am</p>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-xl-3 col-lg-4">
        <a href="#" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>Turno Mañana</h3>
          <p>Lunes a Sábado 7:30 am - 12:00 pm</p>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-xl-3 col-lg-4">
        <a href="#" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>Turno Tarde</h3>
          <p>Lunes a Viernes 2:00pm - 6:30pm</p>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
      <div class="col-xl-3 col-lg-4">
        <a href="#" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>Turno Tarde</h3>
          <p>Lunes a Viernes 2:00pm - 6:30pm</p>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    </div>    
  </div>

  <div class="cs-height_100 cs-height_lg_70"></div>



  
  <!-- Start CTA -->
  <section>
    <div class="container">
        <div class="cs-cta cs-style2 text-center cs-white_bg">
          <h2 class="cs-cta_title">¿Te gustaria aprender a tu ritmo <br> desde cualquier dispositivo?</h2>
          <div class="cs-cta_subtitle">Ingresa a nuestra plataforma educativa Educabol para ver todos nuestros cursos online.</div>
          <a href="https://www.educabol.com" class="cs-btn cs-style2 cs-btn_lg"><span>Ingresar</span></a>
        </div>
      </div>
  </section>
  <!-- End CTA -->

  <div class="cs-height_100 cs-height_lg_70"></div>

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
              <a href="https://api.whatsapp.com/send?phone=59171039910&text=Visite su pagina. Quiero mas información"><i class="fab fa-whatsapp fa-fw"></i></a>
              <a href="https://msng.link/o/?@institutoite=tg"><i class="fab fa-telegram fa-fw"></i></a>
              <a href="https://www.facebook.com/educabolite"><i class="fab fa-facebook-f fa-fw"></i></a>
              <a href="https://www.youtube.com/channel/UCbmRHfG51CGM1foo-6kzunQ"><i class="fab fa-youtube fa-fw"></i></a>
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
          <div class="cs-copyright">Copyright 2022. Desarrollado por Instituto Educabol Ite.</div>
          <ul class="cs-footer_menu">
            <li><a href="{{ route('privacy') }}">Privacidad</a></li>
            <li><a href="{{ route('termscondition') }}">Términos y Condiciones</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Start Modal -->
  <div class="cs-modal_wrap" id="history_1">
    <div class="cs-modal_overlay"></div>
    <div class="cs-modal_container">
      <div class="cs-modal_container_in">
        <div class="cs-modal_close cs-center">
          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9649 2.54988C12.3554 2.15936 12.3554 1.52619 11.9649 1.13567C11.5744 0.745142 10.9412 0.745142 10.5507 1.13567L11.9649 2.54988ZM0.550706 11.1357C0.160181 11.5262 0.160181 12.1594 0.550706 12.5499C0.94123 12.9404 1.5744 12.9404 1.96492 12.5499L0.550706 11.1357ZM1.96492 1.13567C1.5744 0.745142 0.94123 0.745142 0.550706 1.13567C0.160181 1.52619 0.160181 2.15936 0.550706 2.54988L1.96492 1.13567ZM10.5507 12.5499C10.9412 12.9404 11.5744 12.9404 11.9649 12.5499C12.3554 12.1594 12.3554 11.5262 11.9649 11.1357L10.5507 12.5499ZM10.5507 1.13567L0.550706 11.1357L1.96492 12.5499L11.9649 2.54988L10.5507 1.13567ZM0.550706 2.54988L10.5507 12.5499L11.9649 11.1357L1.96492 1.13567L0.550706 2.54988Z" fill="currentColor"/>
          </svg>          
        </div>
        <div class="cs-history">
          <h2 class="cs-history_title">Bidding History</h2>
          <ul class="cs-history_list">
            <li>
              <div class="cs-media cs-style1">
                <div class="cs-media_thumb"><img src="fronted/assets/img/avatar/avatar_1.png" alt=""></div>
                <div class="cs-media_info">
                  <h3 class="cs-media_title">Bid accepted <span>9 ETH</span> by @raymond</h3>
                  <div class="cs-media_subtitle">16 Mar 2022, 11:22 PM</div>
                </div>
                <div class="cs-media_icon cs-center">
                  <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.12813 0.361363C3.64827 0.462564 3.27024 0.673413 2.90257 1.04494C2.65338 1.29672 2.54141 1.46434 2.39635 1.80267C2.23387 2.18165 2.21897 2.32007 2.21897 3.45088V4.46376H1.56184C1.03057 4.46376 0.885293 4.47185 0.803425 4.50609C0.673732 4.56026 0.586696 4.64212 0.519539 4.7731C0.470648 4.86845 0.446202 5.23207 0.233603 9.0251C0.105742 11.3064 0.00787787 13.2467 0.0161084 13.3369C0.036261 13.5577 0.182989 13.8537 0.347409 14.0053C0.41637 14.0689 0.555004 14.1598 0.655439 14.2074L0.838097 14.2939L3.18528 14.3015L5.53246 14.3091L5.44999 14.1648C5.31489 13.9283 5.22339 13.6155 5.20827 13.3382C5.1894 12.9924 5.511 8.44622 5.57009 8.22367C5.59401 8.13346 5.65155 7.98851 5.69792 7.9015C5.7974 7.71488 6.07382 7.44587 6.26646 7.34825C6.53541 7.21197 6.66385 7.19901 7.7493 7.19857L8.75419 7.19816L8.75463 7.12296C8.75485 7.08162 8.72958 6.57403 8.69846 5.99502C8.63661 4.84436 8.62436 4.77231 8.46467 4.61719C8.32486 4.48142 8.22511 4.46376 7.59819 4.46376H7.03641L7.02487 3.40418C7.01426 2.43147 7.00857 2.32734 6.95553 2.1341C6.60643 0.862169 5.38491 0.0963178 4.12813 0.361363ZM4.91416 1.15702C5.46205 1.2557 5.96198 1.71019 6.14532 2.27624C6.18754 2.40661 6.19545 2.56209 6.20466 3.44519L6.2153 4.46376H6.62568H7.03603L7.02695 4.94036C7.01872 5.37092 7.0124 5.42422 6.96146 5.49239C6.7697 5.74898 6.44007 5.75533 6.27327 5.50562C6.2147 5.41796 6.2112 5.38599 6.2112 4.93823V4.46376H4.62751H3.0438L3.03472 4.94036C3.02649 5.37092 3.02018 5.42422 2.96923 5.49239C2.77747 5.74898 2.44784 5.75533 2.28104 5.50562C2.22247 5.41796 2.21897 5.38599 2.21897 4.93823V4.46376H2.62913H3.03929V3.49439C3.03929 2.45168 3.04935 2.34895 3.17989 2.05926C3.32389 1.73978 3.60151 1.45143 3.92308 1.28737C4.19198 1.15018 4.58751 1.09818 4.91416 1.15702ZM6.66237 8.06992C6.52992 8.13133 6.44666 8.21793 6.39027 8.35284C6.33966 8.474 6.00757 13.0062 6.0281 13.2959C6.06157 13.7681 6.38174 14.1505 6.84301 14.2693C6.973 14.3028 7.46508 14.3076 10.0833 14.3013L13.1702 14.2939L13.3529 14.2074C13.4533 14.1598 13.5916 14.0691 13.6602 14.0059C13.8118 13.8662 13.9662 13.5698 13.9907 13.3714C14.0013 13.2853 13.9412 12.2675 13.8408 10.8349C13.6522 8.14407 13.673 8.28314 13.433 8.11443L13.3159 8.03215L10.0438 8.02567C6.90718 8.01949 6.76721 8.02133 6.66237 8.06992ZM8.98377 9.31092C9.15842 9.41106 9.19169 9.50668 9.19169 9.9085C9.19169 10.3577 9.23296 10.4949 9.42642 10.6896C9.67117 10.9358 10.0178 10.9837 10.3211 10.8134C10.619 10.6461 10.723 10.4096 10.723 9.89937C10.723 9.52782 10.7527 9.42673 10.8908 9.32823C11.0125 9.24136 11.2314 9.2369 11.3413 9.31902C11.5118 9.44628 11.5289 9.49541 11.5383 9.8866C11.5538 10.5265 11.424 10.9037 11.0638 11.2651C10.5795 11.7512 9.89454 11.869 9.27662 11.5727C9.09511 11.4856 9.0034 11.4184 8.83835 11.2513C8.48625 10.8948 8.37269 10.5776 8.37184 9.94804C8.37146 9.6501 8.37996 9.57663 8.42584 9.48185C8.52945 9.26783 8.77656 9.19214 8.98377 9.31092Z" fill="#050023"/>
                  </svg>                  
                </div>
              </div>
            </li>
            <li>
              <div class="cs-media cs-style1">
                <div class="cs-media_thumb"><img src="fronted/assets/img/avatar/avatar_1.png" alt=""></div>
                <div class="cs-media_info">
                  <h3 class="cs-media_title">Followed by @jessica</h3>
                  <div class="cs-media_subtitle">16 Mar 2022, 11:22 PM</div>
                </div>
                <div class="cs-media_icon cs-center">
                  <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.30703 0.343803C2.41054 0.658409 1.04224 1.9741 0.632295 3.8773C0.527867 4.36213 0.528991 5.25496 0.634675 5.74646C0.77519 6.40003 1.06233 7.04371 1.49036 7.6646C1.81811 8.14007 2.05846 8.42368 2.62089 8.9987C3.37898 9.77368 4.13281 10.427 5.7909 11.7459C6.27078 12.1276 7.18971 12.8603 7.833 13.3742L9.00259 14.3086L9.73643 13.719C10.14 13.3947 11.0205 12.6929 11.693 12.1593C13.795 10.4915 14.5802 9.8172 15.4113 8.96572C16.5449 7.80439 17.1302 6.83975 17.3645 5.74646C17.4631 5.28628 17.4717 4.39686 17.3819 3.94802C17.1855 2.96577 16.7386 2.13739 16.057 1.49221C15.4581 0.925328 14.7327 0.553881 13.8741 0.374404C13.46 0.287855 12.5053 0.286797 12.1128 0.372455C10.9435 0.627741 9.95867 1.32764 9.22467 2.42496C9.11462 2.58947 9.01336 2.7241 8.99968 2.7241C8.986 2.7241 8.88356 2.58771 8.77209 2.42103C8.04747 1.33772 7.06314 0.634747 5.90981 0.376949C5.5804 0.303321 4.66516 0.284385 4.30703 0.343803Z" fill="#050023"/>
                  </svg>                                
                </div>
              </div>
            </li>
            <li>
              <div class="cs-media cs-style1">
                <div class="cs-media_thumb"><img src="fronted/assets/img/avatar/avatar_3.png" alt=""></div>
                <div class="cs-media_info">
                  <h3 class="cs-media_title">Created by @federico</h3>
                  <div class="cs-media_subtitle">05 Mar 2022, 11:22 PM</div>
                </div>
                <div class="cs-media_icon cs-center">
                  <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.82881 0.353422C1.13833 0.504993 0.510112 1.01963 0.206167 1.68271C-0.0102227 2.15472 -0.00737581 2.09596 0.00423016 5.85783C0.0159456 9.66714 -0.00117138 9.39188 0.256678 9.9132C0.537667 10.4812 1.10811 10.9452 1.74761 11.1257C1.97016 11.1886 2.19915 11.1927 5.45203 11.1927H8.91922L9.19295 11.1076C9.59368 10.983 9.90756 10.7943 10.1996 10.5023C10.4916 10.2102 10.6804 9.89634 10.8049 9.4956L10.89 9.22188V5.75469C10.89 1.88074 10.9033 2.09388 10.6296 1.57183C10.3319 1.00398 9.84872 0.604702 9.19295 0.384773C9.00411 0.321451 8.78696 0.317035 5.52502 0.310283C2.69499 0.30448 2.01575 0.3124 1.82881 0.353422ZM12.8747 2.73619C12.7326 2.81042 12.6496 2.88659 12.5694 3.01615L12.4594 3.19415L12.4412 7.04744L12.4229 10.9007L12.3417 11.138C12.1036 11.8343 11.5317 12.4062 10.8353 12.6444L10.5981 12.7256L6.74766 12.7438L2.89726 12.7621L2.72488 12.8634C2.42072 13.0422 2.27287 13.4123 2.36656 13.7602C2.42367 13.9722 2.66415 14.2116 2.88021 14.2714C3.00624 14.3064 3.91278 14.3141 6.8754 14.3053L10.7076 14.2939L11.0644 14.1959C12.4756 13.8084 13.5058 12.7788 13.8927 11.3692L13.9912 11.0102L14.0026 7.17806C14.0114 4.21544 14.0037 3.30889 13.9688 3.18287C13.9115 2.97619 13.681 2.74002 13.4771 2.6791C13.2457 2.60994 13.0877 2.62494 12.8747 2.73619ZM5.6447 3.44353C5.87853 3.5024 6.13496 3.75882 6.19383 3.99266C6.2174 4.08627 6.23671 4.34449 6.23671 4.56646V4.97001L6.70204 4.97081C7.23453 4.97172 7.38278 5.01661 7.57443 5.23486C7.90334 5.60947 7.80322 6.18484 7.3665 6.42988C7.22041 6.51185 7.15504 6.5224 6.72379 6.53375L6.24372 6.54637L6.23109 7.02645C6.21974 7.4577 6.20919 7.52306 6.12722 7.66916C5.99006 7.91362 5.7763 8.0473 5.49389 8.0653C5.23429 8.08183 5.05268 8.01208 4.87914 7.82924C4.70509 7.64584 4.66735 7.49748 4.66735 6.99674V6.53937H4.2638C3.7196 6.53937 3.56128 6.49521 3.35069 6.28458C2.96645 5.90035 3.05912 5.3057 3.54066 5.06574C3.71789 4.97742 3.76894 4.97001 4.20004 4.97001H4.66735V4.5027C4.66735 4.0716 4.67476 4.02054 4.76308 3.84332C4.86545 3.63787 5.05093 3.48594 5.25991 3.43638C5.43174 3.39561 5.4563 3.39608 5.6447 3.44353Z" fill="#050023"/>
                  </svg>                                 
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <!-- Start Modal -->
  <div class="cs-modal_wrap" id="bid_1">
    <div class="cs-modal_overlay"></div>
    <div class="cs-modal_container">
      <div class="cs-modal_container_in">
        <div class="cs-modal_close cs-center">
          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9649 2.54988C12.3554 2.15936 12.3554 1.52619 11.9649 1.13567C11.5744 0.745142 10.9412 0.745142 10.5507 1.13567L11.9649 2.54988ZM0.550706 11.1357C0.160181 11.5262 0.160181 12.1594 0.550706 12.5499C0.94123 12.9404 1.5744 12.9404 1.96492 12.5499L0.550706 11.1357ZM1.96492 1.13567C1.5744 0.745142 0.94123 0.745142 0.550706 1.13567C0.160181 1.52619 0.160181 2.15936 0.550706 2.54988L1.96492 1.13567ZM10.5507 12.5499C10.9412 12.9404 11.5744 12.9404 11.9649 12.5499C12.3554 12.1594 12.3554 11.5262 11.9649 11.1357L10.5507 12.5499ZM10.5507 1.13567L0.550706 11.1357L1.96492 12.5499L11.9649 2.54988L10.5507 1.13567ZM0.550706 2.54988L10.5507 12.5499L11.9649 11.1357L1.96492 1.13567L0.550706 2.54988Z" fill="currentColor"/>
          </svg>          
        </div>
        <div class="cs-bid_card">
          <h2 class="cs-title_title">Place a Bid</h2>
          <div class="cs-bid_info">
            <ul>
              <li>
                <span>Current Balance</span>
                <b>13.45ETH</b>
              </li>
              <li>
                <span>Current Bid</span>
                <b>0.28ETH</b>
              </li>
            </ul>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <div class="cs-bid_form_head">
              <span>You must bid at least 1 ETH</span>
              <span>Quantity 2 <span class="cs-accent_color">Available</span></span>
            </div>
            <div class="cs-bid_input_group">
              <input type="text" class="cs-bid_value" placeholder="e.g ‘000.28’">
              <input type="text" class="cs-bid_quantity" placeholder="1">
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
            <ul>
              <li>
                <span>Service fee 25%</span>
                <b>0.43ETH</b>
              </li>
            </ul>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
            <div class="cs-height_25 cs-height_lg_25"></div>
            <button class="cs-btn cs-style1 cs-btn_lg w-100"><span>Place a Bid</span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
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
</body>
</html>