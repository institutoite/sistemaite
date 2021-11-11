@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@endsection

@section('title', 'Carreras')
@section('plugins.jquery', true)
@section('content')

   @livewire('carrera-componet')
    
@endsection

@section('js')
    
@endsection
