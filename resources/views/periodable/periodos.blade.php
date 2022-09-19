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
            <div class="card-header bg-secondary">
                LISTA DE TODOS LOS PERIODOS DE ADMINISTRATIVOS
                <div class="float-right">
                        {{-- <a href="{{ route('pagos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('Crear periodo nuevo') }}
                        </a> --}}
                        Crear nuevo periodo
                    <a href="{{route("periodable.create",["periodable_id"=>$periodable_id,"periodable_type"=>$periodable_type])}}" class="text-white btn-accion-tabla tooltipsC btn-sm mr-2" title="Agregar Periodo a este Administrativo">
                        <i class="far fa-calendar-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        <div class="card-body">
            <table id="periodoadministrativos" class="table table-hover table-striped table-bordered">
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
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script>
        $(document).ready(function() {
            let tablaperiodos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablaperiodos=$('#periodoadministrativos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'../../../listar/misperiodos/'+"{{$periodable_id}}/"+"{{$periodable_type}}",
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
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                        },
                        "paging":   true,
                    }
                );
                
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                // $('table').on('click','.eliminargenerico',function (e) {
                //     e.preventDefault(); 
                //     registro_id=$(this).closest('tr').attr('id');
                //     eliminarRegistro(registro_id,'periodable',tablaperiodableadministrativos);
                // });
        } );
        
    </script>
@endsection
