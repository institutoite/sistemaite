@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1 class="text-center text-primary">Formulario Crear Rol</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Crear Rol <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('meta.index')}}">Listar metas</a>
            </div>
            <div class="card-body">
                {!! Form::open(['route'=> 'role.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control', 'placeholder'=> 'Ingrese el nombre del rol']) !!}
        
                        @error('name')
                            <span class="text-danger">{{$message}}}</span>
                        @enderror
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    
@stop

@section('js')

@stop