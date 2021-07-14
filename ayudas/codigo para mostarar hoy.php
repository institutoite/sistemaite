 {{-- @foreach ($programacionesHoy as $programacion)
    @if ($programacion->estado=='PRESENTE')
        @php
            $clase="text-success";
        @endphp 
    @else
        @php
            $clase="text-dark";
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
@endforeach --}}