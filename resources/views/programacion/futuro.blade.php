<div class="card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title">CLASES QUE FALTAN</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="futuro" class="table table-hover table-striped">
                <thead class="thead bg-secondary">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Horario</th>
                        <th>Docente</th>
                        <th>Materia</th>
                        <th>Aula</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $contador=1; 
                    @endphp
                                    
                    @foreach ($programaciones as $programacion)
                        @if ($programacion->fecha> Carbon\Carbon::now())
                            <tr id="{{$programacion->id}}">
                            <td>{{ $contador }}</td>
                            <td>{{ $programacion->fecha->isoFormat('D-MM-Y') }}</td>
                            <td>{{ $programacion->fecha->isoFormat('dddd') }}</td>
                            
                            <td>{{ $programacion->hora_ini->isoFormat('HH:mm').'-'.$programacion->hora_fin->isoFormat('HH:mm')}}</td>
                            <td>{{ $programacion->docente->persona->nombre }}</td>
                            <td>{{ $programacion->materia->materia }}</td>
                            <td>{{ $programacion->aula->aula }}</td>
                            <td>
                                <a href="{{ route('licencias.create',$programacion->id) }}" class="text-danger" data-toggle="tooltip" data-placement="top" title="Licencia"><i class="fas fa-ambulance"></i> </a>
                                <a href="{{route('marcado.presente.normal',$programacion->id)}}" class="text-success ml-2" data-toggle="tooltip" data-placement="top" title="Adelantar Clase"><i class="far fa-arrow-alt-circle-right"></i></a>
                                {{-- esto esta funcionando pero sin modal <a href="{{ route('programacions.edit',$programacion->id) }}" class="text-primary ml-2" data-toggle="tooltip" data-placement="top" title="Editar este programa"><i class="fas fa-edit"></i></a> --}}
                                <a href="" class="text-primary ml-2 editar" data-toggle="tooltip" data-placement="top" title="Editar este programa"><i class="fas fa-edit"></i></a>
                                <a href="" id="promostrar{{$programacion->id}}" class="text-secondary ml-2 mostrar" data-toggle="tooltip" data-placement="top" title="Ver este programa"><i class="fas fa-eye"></i></a>
                            </td>
                            </tr>
                            @php
                                $contador=$contador+1
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>