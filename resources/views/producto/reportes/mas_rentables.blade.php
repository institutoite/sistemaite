@extends('adminlte::page')

@section('title', 'Productos mas rentables')

@section('content_header')
    <h1>Productos mas rentables</h1>
@stop

@section('content')
    <div class="card card-outline card-success">
        <div class="card-header">
            <form method="GET" class="form-row align-items-end">
                <div class="col-md-2">
                    <label>Fecha inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ $fechaInicio->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Fecha fin</label>
                    <input type="date" name="fecha_fin" value="{{ $fechaFin->toDateString() }}" class="form-control">
                </div>
                <div class="col-md-2">
                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value="todos" @if($estado === 'todos') selected @endif>Todos</option>
                        <option value="activos" @if($estado === 'activos') selected @endif>Activos</option>
                        <option value="inactivos" @if($estado === 'inactivos') selected @endif>Inactivos</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Orden</label>
                    <select name="orden" class="form-control">
                        <option value="utilidad_total" @if($orden === 'utilidad_total') selected @endif>Mayor utilidad total</option>
                        <option value="ganancia_unitaria" @if($orden === 'ganancia_unitaria') selected @endif>Mayor ganancia unitaria</option>
                        <option value="margen_asc" @if($orden === 'margen_asc') selected @endif>Menor margen</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-success btn-block" type="submit">Aplicar filtros</button>
                </div>
            </form>
            <div class="mt-2">
                <a href="{{ route('productos.mas_rentables.export_pdf', ['fecha_inicio' => $fechaInicio->toDateString(), 'fecha_fin' => $fechaFin->toDateString(), 'estado' => $estado]) }}"
                   class="btn btn-danger btn-sm">
                    Exportar PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $alertas['costo_cero'] }}</h3><p>Productos activos con costo 0</p></div><div class="icon"><i class="fas fa-coins"></i></div></div></div>
                <div class="col-md-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $alertas['stock_critico'] }}</h3><p>Stock critico</p></div><div class="icon"><i class="fas fa-box-open"></i></div></div></div>
                <div class="col-md-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $alertas['margen_negativo'] }}</h3><p>Margen negativo</p></div><div class="icon"><i class="fas fa-arrow-down"></i></div></div></div>
                <div class="col-md-3"><div class="small-box bg-info"><div class="inner"><h3>{{ $alertas['margen_bajo'] }}</h3><p>Margen bajo (&lt;10%)</p></div><div class="icon"><i class="fas fa-chart-line"></i></div></div></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="alert alert-success mb-0">Top utilidad: <strong>{{ optional($insights['top_utilidad'])->nombre ?? 'N/D' }}</strong></div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-warning mb-0">Peor margen: <strong>{{ optional($insights['peor_margen'])->nombre ?? 'N/D' }}</strong></div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-info mb-0">Alto movimiento / baja utilidad: <strong>{{ optional($insights['alto_mov_baja_utilidad'])->nombre ?? 'N/D' }}</strong></div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio venta</th>
                            <th>Costo</th>
                            <th>Ganancia unitaria</th>
                            <th>Cantidad vendida</th>
                            <th>Ingreso total</th>
                            <th>Costo total</th>
                            <th>Utilidad total</th>
                            <th>% Margen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $p)
                            <tr>
                                <td>{{ $p->nombre }}</td>
                                <td>{{ number_format((float)$p->precio, 2) }}</td>
                                <td>{{ number_format((float)$p->costo, 2) }}</td>
                                <td class="{{ (float)$p->ganancia_unitaria < 0 ? 'text-danger' : 'text-success' }}">{{ number_format((float)$p->ganancia_unitaria, 2) }}</td>
                                <td>{{ number_format((float)$p->cantidad_total, 0) }}</td>
                                <td>{{ number_format((float)$p->ingreso_total, 2) }}</td>
                                <td>{{ number_format((float)$p->costo_total, 2) }}</td>
                                <td class="{{ (float)$p->utilidad_total < 0 ? 'text-danger font-weight-bold' : 'text-success font-weight-bold' }}">{{ number_format((float)$p->utilidad_total, 2) }}</td>
                                <td>
                                    {{ number_format((float)$p->margen_porcentual, 2) }}%
                                    @if((float)$p->margen_porcentual < 0)
                                        <span class="badge badge-danger">Negativo</span>
                                    @elseif((float)$p->margen_porcentual < 10)
                                        <span class="badge badge-warning">Bajo</span>
                                    @else
                                        <span class="badge badge-success">Saludable</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="text-center text-muted">No hay ventas para analizar en el rango.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $productos->links() }}</div>
    </div>
@stop
