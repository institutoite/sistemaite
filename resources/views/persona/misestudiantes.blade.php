@extends('adminlte::page')

@section('title', 'Clases Actuales por Docente')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)

@section('css')
    <style>
        .schedule-item {
            border-radius: .75rem;
            border: 1px solid #d9dee5;
            overflow: hidden;
            margin-bottom: 1rem;
            transition: all .2s ease-in-out;
            box-shadow: 0 2px 8px rgba(16, 24, 40, .06);
        }
        .schedule-item .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            background: #f8fafc;
            cursor: pointer;
        }
        .schedule-item .student-photo {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid rgba(0,0,0,.08);
        }
        .schedule-item .compact-requirement {
            font-size: .9rem;
            line-height: 1.3;
            max-height: 2.6em;
            overflow: hidden;
        }
        .schedule-item .status-pill {
            font-size: .78rem;
            border-radius: 999px;
            padding: .25rem .6rem;
            font-weight: 700;
            letter-spacing: .01em;
        }
        .state-ok {
            background: #dcfce7;
            border-color: #bbf7d0;
        }
        .state-ok .status-pill {
            background: #15803d;
            color: #fff;
        }
        .state-warning {
            background: #fff7ed;
            border-color: #fed7aa;
        }
        .state-warning .status-pill {
            background: #c2410c;
            color: #fff;
        }
        .state-finished {
            background: #fee2e2;
            border-color: #fecaca;
        }
        .state-finished .status-pill {
            background: #dc2626;
            color: #fff;
        }
        .state-overdue {
            background: #7f1d1d;
            border-color: #7f1d1d;
            color: #fff;
            font-weight: 700;
        }
        .state-overdue a,
        .state-overdue .text-muted,
        .state-overdue .text-secondary {
            color: #fff !important;
        }
        .state-overdue .status-pill {
            background: #ffffff;
            color: #7f1d1d;
        }
        .metric-card {
            border-radius: .75rem;
            border: 1px solid #e5e7eb;
        }
    </style>
@stop

@section('content_header')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <div>
            <h1 class="mb-1">Clases actuales por docente</h1>
            <p class="text-muted mb-0">Vista operativa del {{ \Carbon\Carbon::parse($hoy)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</p>
        </div>
    </div>
@stop

@section('content')
    <div class="content pt-3">
        @if($esSupervisor)
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <strong>Supervisión por docente</strong>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('misestudiantes') }}" class="row align-items-end">
                        <div class="col-md-8 col-lg-6">
                            <label for="docente_id">Docente</label>
                            <select class="form-control" id="docente_id" name="docente_id" required>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}" {{ (int)$docenteSeleccionadoId === (int)$docente->id ? 'selected' : '' }}>
                                        {{ $docente->nombrecorto }} - {{ optional($docente->persona)->nombre }} {{ optional($docente->persona)->apellidop }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-3 mt-3 mt-md-0">
                            <button class="btn btn-primary btn-block" type="submit">
                                Ver horario actual
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-4 mb-2">
                <div class="card metric-card">
                    <div class="card-body">
                        <div class="text-muted">Total asignados hoy</div>
                        <h3 class="mb-0" id="metric-total">{{ $programacion->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card metric-card">
                    <div class="card-body">
                        <div class="text-muted">En horario ahora</div>
                        <h3 class="mb-0 text-success" id="metric-current">{{ $cantidadEnHorario }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card metric-card">
                    <div class="card-body">
                        <div class="text-muted">Excedidos</div>
                        <h3 class="mb-0 text-danger" id="metric-overdue">0</h3>
                    </div>
                </div>
            </div>
        </div>

        @if($programacion->isEmpty())
            <div class="alert alert-info">
                No hay estudiantes programados para este docente en la fecha actual.
            </div>
        @else
            <div id="accordion-programaciones">
                @foreach ($programacion as $index => $progra)
                    @php
                        $persona = optional(optional(optional($progra->inscripcione)->estudiante)->persona);
                        $horaInicio = \Carbon\Carbon::parse($progra->hora_ini)->format('H:i');
                        $horaFin = \Carbon\Carbon::parse($progra->hora_fin)->format('H:i');
                        $requerimiento = strip_tags(optional($progra->observaciones->first())->observacion ?? '');
                        $objetivoGeneral = strip_tags(optional($progra->inscripcione)->objetivo ?? '');
                        $claseActual = $progra->clases->firstWhere('estado_id', estado('PRESENTE'));
                        $foto = $persona && $persona->foto ? route('foto.show', ['filename' => $persona->foto]) : asset('dist/img/user2-160x160.jpg');
                    @endphp
                    <div class="card schedule-item"
                         id="programacion-{{ $progra->id }}"
                         data-hora-inicio="{{ $horaInicio }}"
                         data-hora-fin="{{ $horaFin }}">
                        <div class="card-header" id="heading-{{ $progra->id }}">
                            <button class="btn btn-link text-left text-dark w-100 p-0 d-flex align-items-center justify-content-between"
                                    data-toggle="collapse"
                                    data-target="#collapse-{{ $progra->id }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse-{{ $progra->id }}">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3">
                                        <img src="{{ $foto }}" alt="Foto de {{ $persona->nombre ?? 'estudiante' }}" class="student-photo">
                                    </div>
                                    <div>
                                        <div class="font-weight-bold">
                                            #{{ $index + 1 }} - {{ $persona->nombre ?? '-' }} {{ $persona->apellidop ?? '' }} {{ $persona->apellidom ?? '' }}
                                        </div>
                                        <div class="small">
                                            <span class="mr-2"><strong>Horario:</strong> {{ $horaInicio }} - {{ $horaFin }}</span>
                                            <span><strong>Materia:</strong> {{ optional($progra->materia)->materia ?? '-' }}</span>
                                        </div>
                                        <div class="compact-requirement mt-1">
                                            <strong>Requerimiento del día:</strong>
                                            <span class="requirement-text">{{ $requerimiento !== '' ? $requerimiento : 'Sin observación registrada aún.' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right ml-3">
                                    <span class="status-pill status-text">En horario</span>
                                    <div class="small mt-1 time-text"></div>
                                </div>
                            </button>
                        </div>

                        <div id="collapse-{{ $progra->id }}" class="collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $progra->id }}" data-parent="#accordion-programaciones">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <strong>Hora inicio:</strong> {{ $horaInicio }}
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <strong>Hora fin:</strong> {{ $horaFin }}
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <strong>Aula:</strong> {{ optional($progra->aula)->aula ?? '-' }}
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <strong>Docente:</strong> {{ optional($progra->docente)->nombrecorto ?? '-' }}
                                            </div>
                                        </div>

                                        <div class="mb-3 p-2 border rounded bg-light">
                                            <strong>Requerimiento o necesidad del día</strong>
                                            <div class="mt-1 requirement-text">
                                                {{ $requerimiento !== '' ? $requerimiento : 'Sin observación registrada.' }}
                                            </div>
                                        </div>

                                        <div class="mb-0 p-2 border rounded">
                                            <strong>Objetivo general de la inscripción actual</strong>
                                            <div class="mt-1 text-muted">
                                                {{ $objetivoGeneral !== '' ? $objetivoGeneral : 'Sin objetivo definido.' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3 mt-lg-0">
                                        <button type="button"
                                                class="btn btn-primary btn-block mb-2 btn-observacion"
                                                data-programacion-id="{{ $progra->id }}">
                                            Agregar observación de esta clase
                                        </button>

                                        @if($claseActual)
                                            <button type="button"
                                                    class="btn btn-success btn-block mb-2 btn-finalizar"
                                                    data-clase-id="{{ $claseActual->id }}">
                                                Marcar salida
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-block mb-2" disabled>
                                                Sin clase marcada como presente
                                            </button>
                                        @endif

                                        <div class="small border rounded p-2">
                                            <strong>Tiempo de clase:</strong>
                                            <div class="time-text"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @include('observacion.modalcreate')
@stop

@section('js')
    <script src="{{ asset('dist/js/moment.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        (function ($) {
            'use strict';
            $.fn.addTempClass = function(className, expire, callback) {
                className || (className = '');
                expire || (expire = 2000);
                return this.each(function() {
                    $(this).addClass(className).delay(expire).queue(function() {
                        $(this).removeClass(className).clearQueue();
                        callback && callback();
                    });
                });
            };
        }(jQuery));

        CKEDITOR.replace('editorguardar', {
            height: 120,
            width: '100%',
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('editoreditar', {
            height: 120,
            width: '100%',
            removeButtons: 'PasteFromWord'
        });

        function actualizarEstadosTiempo() {
            let enHorario = 0;
            let excedidos = 0;

            $('.schedule-item').each(function() {
                const item = $(this);
                const inicio = item.data('hora-inicio');
                const fin = item.data('hora-fin');
                const [hIni, mIni] = (inicio || '00:00').split(':').map(Number);
                const [hFin, mFin] = (fin || '00:00').split(':').map(Number);

                const ahora = moment();
                const start = moment().hours(hIni).minutes(mIni).seconds(0).milliseconds(0);
                const end = moment().hours(hFin).minutes(mFin).seconds(0).milliseconds(0);

                const minutosRestantes = end.diff(ahora, 'minutes');
                const minutosDesdeInicio = ahora.diff(start, 'minutes');

                let claseEstado = 'state-ok';
                let textoEstado = 'En horario';
                let textoTiempo = '';

                if (minutosRestantes > 15) {
                    claseEstado = 'state-ok';
                    textoEstado = 'En horario';
                    textoTiempo = 'Restan ' + minutosRestantes + ' min';
                } else if (minutosRestantes > 0) {
                    claseEstado = 'state-warning';
                    textoEstado = 'Por terminar';
                    textoTiempo = 'Restan ' + minutosRestantes + ' min';
                } else if (minutosRestantes >= -10) {
                    claseEstado = 'state-finished';
                    textoEstado = 'Hora final';
                    textoTiempo = 'Finalizó hace ' + Math.abs(minutosRestantes) + ' min';
                } else {
                    claseEstado = 'state-overdue';
                    textoEstado = 'Excedido';
                    textoTiempo = 'Pasado por ' + Math.abs(minutosRestantes) + ' min';
                    excedidos++;
                }

                if (minutosDesdeInicio >= 0 && minutosRestantes >= 0) {
                    enHorario++;
                }

                item.removeClass('state-ok state-warning state-finished state-overdue').addClass(claseEstado);
                item.find('.status-text').text(textoEstado);
                item.find('.time-text').text(textoTiempo);
            });

            $('#metric-current').text(enHorario);
            $('#metric-overdue').text(excedidos);
        }

        $(function() {
            actualizarEstadosTiempo();
            setInterval(actualizarEstadosTiempo, 30000);

            $('.btn-observacion').on('click', function() {
                const programacionId = $(this).data('programacion-id');
                $('#observable_id').val(programacionId);
                $('#observable_type').val('Programacion');
                CKEDITOR.instances.editorguardar.setData('');
                $('#modal-agregar-observacion').modal('show');
            });

            $('#guardar-observacion').on('click', function(e) {
                e.preventDefault();
                for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                const observableId = $('#observable_id').val();
                const observacion = $('#editorguardar').val();

                $.ajax({
                    url: "{{ url('guardar/observacion') }}",
                    data: {
                        observacion: observacion,
                        observable_id: observableId,
                        observable_type: 'Programacion'
                    },
                    success: function(json) {
                        if (json.errores) {
                            $('.error').html(json.errores.observacion);
                            $('.diverror').removeClass('d-none');
                            return;
                        }

                        const textoPlano = $('<div>').html(observacion).text().trim();
                        const textoFinal = textoPlano.length ? textoPlano : 'Observación actualizada.';
                        $('#programacion-' + observableId).find('.requirement-text').text(textoFinal);
                        $('#programacion-' + observableId).addTempClass('border border-success', 1600);
                        $('#modal-agregar-observacion').modal('hide');
                        $('.diverror').addClass('d-none');

                        Swal.fire({
                            icon: 'success',
                            title: 'Observación registrada',
                            timer: 1600,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo guardar la observación.', 'error');
                    }
                });
            });

            $('.btn-finalizar').on('click', function() {
                const claseId = $(this).data('clase-id');
                const boton = $(this);

                $.ajax({
                    url: "{{ route('clases.finalizar') }}",
                    data: { id: claseId },
                    success: function(json) {
                        boton.prop('disabled', true)
                            .removeClass('btn-success')
                            .addClass('btn-secondary')
                            .text('Salida registrada');

                        Swal.fire({
                            icon: 'success',
                            title: json.message || 'Salida marcada correctamente',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo marcar la salida.', 'error');
                    }
                });
            });

            $('#modal-agregar-observacion').on('hidden.bs.modal', function() {
                $('.diverror').addClass('d-none');
            });
        });
    </script>
@stop
