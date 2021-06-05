@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Estudiantes Presentes')

@section('content_header')
    
@stop

@section('content')

    <a href="" class="btn btn-outline-secondary float-right"><i class="fas fa-print"></i></a>
    <a class="btn btn-outline-success float-right mb-3 mr-3" href="" target="_blank"></i><i class="fas fa-th-list"></i></i></a>
    
    <table id="presentes" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-primary">
            <th>#</th>
            <th>ESTUDIANTE</th>
            <th>INICIO</th>
            <th>FIN</th>
            <th>TIEMPO</th>
            <th>MATERIA</th>
            <th>AULA</th>
            <th>TEMA</th>
            <th width="120px">Opciones</th>
            
        </thead>
        <tbody>
            {{-- {{dd($clases[0])}} --}}
            @foreach ($clases as $clase)
                <tr>
                    <td><small>{{ $clase->id }}</small></td>
                    <td><small>{{ $clase->docente->nombre}}</small></td>
                    <td><small>{{ $clase->horainicio->isoFormat('HH:mm').'-'.$clase->horafin->isoFormat('HH:mm') }}</small></td>
                    <td><small>{{ $clase->horainicio->diffForHumans()}}</small></td>
                    <td><small>{{ $clase->materia->materia }}</small></td>
                    <td><small>{{ $clase->aula->aula }}</small></td>
                    <td><small>{{ $clase->tema->tema }}</small></td>
                    <td><small>Opciones<small></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#presentes').dataTable({
                "ordering":false,
                "responsive":true,
                "paging":   false,
                 "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },  
            });
        } );
    </script>
@stop