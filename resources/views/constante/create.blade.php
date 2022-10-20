@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('title', 'Constante Crear')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Constante <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('constante.index')}}">Listar Constantes</a>
        </div>
        <div class="card-body">
            <form action="{{route('constante.store')}}" method="POST">
                @csrf
                @include('constante.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

<script>
    
</script>
@stop