@extends('layouts.app')

@section('template_title')
    Feriado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Feriado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('feriados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                                    <a class="btn btn-sm btn-primary " href="{{ route('feriados.show',$feriado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('feriados.edit',$feriado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $feriados->links() !!}
            </div>
        </div>
    </div>
@endsection
