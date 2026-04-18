@extends('adminlte::page')

@section('title', 'Mis pagos de hoy')

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
            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <strong>Pagos del dia ({{ $hoy->format('d/m/Y') }})</strong>
                <a href="{{ route('reportes.pagos.diario.usuario.pdf') }}" class="btn btn-pdf-custom btn-sm">
                    Exportar PDF
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered sortable-report" id="tabla-diario-usuario">
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
                                    <td colspan="7" class="text-center text-muted">No registraste pagos hoy.</td>
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
                                <th colspan="4" class="text-right">TOTAL DEL DIA</th>
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
