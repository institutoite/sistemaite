@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
             <span class="text-center">FORMULARIO CREAR PAIS</span>
        </div>
        <div class="card-body">
            <form action="{{route('paises.store')}}" method="post">
            @csrf
                @include('pais.form')
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