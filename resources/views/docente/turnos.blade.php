@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Turnos Docentes')

@section('content')
    <div class="container pt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                ASIGNAR TURNOS Y HORARIOS - {{ $docente->nombrecorto }}
            </div>
            <div class="card-body">
                @if(session('mensaje'))
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        Revise los horarios ingresados.
                    </div>
                @endif

                <form action="{{ route('docentes.turnos.guardar', $docente->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @php
                        $oldTurnos = old('turnos', []);
                    @endphp
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-secondary text-white text-center">
                                <tr>
                                    <th style="width: 18%">DIA</th>
                                    <th style="width: 42%">TURNOS ACTUALES</th>
                                    <th style="width: 40%">AGREGAR TURNOS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dias as $dia)
                                    @php
                                        $turnosDia = $turnos[$dia->id] ?? collect();
                                        $turnosOldDia = $oldTurnos[$dia->id] ?? [];
                                    @endphp
                                    <tr>
                                        <td class="text-capitalize">{{ $dia->dia }}</td>
                                        <td>
                                            @if($turnosDia->isEmpty())
                                                <span class="text-muted">Sin turnos</span>
                                            @else
                                                @foreach($turnosDia as $turno)
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="badge bg-secondary mr-2">{{ $turno->hora_inicio }} - {{ $turno->hora_fin }}</span>
                                                        <div class="form-check ml-2">
                                                            <input class="form-check-input" type="checkbox" name="remove_turnos[]" value="{{ $turno->id }}" id="remove_turno_{{ $turno->id }}">
                                                            <label class="form-check-label small text-danger" for="remove_turno_{{ $turno->id }}">Eliminar</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $turnosOldDia = array_values($turnosOldDia);
                                                $nextIndex = count($turnosOldDia);
                                            @endphp
                                            <div class="turno-container" data-dia="{{ $dia->id }}" data-next-index="{{ $nextIndex }}">
                                                @if(!empty($turnosOldDia))
                                                    @foreach($turnosOldDia as $index => $turnoOld)
                                                        <div class="form-row mb-2 turno-row">
                                                            <div class="col">
                                                                <input type="time" name="turnos[{{ $dia->id }}][{{ $index }}][hora_inicio]" class="form-control" value="{{ $turnoOld['hora_inicio'] ?? '' }}">
                                                            </div>
                                                            <div class="col">
                                                                <input type="time" name="turnos[{{ $dia->id }}][{{ $index }}][hora_fin]" class="form-control" value="{{ $turnoOld['hora_fin'] ?? '' }}">
                                                            </div>
                                                            <div class="col-auto">
                                                                @if($index === 0)
                                                                    <button type="button" class="btn btn-outline-secondary btn-sm add-turno" data-dia="{{ $dia->id }}">+</button>
                                                                @else
                                                                    <button type="button" class="btn btn-outline-danger btn-sm remove-turno">-</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="form-row mb-2 turno-row">
                                                        <div class="col">
                                                            <input type="time" name="turnos[{{ $dia->id }}][0][hora_inicio]" class="form-control">
                                                        </div>
                                                        <div class="col">
                                                            <input type="time" name="turnos[{{ $dia->id }}][0][hora_fin]" class="form-control">
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-outline-secondary btn-sm add-turno" data-dia="{{ $dia->id }}">+</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Guardar Turnos</button>
                        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('add-turno')) {
                event.preventDefault();
                var dia = event.target.getAttribute('data-dia');
                var container = document.querySelector('.turno-container[data-dia="' + dia + '"]');
                if (!container) {
                    return;
                }

                var row = document.createElement('div');
                var nextIndex = parseInt(container.getAttribute('data-next-index'), 10);
                if (Number.isNaN(nextIndex)) {
                    nextIndex = 0;
                }
                row.className = 'form-row mb-2 turno-row';
                row.innerHTML =
                    '<div class="col">' +
                        '<input type="time" name="turnos[' + dia + '][' + nextIndex + '][hora_inicio]" class="form-control">' +
                    '</div>' +
                    '<div class="col">' +
                        '<input type="time" name="turnos[' + dia + '][' + nextIndex + '][hora_fin]" class="form-control">' +
                    '</div>' +
                    '<div class="col-auto">' +
                        '<button type="button" class="btn btn-outline-danger btn-sm remove-turno">-</button>' +
                    '</div>';

                container.appendChild(row);
                container.setAttribute('data-next-index', nextIndex + 1);
            }

            if (event.target.classList.contains('remove-turno')) {
                event.preventDefault();
                var row = event.target.closest('.turno-row');
                if (row) {
                    row.remove();
                }
            }
        });
    </script>
@stop
