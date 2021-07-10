@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@endsection

@section('title', 'Programacionx')

@section('plugins.Datatables',true)

@section('content')
    <section class="content container-fluid">
        <div class="row pt-4">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Programacion de clases</span>
                        </div>
                        <div class="float-right">
                            {{$persona->nombre.' '.$persona->apellidop}}

                            <a href="{{route('clases.marcado.general', $inscripcion)}}" class="btn btn-primary text-white tooltipsC mr-2" title="ir a opciones de la persona">
                                Marcar 
                            </a> 

                            <a class="btn btn-primary text-white" href="{{ route('imprimir.programa',$inscripcion) }}">Imprimir</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table id="programacion" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA</th>
                                    <th>DIA</th>
                                    <th>HORARIO</th>
                                    <th>HORAS</th>
                                    <th>DOC</th>
                                    <th>MATERIA</th>
                                    <th>AULA</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programacion as $programa)
                                        @php
                                            $hoy=Carbon\Carbon::now();
                                            $claseFila="";
                                            $claseBoton="";
                                            $claseHoy="";
                                            $claseBotonHoy="";
                                            
                                                if($programa->habilitado==0){
                                                    if($programa->fecha->isoFormat('DD/MM/YYYY')==$hoy->isoFormat('DD/MM/YYYY')){
                                                        $claseHoy.="bg-secondary";
                                                        $claseBotonHoy.="btn btn-secondary";
                                                    }else{
                                                        $claseFila.="bg-danger";
                                                        $claseBoton.="btn btn-danger";
                                                    }
                                                }else{
                                                    if($programa->fecha->isoFormat('DD/MM/YYYY')==$hoy->isoFormat('DD/MM/YYYY')){
                                                        $claseHoy.="bg-primary";
                                                        $claseBotonHoy.="btn btn-secondary";
                                                    }else{
                                                        $claseFila.="";
                                                        $claseBoton.="btn btn-primary text-white";
                                                    }
                                                }
                                        @endphp
                                    <tr class="{{$claseFila.' '.$claseHoy}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$programa->fecha->isoFormat('DD/MM/YYYY')}}</td>
                                        <td>{{$programa->fecha->isoFormat('dddd')}}</td>
                                        <td>{{$programa->hora_ini->isoFormat('HH:mm').'-'.$programa->hora_fin->isoFormat('HH:mm')}}</td>
                                        <td>{{$programa->horas_por_clase.' hras'}}</td>
                                        <td>{{$programa->nombre}}</td>
                                        <td>{{$programa->materia}}</td>
                                        <td>{{$programa->aula}}</td>
                                        <td>
                                            <a class="{{ $claseBoton.' '.$claseBotonHoy }} tooltipsC mr-2" href="{{route('set.fecha.proximo.pago', ['fecha'=>$programa->fecha->isoFormat('YYYY-MM-DD'),'id'=>$programa->inscripcione_id])}}" title="Asignar esta fecha para el proximo pago">
                                                Pagará
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#programacion').DataTable(
                {
                    "iDisplayLength" : 25,

                    "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json",
                    },
                    "drawCallback": function( settings ) {
                        $('ul.pagination').addClass("pagination-sm");
                    },
                }
            );
        } );
    </script>
@stop