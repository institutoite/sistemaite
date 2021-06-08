<div class="card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title">CLASES QUE FALTAN</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Docente</th>
                        <th>Materia</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $contador=1; 
                    @endphp
                                    
                    @foreach ($programaciones as $programacion)
                        @if ($programacion->fecha> Carbon\Carbon::now())
                            <tr>
                            <td>{{ $contador }}</td>
                            <td>{{ $programacion->fecha->isoFormat('D-MM-Y') }}</td>
                            <td>{{ $programacion->estado }}</td>
                            <td>{{ $programacion->hora_ini->isoFormat('HH:mm')}}</td>
                            <td>{{ $programacion->hora_fin->isoFormat('HH:mm') }}</td>
                            <td>{{ $programacion->nombre }}</td>
                            <td>{{ $programacion->materia }}</td>
                            <td>
                                <a class="text-danger" data-toggle="tooltip" data-placement="top" title="Licencia" href="{{ route('licencias.create',$programacion->id) }}" ><i class="fas fa-ambulance"></i> </a>
                                <a class="text-success ml-2" data-toggle="tooltip" data-placement="top" title="Adelantar Clase" href="{{route('marcado.presente.normal',$programacion->id)}}"><i class="far fa-arrow-alt-circle-right"></i></a>
                                <a class="text-primary ml-2" data-toggle="tooltip" data-placement="top" title="Editar este programa" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fas fa-edit"></i></a>
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