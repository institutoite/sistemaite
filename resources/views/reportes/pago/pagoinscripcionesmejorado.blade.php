
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/textoimagen.css')}}">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
@stop

@section('title', 'Pagos Inscripciones')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

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
    <div class="card card-primary">
        <div class="card-header bg-secondary">
            <span class="card-title">Pago de Inscripciones</span>
        </div>
        <div class="card-body">
            
            <table id="pagos" class="table table-bordered table-hover table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>ESTUDIANTE</th>
                        <th>MONTO</th>
                        <th>FECHAHORA</th>
                    </tr>
                </thead>
                <tfoot class="bg-primary">
                    <tr>
                        <th></th>
                        <th id="total"></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
           
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
        $(document).ready(function(){
            let sumaMontos=0;
            $("#fechaini").val(moment().format('YYYY-MM-DD'));
            $("#fechafin").val(moment().format('YYYY-MM-DD'));

            let tablaPagoInscripciones=$('#pagos').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "paging": false,
                    "ajax":{
                        "url":"../../pagoinscripciones/max",
                        "data":{
                            modelo:"Inscripcione",
                            fechaini:$("#fechaini").val(),
                            fechafin:$("#fechafin").val(),
                        },
                        
                    },
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); // agrega dinamiacamente el id del row
                        $('td', row).eq(0).html(data['nombre']+" "+data['apellidop']);
                        $('td', row).eq(1).html("Bs. "+data['monto']);
                        $('td', row).eq(2).html(moment(data['created_at']).format('DD-MM-Y HH:mm'));
                    },
                    "columns": [
                        {data:'nombre'},
                        {data:'monto'},
                        {data:'created_at'},
                    ],
                    
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },  
                        { responsivePriority: 3, targets:  4},  
                        { responsivePriority: 2, targets: -1 }
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },
                    "footerCallback": function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        let total=0.0;
                        $(api.column(1).footer()).html(
                            api.column(1).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#total").html("Bs. "+(total).toFixed(2));
                    } 
                }
            );
            
            $("#consultar").on('click',function(){
                console.log($("#fechaini").val());
                console.log($("#fechafin").val());
                if($("#fechaini").val()<=$("#fechafin").val()){
                    $fechaini=$("#fechaini").val();
                    $fechafin=$("#fechafin").val();
                    $modelo="Inscripcione";
                    mostrarPagos($fechaini,$fechafin,$modelo);
                }else{
                    algoSalioMal();
                }
            });

            function mostrarPagos($fechaini,$fechafin,$modelo){
                
                $("#pagos").dataTable().fnDestroy();
                $('#pagos').DataTable({
                  
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "paging": false,
                    "ajax":{
                        "url":"../../pagoinscripciones/max",
                        "data":{
                            modelo:$modelo,
                            fechaini:$fechaini,
                            fechafin:$fechafin,
                        },
                    },
                    "columns": [
                       
                       {data:'nombre'},
                      
                       // {data:'modalidad'},
                       {data:'monto'},
                       {data:'created_at'},
                       
                   ],
                    "createdRow": function( row, data, dataIndex ) {
                        $Monto=parseInt(data['monto'])

                        switch ($Monto) {
                            case 0:
                                $Monto=100;
                                break;
                            case 40:
                                $Monto=80;
                                break;
                            case 50:
                                $Monto=100;
                                break;
                            case 150:
                                $Monto=165;
                                break;
                            case 165:
                                $Monto=265;
                                break;
                            case 380:
                                $Monto=550;
                                break;
                            case 350:
                                $Monto=420;
                                break;
                            case 400:
                                $Monto=420;
                                break;
                            case 420:
                                $Monto=550;
                                break;
                            case 500:
                                $Monto=550;
                                break;
                            default:
                                break;
                        }

                        $('td', row).eq(0).html(data['nombre']+" "+data['apellidop']);
                        $('td', row).eq(1).html($Monto);
                        $('td', row).eq(2).html(moment(data['created_at']).format('DD-MM-Y HH:mm'));
                    },
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },
                    "footerCallback": function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        let total=0.0;
                        $(api.column(1).footer()).html(
                            api.column(1).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#total").html("Bs. "+(total).toFixed(2));
                    } 
                });
            }
        });
        
    </script>
@endsection
