@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Mis Inscripciones')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary" >
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscripciones de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('inscribir',$persona) }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Inscribir') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionesVigentes" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Objetivo</th>
                                        <th>acuenta</th>
                                        <th>costo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscripcionesVigentes as $inscripcion)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $inscripcion->objetivo }}</td>
                                            <td>{{ $inscripcion->acuenta }}</td>
                                            <td>{{ $inscripcion->costo }}</td>
                                            <th>
                                                <a href="{{route('inscripciones.edit', $inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta inscripcione">
                                                    <i class="fa fa-fw fa-edit text-primary"></i>
                                                </a>
                                                <a href="{{route('pagos.crear',$inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta inscripcione">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </a>

                                                <a href="{{route('inscripciones.show', $inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripcione">
                                                    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
                                                </a>
                                                <a href="{{route('imprimir.programa',$inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripcione">
                                                    <i class="fas fa-print"></i>
                                                </a>

                                                <form action=""  class="d-inline formulario">
                                                    @csrf
                                                    @method("delete")
                                                    <button name="btn-eliminar" id="" type="submit" class="btn eliminar" title="Eliminar esta inscripcione">
                                                        <i class="fa fa-fw fa-trash text-danger"></i>   
                                                    </button>
                                                </form> 
                                                
                                                <a href="{{route('clases.marcado.general',$inscripcion->id)}}" class="" title="Ver esta inscripcione">
                                                    <i class="far fa-calendar-check"></i>
                                                </a>


                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionesOtras" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Objetivo</th>
                                        <th>acuenta</th>
                                        <th>costo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscripcionesOtras as $inscripcion)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $inscripcion->objetivo }}</td>
                                            <td>{{ $inscripcion->acuenta }}</td>
                                            <td>{{ $inscripcion->costo }}</td>
                                            <th>
                                                
                                                <a href="{{route('pagos.crear',$inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Editar esta inscripcione">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </a>

                                                <a href="{{route('inscripciones.show', $inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripcione">
                                                    <i class="fa fa-fw fa-eye text-secondary mostrar"></i>
                                                </a>
                                                <a href="{{route('imprimir.programa',$inscripcion->id)}}" class="btn-accion-tabla tooltipsC mr-1" title="Ver esta inscripcione">
                                                    <i class="fas fa-print"></i>
                                                </a>

                                                <a href="{{route('clases.marcado.general',$inscripcion->id)}}" class="" title="Ver esta inscripcione">
                                                    <i class="far fa-calendar-check"></i>
                                                </a>

                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
@endsection
@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    
    <script>
        
    $(document).ready(function() {

            $('#inscripcionesVigentes').dataTable(
                {
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "info":     false,  
                }
            );
            $('#inscripcionesOtras').dataTable({
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                "info":     false,  
            });
            

            $('table').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: 'eliminar/inscripcion/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                tabla.ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se pudo eliminar el registro Codigo error:500',
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
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
        } );
    </script>
@stop