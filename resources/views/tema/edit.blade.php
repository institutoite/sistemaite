@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Docentes')


@section('content_header')
    <h1 class="text-center text-primary">Formulario Crear Tema</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar Tema <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('tema.index')}}">Listar temas</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('tema.update', $tema) }}"  role="form">
            {{ method_field('PATCH') }}
                @csrf
                @include('tema.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop