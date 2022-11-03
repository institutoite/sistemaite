@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Periodos')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)


@section('content')
    <div class="card">
            <div class="card-header bg-primary">
                <div class="float-right">
                    LISTA DE TODOS LOS PERIODOS DE ADMINISTRATIVOS
                </div>
            </div>
        <div class="card-body">
            <table id="periodablesadministrativos" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidop</th>
                        <th>fechaIni</th>
                        <th>fechaFin</th>
                        <th>$</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="card">
            <div class="card-header bg-primary">
                <div class="float-right">
                    LISTA DE TODOS LOS PERIODOS DE DOCENTES
                </div>
            </div>
        <div class="card-body">
            <table id="periodablesdocentes" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidop</th>
                        <th>fechaIni</th>
                        <th>fechaFin</th>
                        <th>$</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
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
    <script>
        $(document).ready(function() {
            let tablaperiodabledocentes;
            let tablaperiodableadministrativos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablaperiodableadministrativos=$('#periodablesadministrativos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'listar/periodablesadministrativos',
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['periodable_id']); 
                            $('td',row).eq(3).html(moment(data['fechaini']).format('DD-MM-YYYY'));
                            $('td',row).eq(4).html(moment(data['fechafin']).format('DD-MM-YYYY'));
                            if(data['pagado']==1)
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-up text-success fa-2x'></i>");
                            else
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-down text-danger fa-2x'></i>");
                        },
                        "columns": [
                            {data:'periodable_id'},
                            {data:'nombre'},
                            {data:'apellidop'},
                            {data:'fechaini'},
                            {data:'fechafin'},
                            {data:'pagado'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        order: [[0, 'desc']],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
                tablaperiodabledocentes=$('#periodablesdocentes').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'listar/periodablesdocentes',
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['periodable_id']); 
                            $('td',row).eq(3).html(moment(data['fechaini']).format('DD-MM-YYYY'));
                            $('td',row).eq(4).html(moment(data['fechafin']).format('DD-MM-YYYY'));
                            if(data['pagado']==1)
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-up text-success fa-2x'></i>");
                            else
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-down text-danger fa-2x'></i>");
                        },
                        "columns": [
                            {data:'periodable_id'},
                            {data:'nombre'},
                            {data:'apellidop'},
                            {data:'fechaini'},
                            {data:'fechafin'},
                            {data:'pagado'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        //order: [[0, 'desc']],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                $('table').on('click','.eliminargenerico',function (e) {
                    e.preventDefault(); 
                    registro_id=$(this).closest('tr').attr('id');
                    eliminarRegistro(registro_id,'periodable',tablaperiodableadministrativos);
                });

                $('table').on('click','.eliminargenerico',function (e) {
                    e.preventDefault(); 
                    registro_id=$(this).closest('tr').attr('id');
                    eliminarRegistro(registro_id,'periodable',tablaperiodabledocentes);
                });
                
        } );
        
    </script>
@endsection
