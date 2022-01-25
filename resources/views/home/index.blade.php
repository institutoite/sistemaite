@extends('layouts.home')

@section('banner')
<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <div class="banner-content center-heading">
                    <span class="subheading"></span>
                        <h1>{{$hometext->banner}}</h1>
                    
                    <a href="#" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>Contactanos </a>  
                    <a href="#" class="btn btn-tp ">Leer mas <i class="fa fa-angle-right ml-2"></i></a>  
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
@stop

@section('heading')
<div class="row align-items-center justify-content-center">
    <div class="col-lg-6">
        <div class="section-heading center-heading">
            <span class="subheading"></span>
            <h3>{{$hometext->heading}}</h3>
            <p>{{$hometext->subheading}}</p>
        </div>
    </div>
</div>
@stop

@section('schedule')
@foreach ($homeschedules as $homeschedule)
    <div class="about-text-block">
        <i class="bi bi-calendar"></i>
        <h4>{{$homeschedule->title}}</h4>
        <p>{{$homeschedule->description}}</p>
    </div>
@endforeach
@stop

@section('docente')
@foreach ($docentes as $docente)
<div class="col-lg-4 col-sm-6">
    <div class="team-block">
        <div class="team-img">
            <img src="{{ Storage::url($docente->persona->foto) }}" alt="" class="img-fluid">
        </div>
        <div class="team-info">
            <h4>{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h4>
            <p>Profesor</p>
        </div>
    </div>
</div>
@endforeach
@stop

