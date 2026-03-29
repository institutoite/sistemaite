@extends('adminlte::page')

@section('title', 'Usuarios ventas')

@section('content_header')
    <h1>Usuarios ventas</h1>
@stop

@section('content')
    <div class="card card-outline card-info">
        <div class="card-header">
            <form method="GET" class="form-row align-items-end">
                <div class="col-md-4">
                    <label>Fecha inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $fechaInicio->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Fecha fin</label>
                    <input type="date" name="fecha_fin" value="{{ $fechaFin->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-info btn-block" type="submit">Filtrar</button>
                </div>
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Ranking</th>
                            <th>Usuario</th>
                            <th>Total vendido</th>
                            <th>Cant. ventas</th>
                            <th>Productos vendidos</th>
                            <th>Utilidad</th>
                            <th>Ticket promedio</th>
                            <th>Utilidad promedio/venta</th>
                            <th>Producto top</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ventasPorUsuario as $index => $u)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $u->usuario }}</td>
                                <td>{{ number_format((float)$u->total_vendido, 2) }}</td>
                                <td>{{ number_format((float)$u->cantidad_ventas, 0) }}</td>
                                <td>{{ number_format((float)$u->productos_vendidos, 0) }}</td>
                                <td class="{{ (float)$u->utilidad_total < 0 ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">{{ number_format((float)$u->utilidad_total, 2) }}</td>
                                <td>{{ number_format((float)$u->ticket_promedio, 2) }}</td>
                                <td>{{ number_format((float)$u->utilidad_promedio_venta, 2) }}</td>
                                <td>{{ $u->producto_top ?: 'N/D' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="text-center text-muted">No hay ventas de usuarios en el rango.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
