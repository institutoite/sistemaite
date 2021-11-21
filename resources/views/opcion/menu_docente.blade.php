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
        
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">DOCENTE: <strong>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</strong></h3>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                    <a class="btn btn-app" href="{{route('docentes.gestionar.niveles',$persona)}}">
                        <i class="fas fa-edit"></i>Getion Niveles
                    </a>
                </div>
                
            </div>
        </div>
    </div>
@stop   