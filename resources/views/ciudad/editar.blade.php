@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO EDITAR PAIS </span>
        </div>
        
        <div class="card-body">
            <form action="{{route('ciudades.update',$ciudad->id)}}" method="POST">
            {{ @method_field('PUT') }}
            @csrf
                @include('ciudad.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop   

