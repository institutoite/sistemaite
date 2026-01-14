@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/starrr.css')}}">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
@stop

@section('title', 'Estudiantes')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)




@section('content')
    {{ Breadcrumbs::render('home') }}
    
    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-primary">
                Lista de Estudiantes x<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('personas.create')}}">Crear Estudiante</a>
            </div>
            
            <div class="card-body">
                <table id="personas" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOP</th>
                            <th>APELLIDOM</th>
                            <th>FOTO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div id="imaginario">

        </div>
        
        
        <div class="modal fade" id="modal_estados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">RECORDAR QUE VIENEN HOYx </h5>
                        <a href="{{ route('informar.por.estado.General') }}" class="btn btn-primary text-white">¡Informar estado! </a>
                        <a href="{{ route('crm.esperanuevo.view') }}" class="btn btn-primary text-white">{{ Auth::user()->name }}, ¡Hazlo ya! </a>
                    </div>
                    <div class="modal-body">
                        @if(count($nuevos)>0)
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>INTERES</th>
                                        <th>FOTO</th>
                                        <th>HORAINI</th>
                                        <th>FIN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nuevos as $itenauta)
                                        @php
                                        switch ($itenauta->estado) {
                                            case estado("PRESENTE"):
                                                $clase="table-success text-success";
                                                break;
                                            case estado("FINALIZADO"):
                                                $clase="bg-success text-white";
                                                break;
                                            case estado("INDEFINIDO"):
                                                $clase="bg-warning text-white";
                                                break;
                                            case estado("LICENCIA"):
                                                $clase="bg-info text-white";
                                                break;
                                            case estado("FALTA"):
                                                $clase="bg-danger text-white";
                                                break;
                                            
                                            default:
                                                $clase="";
                                                break;
                                        }
                                        @endphp
                                        <tr id="{{ $itenauta->id }}" class="{{ $clase }}">
                                            <td>{{ $itenauta->id }}</td>
                                            <td>{{ $itenauta->nombre.' '.$itenauta->apellidop.' '.$itenauta->apellidom }}</td>
                                                <td>
                                                        <div style="position:relative; display:inline-block;">
                                                            <img class="zoomify" src="{{ route('foto.show', ['filename' => $itenauta->foto ?: 'sinfoto.jpg']) }}" alt="{{$itenauta->nombre.' '.$itenauta->apellidop}}" width="50">
                                                            <span style="position:absolute;top:0;left:0;width:100%;height:100%;color:red;font-size:2em;font-weight:bold;display:flex;align-items:center;justify-content:center;pointer-events:none;">&#10006;</span>
                                                        </div>
                                                </td>
                                            <td>{{ $itenauta->hora_ini }}</td>
                                            <td>{{ $itenauta->hora_fin }}</td>
                                            <td >{{ App\Models\Estado::findOrFail($itenauta->estado)->estado}}</td>
                                            <td> 
                                                @if($itenauta->estado==estado("INDEFINIDO"))
                                                    <a href="{{route('clases.marcado.general',$itenauta->inscripcion_id)}}"><i class="fas fa-calendar-check fa-spin"></i></a>
                                                    <a class="btn-accion-tabla tooltipsC mr-1 enviarmensaje" title="Cobrar por mensaje">
                                                        &nbsp;<i class="fab fa-whatsapp"></i>
                                                    </a>
                                                @else
                                                    <i class="fas fa-check-double"></i>
                                                @endif
                                            </td>     
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <hr>
                        @if(count($matriculaciones)>0)
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>MATERIA</th>
                                        <th>FOTO</th>
                                        <th>HORAINI</th>
                                        <th>HORAFIN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriculaciones as $matriculacion)
                                        @php
                                        switch ($matriculacion->estado) {
                                            case estado("PRESENTE"):
                                                $clase="table-success text-success";
                                                break;
                                            case estado("FINALIZADO"):
                                                $clase="bg-success text-white";
                                                break;
                                            case estado("INDEFINIDO"):
                                                $clase="bg-warning text-white";
                                                break;
                                            case estado("LICENCIA"):
                                                $clase="bg-info text-white";
                                                break;
                                            case estado("FALTA"):
                                                $clase="bg-danger text-white";
                                                break;
                                            
                                            default:
                                                $clase="";
                                                break;
                                        }
                                        @endphp
                                        <tr id="{{ $matriculacion->id }}" class="{{ $clase }}">
                                            <td>{{ $matriculacion->id }}</td>
                                            <td>{{ $matriculacion->nombre.' '.$matriculacion->apellidop.' '.$matriculacion->apellidom }}</td>
                                                <td>
                                                    <div style="position:relative; display:inline-block;">
                                                        <img class="zoomify" src="{{ route('foto.show', ['filename' => (!empty($matriculacion->foto) ? (Str::startsWith($matriculacion->foto, 'estudiantes/') ? $matriculacion->foto : 'estudiantes/'.$matriculacion->foto) : 'estudiantes/sinfoto.jpg')]) }}" alt="{{$matriculacion->nombre.' '.$matriculacion->apellidop}}" width="50" style="@if(empty($matriculacion->foto)) border:2px solid red; @endif">
                                                    </div>
                                                </td>
                                            <td>{{ $matriculacion->horaini }}</td>
                                            <td>{{ $matriculacion->horafin }}</td>
                                            <td >{{ App\Models\Estado::findOrFail($matriculacion->estado)->estado}}</td>
                                            <td>
                                                @if($matriculacion->estado==estado("INDEFINIDO"))
                                                    <a href="{{route('clases.marcadocom.general',$matriculacion->matriculacion_id)}}"><i class="fas fa-laptop fa-pulse"></i></a>
                                                    <a class="btn-accion-tabla tooltipsC mr-1 enviarmensaje" title="Cobrar por mensaje">
                                                        &nbsp;<i class="fab fa-whatsapp"></i>
                                                    </a>
                                                @else
                                                    <i class="fa-solid fa-computer-mouse fa-spin"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <hr>
                        <h3>Reinscripciones para hoy</h3>
                        @if(count($reinscripciones)>0)
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>INTERES</th>
                                        <th>FOTO</th>
                                        <th>VIENE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reinscripciones as $reinscripcion)
                                        <tr>
                                            <td>{{ $reinscripcion->id }}</td>
                                            <td>{{ $reinscripcion->nombre.' '.$reinscripcion->apellidop.' '.$reinscripcion->apellidom }}</td>
                                            <td></td>
                                                <td>
                                                    <div style="position:relative; display:inline-block;">
                                                        <img class="" src="{{ route('foto.show', ['filename' => $reinscripcion->foto ?: 'sinfoto.jpg']) }}" alt="{{$reinscripcion->nombre.' '.$reinscripcion->apellidop}}" width="50" style="@if(empty($reinscripcion->foto)) border:2px solid red; @endif">
                                                        <span style="position:absolute;top:0;left:0;width:100%;height:100%;color:red;font-size:2em;font-weight:bold;display:flex;align-items:center;justify-content:center;pointer-events:none;">&#10006;</span>
                                                    </div>
                                                </td>
                                            <td>{{ $reinscripcion->vuelvefecha }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <hr>
                        @if(count($rematriculaciones)>0)
                            <h3>Rematriculaciones para hoy</h3>
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE COMPLETO</th>
                                        <th>INTERES</th>
                                        <th>FOTO</th>
                                        <th>VIENE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rematriculaciones as $rematriculacion)
                                        <tr>
                                            <td>{{ $rematriculacion->id }}</td>
                                            <td>{{ $rematriculacion->nombre.' '.$rematriculacion->apellidop.' '.$rematriculacion->apellidom }}</td>
                                            <td></td>
                                            <td>
                                                <div style="position:relative; display:inline-block;">
                                                    <img class="" src="{{ route('foto.show', ['filename' => $rematriculacion->foto ?: 'sinfoto.jpg']) }}" alt="{{$rematriculacion->nombre.' '.$rematriculacion->apellidop}}" width="50" style="@if(empty($rematriculacion->foto)) border:2px solid red; @endif">
                                                    <span style="position:absolute;top:0;left:0;width:100%;height:100%;color:red;font-size:2em;font-weight:bold;display:flex;align-items:center;justify-content:center;pointer-events:none;">&#10006;</span>
                                                </div>
                                            </td>
                                            <td> <img class="" src="{{ route('foto.show', ['filename' => $rematriculacion->foto ?: 'sinfoto.jpg']) }}" alt="{{$rematriculacion->nombre.' '.$rematriculacion->apellidop}}" width="50">  </td>
                                            <td>{{ $rematriculacion->vuelvefecha }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @include('observacion.modalcreate')
        @include('telefono.modales')
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script src="https://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('dist/js/starrr.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fas/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/es.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/informar.js')}}"></script>

    <script>
        
            let  cantidadEsperados= "<?php echo count($rematriculaciones)+count($reinscripciones)+count($nuevos); ?>";

        $(document).ready(function(){
            // let html="<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal_estados'>Launch demox modal </button>";
            // $("#imaginario").append(html);
            function cerrarModal() {
                // Cerrar el modal
                var modal = document.getElementById("modal_estados");
                modal.style.display = "none";
                window.location.href = "espera/nuevo/view";
            }
            if(cantidadEsperados>0)
                $('#modal_estados').modal('show');
        
            $("#cerrarmodal").on("click", function(){
                if($('body').hasClass('modal-open')){
                    $('#modal_estados').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                }
            });
            $(".modal").on("hidden.bs.modal", function() {
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            });
        });
    </script>
    
    {{-- telefono modales --}}
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    {{-- js --}}
    <script type="text/javascript" src="{{asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="{{asset('assets/js/enviarmensaje/mostrarcontactos.js')}}"></script>
    <script src="{{asset('vistas/persona/estudiantes.js')}}"></script>
@stop