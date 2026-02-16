@extends('adminlte::page')
@section('css')
    <style>
        .sesion-row {
            position: relative;
            padding: 0.25rem 2.5rem 0.25rem 0.25rem;
            border-radius: 4px;
        }
        .quitar-sesion {
            position: absolute;
            right: 0.5rem;
            top: 0.5rem;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            padding: 0;
            line-height: 22px;
            text-align: center;
            opacity: 0.4;
            background-color: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.6);
            color: #dc3545;
        }
        .quitar-sesion:hover {
            opacity: 1;
            background-color: rgba(220, 53, 69, 1);
            border-color: rgba(220, 53, 69, 1);
            color: #ffffff;
        }
    </style>
@stop

@section('title', 'Inscripcion Crear')

@section('content')
 
    <section class="content container-fluid">
            {{ Breadcrumbs::render('inscripcion.configuracion',$inscripcion->estudiante,$inscripcion->estudiante->persona, $inscripcion) }}

        <div class="row">
            
            @isset($datos)
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Atribubuto</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>HORA INICIO</td><td>{{$datos['horainicio']}}</td></tr>
                    <tr><td>HORA FIN</td><td>{{$datos['horafin']}}</td></tr>
                    <tr><td>HORAS X DIA</td><td>{{$datos['totalhoras']}}</td></tr>
                    <tr><td>TOTAL HORAS</td><td>{{$datos['horas_total']}}</td></tr>
                    <tr><td>COSTO</td><td>{{$datos['costo']}}</td></tr>
                </tbody>
            </table>
            @endisset
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <div class="alert alert-info mb-0">
                    Modalidad: {{ $inscripcion->modalidad->modalidad ?? 'SIN MODALIDAD' }} | Normalizada: {{ $modalidadNormalizada ?? '' }} | Sesiones: {{ $sesionesAuto ?? '' }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('opcion.principal', $inscripcion->estudiante->id)}}" class="btn text-primary btn-outline-primary tooltipsC mr-2" title="No realizar ninguna modificacion en los clases">
                    Conservar clases sin modificar &nbsp;<i class="fas fa-bars"></i>
                </a>
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                         {{-- <a href="{{route('opcion.principal', $inscripcion->estudiante->id)}}" class="btn btn-primary text-white tooltipsC mr-2" title="ir a opciones de la persona">
                            Conservar clases sin modificar &nbsp;<i class="fas fa-bars"></i>
                        </a> --}}
                        <div class="card-tools" id="divfuera">
                            <button id="botonplus" class="btn btn-primary" type="button">Agregar Sesion &nbsp;<i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                   
                    

                    <div class="card-body">
                        @include('inscripcione.form_configurar')
                        @if ($tipo=='actualizando')
                            <form method="POST" id="formulario" action="{{ route('inscripcion.actualizar.configuracion')}}"  role="form" enctype="multipart/form-data">       
                                @csrf 
                                <div class="row">
                                    <div class="col-12">
                                        @if($errors->has('radioconfig'))
                                            <span class="text-danger"> {{ $errors->first('radioconfig')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radioconfig" id="radiodesde" value="radiodesde">
                                            <label class="form-check-label text-gray" for="radiodesde">Modificar desde la fecha (de aqui en adelante)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radioconfig" id="radiotodo" value="radiotodo">
                                            <label class="form-check-label text-gray" for="radiotodo">Cambiar Fecha Inicio (Todo)</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        @if($errors->has('fecha'))
                                            <span class="text-danger"> {{ $errors->first('fecha')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <input id="fecha" class="form-control border-warning mb-3" name="fecha" value="{{$inscripcion->fechaini->format('Y-m-d')}}" type="date">
                                        <p id="mensajefecha" class="d-none text-gray">La fecha no es necesaria ya que lo tomara de la inscripción, esta opcion edita todas las clases</p>
                                    </div>
                                    <input class="form-control" type="number" name="inscripcione_id" hidden value="{{$inscripcion->id}}">
                                </div>
                                
                                
                                <div id="sesiones">
                                    
                                </div>

                                
                                <div class="card-tools text-lg-center mt-4">                                                   
                                    <input id="boton-aceptar" class="btn btn-primary p-2 pl-5 pr-5 d-none" type="submit" value="Guardar Cambios">
                                </div>
                                
                            </form>
                        @endif
                        @if ($tipo=='guardando')
                       
                            <form method="POST" id="formulario" action="{{ route('inscripcion.guardar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                <div class="card">
                                    <div id="titulosesion" class="card-header bg-warning">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div id="sesiones" class="p-3">
                                            
                                        </div>
                                        <div class="container-fluid h-100 mt-3"> 
                                            <div class="row w-100 align-items-center">
                                                <div class="col text-center">
                                                    <input id="boton-aceptar" class="btn btn-primary p-2 pl-5  d-none pr-5" type="submit" value="Guardar Cambios">
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($programacion)
        @if (count($programacion)>0)
            @include('programacion.registros')    
        @endif
    @endisset
    
    <div class="container-fluid h-100 mt-3"> 
        <div class="row w-100 align-items-center">
            <div class="col text-center">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{route('reservar.inscripcion',$inscripcion->id )}}">
                            <button type="button" class="btn btn-danger text-white btn-lg" data-bs-toggle="tooltip" data-bs-placement="left" title="Click aqui si solo va reservar sin pagar: solo si no trajo dinero el Supercliente">
                                Solo reservar: Sin dinero <i class="fas fa-times-circle"></i>
                            </button>
                        </a> --}}
                        <a href="{{route('reservar.inscripcion',$inscripcion->id )}}">
                            <button type="button" class="btn text-warning btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Click aqui si solo va reservar sin pagar: solo si no trajo dinero el Supercliente">
                                Solo reservar: Sin dinero <i class="fas fa-times-circle"></i>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                        <img class="img-thumbnail rounded" src="{{asset('imagenes/sindinero.jpg')}}" width="200" alt="No traje dinero solo quiero reservar">
                        </div>
                    </div>
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
    
    @php
        $modalidadTexto = strtoupper($inscripcion->modalidad->modalidad ?? '');
        $modalidadNormalizada = preg_replace('/[^A-Z0-9]/', '', $modalidadTexto);
        $sesionesAuto = 1;
        if (\Illuminate\Support\Str::contains($modalidadNormalizada, '3VECES')) {
            $sesionesAuto = 3;
        } elseif (\Illuminate\Support\Str::contains($modalidadNormalizada, 'LUVI')) {
            $sesionesAuto = 5;
        }
    @endphp

    <script>
        if (window.bootstrap && bootstrap.Tooltip) {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
        $(document).ready(function() {
            
            // let cantida_sesiones=0;

            // $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta inscripción</h4>");

            // $('#horainicio').blur(function() {
            //     if(($('#horainicio').val()=='')||(($('#horafin').val()<=$('#horainicio').val()))){
            //         $('#horainicio').addClass('is-invalid');
            //         $('#botonplus').hide();
            //     }else{
            //         $(this).addClass('is-valid');
            //         $(this).removeClass('is-invalid');
            //     }    
            // });
            // $('#horafin').blur(function() {
            //     if(($('#horafin').val()=='')||($('#horafin').val()<=$('#horainicio').val())){
            //         $('#horafin').addClass('is-invalid');
            //         $('#horainicio').addClass('is-invalid');
            //         $('#botonplus').hide();
            //     }else{
            //         $(this).addClass('is-valid');
            //         $('#horainicio').blur();
            //         $("#botonplus").removeClass('d-none');
            //         $(this).removeClass('is-invalid');
            //         $('#botonplus').show(300);
                    
            //     }    
            // });

            let cantida_sesiones = 0;
            const sesionesAuto = {{ $sesionesAuto }};

            $("#titulosesion").html("<h4>Tine: " + sesionesAuto + " sesiones por semana para esta inscripción</h4>");

            $('#horario').on('change', function() {
                var valor = $(this).val();
                if (!valor) {
                    $('#horario').addClass('is-invalid');
                    $('.sesion-horainicio').val('');
                    $('.sesion-horafin').val('');
                } else {
                    $('#horario').removeClass('is-invalid').addClass('is-valid');
                }
                actualizarSesionesDesdeMaestro();
                cargarDocentesPorTurno();
                $('.sesion-dia').each(function() {
                    cargarDocentesPorTurnoFila($(this).closest('.row'));
                });
            });
            //console.log($('input[type=time]').size);

            $('input[type=radio][name=radioconfig]').on('change',function(){
                if ($("#radiotodo").is(':checked')){
                    $('#fecha').attr('readonly',true);
                    $("#mensajefecha").removeClass('d-none');
                }
                if ($("#radiodesde").is(':checked')){
                    $('#fecha').attr('readonly',false);
                    $("#mensajefecha").addClass('d-none');
                }
                
            });

            function refrescarColoresSesiones() {
                $("#sesiones .sesion-row").each(function(index) {
                    var color = index % 2 === 0 ? 'rgb(38,186,165)' : 'rgb(55,95,122)';
                    $(this).css('background-color', color);
                });
            }

            function crearSesion() {
                var $html = "<div class='row mb-2 sesion-row'>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-dia' name='dias[]'>" + $("#dia").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-materia' name='materias[]'>" + $("#materia").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-docente' name='docentes[]' data-bs-toggle='tooltip' title='Seleccione docente'>" + $("#docente").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-aula' name='aulas[]'>" + $("#aula").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<input type='time' class='form-control sesion-horainicio' name='horainicio[]'></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<input type='time' class='form-control sesion-horafin' name='horafin[]'></div>";
                $html += "<button type='button' class='btn btn-sm quitar-sesion' title='Eliminar sesion'>x</button>";
                $html += "</div>";

                $("#sesiones").append($html);
                refrescarColoresSesiones();
                actualizarSesionesDesdeMaestro();
                syncDiasDesdeMaestro();
            }

            function actualizarSesionesDesdeMaestro() {
                $(".sesion-materia").val($("#materia").val());
                $(".sesion-aula").val($("#aula").val());
                var valor = $("#horario").val();
                if (valor) {
                    var partes = valor.split('|');
                    $(".sesion-horainicio").val(partes[0]);
                    $(".sesion-horafin").val(partes[1]);
                } else {
                    $(".sesion-horainicio").val('');
                    $(".sesion-horafin").val('');
                }
            }

            function syncDiasDesdeMaestro() {
                if (sesionesAuto === 1) {
                    $(".sesion-dia").val($("#dia").val());
                    cargarDocentesPorTurno();
                    $('.sesion-dia').each(function() {
                        cargarDocentesPorTurnoFila($(this).closest('.row'));
                    });
                    return;
                }

                setDiasPorModalidad();
                cargarDocentesPorTurno();
                $('.sesion-dia').each(function() {
                    cargarDocentesPorTurnoFila($(this).closest('.row'));
                });
            }

            function setDiasPorModalidad() {
                if (sesionesAuto === 3) {
                    var usarMarJueSab = $('#usarMarJueSab').is(':checked');
                    var dias = usarMarJueSab ? [2, 4, 6] : [1, 3, 5];
                    $(".sesion-dia").each(function(index) {
                        $(this).val(dias[index] || dias[0]);
                    });
                }

                if (sesionesAuto === 5) {
                    var dias = [1, 2, 3, 4, 5];
                    $(".sesion-dia").each(function(index) {
                        $(this).val(dias[index] || dias[0]);
                    });
                }
            }

            function obtenerDiasSesion() {
                var dias = [];
                $(".sesion-dia").each(function() {
                    var valor = $(this).val();
                    if (valor) {
                        dias.push(valor);
                    }
                });

                return Array.from(new Set(dias));
            }

            function actualizarSelectDocentes(docentes) {
                var opciones = '';
                if (docentes.length === 0) {
                    opciones = "<option value=''>Sin docentes disponibles</option>";
                } else {
                    opciones = "<option value=''>Seleccione docente</option>";
                    docentes.forEach(function(docente) {
                        opciones += "<option value='" + docente.id + "'>" + docente.nombre + " (" + docente.cantidad + ")</option>";
                    });
                }

                var docenteActual = $("#docente").val();
                $("#docente").html(opciones);
                if (docenteActual) {
                    $("#docente").val(docenteActual);
                }
                actualizarTooltipSelect($("#docente"));
            }

            function actualizarSelectDocentesFila($select, docentes) {
                var opciones = '';
                if (docentes.length === 0) {
                    opciones = "<option value=''>Sin docentes disponibles</option>";
                } else {
                    opciones = "<option value=''>Seleccione docente</option>";
                    docentes.forEach(function(docente) {
                        opciones += "<option value='" + docente.id + "'>" + docente.nombre + " (" + docente.cantidad + ")</option>";
                    });
                }

                var actual = $select.val();
                $select.html(opciones);
                var docenteMaestro = $("#docente").val();
                if (docenteMaestro && $select.find("option[value='" + docenteMaestro + "']").length) {
                    $select.val(docenteMaestro);
                } else if (actual) {
                    $select.val(actual);
                }
                actualizarTooltipSelect($select);
            }

            function actualizarTooltipSelect($select) {
                var texto = $select.find('option:selected').text();
                $select.attr('title', texto || 'Seleccione docente');
                if (window.bootstrap && bootstrap.Tooltip) {
                    if (typeof bootstrap.Tooltip.getInstance === 'function') {
                        var tooltip = bootstrap.Tooltip.getInstance($select[0]);
                        if (tooltip) {
                            tooltip.dispose();
                        }
                        new bootstrap.Tooltip($select[0]);
                        return;
                    }
                }

                if (window.jQuery && $.fn.tooltip) {
                    $select.tooltip('dispose');
                    $select.tooltip();
                }
            }

            function cargarDocentesPorTurno() {
                var valor = $("#horario").val();
                if (!valor) {
                    actualizarSelectDocentes([]);
                    return;
                }

                var partes = valor.split('|');
                var dias = obtenerDiasSesion();
                if (dias.length === 0) {
                    actualizarSelectDocentes([]);
                    return;
                }

                $.getJSON('/api/docentes/turnos', {
                    dias: dias.join(','),
                    hora_inicio: partes[0],
                    hora_fin: partes[1]
                }).done(function(response) {
                    actualizarSelectDocentes(response || []);
                }).fail(function() {
                    actualizarSelectDocentes([]);
                });
            }

            function cargarDocentesPorTurnoFila($fila) {
                var $select = $fila.find('.sesion-docente');
                var dia = $fila.find('.sesion-dia').val();
                var horaInicio = $fila.find('.sesion-horainicio').val();
                var horaFin = $fila.find('.sesion-horafin').val();

                if (!dia) {
                    actualizarSelectDocentesFila($select, []);
                    return;
                }

                if (!horaInicio || !horaFin) {
                    var valor = $("#horario").val();
                    if (!valor) {
                        actualizarSelectDocentesFila($select, []);
                        return;
                    }
                    var partes = valor.split('|');
                    horaInicio = partes[0];
                    horaFin = partes[1];
                }

                $.getJSON('/api/docentes/turnos', {
                    dias: dia,
                    hora_inicio: horaInicio,
                    hora_fin: horaFin
                }).done(function(response) {
                    actualizarSelectDocentesFila($select, response || []);
                }).fail(function() {
                    actualizarSelectDocentesFila($select, []);
                });
            }

            for (var i = 0; i < sesionesAuto; i++) {
                crearSesion();
            }

            if (sesionesAuto === 3) {
                $("#titulosesion").append("<div class='form-check mt-2'>" +
                    "<input class='form-check-input' type='checkbox' id='usarMarJueSab'>" +
                    "<label class='form-check-label text-white ml-1' for='usarMarJueSab'>Cambiar a Martes, Jueves y Sabado</label>" +
                    "</div>");
                syncDiasDesdeMaestro();
            }

            if (sesionesAuto === 5) {
                syncDiasDesdeMaestro();
            }

            if (sesionesAuto > 0) {
                $("#boton-aceptar").removeClass('d-none');
                $("#titulosesion").removeClass('bg-warning').addClass('bg-success');
            }

            $(".sesion-dia").each(function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
            });

            $('#dia').on('change', function() {
                syncDiasDesdeMaestro();
            });

            $('#materia, #docente, #aula, #horario').on('change', function() {
                actualizarSesionesDesdeMaestro();
            });

            $(document).on('change', '.sesion-dia', function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
                cargarDocentesPorTurno();
            });

            $(document).on('change', '.sesion-horainicio, .sesion-horafin', function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
            });

            $('#docente').on('change', function() {
                var docenteMaestro = $(this).val();
                if (!docenteMaestro) {
                    return;
                }

                $(".sesion-docente").each(function() {
                    if ($(this).find("option[value='" + docenteMaestro + "']").length) {
                        $(this).val(docenteMaestro);
                    }
                });
            });

            $(document).on('change', '#usarMarJueSab', function() {
                syncDiasDesdeMaestro();
            });

            $('#botonplus').on('click', function() {
                crearSesion();
                cantida_sesiones += 1;
                $("#boton-aceptar").removeClass('d-none');
                $("#titulosesion").removeClass('bg-warning').addClass('bg-success');
                var $ultima = $("#sesiones .row").last();
                cargarDocentesPorTurnoFila($ultima);
                cargarDocentesPorTurno();
            });

            $(document).on('click', '.quitar-sesion', function() {
                $(this).closest('.row').remove();
                refrescarColoresSesiones();
                cantida_sesiones = Math.max(0, cantida_sesiones - 1);
                cargarDocentesPorTurno();
                if (cantida_sesiones === 0) {
                    $("#boton-aceptar").addClass('d-none');
                    $("#titulosesion").removeClass('bg-success').addClass('bg-warning');
                }
            });

                //** data-table
                $('#table-registros').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   false,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },  
            });

        });
    </script>
@endsection
