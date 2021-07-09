@extends('adminlte::page')
@section('css')
    
@stop

@section('title', 'Editar')

@section('content_header')

@stop

{{ dd($user) }}

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