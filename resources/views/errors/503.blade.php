
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 503')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>No puedo hacerlo Error 503</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Vover al inicio</a></li>
                    <li class="breadcrumb-item active">El envío de un código de error 503 Servicio No Disponible como respuesta por un servidor que use el Protocolo de Transferencia de Hipertexto (HTTP) indica que el servidor no está listo para manejar la solicitud. Las causas más comunes son que el servidor esté apagado por mantenimiento o esté sobrecargado.</li>
                </ol>
            </div>
        </div>
    </div><!-- /.contai
@stop
