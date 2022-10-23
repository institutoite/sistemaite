@extends('layouts.app')

@section('template_title')
    {{ $pago->name ?? 'Show Pago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Monto:</strong>
                            {{ $pago->monto }}
                        </div>
                        <div class="form-group">
                            <strong>Pagocon:</strong>
                            {{ $pago->pagocon }}
                        </div>
                        <div class="form-group">
                            <strong>Cambio:</strong>
                            {{ $pago->cambio }}
                        </div>
                        <div class="form-group">
                            <strong>Pagable Id:</strong>
                            {{ $pago->pagable_id }}
                        </div>
                        <div class="form-group">
                            <strong>Pagable Type:</strong>
                            {{ $pago->pagable_type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
