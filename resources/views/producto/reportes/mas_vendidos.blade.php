@extends('adminlte::page')

@section('title', 'Productos mas vendidos')

@section('content_header')
    <h1>Productos mas vendidos</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <form method="GET" class="form-row align-items-end">
                <div class="col-md-3">
                    <label>Fecha inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $fechaInicio->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Fecha fin</label>
                    <input type="date" name="fecha_fin" value="{{ $fechaFin->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value="todos" @if($estado === 'todos') selected @endif>Todos</option>
                        <option value="activos" @if($estado === 'activos') selected @endif>Activos</option>
                        <option value="inactivos" @if($estado === 'inactivos') selected @endif>Inactivos</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary btn-block" type="submit">Aplicar filtros</button>
                </div>
            </form>
            <div class="mt-2">
                <a href="{{ route('productos.mas_vendidos.export_excel', ['fecha_inicio' => $fechaInicio->toDateString(), 'fecha_fin' => $fechaFin->toDateString(), 'estado' => $estado]) }}"
                   class="btn btn-success btn-sm">
                    Exportar Excel
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4"><div class="alert alert-info mb-0">Unidades vendidas: <strong>{{ number_format((float)$resumen['cantidad_total'], 0) }}</strong></div></div>
                <div class="col-md-4"><div class="alert alert-secondary mb-0">Ingreso total: <strong>{{ number_format((float)$resumen['ingreso_total'], 2) }}</strong></div></div>
                <div class="col-md-4"><div class="alert alert-success mb-0">Utilidad total: <strong>{{ number_format((float)$resumen['utilidad_total'], 2) }}</strong></div></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad total</th>
                            <th>Total vendido</th>
                            <th>Costo total</th>
                            <th>Ganancia total</th>
                            <th>Margen total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $p)
                            <tr>
                                <td>{{ $p->nombre }}</td>
                                <td>{{ number_format((float)$p->cantidad_total, 0) }}</td>
                                <td>{{ number_format((float)$p->ingreso_total, 2) }}</td>
                                <td>{{ number_format((float)$p->costo_total, 2) }}</td>
                                <td class="{{ (float)$p->utilidad_total < 0 ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">{{ number_format((float)$p->utilidad_total, 2) }}</td>
                                <td>
                                    {{ number_format((float)$p->margen_porcentual, 2) }}%
                                    @if((float)$p->margen_porcentual < 10)
                                        <span class="badge badge-warning">Margen bajo</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted">No hay ventas en el rango seleccionado.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $productos->links() }}</div>
    </div>
@stop
