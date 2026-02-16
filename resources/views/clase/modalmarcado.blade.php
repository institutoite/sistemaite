<div class="modal-header">
    <h5 class="modal-title">Marcar asistencia</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="alert alert-info" role="alert">
        Inscripciones activas: <strong>{{ $inscripcionesActivas }}</strong> | Matriculaciones activas: <strong>{{ $matriculacionesActivas }}</strong>
    </div>
    <div class="alert alert-secondary" role="alert">
        Ultima programacion pagada: <strong>{{ $ultimaProgramacionPagada ? $ultimaProgramacionPagada->fecha->format('Y-m-d') : 'Sin registro' }}</strong>
        | Pagado: <strong>Bs {{ number_format($totalPagado, 2, ',', '.') }}</strong>
        | Saldo: <strong>Bs {{ number_format($saldo, 2, ',', '.') }}</strong>
    </div>
    @php
        $duracionMinutos = $programa->hora_ini->floatDiffInMinutes($programa->hora_fin);
    @endphp

    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">{!! "Horario: ".$programa->hora_ini->format('H:i')." ".$programa->hora_fin->format('H:i') !!}</h4>
        {!! $inscripcion->objetivo !!}
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input usar-horario-programado" type="checkbox" id="usarHorarioProgramado"
            data-hora-inicio="{{ $programa->hora_ini->format('H:i') }}"
            data-hora-fin="{{ $programa->hora_fin->format('H:i') }}"
            data-duracion-min="{{ $duracionMinutos }}">
        <label class="form-check-label" for="usarHorarioProgramado">
            Usar horario programado
        </label>
    </div>

    @if($clasePresente)
        <div class="alert alert-warning" role="alert">
            Ya existe una asistencia marcada para hoy.
        </div>
        <button type="button" class="btn btn-danger marcar-salida"
            data-clase-id="{{ $clasePresente->id }}"
            data-finalizar-url="{{ route('clases.finalizar') }}">
            Marcar salida
        </button>
        <hr>
    @endif

    <form class="marcado-form" method="POST" action="{{ route('clases.guardar',$programa->id) }}" role="form" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="row">
            @include('clase.form')
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary" @if($clasePresente) disabled @endif>
                Marcar entrada
            </button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </form>

    <div class="accordion mt-3" id="programacionesAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="programacionesHeading">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#programacionesCollapse" aria-expanded="false" aria-controls="programacionesCollapse">
                    Ver programacion
                </button>
            </h2>
            <div id="programacionesCollapse" class="accordion-collapse collapse" aria-labelledby="programacionesHeading" data-bs-parent="#programacionesAccordion">
                <div class="accordion-body">
                    <table class="table table-bordered table-striped table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Aula</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programaciones as $item)
                                <tr>
                                    <td>{{ $item->fecha->format('Y-m-d') }}</td>
                                    <td>{{ $item->hora_ini->format('H:i') }}-{{ $item->hora_fin->format('H:i') }}</td>
                                    <td>{{ $item->materia->materia ?? '' }}</td>
                                    <td>{{ $item->docente->nombrecorto ?? '' }}</td>
                                    <td>{{ $item->aula->aula ?? '' }}</td>
                                    <td>{{ $item->estado->estado ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
