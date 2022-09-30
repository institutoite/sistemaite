@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Telefonos')



@section('content')

    
        <div class="card">
            <div class="card-header">
                Telefonos <span class="text-secondary">{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}} </span>

                <div class="btn-group float-right" role="group" aria-label="Basic example">
                    @if ($persona->isEstudiante())
                        <button class="btn btn-check">
                            <a href="{{route('inscribir',$persona)}}" class="btn btn-outline-secondary float-right">Inscribir<i class="fas fa-user-edit"></i></a>
                        </button>
                        
                        <button class="btn btn-check">
                            <a class="btn float-right btn-outline-primary" href="{{route('opcion.principal',$persona->estudiante->id)}}">Menú<i class="fas fa-th-list"></i></i></a>
                        </button>
                        
                    @endif

                    <button class="btn btn-check">
                            <a href="{{route('telefonos.crear',$persona)}}" class="btn btn-outline-secondary float-right">Teléfono<i class="fas fa-mobile-alt"></i></a>
                        </button>
                    @if ($persona->isDocente())
                        <button class="btn btn-check">
                            <a class="btn" href="{{route('opcion.principal',$persona->id)}}"><i class="fas fa-th-list"></i></i></a>
                        </button>
                    @endif
                    @if ($persona->isAdministrativo())
                        <button class="btn btn-check">
                            <a class="btn float-right" href="{{route('opcion.administrativos',$persona->id)}}"><i class="fas fa-th-list"></i></i></a>
                        </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @include('telefono.listar')
            </div>
        </div>
    {{-- <a class="btn btn-outline-success float-right" href="{{route('opcion.principal',$persona)}}" target="_blank"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a> --}}
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
     
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
            $('#telefonos').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },
            });
 
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