@extends('adminlte::page')

@section('title', 'listar Feriados')

@section('template_title')
    Feriados
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Materia') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('materias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Materia') }}
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
                                        <th>No</th>
										<th>Materia</th>
										<th>Opciones</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materias as $materia)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
											<td>{{ $materia->materia }}</td>
                                            <td>
                                                
                                                <form action="{{ route('feriados.destroy',$materia->id) }}" method="POST">
                                                    <a href="{{route('materias.gestionar.niveles',$materia->id)}}"><i class="fas fa-save"></i>Niveles</a>
                                                    <a class="btn" href="{{ route('materias.show',$materia->id) }}"><i class="fa fa-fw fa-eye text-success"></i></a>
                                                    <a class="btn" href="{{ route('materias.edit',$materia->id) }}"><i class="fa fa-fw fa-edit text-warning"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn"><i class="fa fa-fw fa-trash text-danger"></i></button>
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
