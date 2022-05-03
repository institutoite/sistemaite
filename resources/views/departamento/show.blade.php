@extends('adminlte::page')

@section('title', 'Departamentos')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Departamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departamentos.index') }}">Listar Departamentos</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$departamento->id}}</td>
                                </tr>
                                <tr>
                                    <td>NOMBRE</td>
                                    <td>{{$departamento->departamento}}</td>
                                </tr>
                                <tr>
                                    <td>CREADO</td>
                                    <td>{{$departamento->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>ACTUALIZADO</td>
                                    <td>{{$departamento->updated_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
