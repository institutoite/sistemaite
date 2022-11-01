@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Detalle pagos')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('content')
{{-- {{ dd($tipo) }} --}}
    <section class="content container-fluid pt-3">
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card card-default">
                        <div class="card-header bg-secondary">
                            Estudiante:{{$matriculacion->computacion->persona->nombre}}
                        </div>

                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                
                            </div>
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
                                            <td>
                                                {{ $pago->usuarios->first()->name}}
                                            </td>
                                            <td>{{ $pago->created_at }}</td>
                                            <td>
                                                {{-- {{route('pagos.editar', $pago)}} --}}
                                                <a href="{{route('pagocom.editar',$pago->id)}}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar esta pago">
                                                    <i class="fa fa-fw fa-edit text-primary"></i>
                                                </a>

                                                <a href="" class="mostrar btn-accion-tabla tooltipsC mr-2" title="Ver este pago">
                                                    <i class="fa fa-fw fa-eye text-primary"></i>
                                                </a>

                                                <form action=""  class="d-inline formulario eliminar">
                                                    @csrf
                                                    @method("delete")
                                                    <button name="btn-eliminar" id="eliminar{{$pago->id}}"  type="submit" class="btn eliminar" title="Eliminar este pago">
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

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
    <script>
        $(document).ready(function(){
            
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
           //moment.locale(); 
        var tabla=$('#pagos').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   true,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "iDisplayLength" : 5,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
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
                        $("#tabla-pago").empty();
                        $("#tabla-cambio").empty();
                        $html="";
                        $html+="<tr><td>Monto</td>"+"<td>Bs. "+json.pago.monto+"</td></tr>";
                        $html+="<tr><td>Pago Con</td>"+"<td>Bs. "+json.pago.pagocon+"</td></tr>";
                        $html+="<tr><td>Cambio</td>"+"<td>Bs. "+json.pago.cambio+"</td></tr>";
                        $html+="<tr><td>Fecha y hora Pago</td>"+"<td>"+moment(json.pago.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>Ultima Actualizacion</td>"+"<td>"+moment(json.pago.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-modal").append($html);    
                        
                        $htmlBilletesPago="";
                        $htmlBilletesCambio="";
                        $sumaPago=0;
                        $sumaCambio=0;
                        for (let j in json.billetes) {
                            if(json.billetes[j].pivot.tipo=='pago'){
                                $htmlBilletesPago+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaPago+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                                
                            }else{
                                $htmlBilletesCambio+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaCambio+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                            }
                        }
                        $htmlBilletesPago+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;P&nbsp;&nbsp;A&nbsp;&nbsp;G&nbsp;&nbsp;O&nbsp;&nbsp; </td>"+"<td>Bs. "+$sumaPago+"</td></tr>";
                        $htmlBilletesCambio+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;A&nbsp;&nbsp;M&nbsp;&nbsp;B&nbsp;&nbsp;I&nbsp;&nbsp;O&nbsp;&nbsp;</td>"+"<td>Bs. "+$sumaCambio+"</td></tr>";
                        $("#tabla-pago").append($htmlBilletesPago);
                        $("#tabla-cambio").append($htmlBilletesCambio);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
/*%%%%%%%%%%%%%%%%%%%%%%%%%%% ELIMINAR PAGO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                let fila=$(this).closest('tr');
                let id=fila.attr('id');
                //console.log(id);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    type: 'info',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        console.log(id);
                        $.ajax({
                            url: '../../eliminar/pago/'+id,
                            type: 'DELETE',
                            data:{
                                _token:'{{csrf_token()}}'
                            },
                            success: function(result) {
                                fila.remove().draw;
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                })
                                Toast.fire({
                                type: 'success',
                                title: 'Signed in successfully'
                                })
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se completó esta operación por que este registro está relacionado con otros registros',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            type: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
            
            $('.close').on('click',function() {
                $('#modal-mostrar').close
            })

        });
    </script>    
@endsection