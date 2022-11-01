@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Mis Inscripciones')

@section('plugins.Jquery',true)
@section('plugins.SweetAlert2',true)
@section('plugins.Datatables',true)


@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary" >
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscripciones VIGENTES de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('inscribir',$persona) }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                {{ __('Inscribir') }} <i class="fa fa-plus-circle text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionesVigentes" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
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
                                            <td>{!! $inscripcion->objetivo !!}</td>
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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card collapsed-card">
                    <div class="card-header bg-secondary">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i></button>
                        </div>
                        VER INSCRIPCIONES NO VIGENTES <span class="text-primary">  Para ver haga click en el ícono ------------------------------------> </span>
                    </div>
                        
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionesOtras" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
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
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card collapsed-card">
                    <div class="card-header bg-secondary">
                        TODAS LAS INSCRIPCIONES <span class="text-primary">  Para ver haga click en el ícono -----------------------------></span>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i></button>
                        </div>
                    </div>
                        
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionestodos" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>
                                        <th>Objetivo</th>
                                        <th>acuenta</th>
                                        <th>costo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscripciones as $inscripcion)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {!! $inscripcion->objetivo !!}
                                            </td>
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
        </div>
    </div>
@endsection
@section('js')

   
    
    <script>
        
    $(document).ready(function() {

            $('#inscripcionesVigentes').dataTable(
                {
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },
                    "info":     false,  
                }
            );
            $('#inscripcionesOtras').dataTable({
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },
                "info":     false,  
            });
            $('#inscripcionestodos').dataTable({
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
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
