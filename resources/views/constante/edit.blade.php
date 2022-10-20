@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('title', 'Constante Editar')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar Constante
        </div>
        <div class="card-body">
            <form action="{{ route('constante.update',$constante) }}" method="POST"  enctype="multipart/form-data">
                 @csrf
                {{ @method_field('PUT') }} 
                @include('constante.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop