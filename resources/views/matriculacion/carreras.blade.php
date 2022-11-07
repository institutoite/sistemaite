@extends('adminlte::page')
@section('css')
     <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@endsection

@section('title', 'Carreras')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')

    
    <div class="card">
        <div class="card-header">
            {{ Breadcrumbs::render('miscarreras.listar', $computacion,$computacion->persona) }}
        </div>
        <div class="card-body">
            <table id="carreras" class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>carrera</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carreras as $carrera)
                        <tr>
                            <td>{{$carrera->id}}</td>
                            <td>{{$carrera->carrera}}</td>
                            <td>
                                <a href="{{route('matriculacion.create',['computacion'=>$computacion,'carrera'=>$carrera])}}" class="btn btn-primary btn-lg btn-accion-tabla tooltipsC btn-sm mr-2 text-white" title="Editar esta carrera">
                                    Matricular<i class="fa fa-fw fa-edit text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 

    <script>
        $(document).ready(function() {

            var tabla=$('#carreras').DataTable();
                // {
                //     "serverSide": true,
                //     "responsive":true,
                //     "autoWidth":false,

                //     "ajax": {
                //                 url: '../carrerasajax/'+"{{$computacion->id}}",
                //             },
                //     "columns": [
                //         {"data": 'id',name:"id"},
                //         {"data": "carrera",name:"carrera"},     
                //         {
                //             "name":"btn",
                //             "data": 'btn',
                //             "orderable": false,
                //         },
                //     ],
                //     "language":{
                //         "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                //     },  
                // }
                  
        } );
        
    </script>
@endsection
