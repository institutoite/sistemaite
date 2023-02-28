ite, [24/02/2022 7:57]
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
                PAPELES DE {{$persona->nombre}}
            </div>
            
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane">
                        <form action="{{route('guardar.nuevo.papel',$persona)}}" id="formulario" method="post" class="form-horizontal" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header bg-success">
                                            PAPELES ACTUALES
                                            {{-- {{dd($papelesFaltantes)}} --}}
                                        </div>
                                        <div class="card-body">
                                            @foreach ($papelesActuales as $papel) 
                                                    <div class="form-check form-switch mb-3">
                                                        <input disabled class="form-check-input" type="checkbox"  name="papelesActuales[]"  checked id="{{$papel}}">
                                                        <label class="form-check-label" for="{{$papel}}">{{$papel}}</label>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header bg-warning">
                                            PAPELES FALTANTES
                                        </div>
                                        <div class="card-body">
                                            @foreach ($papelesFaltantes as $papelfaltante) 
                                                    <div class="form-check form-switch mb-3">
                                                        <input type="checkbox" class="form-check-input" name="papelesFalta[]" value="{{$papelfaltante}}"> <label>{{$papelfaltante}}</label>
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