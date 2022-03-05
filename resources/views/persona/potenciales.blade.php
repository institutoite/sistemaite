@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-primary">
                {{-- Lista de Estudiantes <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('personas.create')}}">Crear Estudiante</a> --}}
            </div>
            
            <div class="card-body">
                
                <table id="potenciales" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOP</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script>
        $(document).ready(function() {
            var tabla=$('#potenciales').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,

                        "ajax": "{{ url('potenciales') }}",
                        "columns": [
                            {data: 'id'},
                            {data: 'nombre'},
                            {data: 'apellidop'},
                            
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],

                        "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                        },  
                    }
            );
            $('table').on('click','.ver',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().find('td').first().html();
                console.log($(this).parent().parent());
                        // $.ajax({
                        //     url: 'eliminar/persona/'+id,
                        //     type: 'DELETE',
                        //     data:{
                        //         id:id,
        
                        //     },
                        //     success: function(result) {
                        //         tabla.ajax.reload();
                        //     },
                        // });
                })
            });
            
        
    </script>
@stop