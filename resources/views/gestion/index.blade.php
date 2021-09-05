@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
   
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Motivos')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Select2',true)

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            {{-- {{dd($estudiante)}} --}}
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grados') }}
                            </span>

                            <div class="float-right">
                                {{-- {{dd($estudiante)}} --}}
                                <a href="{{ route('gestion.create',$estudiante) }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Create Gestión') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <table id="gestiones" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>COLEGIO</th>
                                    <th>GRADO</th>
                                    <th>GESTION</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gestiones as $gestion)
                                    <tr id="{{$gestion->id}}">
                                        <td>{{$gestion->nombre}} </td>
                                        <td>{{$gestion->grado}} </td>
                                        <td>{{$gestion->anio}} </td>
                                        <td>
                                            <a class="editar" href="">
                                                <i class="fa fa-fw fa-edit text-primary"></i>
                                            </a>
                                            <form action=""  class="d-inline formulario">
                                                @csrf
                                                @method("delete")
                                                <button name="btn-eliminar" id="{{$gestion->id}}" type="submit" class="btn eliminar" title="Eliminar este motivo">
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
        </div>
    </div>
    @include('gestion.modales')
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    
    {{-- %%%%%%%%%%%%%% muestra el ok de la insersion de datos %%%%%%%%%%%%%%%%% --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                })
                Toast.fire({
                type: 'success',
                title: 'Se Inserto correctamente el registro'
            })
            </script>
        </div>
    @endif


    <script>

         /*%%%%%%%%%%%%%%%%%%%%%%  funcion que agrega clase por tiempo x y luego lo destruye %%%%%%%%%%%*/
        ( function ( $ ) {
            'use strict';
            $.fn.addTempClass = function ( className, expire, callback ) {
                className || ( className = '' );
                expire || ( expire = 2000 );
                return this.each( function () {
                    $( this ).addClass( className ).delay( expire ).queue( function () {
                        $( this ).removeClass( className ).clearQueue();
                        callback && callback();
                    } );
                } );
            };
        } ( jQuery ) );

        $(document).ready(function() {
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            let fila=1;
            $('#gestiones').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "order": [[ 2, "desc" ]],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#gestiones').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                let id_grado =$(this).closest('tr').attr('id');
                //console.log(id_grado);
                $.ajax({
                    url : "grado/mostrar/",
                    data : { id :id_grado },
                    success : function(json) {
                        // console.log(json);
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar").empty();
                        $html="";
                        $html+="<tr><td>ID</td>"+"<td>"+ json.grado.id +"</td></tr>";
                        $html+="<tr><td>GRADO</td>"+"<td>"+json.grado.grado+"</td></tr>";
                        $html+="<tr><td>NIVEL</td>"+"<td>"+json.nivel.nivel+"</td></tr>";
                        $html+="<tr><td>CREADO POR </td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>CREADO </td>"+"<td>"+ moment(json.grado.created_at).format('LLLL') +"</td></tr>";
                        $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.grado.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-mostrar").append($html);
                    },
                    error : function(xhr, status) {

                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },
                });
            });
             /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO MOSTRAR EDITAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_gestion =$(this).closest('tr').attr('id');
                let estudiante_id="{{$estudiante->id}}";

                //console.log(estudiante_id);
                    //$("#error_motivo").empty();

                    $.ajax({
                    url : "../gestion/editar",
                    data : { id_gestion : id_gestion },
                    success : function(json) {
                        
                        $("#modal-editar").modal("show");
                            $htmlColegios="";
                            for (let j in json.colegios) {
                                if(json.colegios[j].id==json.gestion[0].colegio_id)
                                {
                                    $htmlColegios+="<option value='"+ json.colegios[j].id +"' selected>"+json.colegios[j].nombre+"</option>";
                                }
                                else{
                                    $htmlColegios+="<option value='"+ json.colegios[j].id +"'>"+json.colegios[j].nombre+"</option>";
                                }
                            }
                            $htmlGrados="";
                            for (let k in json.grados) {
                                if(json.grados[k].id==json.gestion[0].grado_id)
                                {
                                    $htmlGrados+="<option value='"+ json.grados[k].id +"' selected>"+json.grados[k].grado+"</option>";
                                }
                                else{
                                    $htmlGrados+="<option value='"+ json.grados[k].id +"'>"+json.grados[k].grado+"</option>";
                                }
                            }

                            $("#estudiante_id").val("{{$estudiante->id}}");
                            $("#gestion_id").val("{{$gestion->id}}");
                            $htmlAnios="";
                            inicio=json.gestion[0].anio-12;
                            fin=inicio+24;
                            for (var m=inicio; m<fin; m++) {
                                if(m==json.gestion[0].anio)
                                {
                                    $htmlAnios+="<option value='"+ m +"' selected>"+m+"</option>";
                                }
                                else{
                                    $htmlAnios+="<option value='"+ m +"'>"+m+"</option>";
                                }
                            }
                            $("#colegio_id").append($htmlColegios);    
                            $("#grado_id").append($htmlGrados);    
                            $("#anio").append($htmlAnios);    
                    },
                    error : function(xhr, status) {
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
            });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR ENVIO DE FORMULARIO PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $(document).on("submit","#formulario-editar-grado",function(e){
                e.preventDefault();//detenemos el envio
                $gestion_id=$('#gestion_id').val();
                $grado_id=$('#grado_id').val();
                $colegio_id=$('#colegio_id').val();
                $anio=$('#anio').val();
                $estudiante_id=$('#estudiante_id').val();
                var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "../gestion/actualizar",
                    type: 'get',
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                            grado_id:$grado_id,
                            colegio_id:$colegio_id,
                            token:token,
                            anio:$anio,
                            gestion_id:$gestion_id,
                            estudiante_id:$estudiante_id,
                        },
                    success : function(json) {
                        
                        if($.isEmptyObject(json.error)){
                            $("#message-error").addClass("d-none");
                            $("#modal-editar").modal("hide");
                            $('#grados').DataTable().ajax.reload();
                        }else{
                            $("#message-error").removeClass("d-none");
                            imprimeErrores(json);
                        }                        
                    },
                    error:function(jqXHR,estado,error){
                        
                    },
                });
            });

            function imprimeErrores(errores) {
                $htmlErrores="";
                for (let j in errores) {
                    for (let k in errores[j]) {
                        $htmlErrores+="<li>"+errores[j][k]+" x "+"</li>";
                    }
                }
                $("#error").append($htmlErrores);
                
                
            }
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('#gestiones').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                 var id_gestion =$(this).closest('tr').attr('id');
                 console.log(id_gestion);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    type: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#26baa5',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '../eliminar/gestion/'+id_gestion,
                            type: 'DELETE',
                            data:{
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                console.log(result);
                                $("#"+result.ok).closest('tr').remove();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                })
                                Toast.fire({
                                type: 'success',
                                title: 'Se eliminó correctamente el registro'
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

        });
    </script>

@endsection
