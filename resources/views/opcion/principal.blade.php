@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Menus')


@section('content')
    @if ($persona->isEstudiante())
        @include('opcion.menu_estudiante')
    @endif
    @if ($persona->isDocente())
        @include('opcion.menu_docente')
    @endif
    
    @if ($persona->isComputacion())
        @include('opcion.menu_computacion')
    @endif

    @if ($persona->isCliservicio())
        @include('opcion.menu_cliservicio')
    @endif
    @if ($persona->isClicopy())
        @include('opcion.menu_copy')
    @endif
@stop   

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
    <script>
        $(document).ready(function() {
            
        } );
    </script>
@stop