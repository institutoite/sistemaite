
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Ciudad')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO CREAR CIUDAD</span>
        </div>
        <div class="card-body">
            <form action="{{route('ciudades.store')}}" method="post">
            @csrf
                @include('ciudad.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

    
    <script>
    
    </script>
@stop