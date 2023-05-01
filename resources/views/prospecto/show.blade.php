
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Privincia Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <section class="content container-fluid">
        
        <div class="card">
            <div class="card-header">
                PROSPECTO
            </div>
            <div class="card-body">
                <h5 class="card-title"><a class="btn btn-primary text-white btn-" href="https://wa.me/591{{$prospecto->telefono}}" target="_blank" rel="noopener noreferrer">Enviar Mensaje</a></h5>
                <p class="card-text">{{ $prospecto->estado }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                OBSERVACIONES 
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Observacion</th>
                            <th>creado</th>
                            <th>actualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($observaciones as $observacion)
                            <tr>
                                <td>{{ $observacion->id }}</td>
                                <td>{!!  $observacion->observacion !!}</td>
                                <td>{{ $observacion->created_at }}</td>
                                <td>{{ $observacion->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </section>
@endsection
