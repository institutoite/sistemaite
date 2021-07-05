
@extends('adminlte::page')
@section('css')
     <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@endsection

@section('title', 'Dashboard')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
    <section class="content container-fluid">
       
        <div class="card card-default">
            <div class="card-header bg-primary">
                <span class="card-title">Create Clase</span>
            </div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Objetivo</h4>
                    {!! $inscripcion->objetivo !!}
                </div>
                <form method="POST" action="{{ route('clases.guardar',$programa->id) }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('clase.form')    
                    </div>
                    @include('include.botones')
                </form>
            </div>
        </div>
    </section>
@endsection
