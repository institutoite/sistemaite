@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Inscripcion Configurar')
@section('content')
    <section class="content container-fluid">
        <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped"> 
                <tr class="bg-primary">
                        <th>ATRIBUTO</th>
                        <th>VALOR</th>
                </tr>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{$inscripcione->id}}</td>
                    </tr>
                    <tr>
                        <td>FECHA INICIO</td>
                        <td>{{$inscripcione->fechaini}}</td>
                    </tr>
                    <tr>
                        <td>FECHA FIN</td>
                        <td>{{$inscripcione->fechafin}}</td>
                    </tr>
                    <tr>
                        <td>TOTAL HORAS</td>
                        <td>{{$inscripcione->totalhoras}}</td>
                    </tr>
                    <tr>
                        <td>VIGENTE</td>
                        <td>{{($inscripcione->vigente==0) ? 'No':'Si'}}</td>
                    </tr>
                    <tr>
                        <td>CONDONADO</td>
                        <td>{{($inscripcione->condonado==0) ? 'No':'Si'}}</td>
                    </tr>
                    <tr>
                        <td>OBJETIVO</td>
                        <td>{{$inscripcione->objetivo}}</td>
                    </tr>
                    <tr>
                        <td>ESTUDIANTE</td>
                        <td>{{$inscripcione->estudiante->persona->nombre.' '.$inscripcione->estudiante->persona->apellidop.' '.$inscripcione->estudiante->persona->apellidom}}</td>
                    </tr>
                    <tr>
                        <td>Modalidad</td>
                        <td>{{$inscripcione->modalidad->modalidad}}</td>
                    </tr>
                    
                    <tr>
                        <td>Creado</td>
                        <td>{{$inscripcione->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>{{$inscripcione->updated_at}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    </section>

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Programacion de clases</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imprimir.programa',$inscripcione) }}">Imprimir</a>
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
                                                        
                                                    }else{
                                                        $claseFila.="bg-danger";
                                                       
                                                    }
                                                }else{
                                                    if($programa->fecha->isoFormat('DD/MM/YYYY')==$hoy->isoFormat('DD/MM/YYYY')){
                                                        $claseHoy.="bg-primary";
                                                      
                                                    }else{
                                                        $claseFila.="";
                                                        
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
