@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 405')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Error 405</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Vover al inicio</a></li>
                    <li class="breadcrumb-item active">El error 405 No Permitido ocurre cuando el servidor web está configurado de una forma que no permita que usted pueda llevar a cabo una acción para un URL en particular.</li>
                </ol>
            </div>
        </div>
    </div><!-- /.contai
@stop
