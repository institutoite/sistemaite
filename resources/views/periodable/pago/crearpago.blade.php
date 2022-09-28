@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Periodo')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route("periodos.periodable.view",['periodable_id'=>$periodable->periodable_id,'periodable_type'=>$periodable_type])}}"><button type="button" class="btn btn-primary p-2 text-white">Periodos de {{$persona->nombre}}</button></a>
                    <a href="{{route('periodable.index')}}"><button type="button" class="btn btn-secondary p-2">Todos los periodos </button></a>
                    <a href="{{route('docentes.index')}}"><button type="button" class="btn btn-primary p-2 text-white">Docentes</button></a>
                    <a href="{{route('administrativos.index')}}"><button type="button" class="btn btn-secondary p-2">Administrativos</button></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                @php
                        if($saldo>0){
                            $clase="bg-danger";
                            $texto="text-danger";
                        }else{
                            $clase="bg-success";
                            $texto="text-success";
                        }
                    @endphp
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            PAGO SUELDO:<strong> {{$persona->nombre." ".$persona->apellidop." ".$persona->apellidom}}</strong>
                        </div>
                        <div class="card-body">
                            
                            <table id="tablaresumen" class="table table-bordered table-striped table-hover">
                                <thead class="{{$clase}}">
                                    <tr>
                                        <th>Atributo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Acuenta</strong></td>
                                        <td><strong id="acuenta" >{{ $acuenta }} Bs.</strong></td>
                                    </tr>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Saldo</strong></td>
                                        <td><strong id="saldo">{{$saldo}} Bs.</strong></td>
                                    </tr>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Sueldo Total</strong></td>
                                        <td><strong id="total">{{$acuenta+$saldo}} Bs.</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header bg-primary">
                                Pagar empleado 
                                {{-- <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('periodable.ppagos.listar.view',$periodable->id)}}">Listar pagos</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('periodable.pago.store',$periodable)}}" method="POST">
                                @csrf
                                @include('periodable.pago.formpago')
                                @include('include.botones')
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                @isset($periodable)
                    <div class="card">
                        <div class="card-header">
                            ADELANTOS DE ESTE SUELDO
                        </div>
                        <div class="card-body">
                            <table id="tablapagos" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endisset

            </div>
        </div>
@stop

@section('js')
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    
    <script>
        $(document).ready(function(){
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        let tablapagos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablapagos=$('#tablapagos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'../../../periodable/pagos/'+"{{$periodable->id}}",
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                            $('td',row).eq(2).html(moment(data['created_at']).format('DD-MM-YYYY h:m:s'));
                        },
                        "columns": [
                            {data:'id'},
                            {data:'monto'},
                            {data:'created_at'},
                            {data:'name'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        "columnDefs": [
                            { responsivePriority: 1, targets: 1 },
                            { responsivePriority: 2, targets: -1 }
                        ],
                        //order: [[0, 'desc']],
                        "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                        },
                        "paging":   true,
                    }
                );
           
/*%%%%%%%%%%%%%%%%%%%%%%%%% guardado con ajax %%%%%%%%%%%%%%%%%%%%%%*/
            $("#guardar").on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                $.ajax({
                    url: '../../../pago/periodable/ajax',
                    data:{
                        monto:$("#monto").val(),
                        pagocon:$("#pagocon").val(),
                        cambio:$("#cambio").val(),
                        periodable_id:"{{$periodable->id}}",
                        periodable_type:"{{$periodable_type}}",
                    },
                    success: function (result) {
                        html="";
                        $.each(result.errores, function(i, item) {
                            $.each(item, function(i, error) {
                                html+="<li>"+ item[0] +"</li>";
                                console.log(error);
                            });
                        });
                        $("#errores").append(html);

                        if (!result.errores){
                            $("#acuenta").html(result.acuenta+" Bs.");
                            $("#saldo").html(result.saldo+" Bs.");
                            $("#total").html(result.total+" Bs.");
                            $("#monto").val('');
                            $("#pagocon").val('');
                            $("#cambio").val('');
                            if(result.saldo>0){
                                $("#tablacuerpo").removeClass('text-success');
                                $("#tablacuerpo").addClass('text-danger');
                                $("thead").removeClass('bg-success');
                                $("thead").addClass('bg-danger');
                            }else{
                                $("#tablacuerpo").removeClass('text-danger');
                                $("#tablacuerpo").addClass('text-success');
                                $("thead").removeClass('bg-danger');
                                $("thead").addClass('bg-success');
                                $("#tablaresumen").addClass('text-success');
                            }
                            tablapagos.ajax.reload();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });
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