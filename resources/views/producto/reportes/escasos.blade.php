@extends('adminlte::page')

@section('title', 'Productos escasos')

@section('content_header')
    <h1>Productos escasos y agotados</h1>
@stop

@section('content')
    <div class="row mb-3">
        <div class="col-md-4"><div class="small-box bg-danger"><div class="inner"><h3>{{ $resumen['agotados'] }}</h3><p>Agotados</p></div><div class="icon"><i class="fas fa-times-circle"></i></div></div></div>
        <div class="col-md-4"><div class="small-box bg-warning"><div class="inner"><h3>{{ $resumen['escasos'] }}</h3><p>Escasos</p></div><div class="icon"><i class="fas fa-exclamation-triangle"></i></div></div></div>
        <div class="col-md-4"><div class="small-box bg-secondary"><div class="inner"><h3>{{ $resumen['inactivos'] }}</h3><p>Inactivos</p></div><div class="icon"><i class="fas fa-ban"></i></div></div></div>
    </div>

    <div class="card">
        <div class="card-header">
            <form method="GET" class="form-inline">
                <label class="mr-2">Estado</label>
                <select name="estado" class="form-control mr-2">
                    <option value="activos" @if($estado === 'activos') selected @endif>Activos</option>
                    <option value="inactivos" @if($estado === 'inactivos') selected @endif>Inactivos</option>
                    <option value="todos" @if($estado === 'todos') selected @endif>Todos</option>
                </select>
                <button class="btn btn-primary" type="submit">Filtrar</button>
            </form>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Codigo</th>
                            <th>Stock</th>
                            <th>Stock minimo</th>
                            <th>Costo</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Alerta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $p)
                            <tr class="{{ $p->es_agotado ? 'table-danger' : 'table-warning' }}">
                                <td>{{ $p->nombre }}</td>
                                <td>{{ $p->codigo }}</td>
                                <td>{{ $p->stock }}</td>
                                <td>{{ $p->stock_minimo }}</td>
                                <td>{{ number_format((float)$p->costo, 2) }}</td>
                                <td>{{ number_format((float)$p->precio, 2) }}</td>
                                <td><span class="badge badge-{{ $p->activo ? 'success' : 'secondary' }}">{{ $p->activo ? 'Activo' : 'Inactivo' }}</span></td>
                                <td>
                                    @if($p->es_agotado)
                                        <span class="badge badge-danger">Agotado</span>
                                    @else
                                        <span class="badge badge-warning">Escaso</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center text-muted">No hay productos escasos en este filtro.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">{{ $productos->links() }}</div>
    </div>
@stop
