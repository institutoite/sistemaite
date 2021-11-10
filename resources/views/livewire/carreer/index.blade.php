@extends('adminlte::page')
@section('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('title', 'Carreras')

@section('content')

   @livewire('mostrar-carreras')
    
@endsection

@section('js')
     
@endsection
