@extends('adminlte::page')

@section('title', 'Mis ventas')

@section('css')
<style>
    .row-qr {
        background-color: rgba(55, 95, 122, 0.2) !important;
    }
    .sortable-th {
        cursor: pointer;
        user-select: none;
    }
</style>
@endsection

@section('content')
    <section class="content pt-3">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
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
                    <table class="table table-striped table-bordered sortable-report">
                        <thead class="thead-light">
                            <tr>
                                <th class="sortable-th" data-type="number">#</th>
                                <th class="sortable-th" data-type="datetime">Fecha/Hora</th>
                                <th class="sortable-th" data-type="text">Concepto</th>
                                <th class="sortable-th" data-type="text">Forma de pago</th>
                                <th class="sortable-th" data-type="number">Monto</th>
                                <th class="sortable-th" data-type="number">Pago con</th>
                                <th class="sortable-th" data-type="number">Cambio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pagos as $pago)
                                <tr class="{{ $pago->forma_pago_normalizada === 'QR' ? 'row-qr' : '' }}">
                                    <td data-sort-value="{{ $pago->id }}">{{ $pago->id }}</td>
                                    <td data-sort-value="{{ optional($pago->created_at)->format('Y-m-d H:i:s') }}">{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                                    <td data-sort-value="{{ mb_strtolower($pago->concepto_reporte) }}">{{ $pago->concepto_reporte }}</td>
                                    <td data-sort-value="{{ $pago->forma_pago_normalizada }}">{{ $pago->forma_pago_normalizada }}</td>
                                    <td data-sort-value="{{ (float)$pago->monto }}">{{ number_format((float)$pago->monto, 2) }}</td>
                                    <td data-sort-value="{{ (float)$pago->pagocon }}">{{ number_format((float)$pago->pagocon, 2) }}</td>
                                    <td data-sort-value="{{ (float)$pago->cambio }}">{{ number_format((float)$pago->cambio, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No hay ventas registradas en el rango seleccionado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <th colspan="4" class="text-right">Subtotal QR</th>
                                <th>{{ number_format((float)$subtotalQr, 2) }}</th>
                                <th colspan="2"></th>
                            </tr>
                            <tr class="bg-light">
                                <th colspan="4" class="text-right">Subtotal Efectivo</th>
                                <th>{{ number_format((float)$subtotalEfectivo, 2) }}</th>
                                <th colspan="2"></th>
                            </tr>
                            <tr class="bg-light">
                                <th colspan="4" class="text-right">TOTAL MIS VENTAS</th>
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

@section('js')
<script>
    (function () {
        function parseValue(cell, type) {
            var raw = cell.getAttribute('data-sort-value');
            if (type === 'number') {
                return Number(raw !== null ? raw : cell.textContent.trim()) || 0;
            }
            if (type === 'datetime') {
                return Date.parse(raw !== null ? raw : cell.textContent.trim()) || 0;
            }
            return (raw !== null ? raw : cell.textContent.trim()).toLowerCase();
        }

        document.querySelectorAll('table.sortable-report').forEach(function (table) {
            var headers = table.querySelectorAll('thead th.sortable-th');
            headers.forEach(function (header, index) {
                header.setAttribute('data-order', 'none');
                header.addEventListener('click', function () {
                    var tbody = table.querySelector('tbody');
                    if (!tbody) return;

                    var rows = Array.from(tbody.querySelectorAll('tr')).filter(function (row) {
                        return row.children.length === headers.length;
                    });

                    var current = header.getAttribute('data-order');
                    var next = current === 'asc' ? 'desc' : 'asc';
                    headers.forEach(function (h) { h.setAttribute('data-order', 'none'); });
                    header.setAttribute('data-order', next);

                    var type = header.getAttribute('data-type') || 'text';
                    rows.sort(function (a, b) {
                        var va = parseValue(a.children[index], type);
                        var vb = parseValue(b.children[index], type);
                        if (va < vb) return next === 'asc' ? -1 : 1;
                        if (va > vb) return next === 'asc' ? 1 : -1;
                        return 0;
                    });

                    rows.forEach(function (row) { tbody.appendChild(row); });
                });
            });
        });
    })();
</script>
@endsection
