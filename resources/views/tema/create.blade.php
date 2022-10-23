@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Tema Create')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar Tema <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('tema.index')}}">Listar temas</a>
        </div>
        <div class="card-body">
            <form action="{{route('tema.store')}}" method="post">
                @csrf
                @include('tema.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop