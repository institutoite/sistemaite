<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="ite">
  
  <meta name="author" content="ite.com.bo">

  <title>ite</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/bootstrap.css')}}">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/bicon/css/bicon.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/themify/themify-icons.css')}}">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">

  <link href="assets/images/faviconite.ico" rel="shortcut icon">
</head>


<body id="top-header">

  

    
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <ul class="header-contact">
                            <li>
                               Banner
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    
        </div>
    
        <!-- Main Menu Start -->
       
        <div class="site-navigation main_menu " id="mainmenu-area">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="assets/images/logoite.png" alt="Edutim" class="img-fluid">
                    </a>
    
                    <!-- Toggler -->
    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
    
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a href="{{ url('/') }}" class="nav-link js-scroll-trigger">
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('about') }}" class="nav-link js-scroll-trigger">
                                    Acerca de nosotros
                                </a>
                            </li>
    
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cursos<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="course-grid.html">
                                       Course Style 1
                                   </a>
                                   <a class="dropdown-item " href="course-grid-2.html">
                                       Course Style 2
                                   </a> 
    
                                   <a class="dropdown-item " href="course-grid-3.html">
                                       Course Style 3
                                   </a> 
                                   <a class="dropdown-item " href="course-grid-4.html">
                                       Course Style 4
                                   </a> 
                                   <a class="dropdown-item " href="course-grid-5.html">
                                       Course Filter
                                   </a>
                                   <a class="dropdown-item " href="course-grid-6.html">
                                       Course List
                                   </a>
                                    <a class="dropdown-item " href="course-single.html">
                                       Course Details Style 1
                                   </a> 
                                   <a class="dropdown-item " href="course-single2.html">
                                       Course Details Style Tab
                                   </a> 
                                   <a class="dropdown-item " href="course-single3.html">
                                       Course Details Style Tab2
                                   </a> 
                                   <a class="dropdown-item " href="course-single4.html">
                                       Course Details Classic
                                   </a> 
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Paginas<i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbar3">
                                    <a class="dropdown-item " href="instructors.html">
                                        Instructor
                                    </a>
                                    <a class="dropdown-item " href="login-registration.html">
                                        Login
                                    </a>
                                    <a class="dropdown-item " href="404.html">
                                        404
                                    </a> 
                                </div>
                            </li>
                        </ul>
    
                        @guest
                            @if (Route::has('login'))
                                    <a href="{{ route('login') }}" class="btn btn-main btn-small"><i class="fa fa-sign-in-alt mr-2"></i>
                                        Iniciar Sesion
                                    </a>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                       <!-- <ul class="header-contact-right d-none d-lg-block">
                            <li> <a href="#" class="header-cart"><i class="fa fa-shopping-cart"></i></a></li>
                            <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
                        </ul>-->
                       
                    </div> <!-- / .navbar-collapse -->
                </div> <!-- / .container -->
            </nav>
        </div>
    </header>
    

 <!--search overlay start-->
 <div class="search-wrap">
    <div class="overlay">
        <form action="" class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-9">
                        <h3>Search Your keyword</h3>
                        <input type="text" class="form-control" placeholder="Search..."/>
                    </div>
                    <div class="col-md-2 col-3 text-right">
                        <div class="search_toggle toggle-wrap d-inline-block">
                            <img class="search-close" src="assets/images/close.png" srcset="assets/images/close@2x.png 2x" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--search overlay end-->


<section class="page-wrapper edutim-course-single course-single-style-3">
    <div class="course-single-wrapper">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                <div class="course-single-header white-text">
                    <span class="subheading">Backend,Development</span>
                    <h3 class="single-course-title">Information About UI/UX Design Degree</h3> 
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>  
                        <div class="d-flex align-items-center ">
                            <div class="single-top-meta">
                                <i class="fa fa-user"></i><span> 3450 Students Enrolled</span>
                            </div>
                            <div class="single-top-meta">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                   <span>5.00 (500 ratings)</span>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
       </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav class="course-single-tabs">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                        <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics" role="tab" aria-controls="nav-profile" aria-selected="false">Topics</a>
                        <a class="nav-item nav-link" id="nav-instructor-tab" data-toggle="tab" href="#nav-instructor" role="tab" aria-controls="nav-contact" aria-selected="false">Instructor</a>
                        <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">Feedback</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
    <h4 class="course-title">Description</h4>
    <p>Knowing PHP has allowed me to make enough money to stay home and make courses like this one for students all over the world. Being a PHP developer can allow anyone to make really good money online and offline, developing dynamic applications.
        Knowing PHP will allow you to build web applications, websites or Content Management systems, like WordPress, Facebook, Twitter or even Google.
        There is no limit to what you can do with this knowledge. PHP is one of the most important web programming languages to learn, and knowing it, will give you SUPER POWERS in the web</p>


    <div class="course-widget course-info">
        <h4 class="course-title">What You will Learn?</h4>
        <ul>
            <li>
                <i class="fa fa-check"></i>
                Clean up face imperfections, improve and repair photos
            </li>
            <li>
                <i class="fa fa-check"></i>
                Remove people or objects from photos
            </li>
            <li>
                <i class="fa fa-check"></i>
                Master selections, layers, and working with the layers panel
            </li>
            <li>
                <i class="fa fa-check"></i>
                Use creative effects to design stunning text styles
            </li>
            <li>
                <i class="fa fa-check"></i>
                working with the layers panel
            </li>
            <li>
                <i class="fa fa-check"></i>
                Cut away a person from their background
            </li>
        </ul>
    </div>
</div>
                    </div>

                    <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <!--  Course Topics -->
<div class="edutim-single-course-segment  edutim-course-topics-wrap">
    <div class="edutim-course-topics-header d-lg-flex justify-content-between">
        <div class="edutim-course-topics-header-left">
            <h4 class="course-title">Topics for this course</h4>
        </div>
        <div class="edutim-course-topics-header-right">
            <span> Total learning: <strong>14 Lessons</strong></span>
            <span> Time: <strong>13h 20m 20s</strong> </span>            
        </div>
    </div>

    <div class="edutim-course-topics-contents">
        <div class="edutim-course-topic ">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn-block text-left curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="curriculmn-title">Introduction & Get Started</h4>
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="course-lessons">
                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span> Work with Smart Objects</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn-block text-left collapsed curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                       <h4 class="curriculmn-title"> Artboards & Raster Layers</h4>
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="course-lessons">
                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span>Use Photoshop’s Interface Efficiently</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>
                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span>Use the Eye Dropper & Swatches</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn-block text-left collapsed curriculmn-title-btn" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                       <h4 class="curriculmn-title">Work with Smart Objects</h4>
                      </button>
                    </h2>
                  </div>

                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="course-lessons">
                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span>Smart Objects Explained</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>
                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span>Filters with Smart Objects</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>

                        <div class="single-course-lesson">
                            <div class="course-topic-lesson">
                                <i class="fab fa-youtube"></i>
                                <span>Clean Up Face Imperfections</span>
                            </div>
                            <div class="course-lesson-duration">
                              00:05:20
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
<!--  COurse Topics End -->

 </div>
        <div class="tab-pane fade" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
            <div class="course-widget course-info">
                <h4 class="course-title">About the instructors</h4>
                <div class="instructor-profile">
                    <div class="profile-img">
                        <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="profile-info">
                        <h5>Meraz Ahmed</h5>
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star-half"></i></a>
                            <span>3.79 ratings (29 )</span>
                        </div>
                        <p>I'm a developer with a passion for teaching. I'm the lead instructor at the London App Brewery, London's leading Programming Bootcamp. I've helped hundreds of thousands of students learn to code and change their lives by becoming a developer </p>
                        <div class="instructor-courses">
                            <span><i class="bi bi-folder"></i>4 Courses</span>
                            <span><i class="bi bi-group"></i>400 Students</span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
            <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                <div class="course-widget course-info">
                <h4 class="course-title">Students Feedback</h4>

                <div class="course-review-wrapper">
                    <div class="course-review">
                        <div class="profile-img">
                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="review-text">
                            <h5>Mehedi Rasedh  <span>26th june 2020</span></h5>
                        
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half"></i></a>
                            </div>
                            <p>Great course. Well structured, paced and I feel far more confident using this software now then I did back in school when I was learning. And the guy doing the voice over really is great at what he does</p>
                        </div>
                    </div>


                    <div class="course-review">
                        <div class="profile-img">
                            <img src="assets/images/blog/author.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="review-text">
                            <h5>Rasedh raj <span>1 Year Ago</span></h5>
                            <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star-half"></i></a>
                            </div>
                            <p>Very deep course for a beginner, enjoyed everything from the very start and every detail is vastly investigated and discussed. A nice choice for those, who are enrolling Python. </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            <div class="col-lg-4">
                <div class="course-sidebar">
                    <div class="course-single-thumb">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid w-100">

                        <div class="course-price-wrapper">
                            <div class="course-price"><h4>Price: <span>$150</span> <del class="text-muted">$200</del></h4></div>
                            <p class="text-info"><i class="fa fa-clock mr-2"></i>Only 2 days left at this price</p>
                            <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Buy This Course</a></div>
                        </div>
                    </div>

                    <div class="course-widget course-details-info">
                        <h4 class="course-title">This Course Includes</h4>
                        <ul>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-graph-bar"></i>Skill level : </span>
                                    Beginner
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-user-ID"></i>Instructor :</span>
                                    <a href="#" class="d-inline-block">Jone Smit</a>
                                </div>
                            </li>

                            <li>
                                <div class="">
                                    <span><i class="bi bi-flag"></i>Duration :</span>
                                    2 weeks
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-paper"></i>Lessons :</span>
                                    42
                                </div>
                            </li>
                            <li>
                                <div class="">
                                    <span><i class="bi bi-forward"></i>Language :</span>
                                    English
                                </div>
                            </li>

                            <li>
                                <div class="">
                                    <span><i class="bi bi-madel"></i>Certificate :</span>
                                    yes
                                </div>
                            </li>
                        </ul>
                    </div>
                        <div class="course-widget course-share d-flex justify-content-between align-items-center">
                            <span>Share</span>
                            <ul class="social-share list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li  class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li  class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li  class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    
                        <div class="course-widget">
                            <h4 class="course-title">Tags</h4>
                            <div class="single-course-tags">
                                <a href="#">Web Deisgn</a>
                                <a href="#">Development</a>
                                <a href="#">Html</a>
                                <a href="#">css</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding related-course">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related Courses You may Like</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course1.jpg" alt="" class="img-fluid">
                        <span class="course-label">Beginner</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="course-price ">$50</div>   
                        
                        <h4><a href="#">Information About UI/UX Design Degree</a></h4>    
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div> 
                           
                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course2.jpg" alt="" class="img-fluid">
                        <span class="course-label">Advanced</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="course-price ">$80 <span class="del">$120</span></div>   
                        
                        <h4><a href="#">Photography Crash Course for Photographer</a></h4>    
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div> 
                           
                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="assets/images/course/course3.jpg" alt="" class="img-fluid">
                        <span class="course-label">Expert</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="course-price ">$100 <span class="del">$180</span></div>   
                        
                        <h4><a href="#">React – The Complete Guide (React Router)</a></h4>    
                        <div class="rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <span>(5.00)</span>
                        </div>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, alias.</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div> 
                           
                            <div class="buy-btn"><a href="#" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3>Join our community of students</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Email Address">
                        <a href="#" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mr-auto col-sm-6 col-md-6">
                <div class="widget footer-widget mb-5 mb-lg-0">
                    <h5 class="widget-title">About Us</h5>
                    <p class="mt-3">Veniam Sequi molestias aut necessitatibus optio magni at natus accusamus.Lorem ipsum dolor sit amet, consectetur adipisicin gelit, sed do eiusmod tempor incididunt .</p>
                    <ul class="list-inline footer-socials">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-2 col-sm-6 col-md-6">
                <div class="footer-widget mb-5 mb-lg-0">
                    <h5 class="widget-title">Company</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6 col-md-6">
                <div class="footer-widget mb-5 mb-lg-0">
                    <h5 class="widget-title">Courses</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">SEO Business</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Site Development</a></li>
                        <li><a href="#">Social Marketing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="footer-widget footer-contact mb-5 mb-lg-0">
                    <h5 class="widget-title">Contact </h5>
                    
                    <ul class="list-unstyled">
                        <li><i class="bi bi-headphone"></i>
                            <div>
                                <strong>Phone number</strong>
                                (68) 345 5902
                            </div>
                            
                        </li>
                        <li> <i class="bi bi-envelop"></i>
                            <div>
                                <strong>Email Address</strong>
                                info@yourdomain.com
                            </div>
                        </li>
                        <li><i class="bi bi-location-pointer"></i>
                            <div>
                                <strong>Office Address</strong>
                                Moon Street Light Avenue
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-btm">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="footer-logo">
                        <img src="assets/images/logo-white.png" alt="Edutim" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="copyright text-lg-center">
                        <p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com">Dreambuzz</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="fixed-btm-top">
    <a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{asset('assets/vendors/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.js')}}"></script>
    <!-- Counterup -->
    <script src="{{asset('assets/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery.isotope.js')}}"></script>
    <script src="{{asset('assets/vendors/imagesloaded.js')}}"></script>
    <!--  Owlk Carousel-->
    <script src="{{asset('assets/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>



  </body>
  </html>