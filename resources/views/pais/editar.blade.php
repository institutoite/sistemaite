@extends('adminlte::page')
@section('css')
    
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