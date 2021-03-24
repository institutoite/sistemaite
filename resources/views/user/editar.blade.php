@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Editar')

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO EDITAR PAIS </span>
        </div>
        
        <div class="card-body">
            <form action="{{route('usuarios.update',$user->id)}}" method="POST">
                {{ @method_field('PUT') }}
                @csrf
                @include('user.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
    <script>
        $(document).ready(function() {
            
        } );
    </script>
@stop