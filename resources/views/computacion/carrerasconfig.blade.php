@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Crear Persona')

@section('plugins.Jquery', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-secondary">
                FORMULARIO CONFIGURAR CARRERAS {{$Persona->computacion->nombre}}
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane">
                        <form action="{{route('computacion.carreras.guardar',$Persona)}}" id="formulario" method="post" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header bg-success">
                                            CARRERAS QUE ESTUDIA
                                        </div>
                                        <div class="card-body">
                                            @foreach ($CarrerasComputacion as $carrera) 
                                                <div class="form-check form-switch mb-3">
                                                    <input disabled class="form-check-input" type="checkbox" name="carreras[{{$carrera->id}}]"  checked id="{{$carrera->carrera}}">
                                                    <label class="form-check-label" for="{{$carrera->id}}">{{$carrera->carrera}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header bg-warning">
                                            CARRERAS QUE NO ESTUDIA
                                        </div>
                                        <div class="card-body">
                                            @foreach ($CarrerasFaltantes as $carreraFaltante)
                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" name="carreras[{{$carreraFaltante->id}}]" id="{{$carreraFaltante->carrera}}">
                                                    <label class="form-check-label" for="{{$carreraFaltante->id}}">{{$carreraFaltante->carrera}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

