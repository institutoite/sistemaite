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
                FORMULARIO CONFIGURAR NIVELES DEL DOCENTE {{$Persona->docente->nombre}}
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane">
                        <form action="{{route('docentes.niveles.configurar',$Persona)}}" id="formulario" method="post" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    @foreach ($papeles as $papel)
                                        @if ($papel)
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" name="{{$papel}}"  checked id="{{$papel}}">
                                                <label class="form-check-label" for="{{$nivel->id}}">{{$papel}}</label>
                                            </div>
                                        @else
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" name="niveles[{{$nivelFaltante->id}}]" id="{{$nivelFaltante->nivel}}">
                                                <label class="form-check-label" for="{{$nivelFaltante->id}}">{{$nivelFaltante->nivel}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-6">
                                    {{-- @foreach ($nivelesFaltantes as $nivelFaltante)

                                        
                                        d

                                    @endforeach --}}
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

