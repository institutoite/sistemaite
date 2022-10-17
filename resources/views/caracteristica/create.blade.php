@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('title', 'Plan Caracteristica')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Caracteristica <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('caracteristica.index')}}">Listar Caracteristicas</a>
        </div>
        <div class="card-body">
            <form action="{{route('caracteristica.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('caracteristica.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
        CKEDITOR.replace('caracteristica', {
            height: 150,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
</script>
@stop