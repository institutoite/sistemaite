@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Periodo')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Periodo <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('periodable.index')}}">Listar Periodos</a>
        </div>
        <div class="card-body">
            <form action="{{route('periodable.store')}}" method="POST">
                @csrf
                @include('periodable.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop