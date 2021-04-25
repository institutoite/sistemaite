@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Editar')

@section('content_header')
@stop

@section('content')
    @include('include.menu')

    
@stop   

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
    <script>
        $(document).ready(function() {
            
        } );
    </script>
@stop