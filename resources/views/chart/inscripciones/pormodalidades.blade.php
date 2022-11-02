@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@endsection

@section('title', 'Cantidad Inscripciones')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
            <div class="card-header bg-primary">
                CANTIDAD DE INSCRIPCIONES POR MODALIDAD
            </div>
        <div class="card-body">
            <table id="pormodalidades" class="table table-hover table-striped table-bordered">
                <thead class="bg-secondary">
                    <tr>
                        <th>MODALIDAD</th>
                        <th>CANTIDAD</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE INSCRIPCIONES POR MODALIDAD GRAFICCO CIRCULAR
                </div>
                <div class="card-body">
                    <canvas id="chartmodalidadespie" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE INSCRIPCIONES POR MODALIDAD GRAFICO DE BARRAS
                </div>
                <div class="card-body">
                    <canvas id="chartmodalidadesbar" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE INSCRIPCIONES POR MODALIDAD GRAFICO DE LINEAS
                </div>
                <div class="card-body">
                    <canvas id="chartmodalidadesline" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE INSCRIPCIONES POR MODALIDAD GRAFICO ROSQUILLA
                </div>
                <div class="card-body">
                    <canvas id="chartmodalidadesdoughnut" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{asset('vendor/chart/Chart.js')}}"></script>
    <script>
        $(document).ready(function() {
            const ctx = document.getElementById('chartmodalidadespie')
            const ctxbar = document.getElementById('chartmodalidadesbar')
            const ctxline = document.getElementById('chartmodalidadesline')
            const ctxdoughnut = document.getElementById('chartmodalidadesdoughnut')
            const colores =['rgb(38, 186, 165,1)',
                            'rgb(55, 95, 122,1)',
                            'rgb(0, 191, 255,0.8)',// CELESTE
                            'rgb(0, 139, 139,0.8)', // TURQUESA MAS CLARO
                            'rgb(255, 20, 147,0.8)',// ROSADO
                            'rgb(0, 128, 0,0.8)',//VERDE OSCURO HOJA
                            'rgb(50, 205, 50,0.8)',// VERDE LECHUGA
                            'rgb(255, 0, 255,0.8)', //FUCCIA CÑARP
                            'rgb(255, 69, 0,0.8)',// NARANJA
                            'rgb(148, 0, 211,0.8)', // LILA
                            'rgb(255, 140, 0,0.8)', // NARANJA CLARO
                            'rgb(199, 21, 133,0.8)',// ROSADO OSCURO
                            'rgb(255, 0, 0,0.8)',// ROJO
                            'rgb(0, 0, 255,0.8)', //ASUL OSCURO
                        ];
         const cData=JSON.parse('<?php echo $data ?>');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: cData.label,
                    datasets: [{
                        label: '# of Votes',
                        data: cData.data,
                        backgroundColor:colores,
                        borderColor: colores,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                onAnimationComplete: function () {
                    ctx.font = this.scale.font;
                    ctx.fillStyle = this.scale.textColor
                    ctx.textAlign = "center";
                    ctx.textBaseline = "bottom";

                    this.datasets.forEach(function (dataset) {
                        dataset.points.forEach(function (points) {
                            ctx.fillText(points.value, points.x, points.y - 10);
                        });
                })
            }
            });
            const myChartBar = new Chart(ctxbar, {
                type: 'bar',
                data: {
                    labels: cData.label,
                    datasets: [{
                        label: 'Cantidad de Inscripciones',
                        data: cData.data,
                        backgroundColor: colores,
                        borderColor:colores,
                        borderWidth:2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                suggestedMin: 0,
                            }
                        }]
                    }
                }
            });
            const myChartLine = new Chart(ctxline, {
                type: 'line',
                data: {
                    labels: cData.label,
                    datasets: [{
                        label: 'Cantidad de Inscripciones',
                        data: cData.data,
                        backgroundColor: colores,
                        borderColor:colores,
                        borderWidth:2,
                        fill: false,
                        tension: 0.5,
                    }],
                    
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                suggestedMin: 0,
                            }
                        }]
                    }

                }
            });
            const myChartdoughnut = new Chart(ctxdoughnut, {
                type: 'doughnut',
                data: {
                    labels: cData.label,
                    datasets: [{
                        label: 'Cantidad de Inscripciones',
                        data: cData.data,
                        backgroundColor: colores,
                        borderColor:colores,
                        borderWidth:2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                suggestedMin: 0,
                            }
                        }]
                    }
                }
            });
                tabla=$('#pormodalidades').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":"{{url('chart/inscripciones/for/modalidades')}}",
                        },
                        
                        "columns": [
                            {data:'modalidad'},
                            {data:'cantidad'},
                        ],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                        "order": [[1, 'desc']],
                    }
                );    

        });
        


    </script>
@endsection


{{-- 
  let tablacargos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                $('table').on('click','.eliminargenerico',function (e) {
                    e.preventDefault(); 
                    registro_id=$(this).closest('tr').attr('id');
                    eliminarRegistro(registro_id,'cargo',tablacargos);
                }); --}}