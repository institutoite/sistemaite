@extends('adminlte::page')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <!-- Iconfont Css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bicon/css/bicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/themify/themify-icons.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/animate-css/animate.css')}}">
    <!-- WooCOmmerce CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce-layouts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce-small-screen.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/woocommerce/woocommerce.css')}}">
    <!-- Owl Carousel  CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/owl/assets/owl.theme.default.min.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    <link href="assets/images/faviconite.ico" rel="shortcut icon">
@stop

@section('title', 'Carrera mostrar')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')
    <section class="page-wrapper edutim-course-single course-single-style-3">
        <div class="course-single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="course-single-header white-text">
                            <span class="subheading"></span>
                            <h3 class="single-course-title">{{$carrera->carrera}}</h3>
                            {!! $carrera->description !!}
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
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Aprendizaje</a>
                                <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Requisitos</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="single-course-details ">
                                <div class="course-widget course-info">
                                    <h4 class="course-title">Lo que aprenderás</h4>
                                    <ol>
                                        @foreach ($asignaturas as $asignatura)
                                            <li>
                                                {{$asignatura->asignatura}}
                                                <i class="fa fa-check"></i>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                            <div class="single-course-details ">
                                <div class="course-widget course-info">
                                    <h4 class="course-title">Requisitos</h4>
                                    <ol>
                                        @foreach ($requisitos as $requisito)
                                            <li>
                                                {{$requisito->requisito}}
                                                <i class="fa fa-check"></i>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                            <div class="edutim-single-course-segment  edutim-course-topics-wrap">
                                <div class="edutim-course-topics-contents">
                                    <div class="edutim-course-topic ">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h2 class="mb-0">
                                                        <button
                                                            class="btn-block text-left collapsed curriculmn-title-btn"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            <h4 class="curriculmn-title"> Introducción</h4>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordionExample">
                                                    <div class="course-lessons">
                                                        <div class="single-course-lesson">
                                                            <div class="course-topic-lesson">
                                                                <i class="fab fa-file"></i>
                                                                <span>Introducción al curso</span>
                                                            </div>
                                                        </div>
                                                        <div class="single-course-lesson">
                                                            <div class="course-topic-lesson">
                                                                <i class="fab fa-file"></i>
                                                                <span>funcionamiento de la computadora</span>
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
                        
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="course-sidebar">
                        <div class="course-single-thumb">
                            <img src="{{asset('assets/images/course/course14.jpg')}}" alt="" class="img-fluid w-100">

                            <div class="course-price-wrapper">
                                <div class="course-price">
                                    <h4>Costo Total: Bs.<span>{{$carrera->precio}}</span> </h4>
                                </div>
                                <div class="buy-btn"><a href="#" class="btn btn-main btn-block">Contactanos</a></div>
                            </div>
                        </div>

                        <div class="course-widget course-details-info">
                            <h4 class="course-title">Datos relevantes</h4>
                            <ul>
                                <li>
                                    <div class="">
                                        <span><i class="bi bi-flag"></i>Creado :{{$carrera->created_at}}</span>

                                    </div>
                                </li>
                                <li>
                                    <div class="">
                                        <span><i class="bi bi-paper"></i>Total asignaturas :{{count($asignaturas)}}</span>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        

                    
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop

@section('js')
    <script src="{{asset('assets/vendors/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery.isotope.js')}}"></script>
    <script src="{{asset('assets/vendors/imagesloaded.js')}}"></script>
    <script src="{{asset('assets/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
@stop