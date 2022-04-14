@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content_header')
    <h1 class="text-center text-primary">Formulario Editar meta</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Editar metas <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('meta.index')}}">Listar metas</a>
            </div>
            <div class="card-body">
                <form action="{{route('carrera.update',$carrera)}}" method="put">
                    @csrf
                    {{ @method_field('PUT') }} 
                    @include('carrera.form')
                    @include('include.botones')
                </form>
            </div>
        </div>
    
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector('#description'))
            .catch( error => {
                console.error(error);
        });
    </script>
@stop