@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Motivos Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('content')

    {{ Breadcrumbs::render('gestion_create', $estudiante) }}

    <div class="card">
        @if ($gestion)
            <div class="card-header bg-primary">{{$gestion->nombre.'|'.$gestion->grado.'|'.$gestion->anio}}
                <a href="{{ route('gestion.index',$estudiante) }}" class="btn btn-secondary btn-sm float-right text-white"  data-placement="left">
                            {{ __('Listar Gestiones') }}
                        </a>
            </div>
        @else
            @php
                $persona=$estudiante->persona;
            @endphp
            <div class="card-header bg-primary">{{ $persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }} <strong>Aun no tiene Gestiones</strong>
                <a href="{{ route('gestion.index',$estudiante) }}" class="btn btn-secondary btn-sm float-right text-white"  data-placement="left">
                            {{ __('Listar Gestiones') }}
                        </a>
            </div>
        @endif
        
        <div class="card-body">
            <form method="POST" action="{{route('gestion.store')}}">
                @csrf
                <a href="https://seie.minedu.gob.bo/reportes/mapas_unidades_educativas">Buscar colegios nuevos</a>
                @include('gestion.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#colegio_id").select2({
                //dropdownParent: $("#modal-editar"),
                placeholder: "Seleccione un colegio",
                theme: "bootstrap-5",
                containerCssClass: "select2--large", // For Select2 v4.0
                selectionCssClass: "select2--large", // For Select2 v4.1
                dropdownCssClass: "select2--large",
            });
            
            $("#grado_id").select2({
                //dropdownParent: $("#modal-editar"),
                placeholder: "Seleccione un grado",
                theme: "bootstrap-5",
                containerCssClass: "select2--large", // For Select2 v4.0
                selectionCssClass: "select2--large", // For Select2 v4.1
                dropdownCssClass: "select2--large",
            });
            $("#anio").select2({
                //dropdownParent: $("#modal-editar"),
                placeholder: "Seleccione un anio",
                theme: "bootstrap-5",
                containerCssClass: "select2--large", // For Select2 v4.0
                selectionCssClass: "select2--large", // For Select2 v4.1
                dropdownCssClass: "select2--large",
            });

            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                //console.log($(this).parent().parent().attr('id'));
                let id_estudiante_grado=$(this).parent().parent().attr('id');
                $.ajax({

                        url : "../gestiones/editar",
                        data : { id :id_estudiante_grado },
                        success : function(json) {
                                console.log(json);
                            // $("#modal-editar").modal("show");
                            // $("#formulario-editar").empty();
                            //     $html="<div class='row'>";
                            //     $("#grado").val(json.grado.grado);
                            //     $("#grado_id").val(json.grado.id);
                            //     $htmlNiveles="";
                            //     for (let j in json.niveles) {
                            //         $htmlNiveles+="<option value='"+ json.niveles[j].id +"'>"+json.niveles[j].nivel+"</option>";
                            //     }
                            //     $("#nivel_id").append($htmlNiveles);    
                            //     $("#formulario-editar").append($html);
                        },
                        error : function(xhr, status) {
                            // Swal.fire({
                            // type: 'error',
                            // title: 'Ocurrio un Error',
                            // text: 'Saque una captura para mostrar al servicio Técnico!',
                            // })
                        },  
                    });
            });
        });
    </script>
@endsection
