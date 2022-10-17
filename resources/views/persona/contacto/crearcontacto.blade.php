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
        <div class="card-body">
            <form action="{{route('personas.store.contacto')}}" id="formulario" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                @csrf
                @include('persona.contacto.formcontacto')
                
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>

       CKEDITOR.replace('observacion');
       
       
    </script>
    
@stop

