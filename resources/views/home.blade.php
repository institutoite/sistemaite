{{-- @extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content_header')
    <h1 class="text-center text-primary">Estudiantes</h1>
@stop

@section('content')
    <div class="card-header bg-primary">
                Lista de Estudiantes <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('personas.create')}}">Crear Estudiante</a>
            </div>

    <table id="estudiantes" class="table table-bordered table-hover table-striped">
        <thead class="bg-primary text-center">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>FOTO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
    </table>
@stop

@section('js')
    
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    
    <!-- JavaScript Bundle with Popper -->
    

    <script>
        $(document).ready(function() {
        
        var tabla=$('#estudiantes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/estudiantes') }}",
                    "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "FOTO",
                            "orderable": false,
            
                        },     
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },  
                }
            );
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  P E R S O N A %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            
        } );
        
    </script>
@stop --}}