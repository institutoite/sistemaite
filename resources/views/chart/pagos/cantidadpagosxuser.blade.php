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
                CANTIDAD DE PAGOS POR USUARI
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
                    CANTIDAD DE PAGOS POR USUARIO
                </div>
                <div class="card-body">
                    <canvas id="chartpie" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE PAGOS POR USUARIO
                </div>
                <div class="card-body">
                    <canvas id="chartbar" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    CANTIDAD DE PAGOS POR USUARIO
                </div>
                <div class="card-body">
                    <canvas id="chartline" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    DINERO DE INSCRIPCIONES POR MODALIDAD GRAFICO ROSQUILLA
                </div>
                <div class="card-body">
                    <canvas id="chartdoughnut" width="200" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{asset('vendor/chart/Chart.js')}}"></script>
    <script src="{{asset('assets/js/graficos.js')}}"></script>
    <script>
        $(document).ready(function() {
                Graficar('chartpie','<?php echo $data ?>','pie','Cantidad Pagos');
                Graficar('chartbar','<?php echo $data ?>','bar','Cantidad Pagos');
                Graficar('chartline','<?php echo $data ?>','line','Cantidad Pagos');
                Graficar('chartdoughnut','<?php echo $data ?>','doughnut','Cantidad Pagos');
                tabla=$('#pormodalidades').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":"{{url('chart/cantidad/pagos/for/user')}}",
                        },
                        
                        "columns": [
                            {data:'name'},
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