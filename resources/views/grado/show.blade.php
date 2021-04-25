@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('template_title')
    {{ $grado->name ?? 'Show Grado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Grado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grado.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped"> 
                            <tr class="bg-primary">
                                    <th>ATRIBUTO</th>
                                    <th>VALOR</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{$grado->id}}</td>
                                </tr>
                                <tr>
                                    <td>Grado</td>
                                    <td>{{$grado->grado}}</td>
                                </tr>
                                <tr>
                                    <td>Nivel</td>
                                    <td>{{$grado->nivel}}</td>
                                </tr>
                                <tr>
                                    <td>Creado</td>
                                    <td>{{$grado->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Actualizado</td>
                                    <td>{{$grado->updated_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
