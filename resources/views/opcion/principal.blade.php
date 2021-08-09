@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@stop

@section('title', 'Menus')


@section('content')
    <div class="container pt-4">
        @if ($persona->isEstudiante())
            @include('opcion.menu_estudiante')
            y
        @endif
        @if ($persona->isDocente())
            @include('opcion.menu_docente')
        @endif
        
        @if ($persona->isComputacion())
            @include('opcion.menu_computacion')
            x
        @endif

        @if ($persona->isCliservicio())
            @include('opcion.menu_cliservicio')
        @endif
        @if ($persona->isClicopy())
            @include('opcion.menu_copy')
        @endif
    </div>
@stop   

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script>
        function iniciarMap(){
            var coord = {lat:-17.802041,lng:-63.136210};
            var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 10,
            center: coord
            });
            var marker = new google.maps.Marker({
            position: coord,
            map: map
            });
        }
    
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
@stop