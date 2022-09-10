@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Mostrar Comentario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comentario.index') }}">Listar Comentarios</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NOMBRE</td>
                                    <td>{{$comentario->nombre}}</td>
                                </tr>
                                <tr>
                                    <td>TELEFONO</td>
                                    <td>{{$comentario->telefono}}</td>
                                </tr>
                                <tr>
                                    <td>COMENTARIO</td>
                                    <td>{!!$comentario->comentario!!}</td>
                                </tr>
                                <tr>
                                    <td>VIGENCIA</td>
                                    <td>
                                        @if ($comentario->vigente==1)
                                            Vigente
                                        @else
                                            No Vigente
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>INTERESES</td>
                                    <td>
                                    <ol>
                                    @foreach ($interests as $interest)
                                        <li>{{$interest->interest}}</li>
                                    @endforeach
                                    </ol>
                                    </td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
