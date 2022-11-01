@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/textoimagen.css')}}">
@stop
@section('title', 'Billetescom')
@section('plugins.Datatables',true)

@section('content')
        <div class="card">
        <div class="card-header bg-secondary">
            CONSULTA CON PARAMETROS DE FECHAS
        </div>
        <div class="card-body">
           <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" > 
                    <div class="form-floating mb-3 text-gray">
                        <input type="date" name='fechaini' class="form-control texto-plomo" id="fechaini" placeholder="fechaini" value="{{old('fechaini','2022-10-01'?? '')}}">
                        <label for="fechaini">Fechaini</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" > 
                    <div class="form-floating mb-3 text-gray">
                        <input type="date" name='fechafin' class="form-control texto-plomo" id="fechafin" placeholder="fechafin" value="{{old('fechafin','2022-10-01' ?? '')}}">
                        <label for="fechafin">Fechafin</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" > 
                    <div class="form-floating mb-3 text-gray">
                        <button id="consultar" class="btn btn-primary btn-lg text-white">Consultar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span id="card_title">
                    {{ __('Billetes Matriculaciones') }}
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="billetes_matriculaciones" class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>CORTE</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tfoot class="">
                        <tr>
                            <th>Total Billetes</th>
                            <th id="cantidad"></th>
                            <th id="total"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script>
        $(document).ready(function() {
               $("#consultar").on('click',function(){
                    console.log($("#fechaini").val());
                    console.log($("#fechafin").val());
                    if($("#fechaini").val()<=$("#fechafin").val()){
                        $fechaini=$("#fechaini").val();
                        $fechafin=$("#fechafin").val();
                        mostrarBilletes($fechaini,$fechafin);
                    }else{
                        algoSalioMal();
                    }
                });
            $("#fechaini").val(moment().format('YYYY-MM-DD'));
            $("#fechafin").val(moment().format('YYYY-MM-DD'));

            $('#billetes_matriculaciones').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    if(data['corte']<10) 
                    $('td', row).eq(0).html("Monedas de:"+data['corte']);
                    else
                    $('td', row).eq(0).html("Billetes de:"+data['corte']);
                    $('td', row).eq(2).html(data['cantidad']*data['corte']);

                },
                "ajax":{
                        'url':"listar/billetes/matriculaciones",
                        "data":{
                            fechaini:$("#fechaini").val(),
                            fechafin:$("#fechafin").val(),
                        },
                    },
                "columns": [
                    {data: 'corte'},
                    {data: 'cantidad'},
                    {data: 'subtotal'},
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
                "footerCallback": function( tfoot, data, start, end, display ) {
                        var api = this.api();
                         let total=0.0;
                        let cantidad=0.0;
                        $(api.column(2).footer()).html(
                            api.column(2).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#total").html("Bs. "+(total).toFixed(2));
                        $(api.column(1).footer()).html(
                            api.column(1).data().reduce(function ( a, b ) {
                                cantidad=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#cantidad").html((cantidad).toFixed(0));
                    } 
            });
            
            function mostrarBilletes($fechaini,$fechafin){
                
                $("#billetes_matriculaciones").dataTable().fnDestroy();
                $('#billetes_matriculaciones').dataTable({
                    "responsive":true,
                    "searching":true,
                    "paging":   true,
                    "autoWidth":false,
                    "ordering": true,
                    "info":     true,
                    "createdRow": function( row, data, dataIndex ) {
                        if(data['corte']<10) 
                            $('td', row).eq(0).html("Monedas de:"+data['corte']);
                        else
                            $('td', row).eq(0).html("Billetes de:"+data['corte']);
                        $('td', row).eq(2).html(data['cantidad']*data['corte']);

                    },
                    "ajax":{
                            'url':"listar/billetes/matriculaciones",
                            "data":{
                                fechaini:$fechaini,
                                fechafin:$fechafin,
                            },
                        },
                    "columns": [
                        {data: 'corte'},
                        {data: 'cantidad'},
                        {data: 'subtotal'},
                    ],
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },  
                        { responsivePriority: 2, targets: -1 }
                    ],
                    "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },
                    "footerCallback": function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        let total=0.0;
                        let cantidad=0.0;
                        $(api.column(2).footer()).html(
                            api.column(2).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#total").html("Bs. "+(total).toFixed(2));
                        $(api.column(1).footer()).html(
                            api.column(1).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#cantidad").html((cantidad).toFixed(0));
                    } 
                });
            
            }

        } );
    </script>
@stop

