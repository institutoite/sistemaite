@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content_header')
    <h1 class="text-center text-primary">Formulario Crear curso</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Crear Curso <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('curso.index')}}">Listar cursos</a>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'curso.store', 'files' => true, 'autocomplete' => 'off']) !!}

                    <div class="mb-4">
                        {!! Form::label('name', 'Nombre del curso') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control' . ($errors->has('name') ? ' border-red-600' : '')]) !!}
                    
                        @error('name')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="mb-4">
                        {!! Form::label('picture', 'Subir Imagen') !!}
                        {!! Form::file('file', ['class'=> 'form-control'  . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
                        
                        @error('file')
                            <strong class="text-xs text-red-600">{{$message}}</strong>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nuevo curso', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
            </div>
        </div>
    
@stop

@section('js')

@stop