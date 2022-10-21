@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Intereses')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Licencia') }}
                            </span>

                            <div class="float-right">
                                
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
                                        
										<th>Motivo</th>
										<th>Solicitante</th>
										<th>Parentesco</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($licencias as $licencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $licencia->motivo }}</td>
											<td>{{ $licencia->solicitante }}</td>
											<td>{{ $licencia->parentesco }}</td>

                                            <td>
                                                    {{-- <a class="btn btn-sm btn-primary " href="{{ route('licencias.show',$licencia->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
                                                    {{-- <a class="btn btn-sm btn-success" href="{{ route('licencias.edit',$licencia->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a> --}}
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $licencias->links() !!}
            </div>
        </div>
    </div>
@endsection
