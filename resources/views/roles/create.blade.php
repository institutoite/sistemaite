@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Rolx <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('role.index')}}">Listar roles</a>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=> 'role.store']) !!}

                @include('roles.form')

                {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

@stop