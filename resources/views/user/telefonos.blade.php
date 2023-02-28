@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}"> --}}
@stop

@section('title', 'Telefonos User')

@section('content')

   

    <div class="card">
        <div class="card-header">
            <i class="fas fa-phone"></i><span class="text-secondary">{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}} </span>
            @if ($persona->isEstudiante())
                <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.principal',$persona->estudiante->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
            @endif
            @if ($persona->isDocente())
                <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.principal',$persona->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
            @endif
            @if ($persona->isAdministrativo())
                <a class="btn btn-outline-success float-right mb-3 mr-3" href="{{route('opcion.administrativos',$persona->id)}}"><i class="fas fa-ellipsis-v"></i> Ir Opciones <i class="fas fa-th-list"></i></i></a>
            @endif
        </div>
        <div class="card-body">
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

                    <tr>
                        <td>1</td>
                            <td>
                                {{$persona->nombre.' '.$persona->apellidop}}
                            </td>
                            <td>
                                <a href="tel:{{$persona->telefono}}">{{$persona->telefono}}</a> 
                            </td>
                            <td>
                                PERSONAL
                            </td>
                            <td>{{$persona->updated_at}}</td>
                            <td>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone={{$persona->telefono}}&text={{'Le escribimos de ite para pasarle su credenciales del sistema %0A Usuario: *'.$user->email.'* %0A Contraseña: **'.$pass.'* '.'%0A'.' Desde la aplicación podrá ver la programación de su inscripción Ademas le recomendamos cambiar su contraseña y usuario para que sea mas seguro'}}" class="btn-accion-tabla tooltipsC mr-2" title="Compartir credenciales">
                                    <i class="fas fa-share-square fa-2x"></i>
                                </a> 
                            </td>
                    </tr>

                    @foreach ($apoderados as $apoderado)
                        <tr>
                            <td>{{$loop->iteration+1}}</td>
                            <td>
                                {{$apoderado->nombre.' '.$apoderado->apellidop.' '.$apoderado->apellidom}}
                            </td>
                            <td>
                                <a href="tel:{{$apoderado->telefono}}">{{$apoderado->telefono}}</a> 
                            </td>
                            <td>
                                {{$apoderado->pivot->parentesco}}
                            </td>
                            <td>{{$apoderado->updated_at}}</td>
                            <td>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone={{$apoderado->telefono}}&text={{'Le escribimos de ite para pasarle su credenciales del sistema %0A Usuario: *'.$user->email.'* %0A Contraseña: **'.$pass.'* '.'%0A'.' Desde la aplicación podrá ver la programación de su inscripción Ademas le recomendamos cambiar su contraseña y usuario para que sea mas seguro'}}" class="btn-accion-tabla tooltipsC mr-2" title="Compartir credenciales">
                                    <i class="fas fa-share-square fa-2x"></i>
                                </a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
            });
        } );
    </script>
@stop