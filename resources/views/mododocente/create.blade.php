@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)


@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear mododocentes <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('mododocentes.index')}}">Listar Mododocentes</a>
        </div>
        <div class="card-body">
            <form action="{{route('mododocentes.store')}}" method="POST">
                @csrf
                @include('mododocente.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop