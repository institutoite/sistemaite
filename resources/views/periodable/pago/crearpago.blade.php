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
            <div class="col-md-5">
                <div class="row">
                    @php
                        if($saldo>0){
                            $clase="bg-danger";
                            $texto="text-danger";
                        }else{
                            $clase="bg-success";
                            $texto="text-success";
                        }
                    @endphp
                    <div class="card">
                        <div class="card-header">
                            ESTADO DEL PAGO SUELDO
                        </div>
                        <div class="card-body">
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
                                        <td><strong>Sueldo Total</strong></td>
                                        <td><strong>{{$acuenta+$saldo}} Bs.</strong></td>
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

            <div class="col-md-5">
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
                                        <th>Concuanto</th>
                                        <th>Cambio</th>
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



    <script src="{{asset('dist/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
    
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
                            $('td',row).eq(3).html(moment(data['fechaini']).format('DD-MM-YYYY'));
                            $('td',row).eq(4).html(moment(data['fechafin']).format('DD-MM-YYYY'));
                            if(data['pagado']==1)
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-up text-success fa-2x'></i>");
                            else
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-down text-danger fa-2x'></i>");
                        },
                        "columns": [
                            {data:'id'},
                            {data:'monto'},
                            {data:'pagocon'},
                            {data:'cambio'},
                            {data:'created_at'},
                            // {data:''},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        //order: [[0, 'desc']],
                        "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                        },
                        "paging":   true,
                    }
                );
           
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