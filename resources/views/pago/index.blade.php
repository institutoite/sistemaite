@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Fractales')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)


@section('content')
    <div class="card">
            <div class="card-header bg-primary">
                <div class="float-right">
                    LISTA DE TODOS LOS FRACTALES INSCRIPCIONES
                </div>
            </div>
        <div class="card-body">
            <table id="pagos" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>MONTO</th>
                        <th>PAGOCON</th>
                        <th>CAMBIO</th>
                        <th>USUARIO</th>
                        <th>FECHAHORA</th>
                        <th>PAGABLE</th>
                        <th>OPCIONES</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
        <div class="card">
            <div class="card-header">
                Gráfico Barras
            </div>
            <div class="card-body">
                <div>
                    <canvas id="mycanvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
        <div class="card">
            <div class="card-header">
                Gráfico Circular
            </div>
            <div class="card-body">
                <div>
                    <canvas id="circular"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
        <div class="card">
            <div class="card-header">
                Gráfico Rosquilla
            </div>
            <div class="card-body">
                <div>
                    <canvas id="rosquilla"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>   
    @include('pago.modalmostrar')
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('vendor/chart/Chart.js')}}"></script>
    <script>
        $(document).ready(function() {
            let tablapagos;
            let tablapagoscom;
            let myChart;
            let myChartCircular;
            let myChartRosquilla;
            let ctx_live_bar;
            let ctx_liveCirular;
            let ctx_liveRosquilla;
    
    var getData = function() {
        $.ajax({
            url: 'grafica/por/pagablestype',
            success: function(data) {
                $.each(data, function( k, v ) {
                    Cadena=v.pagable_type;
                    pos=Cadena.lastIndexOf('\\');
                    Modelo=Cadena.substring(pos+1);
                    myChart.data.labels.push(Modelo);
                    myChart.data.datasets[0].data.push(v.Suma);
                    myChart.data.datasets[0].backgroundColor= [
                            'rgba(55, 95, 122, 0.8)',
                            'rgba(38, 186, 165, 0.8)',
                            ],
                    myChart.update();
                });
                
            }
        });
    };
    var getDataCiruclar = function() {
        $.ajax({
            url: 'grafica/por/pagablestype',
            success: function(data) {
                $.each(data, function( k, v ) {
                    Cadena=v.pagable_type;
                    pos=Cadena.lastIndexOf('\\');
                    Modelo=Cadena.substring(pos+1);
                    myChartCircular.data.labels.push(Modelo);
                    myChartCircular.data.datasets[0].data.push(v.Suma);
                    myChartCircular.data.datasets[0].backgroundColor= [
                            'rgba(55, 95, 122, 0.8)',
                            'rgba(38, 186, 165, 0.8)',
                            ],
                    myChartCircular.update();
                });
                
            }
        });
    };
    var getDataRosquilla = function() {
        $.ajax({
            url: 'grafica/por/pagablestype',
            success: function(data) {
                $.each(data, function( k, v ) {
                    Cadena=v.pagable_type;
                    pos=Cadena.lastIndexOf('\\');
                    Modelo=Cadena.substring(pos+1);
                    myChartRosquilla.data.labels.push(Modelo);
                    myChartRosquilla.data.datasets[0].data.push(v.Suma);
                    myChartRosquilla.data.datasets[0].backgroundColor= [
                            'rgba(55, 95, 122, 0.8)',
                            'rgba(38, 186, 165, 0.8)',
                            ],
                    myChartRosquilla.update();
                });
                
            }
        });
    };

    // get new data every 3 seconds
    ctx_live = document.getElementById('mycanvas');
    GraficarBarras('bar',"Este es el titulo",ctx_live);
    getData();

    ctx_liveCirular = document.getElementById('circular');
    GraficarCircular('pie',"Este es toro titulo",ctx_liveCirular);
    getDataCiruclar();
    ctx_liveRosquilla = document.getElementById('rosquilla');
    GraficarRosquilla('doughnut',"Este es toro titulo",ctx_liveRosquilla);
    getDataRosquilla();
  
        function GraficarCircular(type,titulo,ctx){
            
            myChartCircular = new Chart(ctx, {
                type: type,
                data: {
                    labels: [],
                    datasets: [{
                    data: [],
                    borderWidth: 1,
                    borderColor:'#00c0ef',
                    label: 'SubTotal',
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: titulo,
                    },
                    legend: {
                        display: true,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            }
                        }]
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: Math.round,
                        font: {
                            weight: 'bold',
                        },
                        display: true,
                    }
                }
            });
        }
        function GraficarBarras(type,titulo,ctx){
            
            myChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: [],
                    datasets: [{
                    data: [],
                    borderWidth: 1,
                    borderColor:'#00c0ef',
                    label: 'SubTotal',
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: titulo,
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            }
                        }]
                    }
                }
            });
        }
        function GraficarRosquilla(type,titulo,ctx){
            myChartRosquilla = new Chart(ctx, {
                type: type,
                data: {
                    labels: [],
                    datasets: [{
                    data: [],
                    borderWidth: 1,
                    borderColor:'#00c0ef',
                    label: 'SubTotal',
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: titulo,
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                            beginAtZero: true,
                            }
                        }]
                    }
                }
            });
        }

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablapagos=$('#pagos').DataTable(
                    {
                        "serverSide":true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'listar/pagos',
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                            $('td',row).eq(4).html(moment(data['created_at']).format('LLLL'));
                            
                        },
                        "columns": [
                            {data:'monto'},
                            {data:'pagocon'},
                            {data:'cambio'},
                            {data:'user'},
                            {data:'created_at'},
                            {data:'pagable_type'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        "columnDefs": [
                            { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 2, targets: -1 },
                        ],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
               
            /*%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR DETALLE PAGO CON AJAX EN MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                var pago_id =$(this).closest('tr').attr('id');
                console.log(pago_id);
                var fila=$(this).closest('tr');
                $.ajax({
                    url : "pago/mostrar/"+pago_id,
                    success : function(json) {
                        $("#modal-mostrar").modal("show");
                        $("#tabla-modal").empty();
                        $("#tabla-pago").empty();
                        $("#tabla-cambio").empty();
                        $html="";
                        $html+="<tr><td>Monto</td>"+"<td>Bs. "+json.pago.monto+"</td></tr>";
                        $html+="<tr><td>Pago Con</td>"+"<td>Bs. "+json.pago.pagocon+"</td></tr>";
                        $html+="<tr><td>Cambio</td>"+"<td>Bs. "+json.pago.cambio+"</td></tr>";
                        $html+="<tr><td>Usuario</td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>Fecha y hora Pago</td>"+"<td>"+moment(json.pago.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>Ultima Actualizacion</td>"+"<td>"+moment(json.pago.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-modal").append($html);    
                        
                        $htmlBilletesPago="";
                        $htmlBilletesCambio="";
                        $sumaPago=0;
                        $sumaCambio=0;
                        for (let j in json.billetes) {
                            if(json.billetes[j].pivot.tipo=='pago'){
                                $htmlBilletesPago+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaPago+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                                
                            }else{
                                $htmlBilletesCambio+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaCambio+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                            }
                        }
                        $htmlBilletesPago+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;P&nbsp;&nbsp;A&nbsp;&nbsp;G&nbsp;&nbsp;O&nbsp;&nbsp; </td>"+"<td>Bs. "+$sumaPago+"</td></tr>";
                        $htmlBilletesCambio+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;A&nbsp;&nbsp;M&nbsp;&nbsp;B&nbsp;&nbsp;I&nbsp;&nbsp;O&nbsp;&nbsp;</td>"+"<td>Bs. "+$sumaCambio+"</td></tr>";
                        $("#tabla-pago").append($htmlBilletesPago);
                        $("#tabla-cambio").append($htmlBilletesCambio);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
        } );
        
    </script>
@endsection
