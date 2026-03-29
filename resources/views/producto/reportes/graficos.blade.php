@extends('adminlte::page')

@section('title', 'Graficos de productos')

@section('content_header')
    <h1>Graficos de productos</h1>
@stop

@section('content')
    <div class="card">
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
                    <button class="btn btn-primary btn-block" type="submit">Actualizar graficos</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6"><div class="card"><div class="card-header"><strong>Top vendidos por cantidad</strong></div><div class="card-body"><canvas id="chartCantidad" height="180"></canvas></div></div></div>
        <div class="col-md-6"><div class="card"><div class="card-header"><strong>Top por ingresos</strong></div><div class="card-body"><canvas id="chartIngresos" height="180"></canvas></div></div></div>
        <div class="col-md-6"><div class="card"><div class="card-header"><strong>Top por utilidad</strong></div><div class="card-body"><canvas id="chartUtilidad" height="180"></canvas></div></div></div>
        <div class="col-md-6"><div class="card"><div class="card-header"><strong>Menor rentabilidad (% margen)</strong></div><div class="card-body"><canvas id="chartMargen" height="180"></canvas></div></div></div>
        <div class="col-md-12"><div class="card"><div class="card-header"><strong>Stock actual vs stock minimo</strong></div><div class="card-body"><canvas id="chartStock" height="120"></canvas></div></div></div>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        (function () {
            var topCantidad = @json($topCantidad);
            var topIngresos = @json($topIngresos);
            var topUtilidad = @json($topUtilidad);
            var menosRentables = @json($menosRentables);
            var stockActual = @json($stockActual);

            function labels(data) { return (data || []).map(function (i) { return i.nombre; }); }
            function values(data, field) { return (data || []).map(function (i) { return Number(i[field] || 0); }); }

            new Chart(document.getElementById('chartCantidad'), {
                type: 'bar',
                data: { labels: labels(topCantidad), datasets: [{ label: 'Cantidad', data: values(topCantidad, 'cantidad_total'), backgroundColor: '#17a2b8' }] },
            });

            new Chart(document.getElementById('chartIngresos'), {
                type: 'bar',
                data: { labels: labels(topIngresos), datasets: [{ label: 'Ingresos', data: values(topIngresos, 'ingreso_total'), backgroundColor: '#6c757d' }] },
            });

            new Chart(document.getElementById('chartUtilidad'), {
                type: 'bar',
                data: { labels: labels(topUtilidad), datasets: [{ label: 'Utilidad', data: values(topUtilidad, 'utilidad_total'), backgroundColor: '#28a745' }] },
            });

            new Chart(document.getElementById('chartMargen'), {
                type: 'bar',
                data: { labels: labels(menosRentables), datasets: [{ label: 'Margen %', data: values(menosRentables, 'margen_porcentual'), backgroundColor: '#ffc107' }] },
            });

            new Chart(document.getElementById('chartStock'), {
                type: 'bar',
                data: {
                    labels: labels(stockActual),
                    datasets: [
                        { label: 'Stock actual', data: values(stockActual, 'stock'), backgroundColor: '#007bff' },
                        { label: 'Stock minimo', data: values(stockActual, 'stock_minimo'), backgroundColor: '#fd7e14' }
                    ]
                },
            });
        })();
    </script>
@stop
