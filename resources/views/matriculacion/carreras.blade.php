carreras que estudia un computacion si lleva mas de una si lleva solo uno directo a matricular que
carreras/{computacion}

@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@endsection

@section('title', 'Mis Carreras')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')

    <div class="card">
        
        <div class="card-header">
            {{-- Carreras que estudia {{ $computacion }} --}}
        </div>
        <div class="card-body">
            <table id="carreras" class="table table-bordered table-striped table-responsive">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>carrera</th>
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

    <script>
        $(document).ready(function() {

            var tabla=$('#carreras').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": {
                                url: '../carrerasajax/'+"{{$computacion->id}}",
                            },
                    "columns": [
                        {"data": 'id',name:"id"},
                        {"data": "carrera",name:"carrera"},     
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
        } );
        
    </script>
@endsection
