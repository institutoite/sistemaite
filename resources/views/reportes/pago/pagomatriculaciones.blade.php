
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
    <div class="card card-primary">
        <div class="card-header bg-secondary">
            <span class="card-title">Pagos Inscripcines</span>
        </div>
        <div class="card-body">
            <table id="pagos" class="table table-bordered table-hover table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>ESTUDIANTE</th>
                        <th>FOTO</th>
                        <th>MODALIDAD</th>
                        <th>MONTO</th>
                        <th>FECHAHORA</th>
                        <th>USER</th>
                    </tr>
                </thead>
                <tfoot class="bg-primary">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id="total"></th>
                        <th></th>
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
    {{-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.12.1/api/sum().js"></script>
    <script>
        $(document).ready(function(){
            let sumaMontos=0;
            let tablaPagoInscripciones=$('#pagos').DataTable(
                {
                    "aLengthMenu": [
                        [50, 100, -1],
                        [50, 100, "Todo"]
                    ],
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "paging":true,
                    "ajax":{
                        "url":"../../pagoinscripciones",
                        "data":{
                            modelo:"Inscripcione",
                            fechaini:"2022-10-05",
                            fechafin:"2022-10-01",
                        },
                    },
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); // agrega dinamiacamente el id del row
                        $('td', row).eq(0).html(data['nombre']+" "+data['apellidop']);
                        $('td', row).eq(3).html("Bs. "+data['monto']);
                        $('td', row).eq(4).html(moment(data['created_at']).format('DD-MM-Y HH:mm'));
                    },
                    "columns": [
                        {data:'id',
                            visible:false,
                        },
                        {data:'nombre'},
                        {
                            "name": "ESTUDIANTE",
                            "data": "personafoto",
                            "render": function (data, type, full, meta) {
                                return "<div class='contenedor'><img class='materialboxed zoomify' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\" title='"+full.id+"'/><div class='codigo-encima'>"+full.id+"45</div></div>";
                            },
                            "title": "FOTO",
                            "orderable": false,
            
                        },
                        {data:'modalidad'},
                        {data:'monto'},
                        {data:'created_at'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<div class='contenedor'><img class='materialboxed zoomifyuser' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\" title='"+full.name+"'/><div class='texto-encima'>"+full.name+"</div></div>";
                            },
                            "title": "USER",
                            "orderable": false,
            
                        }, 
                    ],
                    
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },  
                        { responsivePriority: 3, targets:  4},  
                        { responsivePriority: 2, targets: -1 }
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "footerCallback": function( tfoot, data, start, end, display ) {
                        var api = this.api();
                        let total=0.0;
                        $(api.column(4).footer()).html(
                            api.column(4).data().reduce(function ( a, b ) {
                                total=parseFloat(a) + parseFloat(b);
                                return parseFloat(a) + parseFloat(b);
                            }, 0)
                        );
                        $("#total").html("Bs. "+(total).toFixed(2));
                    } 
                }
            );
            $('table').on('click','.zoomify',function (e){
                Swal.fire({
                    title: 'Codigo: '+ $(this).closest('tr').find('td').eq(0).text(),
                    text: $(this).closest('tr').find('td').eq(1).text(),
                    imageUrl: $(this).attr('src'),
                    imageWidth: 400,
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    type: 'success',
                    imageHeight:400,
                    imageAlt: 'Custom image',
                    confirmButtonText:"Aceptar",
                
                })
            });
            $('table').on('click','.zoomifyuser',function (e){
                Swal.fire({
                    title: 'Usuario: '+ $(this).attr('title'),
                    //text: $(this).closest('tr').find('td').eq(1).text(),
                    imageUrl: $(this).attr('src'),
                    imageWidth: 300,
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    type: 'success',
                    imageHeight:300,
                    imageAlt: 'Usuario',
                    confirmButtonText:"Cerrar",
                
                })
            });
        });
    </script>
@endsection
