@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Telefonos')

@section('content_header')
    <h1 class="text-center text-primary">Telefonos</h1>
@stop

@section('content')
{{--dd($persona)--}}
    <div class="card">
        <div class="card-header bg-primary">
            <span class="text-center">FORMULARIO CREAR TELEFONOS</span>
        </div>
        <div class="card-body">
            <form action="{{route('persona.storeContacto',$persona)}}" method="post">
                // puede que la ruta post no reciba parametros
            @csrf
                @include('telefono.form')
                @include('include.botones')
            </form>
        </div>
    </div>

    <table id="telefonos" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-primary">
        
            <th>#</th>
            <th>CONTACTO</th>
            <th>PARENTESCO</th>
            <th>NUMERO</th>
            <th width="120px">Opciones</th>
        </thead>
        <tbody>
            @foreach ($telefonos as $telefono)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                    <a  href="https://api.whatsapp.com/send?phone={{$telefono->numero}}" target="_blank"> <a href="tel:{{$telefono->numero}}">{{$telefono->numero}}</a>  <i class="fab fa-whatsapp"></i>  </a>    
                    </td>
                    <td>
                        {{$telefono->detalle}}
                        
                    </td>
                    <td>{{$telefono->created_at}}</td>

                    <td>
                        <a href="{{route('telefono_editar', $telefono->id)}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este número">
                            <i class="fa fa-fw fa-edit text-primary"></i>
                        </a>
                        {{--@can('telofemdspresa_eliminar')--}}
                            <form action="{{route('telefono_eliminar',['id' =>$telefono->id,'persona_id'=>$persona->id])}}" id="form{{$telefono->id}}" class="d-inline formulario" method="POST">
                                @csrf
                                @method("delete")
                                <button name="btn-eliminar" id="{{$telefono->id}}" type="submit" class="btn eliminar" title="Eliminar este Número">
                                    <i class="fa fa-fw fa-trash text-danger"></i>   
                                </button>

                            </form> 
                                <a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?phone={{$telefono->prefijo.$telefono->numero}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        {{--@endcan--}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        $(document).ready(function() {
            var tabla=$('#telefonos').DataTable(
                { 
                    "language":"url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                }
            );

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
                            url: 'eliminar/telefono/'+id,
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
                                            title: 'Custom animation with Animate.css',
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