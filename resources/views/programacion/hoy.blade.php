<div class="card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title">CLASE CORRESPONDIENTE AL DIA DE HOY</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    
    @if ($programacionesHoy->count()>0)
        <div class="card-body">
            
                <table id="tabla_hoy" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>DOCENTE</th>
                            <th>MATERIA</th>
                            <th>ESTADO</th>
                            <th>ITE</th>

                            <th>OPCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach ($programacionesHoy as $programacion)
                            @if ($programacion->estado=='PRESENTE')
                                @php
                                    $clase="text-success";
                                @endphp 
                            @else
                                @php
                                    $clase="text-warning";
                                @endphp
                            @endif    

                            <tr class="{{$clase}}" >
                                
                                <td>{{ $programacion->fecha->isoFormat('D-MM-Y') }}</td>
                                <td>{{ $programacion->hora_ini->isoFormat('HH:mm').'-'.$programacion->hora_fin->isoFormat('HH:mm')}}</td>
                                <td>{{ $programacion->nombre }}</td>
                                <td>{{ $programacion->materia }}</td>
                                <td><strong>{{ $programacion->estado }}</strong></td>
                                <td>
                                    @if ($programacion->estado=='PRESENTE')
                                        <i class="fas fa-toggle-on fa-3x"></i>    
                                    @else
                                        <i class="fas fa-toggle-off fa-3x"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($programacion->estado!='FINALIZADO')
                                        <a id="marcar" href="{{route('marcado.presente.rapido',$programacion->id)}}" class="btn btn-primary text-white" ><i class="fas fa-bolt"></i> </a>   
                                        <a id="marcar" href="{{route('marcado.presente.normal',$programacion->id)}}" class="btn btn-secondary text-white marcar_hoy"><i class="fas fa-user-edit"></i></a>   
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    @else 
        <div class="text-center">
            <h1 class="text-danger"> HOY NO TIENE CLASES</h1>
        </div>
    @endif
</div>

