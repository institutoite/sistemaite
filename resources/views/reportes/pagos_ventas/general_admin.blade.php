@extends('adminlte::page')

@section('title', 'Reporte general de pagos')

@section('content')
    <section class="content pt-3">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Reporte general de pagos por usuario</strong>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('reportes.pagos.general.admin') }}" class="mb-3">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="fecha_inicio">Fecha inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                   value="{{ $fechaInicio->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fecha_fin">Fecha fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                                   value="{{ $fechaFin->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary btn-block" type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>

                @forelse($pagosPorUsuario as $grupo)
                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header">
                            <strong>{{ $grupo['usuario']->name }}</strong>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha/Hora</th>
                                            <th>Concepto</th>
                                            <th>Monto</th>
                                            <th>Pagó con</th>
                                            <th>Cambio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($grupo['pagos'] as $pago)
                                            <tr>
                                                <td>{{ $pago->id }}</td>
                                                <td>{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                                                <td>{{ $pago->concepto_reporte }}</td>
                                                <td>{{ number_format((float)$pago->monto, 2) }}</td>
                                                <td>{{ number_format((float)$pago->pagocon, 2) }}</td>
                                                <td>{{ number_format((float)$pago->cambio, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light">
                                            <th colspan="3" class="text-right">Subtotal {{ $grupo['usuario']->name }}</th>
                                            <th>{{ number_format((float)$grupo['subtotal'], 2) }}</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mb-0">No hay pagos registrados en el rango seleccionado.</p>
                @endforelse
            </div>
            <div class="card-footer bg-light text-right">
                <strong>TOTAL GENERAL: {{ number_format((float)$totalGeneral, 2) }}</strong>
            </div>
        </div>
    </section>
@endsection

