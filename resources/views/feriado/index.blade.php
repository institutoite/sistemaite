@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

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
                                {{ __('Feriado') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('feriados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Feriado') }}
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
                                        
										<th>Fecha</th>
										<th>Festividad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feriados as $feriado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $feriado->fecha }}</td>
											<td>{{ $feriado->festividad }}</td>

                                            <td>
                                                <form action="{{ route('feriados.destroy',$feriado->id) }}" method="POST">
                                                    <a class="btn" href="{{ route('feriados.show',$feriado->id) }}"><i class="fa fa-fw fa-eye text-success"></i></a>
                                                    <a class="btn" href="{{ route('feriados.edit',$feriado->id) }}"><i class="fa fa-fw fa-edit text-warning"></i></a>
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
                {!! $feriados->links() !!}
            </div>
        </div>
    </div>
@endsection
