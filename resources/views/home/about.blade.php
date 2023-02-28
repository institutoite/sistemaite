<!DOCTYPE html>
<html class="no-js" lang="en">

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
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li><a href="{{ route('about') }}">Acerca de Nosotros</a></li>
                        <li><a href="{{ route('contact') }}">Contactenos</a></li>
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
                  <div class="cs-toggle_btn cs-header_icon_btn cs-center">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 6.63916C14 5.44569 13.5259 4.30109 12.682 3.45718C11.8381 2.61327 10.6935 2.13916 9.5 2.13916C8.30653 2.13916 7.16193 2.61327 6.31802 3.45718C5.47411 4.30109 5 5.44569 5 6.63916C5 11.8892 2.75 13.3892 2.75 13.3892H16.25C16.25 13.3892 14 11.8892 14 6.63916Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M10.7981 16.3887C10.6663 16.616 10.477 16.8047 10.2493 16.9358C10.0216 17.067 9.76341 17.136 9.50063 17.136C9.23784 17.136 8.97967 17.067 8.75196 16.9358C8.52424 16.8047 8.33498 16.616 8.20312 16.3887" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                  
                    <span class="cs-btn_badge">8</span>
                  </div>
                  <div class="cs-toggle_body">
                    <h3 class="cs-notification_title">Notifications 10</h3>
                    <ul class="cs-notification_list">
                      <li>
                        <a href="#" class="cs-notification_item">
                          <div class="cs-notification_thumb"><img src="{{asset('fronted/assets/img/general/notificaiton_1.jpeg')}}" alt="Image"></div>
                          <div class="cs-notification_right">
                            <p>@mark joshef purchased</p>
                            <h4>Digital NFT Art</h4>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="cs-notification_item">
                          <div class="cs-notification_thumb"><img src="{{asset('fronted/assets/img/general/notificaiton_2.jpeg')}}" alt="Image"></div>
                          <div class="cs-notification_right">
                            <p>@ellen capaso commented</p>
                            <h4>Digital NFT Art</h4>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="cs-notification_item">
                          <div class="cs-notification_thumb"><img src="fronted/assets/img/general/notificaiton_3.jpeg" alt="Image"></div>
                          <div class="cs-notification_right">
                            <p>@steve boone started following you.</p>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="cs-notification_item">
                          <div class="cs-notification_thumb"><img src="fronted/assets/img/general/notificaiton_4.jpeg" alt="Image"></div>
                          <div class="cs-notification_right">
                            <p>@mark jos just share</p>
                            <h4>Digital NFT Art</h4>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="cs-notification_item">
                          <div class="cs-notification_thumb"><img src="fronted/assets/img/general/notificaiton_5.jpeg" alt="Image"></div>
                          <div class="cs-notification_right">
                            <p>@richard steger purchased</p>
                            <h4>Digital NFT Art</h4>
                          </div>
                        </a>
                      </li>
                    </ul>
                    <div class="text-center">
                      <a href="#" class="cs-btn cs-style1">
                        <span>
                          View More
                          <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4366 7.01471C13.7295 6.72181 13.7295 6.24694 13.4366 5.95404L8.66361 1.18107C8.37072 0.888181 7.89584 0.888181 7.60295 1.18107C7.31006 1.47397 7.31006 1.94884 7.60295 2.24173L11.8456 6.48438L7.60295 10.727C7.31006 11.0199 7.31006 11.4948 7.60295 11.7877C7.89584 12.0806 8.37072 12.0806 8.66361 11.7877L13.4366 7.01471ZM0.90625 7.23438H12.9062V5.73438H0.90625V7.23438Z" fill="currentColor"/>
                          </svg> 
                        </span>                         
                      </a>
                    </div>
                  </div>
                </div>
                <div class="cs-toggle_box cs-profile_box">
                  <div class="cs-toggle_btn cs-header_icon_btn cs-center">
                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.5 15.75V14.25C15.5 13.4544 15.1839 12.6913 14.6213 12.1287C14.0587 11.5661 13.2956 11.25 12.5 11.25H6.5C5.70435 11.25 4.94129 11.5661 4.37868 12.1287C3.81607 12.6913 3.5 13.4544 3.5 14.25V15.75" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M9.5 8.25C11.1569 8.25 12.5 6.90685 12.5 5.25C12.5 3.59315 11.1569 2.25 9.5 2.25C7.84315 2.25 6.5 3.59315 6.5 5.25C6.5 6.90685 7.84315 8.25 9.5 8.25Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> 
                  </div>
                  <div class="cs-toggle_body">
                    <div class="cs-user_info">
                      <h3 class="cs-user_name">Thomas G. Smith</h3>
                      <h4 class="cs-user_balance">13.45 ETH</h4>
                      <div class="cs-user_profile_link">
                        <div class="cs-user_profile_link_in">
                          <span>1BAkZn7LrU43oK8Jv...</span>
                          <button>
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.35381 4.15531L4.35156 5.74756V13.6256C4.35156 14.272 4.60837 14.892 5.06549 15.3491C5.52261 15.8063 6.1426 16.0631 6.78906 16.0631H13.2511C13.1346 16.3921 12.9191 16.6769 12.634 16.8784C12.349 17.0799 12.0086 17.1881 11.6596 17.1881H6.78906C5.84423 17.1881 4.93809 16.8127 4.26999 16.1446C3.6019 15.4765 3.22656 14.5704 3.22656 13.6256V5.74756C3.22656 5.01256 3.69681 4.38631 4.35381 4.15531ZM13.5391 2.18506C13.7607 2.18506 13.9801 2.22871 14.1848 2.31351C14.3896 2.39832 14.5756 2.52262 14.7323 2.67932C14.889 2.83601 15.0133 3.02204 15.0981 3.22678C15.1829 3.43152 15.2266 3.65095 15.2266 3.87256V13.6226C15.2266 13.8442 15.1829 14.0636 15.0981 14.2683C15.0133 14.4731 14.889 14.6591 14.7323 14.8158C14.5756 14.9725 14.3896 15.0968 14.1848 15.1816C13.9801 15.2664 13.7607 15.3101 13.5391 15.3101H6.78906C6.34151 15.3101 5.91229 15.1323 5.59582 14.8158C5.27935 14.4993 5.10156 14.0701 5.10156 13.6226V3.87256C5.10156 3.42501 5.27935 2.99578 5.59582 2.67932C5.91229 2.36285 6.34151 2.18506 6.78906 2.18506H13.5391ZM13.5391 3.31006H6.78906C6.63988 3.31006 6.4968 3.36932 6.39132 3.47481C6.28583 3.5803 6.22656 3.72337 6.22656 3.87256V13.6226C6.22656 13.9331 6.47856 14.1851 6.78906 14.1851H13.5391C13.6882 14.1851 13.8313 14.1258 13.9368 14.0203C14.0423 13.9148 14.1016 13.7717 14.1016 13.6226V3.87256C14.1016 3.72337 14.0423 3.5803 13.9368 3.47481C13.8313 3.36932 13.6882 3.31006 13.5391 3.31006Z" fill="currentColor"/>
                            </svg>                            
                          </button>
                        </div>
                      </div>
                    </div>
                    <ul>
                      <li><a href="user-profile.html">My Profile</a></li>
                      <li><a href="user-items.html">My Item</a></li>
                      <li><a href="user-wallet.html">My Wallet</a></li>
                      <li><a href="user-account-settings.html">Settings</a></li>
                      <li>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="mode_switch" checked>
                          <label class="form-check-label" for="mode_switch">Night Mode</label>
                        </div>
                      </li>
                      <li><a href="login.html">Logout</a></li>
                    </ul>
                    <div class="text-center">
                      <a href="create-items.html" class="cs-btn cs-style1"><span>Create</span></a>
                    </div>
                  </div>
                </div>
                <a href="connect-wallet.html" class="cs-btn cs-style1"><span>Connect Wallet</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Section -->

  <div class="cs-height_90 cs-height_lg_80"></div>
  <!-- Start Page Head -->
  <section class="cs-page_head cs-bg" data-src="assets/img/page_head_bg.svg">
    <div class="container">
      <div class="text-center">
        <h1 class="cs-page_title">Acerca de nosotros</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Acerca de nosotros</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- End Page Head -->
  
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="cs-single_post">
          <h3>Acerca de Instituto Ite</h3>
          <p>Instituto ite es una empresas emergente dedicada a la capacitación académica de estudiantes de todos los niveles desde inicial hasta profesionales. Su misión es potenciar el ecosistema educativo con tecnología unificada que ayude a los educadores y estudiantes a desarrollar todo su potencial, a su manera según su ritmo de comprensión. Instituto ite, ampliamente reconocido en la ciudad de Santa Cruz como una empresa educativa más completo en soluciones educativas, conecta a estudiantes, maestros, administradores y padres, con el objetivo compartido de mejorar los resultados de aprendizaje de los estudiantes. Desde la recepción hasta el salón de clases y el hogar, ayuda a los centros educativos como ser colegios, institutos y universidades. Instituto ite apoya a miles de estudiantes por ahora en todo el país Bolivia próximamente en el mundo habla hispana, además cuenta con experiencia de más de una década en la enseñanza y formación.</p>
          <h3>Nuestra Empresa</h3>
          <p>Instituto ite cuenta con más de 1 años de innovación, comenzando como el primer sistema de información para estudiantes basado en la web, a través de una interfaz de usuario y aplicaciones móviles que cambiaron la industria educativa. Tenemos un historial de liderazgo en la industria de la tecnología educativa y nos complace ofrecer las primeras soluciones unificadas de la industria que rompen las barreras tecnológicas para las escuelas, colegios, institutos y universidades, brindando a los educadores un conjunto completo de herramientas para desbloquear el verdadero potencial de los estudiantes. Nuestro equipo de más de 20 profesionales talentosos respalda con orgullo los productos, los servicios y nuestra compañía educativa.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="cs-height_60 cs-height_lg_30"></div>

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
            <li><a href="privacy-policy.html">Privacidad</a></li>
            <li><a href="terms-condition.html">Términos y Condiciones</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

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
