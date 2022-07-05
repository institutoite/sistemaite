@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Pais Editar')
@section('plugins.Jquery', true)
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)


@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO EDITAR PAIS </span>
        </div>
        
        <div class="card-body">
            <form action="{{route('paises.update',$pais->id)}}" method="POST">
                {{ @method_field('PUT') }}
                @csrf
                @include('pais.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('dist/js/steepfocus.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            
        } );
    </script>
@stop