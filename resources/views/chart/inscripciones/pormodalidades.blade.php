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
            <div class="card-header">
                
            </div>
        <div class="card-body">
            <table id="pormodalidades" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>MODALIDAD</th>
                        <th>CANTIDAD</th>
                        <th>INGRESOS</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    {{$labels}}
    {{$data}}
    
    <div class="card">
        <div class="card-header">
            Grafico
        </div>
        <div class="card-body">
            <canvas id="chartmodalidades" width="400" height="400"></canvas>
        </div>
    </div>
@endsection

@section('js')

    {{-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>  --}}
    {{-- <script src="{{asset('assets/js/mensajeAjax.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/js/eliminargenerico.js')}}"></script> --}}
    {{-- <script src="https://cdnjs.com/libraries/Chart.js"></script> --}}
    <script src="{{asset('vendor/chart/chart.js')}}"></script>
    {{-- <script src="https://www.jsdelivr.com/package/npm/chart.js?path=dist"></script> --}}
    <script>
        $(document).ready(function() {
            const ctx = document.getElementById('chartmodalidades')

            

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {{$labels}},
                    datasets: [{
                        label: '# of Votes',
                        data: "{{$data}}",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            
        });
        
    </script>
@endsection


{{-- 
  let tablacargos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablacargos=$('#pormodalidades').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'listar/inscripciones/pormodalidades',
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                            //$('td',row).eq(3).html(moment(data['fechaini']).format('DD-MM-YYYY'));
                        },
                        "columns": [
                            {data:'id'},
                            {data:'cargo'},
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
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                $('table').on('click','.eliminargenerico',function (e) {
                    e.preventDefault(); 
                    registro_id=$(this).closest('tr').attr('id');
                    eliminarRegistro(registro_id,'cargo',tablacargos);
                }); --}}