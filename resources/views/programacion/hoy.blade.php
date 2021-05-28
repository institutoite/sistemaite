<div class="card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title">CLASE CORRESPONDIENTE AL DIA DE HOY</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    
    @if ($programacionesHoy->count()>0)
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        
                        @foreach ($programacionesHoy as $programacion)
                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $programacion->fecha->isoFormat('D-MM-Y') }}</td>
                                <td>{{ $programacion->estado }}</td>
                                <td>{{ $programacion->hora_ini->isoFormat('HH:mm')}}</td>
                                <td>{{ $programacion->hora_fin->isoFormat('HH:mm') }}</td>
                                <td>{{ $programacion->nombre }}</td>
                                <td>{{ $programacion->materia }}</td>
                                <td>
                                    <a class="text-secondary" href="{{ route('programacions.show',$programacion->id) }}"><i class="fas fa-tasks"></i> </a>
                                    <a class="text-danger" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fas fa-file-powerpoint"></i> </a>
                                    <a class="text-warning" href="{{ route('programacions.show',$programacion->id) }}"><i class="fas fa-fingerprint"></i></a>
                                    <a class="text-success" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else 
        <div class="text-center">
            <h1 class="text-danger"> HOY NO TIENE CLASES</h1>
        </div>
    @endif
</div>

