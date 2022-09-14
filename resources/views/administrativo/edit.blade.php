@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Administrativos')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar administrativo
        </div>
        <div class="card-body">
            <form action="{{ route('administrativos.update',$administrativo) }}" method="POST">
                @csrf
                @method('PUT')
                @include('administrativo.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')

@stop