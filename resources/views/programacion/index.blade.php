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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Nº</th>
										<th>Fecha</th>
										<th>Habilitado</th>
										<th>Estado</th>
										<th>Hora Ini</th>
										<th>Hora Fin</th>
										<th>Docente Id</th>
										<th>Materia Id</th>
										<th>Aula Id</th>
										<th>Inscripcion Id</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programacions as $programacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $programacion->fecha }}</td>
											<td>{{ $programacion->habilitado }}</td>
											<td>{{ $programacion->estado }}</td>
											<td>{{ $programacion->hora_ini }}</td>
											<td>{{ $programacion->hora_fin }}</td>
											<td>{{ $programacion->docente_id }}</td>
											<td>{{ $programacion->materia_id }}</td>
											<td>{{ $programacion->aula_id }}</td>
											<td>{{ $programacion->inscripcion_id }}</td>
                                            <td>
                                                <form action="{{ route('programacions.destroy',$programacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('programacions.show',$programacion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('programacions.edit',$programacion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
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

