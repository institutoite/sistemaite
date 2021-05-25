@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Telefonos')

@section('content_header')
    <h1 class="text-center text-primary">Telefonos <span class="text-secondary">{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}} </span> </h1>
@stop

@section('content')

    <a href="{{route('telefonos.crear',$persona)}}" class="btn btn-outline-secondary float-right">Crear <i class="fas fa-plus-circle "></i></a>
    <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.principal',$persona->id)}}" target="_blank"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
    <table id="telefonos" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
        <thead class="bg-primary">
        
            <th>#</th>
            <th>CONTACTO</th>
            <th>NUMERO</th>
            <th>PARENTESCO</th>
            <th>ACTUALIZADO</th>
            <th width="120px">Opciones</th>
        </thead>
        <tbody>
            
            @foreach ($apoderados as $apoderado)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$apoderado->nombre.' '.$apoderado->apellidop.' '.$apoderado->apellidom}}
                    </td>
                    <td>
                        <a href="tel:{{$apoderado->telefono}}">{{$apoderado->pivot->telefono}}</a> 
                    </td>
                    <td>
                        {{$apoderado->pivot->parentesco}}
                    </td>
                                    
                    <td>{{$apoderado->updated_at}}</td>

                    <td>
                        <a href="{{route('telefono.editar',['persona'=>$persona,'id'=>$apoderado->id])}}" class="btn-accion-tabla tooltipsC mr-2" title="Editar este número">
                            <i class="fa fa-fw fa-edit text-primary"></i>
                        </a> 
                    
                        <form action="{{route('telefono.eliminar',['persona'=>$persona,'id'=>$apoderado->id])}}"  class="d-inline formulario" method="POST">
                            @csrf
                            @method("delete")
                            <button name="btn-eliminar" type="submit" class="btn eliminar" title="Eliminar este Número">
                                <i class="fa fa-fw fa-trash text-danger"></i>   
                            </button>
                        </form> 
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
    <a class="btn btn-outline-success float-right" href="{{route('opcion.principal',$persona->id)}}" target="_blank"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
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
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
        } );
    </script>
@stop