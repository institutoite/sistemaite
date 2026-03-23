@extends('adminlte::page')

@section('title', 'Mis pagos de hoy')

@section('content')
    <section class="content pt-3">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Pagos del día ({{ $hoy->format('d/m/Y') }})</strong>
            </div>
            <div class="card-body">
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
                                    <td colspan="6" class="text-center text-muted">No registraste pagos hoy.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <th colspan="3" class="text-right">TOTAL DEL DÍA</th>
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

