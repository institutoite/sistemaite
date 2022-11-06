@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'pago Crear')
@section('plugins.Jquery', true)
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)


@section('content')
    <section class="content container-fluid pt-3">
        <div class="row">
            {{ Breadcrumbs::render('pagos.crear',$inscripcion->estudiante,$inscripcion->estudiante->persona, $inscripcion) }}
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Crear Pago</span>
                        <div class="float-right">Salir sin pagar
                            <a href="{{ route('reservar.inscripcion',$inscripcion->id) }}" class="text-white float-right"  data-placement="left">
                                <i class="fas fa-times-circle fa-2x"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.guardar',['inscripcione'=>$inscripcion->id])}}">
                            @csrf
                            @include('pago.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
            
            @php
                if($saldo>0){
                    $clase="bg-danger";
                    $texto="text-danger";
                }else{
                    $clase="bg-success";
                    $texto="text-success";
                }
            @endphp
            
            <div class="col-md-5">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="{{$clase}}">
                        <tr>
                            <th>Atributo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="{{$texto}}">
                            <td><strong>Acuenta</strong></td>
                            <td><strong>{{ $acuenta }} Bs.</strong></td>
                        </tr>
                        <tr class="{{$texto}}">
                            <td><strong>Saldo</strong></td>
                            <td><strong>{{$saldo}} Bs.</strong></td>
                        </tr>
                        <tr class="{{$texto}}">
                            <td><strong>Costo Total</strong></td>
                            <td><strong>{{$inscripcion->costo}} Bs.</strong></td>
                        </tr>
                    </tbody>
                </table>
                <div class="container-fluid h-100"> 
                    <div class="row w-100 align-items-center">
                        <div class="col text-center">
                            <a class="btn btn-secondary {{$clase}}" href="{{route('pagos.detallar',$inscripcion->id)}}">Detallar Pagos</a>
                        </div>	
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    {{-- <script src="{{asset('dist/js/moment.min.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        var tabla=$('#pagos').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   true,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "iDisplayLength" : 5,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
            });
/*%%%%%%%%%%%%%%%%%%%%%%%%% JS PARA CALCULAR EL CAMBIO AUTOMATICAMENTE %%%%%%%%%%%%%%%%%%%%%%*/
            $('#pagocon').change(function(){
                $('#cambio').val($(this).val()-$('#monto').val());
            });
            $('#monto').change(function(){
                $('#cambio').val($('#pagocon').val()-$('#monto').val());
            });
        });
    </script>    
@endsection