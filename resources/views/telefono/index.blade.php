@extends('adminlte::page')

@section('css')
@stop

@section('title', 'Telefonos')

@section('content_header')
    <h1 class="text-center text-primary">Telefonos <span class="text-secondary">{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}} </span> </h1>
@stop

@section('content')

    @if ($persona->isEstudiante())
        {{-- {{dd($persona->estudiante->id)}} --}}
        <a href="{{route('inscribir',$persona)}}" class="btn btn-outline-secondary float-right">Inscribir <i class="fas fa-plus-circle "></i></a>
        <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.principal',$persona->estudiante->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
    @endif

    <a href="{{route('telefonos.crear',$persona)}}" class="btn btn-outline-secondary float-right">Crear Teléfono <i class="fas fa-plus-circle "></i></a>
    @if ($persona->isDocente())
        <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.principal',$persona->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
    @endif
    @if ($persona->isAdministrativo())
        <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.administrativos',$persona->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
    @endif
    
    @include('telefono.listar')
    {{-- <a class="btn btn-outline-success float-right" href="{{route('opcion.principal',$persona)}}" target="_blank"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a> --}}
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    
    @if (session('mensaje')=='Contacto Creado Corectamente')
        <script>
            Swal.fire({
                position: 'top-start',
                type: 'success',
                title: 'Contacto Guardado Correctamente',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        
    @endif
    <script>
        $(document).ready(function() {
           
            $('table').on('click','.eliminar',function (e) {
                
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    type: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        console.log($(this).parent().submit());
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
        } );
    </script>
@stop