@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content_header')
    <h1 class="text-center text-primary">Formulario Crear Asignatura</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar mododocente se enteróx
        </div>
        <div class="card-body">
            <form action="{{ route('mododocentes.update',$mododocente) }}" method="POST">
                @csrf
                @method('PUT')
                @include('mododocente.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop