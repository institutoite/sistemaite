@extends('adminlte::page')

@section('title', 'Mis ventas')

@section('content')
    <section class="content pt-3">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Mis ventas registradas</strong>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('reportes.ventas.mias') }}" class="mb-3">
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

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
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
                            @forelse($pagos as $pago)
                                <tr>
                                    <td>{{ $pago->id }}</td>
                                    <td>{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $pago->concepto_reporte }}</td>
                                    <td>{{ number_format((float)$pago->monto, 2) }}</td>
                                    <td>{{ number_format((float)$pago->pagocon, 2) }}</td>
                                    <td>{{ number_format((float)$pago->cambio, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No hay ventas registradas en el rango seleccionado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <th colspan="3" class="text-right">TOTAL MIS VENTAS</th>
                                <th>{{ number_format((float)$total, 2) }}</th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

