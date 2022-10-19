@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 429')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Muchas peticiones Error 429</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Vover al inicio</a></li>
                    <li class="breadcrumb-item active">El error HTTP 429 se devuelve cuando un usuario ha enviado demasiadas peticiones en un corto periodo de tiempo</li>
                </ol>
            </div>
        </div>
    </div><!-- /.contai
@stop
