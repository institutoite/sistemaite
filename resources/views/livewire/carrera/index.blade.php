@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Motivos Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('content')

   @livewire('carrera-compone9t')
    
@endsection

@section('js')
    
@endsection
