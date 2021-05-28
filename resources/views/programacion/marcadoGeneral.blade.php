@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Programación')

@if ($dias_que_faltan_para_pagar<0)
    @php $clase="dias-negativos" @endphp
@else
    @if ($dias_que_faltan_para_pagar==0)
        @php
            $clase="dias0";
        @endphp
    @else
        @switch($dias_que_faltan_para_pagar)
            @case(1)
                @php $clase="dias1"; @endphp
                @break
            @case(2)
                @php $clase="dias2"; @endphp
                @break
            @case(3)
                @php $clase="dias3"; @endphp
                @break
            @case(4)
                @php $clase="dias4"; @endphp
                @break
            @case(5)
                @php $clase="dias5"; @endphp
                @break
            @default
                @php $clase="bg-success"; @endphp 
        @endswitch
    @endif
@endif

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Programacion') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('programacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Inicio') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-2">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Clase</span>
                                        <span class="info-box-number">{{$inscripcion->totalhoras}}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Asistencias</span>
                                        <span class="info-box-number">{{$presentes}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Licencias</span>
                                        <span class="info-box-number">{{$licencias}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-skull-crossbones"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Faltas</span>
                                    <span class="info-box-number">{{$faltas}}</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="row ml-1 mr-1">
                            
                            @if ($inscripcion->costo==$pago)
                                @php $clasetabla="bg-success text-white" @endphp
                            @else
                                @if ($pago>0)
                                    @php $clasetabla="bg-warning text-white" @endphp
                                @else 
                                    @php $clasetabla="dias-negativos text-white" @endphp
                                @endif
                            @endif

                            <table class="table table-bordered table-hover table-striped col-5">
                                <tbody class="{{$clasetabla}}" >    
                                    <tr class="">
                                        <td><strong>COSTO</strong></td>
                                        <td><strong>{{'Bs. '. floor($inscripcion->costo)}}</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td><strong>PAGOS</strong></td>
                                        <td><strong>{{'Bs. '.$pago }}</strong></td>
                                    </tr>
                                    <tr class="">
                                        <td><strong>DEBE</strong></td>
                                        <td> <strong>Bs. {{$inscripcion->costo-$pago}}</strong></td>
                                    </tr>
                                </tbody>
                            </table> 
                            
                            <div class="col-6 text-center">
                                <div class="circulo {{$clase}}">
                                    @if ($dias_que_faltan_para_pagar==0)
                                        <h1>HOY TOCA PAGAR</h1>
                                    @endif
                                    @if ($dias_que_faltan_para_pagar>0)
                                        <h2>Faltan <br> {{$dias_que_faltan_para_pagar}}  dias</h2>
                                    @else
                                        <h2>Tenía que haber pagado hace:: <br> {{$dias_que_faltan_para_pagar}} dias</h2>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        @include('programacion.hoy')
                        @include('programacion.futuro')
                        @include('programacion.pasado')
                        @include('programacion.todo')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

