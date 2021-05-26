@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Programación')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Programacion') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('programacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
										<th>Fecha</th>
										<th>Estado</th>
										<th>Inicio</th>
										<th>Fin</th>
										<th>Hras</th>
										<th>Docente</th>
										<th>Materia</th>
										<th>Aula</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programaciones as $programacion)
                                        <tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $programacion->fecha }}</td>
											<td>{{ $programacion->estado }}</td>
											<td>{{ $programacion->hora_ini }}</td>
											<td>{{ $programacion->hora_fin }}</td>
											<td>{{ $programacion->horas_por_clase }}</td>
											<td>{{ $programacion->nombre }}</td>
											<td>{{ $programacion->materia }}</td>
											<td>{{ $programacion->aula }}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('programacions.show',$programacion->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                <a class="btn btn-sm btn-primary " href="{{ route('programacions.show',$programacion->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

