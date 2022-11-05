@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@stop

@section('title', 'Menus')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
        
        {{ Breadcrumbs::render('opciones_principal', $persona) }}

        @if ($persona->isEstudiante())
            @include('opcion.menu_estudiante')
        @endif
        @if ($persona->isDocente())
            @include('opcion.menu_docente')
            
        @endif
        @if ($persona->isAdministrativo())
            @include('opcion.menu_administrativo')
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
    
    @include('opcion.modales')
@stop   

@section('js')
    <script src="https://kit.fontawesome.com/067a2afa7e.js" crossorigin="anonymous"></script>
@stop