@extends('adminlte::page')

@section('title', 'Reporte general de pagos')

@section('css')
<style>
    .row-qr {
        background-color: rgba(55, 95, 122, 0.2) !important;
    }
    .sortable-th {
        cursor: pointer;
        user-select: none;
    }
    .btn-pdf-custom {
        background-color: rgb(55,95,122) !important;
        color: #fff !important;
        border-color: rgb(55,95,122) !important;
    }
</style>
@endsection

@section('content')
    <section class="content pt-3">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Reporte general de pagos por usuario</strong>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('reportes.pagos.general.admin') }}" class="mb-3">
                    <div class="form-row">
                        <div class="col-md-3">
                            <label for="fecha_inicio">Fecha inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"
                                   value="{{ $fechaInicio->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_fin">Fecha fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"
                                   value="{{ $fechaFin->format('Y-m-d') }}" required>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-primary btn-block" type="submit">Filtrar</button>
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <a class="btn btn-pdf-custom btn-block"
                               href="{{ route('reportes.pagos.general.admin.pdf', ['fecha_inicio' => $fechaInicio->format('Y-m-d'), 'fecha_fin' => $fechaFin->format('Y-m-d')]) }}">
                                Exportar PDF
                            </a>
                        </div>
                    </div>
                </form>

                @forelse($pagosPorUsuario as $grupo)
                    <div class="card card-outline card-primary mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>{{ $grupo['usuario']->name }}</strong>
                            <a class="btn btn-pdf-custom btn-sm"
                               href="{{ route('reportes.pagos.general.admin.usuario.pdf', ['usuario' => $grupo['usuario']->id, 'fecha_inicio' => $fechaInicio->format('Y-m-d'), 'fecha_fin' => $fechaFin->format('Y-m-d')]) }}">
                                Exportar PDF
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped mb-0 sortable-report">
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
                                        @foreach($grupo['pagos'] as $pago)
                                            <tr class="{{ $pago->forma_pago_normalizada === 'QR' ? 'row-qr' : '' }}">
                                                <td data-sort-value="{{ $pago->id }}">{{ $pago->id }}</td>
                                                <td data-sort-value="{{ optional($pago->created_at)->format('Y-m-d H:i:s') }}">{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                                                <td data-sort-value="{{ mb_strtolower($pago->concepto_reporte) }}">{{ $pago->concepto_reporte }}</td>
                                                <td data-sort-value="{{ $pago->forma_pago_normalizada }}">{{ $pago->forma_pago_normalizada }}</td>
                                                <td data-sort-value="{{ (float)$pago->monto }}">{{ number_format((float)$pago->monto, 2) }}</td>
                                                <td data-sort-value="{{ (float)$pago->pagocon }}">{{ number_format((float)$pago->pagocon, 2) }}</td>
                                                <td data-sort-value="{{ (float)$pago->cambio }}">{{ number_format((float)$pago->cambio, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-light">
                                            <th colspan="4" class="text-right">Subtotal QR - {{ $grupo['usuario']->name }}</th>
                                            <th>{{ number_format((float)$grupo['subtotal_qr'], 2) }}</th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr class="bg-light">
                                            <th colspan="4" class="text-right">Subtotal Efectivo - {{ $grupo['usuario']->name }}</th>
                                            <th>{{ number_format((float)$grupo['subtotal_efectivo'], 2) }}</th>
                                            <th colspan="2"></th>
                                        </tr>
                                        <tr class="bg-light">
                                            <th colspan="4" class="text-right">Total {{ $grupo['usuario']->name }}</th>
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
                <div><strong>TOTAL ABSOLUTO QR: {{ number_format((float)$totalGeneralQr, 2) }}</strong></div>
                <div><strong>TOTAL ABSOLUTO EFECTIVO: {{ number_format((float)$totalGeneralEfectivo, 2) }}</strong></div>
                <div><strong>TOTAL ABSOLUTO GENERAL: {{ number_format((float)$totalGeneral, 2) }}</strong></div>
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
