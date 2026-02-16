<div class="modal-header">
    <h5 class="modal-title">Marcar asistencia</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    @if(empty($inscripcionTabs) && empty($matriculacionTabs))
        <div class="alert alert-warning" role="alert">
            No hay inscripciones o matriculaciones activas.
        </div>
    @else
        <ul class="nav nav-tabs" id="marcadoTabs" role="tablist">
            @php
                $tabIndex = 0;
            @endphp
            @foreach ($inscripcionTabs as $tab)
                @php
                    $tabId = 'ins-' . $tab['inscripcion']->id;
                    $activeClass = $tabIndex === 0 ? 'active' : '';
                    $activePane = $tabIndex === 0 ? 'show active' : '';
                @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeClass }}" id="{{ $tabId }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tabId }}" type="button" role="tab">
                        Ins {{ $tab['inscripcion']->id }}
                    </button>
                </li>
                @php
                    $tabIndex++;
                @endphp
            @endforeach
            @foreach ($matriculacionTabs as $tab)
                @php
                    $tabId = 'mat-' . $tab['matriculacion']->id;
                    $activeClass = $tabIndex === 0 ? 'active' : '';
                    $activePane = $tabIndex === 0 ? 'show active' : '';
                @endphp
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $activeClass }}" id="{{ $tabId }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $tabId }}" type="button" role="tab">
                        Mat {{ $tab['matriculacion']->id }}
                    </button>
                </li>
                @php
                    $tabIndex++;
                @endphp
            @endforeach
        </ul>

        <div class="tab-content pt-3" id="marcadoTabsContent">
            @php
                $tabIndex = 0;
            @endphp
            @foreach ($inscripcionTabs as $tab)
                @php
                    $tabId = 'ins-' . $tab['inscripcion']->id;
                    $activePane = $tabIndex === 0 ? 'show active' : '';
                    $programa = $tab['programa'];
                @endphp
                <div class="tab-pane fade {{ $activePane }}" id="{{ $tabId }}" role="tabpanel" aria-labelledby="{{ $tabId }}-tab">
                    @if(!$programa)
                        <div class="alert alert-warning" role="alert">
                            Sin programacion para hoy.
                        </div>
                    @else
                        @php
                            $duracionMinutos = $programa->hora_ini->floatDiffInMinutes($programa->hora_fin);
                            $idSuffix = $tabId;
                        @endphp
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">{!! "Horario: ".$programa->hora_ini->format('H:i')." ".$programa->hora_fin->format('H:i') !!}</h4>
                            {!! $tab['inscripcion']->objetivo !!}
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            Ultima programacion pagada: <strong>{{ $tab['ultimaProgramacionPagada'] ? $tab['ultimaProgramacionPagada']->fecha->format('Y-m-d') : 'Sin registro' }}</strong>
                            | Pagado: <strong>Bs {{ number_format($tab['totalPagado'], 2, ',', '.') }}</strong>
                            | Saldo: <strong>Bs {{ number_format($tab['saldo'], 2, ',', '.') }}</strong>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input usar-horario-programado" type="checkbox"
                                data-hora-inicio="{{ $programa->hora_ini->format('H:i') }}"
                                data-hora-fin="{{ $programa->hora_fin->format('H:i') }}"
                                data-duracion-min="{{ $duracionMinutos }}">
                            <label class="form-check-label">Usar horario programado</label>
                        </div>

                        @if($tab['clasePresente'])
                            <div class="alert alert-warning" role="alert">
                                Ya existe una asistencia marcada para hoy.
                            </div>
                            <button type="button" class="btn btn-danger marcar-salida"
                                data-clase-id="{{ $tab['clasePresente']->id }}"
                                data-finalizar-url="{{ route('clases.finalizar') }}">
                                Marcar salida
                            </button>
                            <hr>
                        @endif

                        <form class="marcado-form" method="POST" action="{{ route('clases.guardar', $programa->id) }}" role="form" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                @include('clase.form', [
                                    'programa' => $programa,
                                    'docentes' => $tab['docentes'],
                                    'materias' => $tab['materias'],
                                    'aulas' => $tab['aulas'],
                                    'hora_inicio' => $tab['hora_inicio'],
                                    'hora_fin' => $tab['hora_fin'],
                                    'idSuffix' => $idSuffix,
                                ])
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary" @if($tab['clasePresente']) disabled @endif>
                                    Marcar entrada
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>

                        <div class="accordion mt-3" id="programacionesAccordion-{{ $tabId }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="programacionesHeading-{{ $tabId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#programacionesCollapse-{{ $tabId }}" aria-expanded="false" aria-controls="programacionesCollapse-{{ $tabId }}">
                                        Ver programacion
                                    </button>
                                </h2>
                                <div id="programacionesCollapse-{{ $tabId }}" class="accordion-collapse collapse" aria-labelledby="programacionesHeading-{{ $tabId }}" data-bs-parent="#programacionesAccordion-{{ $tabId }}">
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
                                                @foreach ($tab['programaciones'] as $item)
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
                    @endif
                </div>
                @php
                    $tabIndex++;
                @endphp
            @endforeach

            @foreach ($matriculacionTabs as $tab)
                @php
                    $tabId = 'mat-' . $tab['matriculacion']->id;
                    $activePane = $tabIndex === 0 ? 'show active' : '';
                    $programacioncom = $tab['programacioncom'];
                @endphp
                <div class="tab-pane fade {{ $activePane }}" id="{{ $tabId }}" role="tabpanel" aria-labelledby="{{ $tabId }}-tab">
                    @if(!$programacioncom)
                        <div class="alert alert-warning" role="alert">
                            Sin programacion para hoy.
                        </div>
                    @else
                        @php
                            $duracionMinutos = $programacioncom->horaini->floatDiffInMinutes($programacioncom->horafin);
                            $idSuffix = $tabId;
                        @endphp
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">{!! "Horario: ".$programacioncom->horaini->format('H:i')." ".$programacioncom->horafin->format('H:i') !!}</h4>
                            {!! $tab['matriculacion']->objetivo !!}
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            Ultima programacion pagada: <strong>{{ $tab['ultimaProgramacionPagada'] ? $tab['ultimaProgramacionPagada']->fecha->format('Y-m-d') : 'Sin registro' }}</strong>
                            | Pagado: <strong>Bs {{ number_format($tab['totalPagado'], 2, ',', '.') }}</strong>
                            | Saldo: <strong>Bs {{ number_format($tab['saldo'], 2, ',', '.') }}</strong>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input usar-horario-programado" type="checkbox"
                                data-hora-inicio="{{ $programacioncom->horaini->format('H:i') }}"
                                data-hora-fin="{{ $programacioncom->horafin->format('H:i') }}"
                                data-duracion-min="{{ $duracionMinutos }}">
                            <label class="form-check-label">Usar horario programado</label>
                        </div>

                        @if($tab['clasecomPresente'])
                            <div class="alert alert-warning" role="alert">
                                Ya existe una asistencia marcada para hoy.
                            </div>
                            <button type="button" class="btn btn-danger marcar-salida"
                                data-clase-id="{{ $tab['clasecomPresente']->id }}"
                                data-finalizar-url="{{ route('clasecom.finalizar') }}">
                                Marcar salida
                            </button>
                            <hr>
                        @endif

                        <form class="marcado-form" method="POST" action="{{ route('clasescom.guardar', $programacioncom->id) }}" role="form" enctype="multipart/form-data" novalidate>
                            @csrf
                            @include('clasecom.form', [
                                'programacioncom' => $programacioncom,
                                'docentes' => $tab['docentes'],
                                'aulas' => $tab['aulas'],
                                'hora_inicio' => $tab['hora_inicio'],
                                'hora_fin' => $tab['hora_fin'],
                                'idSuffix' => $idSuffix,
                            ])
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary" @if($tab['clasecomPresente']) disabled @endif>
                                    Marcar entrada
                                </button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </form>

                        <div class="accordion mt-3" id="programacionesAccordion-{{ $tabId }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="programacionesHeading-{{ $tabId }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#programacionesCollapse-{{ $tabId }}" aria-expanded="false" aria-controls="programacionesCollapse-{{ $tabId }}">
                                        Ver programacion
                                    </button>
                                </h2>
                                <div id="programacionesCollapse-{{ $tabId }}" class="accordion-collapse collapse" aria-labelledby="programacionesHeading-{{ $tabId }}" data-bs-parent="#programacionesAccordion-{{ $tabId }}">
                                    <div class="accordion-body">
                                        <table class="table table-bordered table-striped table-hover table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th>Fecha</th>
                                                    <th>Horario</th>
                                                    <th>Docente</th>
                                                    <th>Aula</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tab['programaciones'] as $item)
                                                    <tr>
                                                        <td>{{ $item->fecha->format('Y-m-d') }}</td>
                                                        <td>{{ $item->horaini->format('H:i') }}-{{ $item->horafin->format('H:i') }}</td>
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
                    @endif
                </div>
                @php
                    $tabIndex++;
                @endphp
            @endforeach
        </div>
    @endif
</div>
