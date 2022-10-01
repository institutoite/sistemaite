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
        <h1 class="cs-page_title">Contacto</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Contacto</li>
        </ol>
      </div>
    </div>
  </section>
  <!-- End Page Head -->
  <div class="cs-height_100 cs-height_lg_70"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="cs-contact_card_wrap">
          <div class="cs-contact_card">
            <div class="cs-contact_info text-center">
              <div class="cs-contact_icon">
                <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1448_14685)">
                  <path d="M16.7113 22.6393C20.4669 26.4044 24.8179 29.9986 26.5422 28.2759C29.0074 25.8059 30.5274 23.6637 35.9646 28.0305C41.4018 32.3974 37.2249 35.3107 34.8373 37.6984C32.0823 40.4534 21.8128 37.8424 11.6573 27.6917C1.50177 17.5409 -1.10439 7.26986 1.65061 4.51169C4.04461 2.12878 6.95002 -2.04172 11.3169 3.38594C15.6837 8.81361 13.5383 10.3368 11.0746 12.8004C9.35194 14.5326 12.9461 18.882 16.7113 22.6393Z" fill="url(#paint0_linear_1448_14685)"/>
                  </g>
                  <defs>
                  <linearGradient id="paint0_linear_1448_14685" x1="38.6309" y1="0.724609" x2="-6.93527" y2="23.7985" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#022136"/>
                    <stop offset="1" stop-color="#022136"/>
                  </linearGradient>
                  <clipPath id="clip0_1448_14685">
                  <rect width="38" height="38" fill="white" transform="matrix(-1 0 0 1 38.623 0.726074)"/>
                  </clipPath>
                  </defs>
                </svg>                
              </div>
              <h3 class="cs-contact_title">Telefono</h3>
              <p class="cs-contact_text">+591 71039910 <br> +591 71324941 <br> +591 75553338</p>
            </div>
            <div class="cs-contact_info text-center">
              <div class="cs-contact_icon">
                <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M35.8288 14.9442V29.2259C35.8288 30.9676 34.4038 32.3926 32.6621 32.3926H7.32878C5.58711 32.3926 4.16211 30.9676 4.16211 29.2259V10.2259C4.16211 8.48424 5.58711 7.05924 7.32878 7.05924H23.3204C23.2254 7.56591 23.1621 8.10424 23.1621 8.64258C23.1621 10.9859 24.1913 13.0601 25.8063 14.5167L19.9954 18.1426L7.32878 10.2259V13.3926L19.9954 21.3092L28.3871 16.0526C29.2421 16.3692 30.1288 16.5592 31.0788 16.5592C32.8679 16.5592 34.4988 15.9417 35.8288 14.9442ZM26.3288 8.64258C26.3288 11.2709 28.4504 13.3926 31.0788 13.3926C33.7071 13.3926 35.8288 11.2709 35.8288 8.64258C35.8288 6.01424 33.7071 3.89258 31.0788 3.89258C28.4504 3.89258 26.3288 6.01424 26.3288 8.64258Z" fill="url(#paint0_linear_1448_14689)"/>
                  <defs>
                  <linearGradient id="paint0_linear_1448_14689" x1="4.16211" y1="3.89258" x2="40.3952" y2="24.2752" gradientUnits="userSpaceOnUse">
                  <stop offset="0" stop-color="#022136"/>
                  <stop offset="1" stop-color="#022136"/>
                  </linearGradient>
                  </defs>
                </svg>                
              </div>
              <h3 class="cs-contact_title">Correo</h3>
              <p class="cs-contact_text">info@ite.com.bo</p>
            </div>
            <div class="cs-contact_info text-center">
              <div class="cs-contact_icon">
                <svg width="41" height="39" viewBox="0 0 41 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20.5552 0.543945C29.1928 0.543945 36.1943 7.54547 36.1943 16.1831C36.1943 22.7916 31.5507 29.9937 22.3837 37.8662C21.874 38.304 21.2241 38.5445 20.5522 38.5439C19.8802 38.5434 19.2307 38.3017 18.7218 37.863L18.1155 37.3368C9.35433 29.6697 4.91602 22.6441 4.91602 16.1831C4.91602 7.54547 11.9175 0.543945 20.5552 0.543945ZM20.5552 10.168C18.9599 10.168 17.4299 10.8018 16.3019 11.9298C15.1738 13.0578 14.5401 14.5878 14.5401 16.1831C14.5401 17.7784 15.1738 19.3083 16.3019 20.4364C17.4299 21.5644 18.9599 22.1982 20.5552 22.1982C22.1505 22.1982 23.6804 21.5644 24.8085 20.4364C25.9365 19.3083 26.5702 17.7784 26.5702 16.1831C26.5702 14.5878 25.9365 13.0578 24.8085 11.9298C23.6804 10.8018 22.1505 10.168 20.5552 10.168Z" fill="url(#paint0_linear_1448_14701)"/>
                  <defs>
                  <linearGradient id="paint0_linear_1448_14701" x1="4.91602" y1="0.543945" x2="45.0587" y2="17.2727" gradientUnits="userSpaceOnUse">
                  <stop offset="0" stop-color="#022136"/>
                  <stop offset="1" stop-color="#022136"/>
                  </linearGradient>
                  </defs>
                </svg>                
              </div>
              <h3 class="cs-contact_title">Ubicacion</h3>
              <p class="cs-contact_text">Villa 1 de mayo avenida tres pasos al frente esquina Che Guevara 4710</p>
            </div>
          </div>
        </div>
        <div class="cs-height_50 cs-height_lg_50"></div>
        <div class="cs-contact_box">
          <div class="cs-section_heading cs-style4">
            <h2 class="cs-section_title">Déjanos tu mensaje</h2>
            <p class="cs-section_subtitle">Póngase en contacto con nosotros en cualquier momento. Estamos disponibles para usted.</p>
          </div>
          <div class="cs-height_45 cs-height_lg_45"></div>
          <form class="cs-contact_form">
            <div class="row">
              <div class="col-lg-6">
                <div class="cs-form_field_wrap">
                  <input type="text" class="cs-form_field" placeholder="Nombre completo">
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-6">
                <div class="cs-form_field_wrap">
                  <input type="text" class="cs-form_field" placeholder="Correo">
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-12">
                <div class="cs-form_field_wrap">
                  <input type="text" class="cs-form_field" placeholder="Asunto">
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-12">
                <div class="cs-form_field_wrap">
                  <textarea cols="30" rows="5" placeholder="Mensaje..." class="cs-form_field"></textarea>
                </div>
                <div class="cs-height_20 cs-height_lg_20"></div>
              </div>
              <div class="col-lg-12">
                <button class="cs-btn cs-style1 cs-btn_lg"><span>Enviar mensaje</span></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

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
                <h2 class="cs-widget_title">Marketplace</h2>
                <ul class="cs-widget_nav">
                  <li><a href="explore-1.html">All NFTs</a></li>
                  <li><a href="explore-2.html">Popular Art</a></li>
                  <li><a href="explore-1.html">Digital Art</a></li>
                  <li><a href="explore-1.html">Trending</a></li>
                  <li><a href="explore-details.html">Explore Details</a></li>
                  <li><a href="live-action.html">Live Action</a></li>
                </ul>
              </div>
            </div><!-- .col -->
            <div class="col-lg-4 col-sm-4">
              <div class="cs-footer_widget">
                <h2 class="cs-widget_title">Account</h2>
                <ul class="cs-widget_nav">
                  <li><a href="user-profile.html">Profile</a></li>
                  <li><a href="user-items.html">My Collection</a></li>
                  <li><a href="create-items.html">Create & Upload</a></li>
                  <li><a href="user-account-settings.html">Account Setting</a></li>
                  <li><a href="connect-wallet.html">Connect wallet</a></li>
                  <li><a href="explore-1.html">Wishlist</a></li>
                </ul>
              </div>
            </div><!-- .col -->
            <div class="col-lg-4 col-sm-4">
              <div class="cs-footer_widget">
                <h2 class="cs-widget_title">Company</h2>
                <ul class="cs-widget_nav">
                  <li><a href="blog.html">Recent News</a></li>
                  <li><a href="how-it-works.html">How it Works</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="faq.html">Help Center & FAQ</a></li>
                </ul>
              </div>
            </div><!-- .col -->
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="cs-footer_widget">
            <h2 class="cs-widget_title">Subscribe to our newsletter.</h2>
            <form class="cs-footer_newsletter">
              <input type="text" placeholder="Enter Your Email" class="cs-newsletter_input">
              <button class="cs-newsletter_btn">
                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24.7014 9.03523C25.0919 8.64471 25.0919 8.01154 24.7014 7.62102L18.3374 1.25706C17.9469 0.866533 17.3137 0.866533 16.9232 1.25706C16.5327 1.64758 16.5327 2.28075 16.9232 2.67127L22.5801 8.32812L16.9232 13.985C16.5327 14.3755 16.5327 15.0087 16.9232 15.3992C17.3137 15.7897 17.9469 15.7897 18.3374 15.3992L24.7014 9.03523ZM0.806641 9.32812H23.9943V7.32812H0.806641V9.32812Z" fill="white"/>
                </svg>                  
              </button>
            </form>
            <div class="cs-footer_social_btns">
              <a href="#"><i class="fab fa-facebook-f fa-fw"></i></a>
              <a href="#"><i class="fab fa-twitter fa-fw"></i></a>
              <a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a>
              <a href="#"><i class="fab fa-instagram fa-fw"></i></a>
              <a href="#"><i class="fab fa-whatsapp fa-fw"></i></a>
              <a href="#"><i class="fab fa-github fa-fw"></i></a>
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
          <div class="cs-copyright">Copyright 2022. Created by Thememarch.</div>
          <ul class="cs-footer_menu">
            <li><a href="privacy-policy.html">Privacy Policy</a></li>
            <li><a href="terms-condition.html">Term & Condition</a></li>
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