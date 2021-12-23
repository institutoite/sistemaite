<div class="card collapsed-card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title text-secondary">CLASES VENCIDAS O PASADAS</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
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
                    @foreach ($programaciones as $programacion)
                        @if ($programacion->fecha< Carbon\Carbon::now())
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $programacion->fecha->isoFormat('D-MM-Y') }}</td>
                            <td>{{ $programacion->estado }}</td>
                            <td>{{ $programacion->hora_ini->isoFormat('HH:mm')}}</td>
                            <td>{{ $programacion->hora_fin->isoFormat('HH:mm') }}</td>
                            <td>{{ $programacion->nombre }}</td>
                            <td>
                                <a class="text-secondary" href="{{ route('programacions.show',$programacion->id) }}"><i class="fas fa-tasks"></i> </a>
                                <a class="text-danger" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fas fa-file-powerpoint"></i> </a>
                                <a class="text-warning" href="{{ route('programacions.show',$programacion->id) }}"><i class="fas fa-fingerprint"></i></a>
                                <a class="text-success" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                            </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>