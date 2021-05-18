@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Pais Crear')

@section('content')
{{-- {{ dd($inscripcion) }} --}}


    <section class="content container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Monto</th>
                        <th>PagoCon</th>
                        <th>Cambio</th>
                        
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>{{ $iteration->loop }}</td>
                                <td>{{ $pago->monto }}</td>
                                <td>{{ $pago->pagocon }}</td>
                                <td>{{ $pago->cambio }}</td>
                                
                                <td>{{ $pago->created_at }}</td>
                            </tr>
                        @endforeach

                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.guardar',$inscripcion->id)}}">
                            @csrf

                            @include('pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
