@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1 class="text-center text-primary">Formulario Crear Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Rol <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('role.index')}}">Listar roles</a>
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