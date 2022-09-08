@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Crear Contacto')
@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            CREAR CONTACTO SUPER RAPIDO
        </div>
        {{-- {{dd($persona)}} --}}
        <div class="card-body">
            <form action="{{route('personas.uptate.contacto',$persona)}}" id="formulario" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                @csrf
                @include('persona.contacto.formcontacto')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>
        ClassicEditor
            .create( document.querySelector('#observacion'))
            .catch( error => {
                console.error(error);
            } );
    </script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}
    <script>
        $(document).ready(function(){

        });
    </script>
    
@stop

