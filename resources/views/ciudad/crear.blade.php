@extends('adminlte::page')
@section('css')
@stop

@section('title', 'Dashboard')

@section('content_header')

@stop

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