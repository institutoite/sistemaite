@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
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
                                        <span>PAGA HOY</span> <br>
                                    @else
                                        @if ($dias_que_faltan_para_pagar>0)
                                            <h2>Faltan <br> {{$dias_que_faltan_para_pagar}}  días</h2><br>
                                        @else
                                            <p> Ya Hace<br> {{$dias_que_faltan_para_pagar}} días</p>
                                        @endif
                                    @endif
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="success"></div>
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

@section('js')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    
    <script>
        $(document).ready(function() {

            $('[data-toggle="tooltip"]').tooltip();   
            
            $('#tabla_hoy').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   false,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
            });
        })



    </script>

@endsection

{{-- $('#tabla_hoy').on('click','tr',function() {
                // var row=$(this); 
                // var id=row.data('id');
                // console.log(row);
                // var id= row.find("td").eq(0).html(); 
                // var fecha= row.find("td").eq(1).html(); 
                // var horaInicio= row.find("td").eq(2).html(); 
                // var horaFin= row.find("td").eq(3).html();   
                } --}}