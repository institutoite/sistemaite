@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Programacion')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Programacion de clases</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('programacions.index') }}">Saltar este paso</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA</th>
                                    <th>DIA</th>
                                    <th>INICIO</th>
                                    <th>FIN</th>
                                    <th>DOCENTE</th>
                                    <th>MATERIA</th>
                                    <th>AULA</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programacion as $programa)
                                        @php
                                            $hoy=Carbon\Carbon::now();
                                            $clase="";
                                            if($programa->fecha->isoFormat('DD/MM/YYYY')==$hoy->isoFormat('DD/MM/YYYY')){
                                                $clase .= 'bg-primary'; 
                                            }else{
                                                if($programa->habilitado==0){
                                                    $clase .= 'bg-danger'; 
                                                }
                                            }
                                        @endphp
                                    <tr class="{{$clase}}">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$programa->fecha->isoFormat('DD/MM/YYYY')}}</td>
                                        <td>{{$programa->fecha->isoFormat('dddd')}}</td>
                                        <td>{{$programa->hora_ini->isoFormat('HH:mm')}}</td>
                                        <td>{{$programa->hora_fin->isoFormat('HH:mm')}}</td>
                                        <td>{{$programa->nombre}}</td>
                                        <td>{{$programa->materia}}</td>
                                        <td>{{$programa->aula}}</td>
                                        <td>
                                            <a href="{{route('set.fecha.proximo.pago', ['fecha'=>$programa->fecha->isoFormat('YYYY-MM-DD'),'id'=>$programa->inscripcion_id])}}" class="btn btn-outline-primary tooltipsC mr-2" title="Asignar esta fecha para el proximo pago">
                                                Próximo Pago{{ $programa->inscripcion_id }}
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
        </div>
    </section>
@endsection
