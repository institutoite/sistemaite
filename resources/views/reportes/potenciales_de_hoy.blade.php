@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@stop

@section('title', 'Potenciales de hoy')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Potenciales Filtrar por Intereses') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('interest.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Crear Intereses') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="interests" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
										<th>NOMBRE</th>
                                        <th>PERSONAL</th>
                                        <th>REQUERIMIENTO</th>
                                        <th>INTERES</th>
                                        <th>FECHA</th>
                                        <th>USUARIO</th>
                                    </tr>
                                </thead>
                            {{-- se carga con ajax --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>

    <script src="https://kit.fontawesome.com/067a2afa7e.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            
             var tabla=$('#interests').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "dom":'<"toolbar">Bftrip',
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']);
                    $('td', row).eq(2).html("<a target='_blank' href='https://wa.me/591"+ data['telefono'] +"'>"+ data['telefono']+"</a>"+"<a href='../telefono/vista/"+ data['id'] +"'> <i class='fa-solid fa-people-roof'></i> </a>");                    
                    $('td', row).eq(5).html(moment(data['created_at']).format('MM/DD/YYYY HH:mm'));
                },
                "ajax":{
                        'url':"../reporte/potenciales/hoy",
                    },
                "columns": [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'telefono'},
                    {data: 'observacion'},
                    {data: 'interest'},
                    {data: 'created_at'},
                    {data: 'name'},
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
            });
           
        });
    </script>

@endsection
