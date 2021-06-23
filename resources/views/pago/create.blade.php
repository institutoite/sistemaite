@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Pais Crear')
@section('plugins.Jquery', true)
@section('plugins.Datatables', true)


@section('content')
{{-- {{ dd($tipo) }} --}}


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.guardar',['inscripcione'=>$inscripcion->id])}}">
                            @csrf
                            @include('pago.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card card-default">
                    <div class="card-header">
                        PAGOS DE ESTA INSCRIPCION
                    </div>
                    <div class="card-body">
                        <table  id="pagos" class="table table-bordered table-striped table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>Nº</th>
                                    <th>Monto</th>
                                    <th>PagoCon</th>
                                    <th>Cambio</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $pago->monto }}</td>
                                        <td>{{ $pago->pagocon }}</td>
                                        <td>{{ $pago->cambio }}</td>
                                        <td>{{ $pago->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
@endsection

@section('js')
    <script>
        $(document).ready(function(){
                $('#pagos').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   false,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
            });

            $('#pagocon').change(function(){
                $('#cambio').val($(this).val()-$('#monto').val());
            });
            $('#monto').change(function(){
                $('#cambio').val($('#pagocon').val()-$('#monto').val());
            });

        });
    </script>    
@endsection
 {{-- monto pagocon cambio --}}