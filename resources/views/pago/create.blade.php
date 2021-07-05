@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Pais Crear')
@section('plugins.Jquery', true)
@section('plugins.SweetAlert2', true)
@section('plugins.Datatables', true)


@section('content')
{{-- {{ dd($tipo) }} --}}


    <section class="content container-fluid pt-3">
        <div class="row">
            <div class="col-md-7">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Crear Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pagos.guardar',['inscripcione'=>$inscripcion->id])}}">
                            @csrf
                            @include('pago.form')
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <table class="table table-bordered table-striped table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>Atributo</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Acuenta</strong></td>
                                    <td><strong>{{ $acuenta }} Bs.</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Saldo</strong></td>
                                    <td><strong>{{$saldo}} Bs.</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Costo Total</strong></td>
                                    <td><strong>{{$inscripcion->costo}} Bs.</strong></td>
                                </tr>
                            </tbody>
                        </table>
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
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nº</th>
                                    <th>Monto</th>
                                    <th>PagoCon</th>
                                    <th>Cambio</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                    <tr id="{{$pago->id}}">
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $pago->monto }}</td>
                                        <td>{{ $pago->pagocon }}</td>
                                        <td>{{ $pago->cambio }}</td>
                                        <td>{{ App\Models\User::find($pago->userable->user_id)->name }}</td>
                                        <td>{{ $pago->created_at }}</td>
                                        <td>
                                            <a href="{{route('pagos.editar', $pago)}}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar esta pago">
                                                <i class="fa fa-fw fa-edit text-primary"></i>
                                            </a>

                                            <a href="" class="mostrar btn-accion-tabla tooltipsC mr-2" title="Ver este pago">
                                                <i class="fa fa-fw fa-eye text-primary"></i>
                                            </a>

                                            <form action=""  class="d-inline formulario eliminar">
                                                @csrf
                                                @method("delete")
                                                <button name="btn-eliminar"  type="submit" class="btn eliminar" title="Eliminar este pago">
                                                    <i class="fa fa-fw fa-trash text-danger"></i>   
                                                </button>
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
    </section>
    @include('pago.modalmostrar')
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function(){
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#pagos').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   true,
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
/*%%%%%%%%%%%%%%%%%%%%%%%%% JS PARA CALCULAR EL CAMBIO AUTOMATICAMENTE %%%%%%%%%%%%%%%%%%%%%%*/
            $('#pagocon').change(function(){
                $('#cambio').val($(this).val()-$('#monto').val());
            });
            $('#monto').change(function(){
                $('#cambio').val($('#pagocon').val()-$('#monto').val());
            });
/*%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PAGO CON AJAX EN MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                var pago_id =$(this).closest('tr').attr('id');
                var fila=$(this).closest('tr');
                //console.log(pago_id);
                $.ajax({
                    url : "../../pago/mostrar/"+pago_id,
                    
                    success : function(json) {
                        //console.log(json);
                        $("#modal-mostrar").modal("show");
                        $("#tabla-modal").empty();

                        $html="";
                        $html+="<tr><td>Monto</td>"+"<td>"+json.pago.monto+"</td></tr>";
                        $html+="<tr><td>Pago Con</td>"+"<td>"+json.pago.pagocon+"</td></tr>";
                        $html+="<tr><td>Cambio</td>"+"<td>"+json.pago.cambio+"</td></tr>";
                        $html+="<tr><td>Fecha y hora Pago</td>"+"<td>"+moment(json.pago.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>Ultima Actualizacion</td>"+"<td>"+moment(json.pago.updated_at).format('LLLL')+"</td></tr>";
                        $html+="<tr ><td colspan='2'> B I L L E T E S</td></tr>";
                            cadenaBilletes="";
                            for (let j in json.billetes) {
                                console.log(json.billetes[j]);
                                $html+="<tr><td>Corte de: "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td></tr>";
                            }
                        // $html+="<tr><td>AULA</td>"+"<td>"+json.aula+"</td></tr>";
                        // $html+="<tr><td>MATERIA</td>"+"<td>"+json.materia+"</td></tr>";
                        // $html+="<tr><td>TEMA</td>"+"<td>"+json.tema+"</td></tr>";
                        // $html+="<tr><td>FOTO ESTUDIANTE</td>"+"<td>"+fila.find('td').eq(8).html()+"</td></tr>";

                        // $html+="<tr><td>FOTO DOCENTE</td>"+"<td><img class='zoom'  src="+"{{URL::to('/')}}/storage/"+json.foto+ " height='150'/></td></tr>";
                        // $html+="<tr><td>CREADO</td>"+"<td>"+json.created_at+"</td></tr>";
                        // $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.updated_at)+"</td></tr>";
                        $("#tabla-modal").append($html);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
/*%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN MOSTRAR MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        });
    </script>    
@endsection