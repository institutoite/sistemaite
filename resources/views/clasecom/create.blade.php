
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
        <div class="alert alert-primary" role="alert">    
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">observaciones de esta clase programada</li>
                @foreach ($programacioncom->observaciones as $observacion)
                    <li class="list-group-item text-gray">{{$observacion->observacion}}</li>
                @endforeach 
            </ul>
        </div>
        <div class="card card-default">
            @if ($programacioncom->activo)
                <div class="card-header bg-success">
            @else 
                <div class="card-header bg-danger">
            @endif
                <span class="card-title">Marcar clase de computación x</span>
               
                    <h4 class="alert-heading">{!! "Horario: ".$programacioncom->horaini->toTimeString().' '.($programacioncom->horafin)->toTimeString() !!}</h4>
                    {!! $matriculacion->objetivo !!}
                
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('clasescom.guardar',$programacioncom->id) }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('clasecom.form')    
                    </div>
                    @include('include.botones')
                </form>
            </div>
        </div>
    </section>
@endsection