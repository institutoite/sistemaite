@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar Como se enteró
        </div>
        <div class="card-body">
            <form action="{{ route('como.update',$como) }}" method="POST">
                @csrf
                @method('PUT')
                @include('como.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop