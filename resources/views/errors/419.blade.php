
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 419')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Error 419</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Vover al inicio</a></li>
                    <li class="breadcrumb-item active">indica que la autenticación previamente válida ha expirado</li>
                </ol>
            </div>
        </div>
    </div><!-- /.contai
@stop
