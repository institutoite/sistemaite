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

@section('title', 'Matriculación Crear')

@section('content')
 
    <section class="content container-fluid">
        <div class="row">
            {{ Breadcrumbs::render('matriculacion.configuracion', $computacion,$carrera,$computacion->persona,$matriculacion) }}
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Configurar Matriculación</span>
                        <div class="card-tools" id="divfuera">
                            <button id="botonplus" class="btn btn-primary d-none" type="button">Agregar Sesiones<i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('matriculacion.form_configurar')
                            <form method="POST" id="formulario" action="{{ route('matriculacion.guardar.configuracion')}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                <div class="card">
                                    <div id="titulosesion" class="card-header bg-warning">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div id="sesiones" class="p-3">
                                            
                                        </div>
                                        <input class="form-control" type="number" name="matriculacion_id" hidden value="{{$matriculacion->id}}">
                                        <div class="card-tools text-lg-center">
                                            <input id="boton-aceptar" class="btn btn-primary p-2 pl-5  d-none pr-5" type="submit" value="Guardar Cambios">
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($programacioncom)
        @if (count($programacion)>0)
            @include('programacion.registros')    
        @endif
    @endisset
     <div class="container-fluid h-100 mt-3"> 
        <div class="row w-100 align-items-center">
            <div class="col text-center">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('reservar.matriculacion',$matriculacion->id )}}">
                            <button type="button" class="btn text-warning btn-outline-danger btn-lg" data-bs-toggle="tooltip" data-bs-placement="left" title="Click aqui si solo va reservar sin pagar: solo si no trajo dinero el Supercliente">
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
    
    

    <script>
        $(document).ready(function() {
            let cantida_sesiones = 0;
            const sesionesAuto = 5;

            function refrescarColoresSesiones() {
                $("#sesiones .sesion-row").each(function(index) {
                    var color = index % 2 === 0 ? 'rgb(38,186,165)' : 'rgb(55,95,122)';
                    $(this).css('background-color', color);
                });
            }

            function actualizarTitulo() {
                $("#titulosesion").html("<h4>Tine: " + cantida_sesiones + " sesiones por semana para esta Matriculación</h4>");
            }

            function actualizarInfoMododocente() {
                var $opt = $("#docente option:selected");
                var modo = $opt.data('mododocente') || '';
                var texto = modo ? ('Modo docente: ' + modo) : '';
                $("#mododocente-info").text(texto);
            }

            function actualizarSesionesDesdeMaestro() {
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
                var dias = [];
                $("#dia option").each(function() {
                    var valor = $(this).val();
                    if (valor) {
                        dias.push(valor);
                    }
                });
                dias = dias.slice(0, 5);
                $(".sesion-dia").each(function(index) {
                    $(this).val(dias[index] || dias[0]);
                });
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
                        var modo = docente.mododocente || '';
                        opciones += "<option value='" + docente.id + "' data-mododocente='" + modo + "'>" + docente.nombre + "</option>";
                    });
                }

                var docenteActual = $("#docente").val();
                $("#docente").html(opciones);
                if (docenteActual && $("#docente").find("option[value='" + docenteActual + "']").length) {
                    $("#docente").val(docenteActual);
                } else if (docentes.length > 0) {
                    $("#docente").val(docentes[0].id);
                }
                actualizarInfoMododocente();
            }

            function actualizarSelectDocentesFila($select, docentes) {
                var opciones = '';
                if (docentes.length === 0) {
                    opciones = "<option value=''>Sin docentes disponibles</option>";
                } else {
                    opciones = "<option value=''>Seleccione docente</option>";
                    docentes.forEach(function(docente) {
                        opciones += "<option value='" + docente.id + "'>" + docente.nombre + "</option>";
                    });
                }

                var actual = $select.val();
                $select.html(opciones);
                var docenteMaestro = $("#docente").val();
                if (docenteMaestro && $select.find("option[value='" + docenteMaestro + "']").length) {
                    $select.val(docenteMaestro);
                } else if (actual) {
                    $select.val(actual);
                } else if (docentes.length > 0) {
                    $select.val(docentes[0].id);
                }
            }

            function cargarDocentesPorTurno() {
                var valor = $("#horario").val();
                var dias = obtenerDiasSesion();

                if (!valor || dias.length === 0) {
                    return;
                }

                var partes = valor.split('|');
                $.getJSON('/api/docentes/turnos', {
                    dias: dias.join(','),
                    hora_inicio: partes[0],
                    hora_fin: partes[1],
                    mododocente: 'COMPUTACION'
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

                if (!horaInicio || !horaFin) {
                    var valor = $("#horario").val();
                    if (!valor) {
                        return;
                    }
                    var partes = valor.split('|');
                    horaInicio = partes[0];
                    horaFin = partes[1];
                }

                if (!dia || !horaInicio || !horaFin) {
                    actualizarSelectDocentesFila($select, []);
                    return;
                }

                $.getJSON('/api/docentes/turnos', {
                    dias: dia,
                    hora_inicio: horaInicio,
                    hora_fin: horaFin,
                    mododocente: 'COMPUTACION'
                }).done(function(response) {
                    actualizarSelectDocentesFila($select, response || []);
                }).fail(function() {
                    actualizarSelectDocentesFila($select, []);
                });
            }

            function crearSesion() {
                var $html = "<div class='row mb-2 sesion-row'>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-dia' name='dias[]'>" + $("#dia").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm'>";
                $html += "<select class='form-control sesion-docente' name='docentes[]'>" + $("#docente").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<select class='form-control sesion-aula' name='aulas[]'>" + $("#aula").html() + "</select></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<input type='time' class='form-control sesion-horainicio' name='horainicio[]'></div>";
                $html += "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>";
                $html += "<input type='time' class='form-control sesion-horafin' name='horafin[]'></div>";
                $html += "<button type='button' class='btn btn-sm quitar-sesion' title='Eliminar sesion'>x</button>";
                $html += "</div>";

                $("#sesiones").append($html);
                cantida_sesiones += 1;
                actualizarTitulo();
                refrescarColoresSesiones();
                actualizarSesionesDesdeMaestro();
                syncDiasDesdeMaestro();
            }

            for (var i = 0; i < sesionesAuto; i++) {
                crearSesion();
            }

            actualizarInfoMododocente();

            if (cantida_sesiones > 0) {
                $("#boton-aceptar").removeClass('d-none');
                $("#titulosesion").removeClass('bg-warning').addClass('bg-success');
                $("#botonplus").removeClass('d-none');
            }

            $(".sesion-dia").each(function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
            });

            $('#horario, #aula').on('change', function() {
                actualizarSesionesDesdeMaestro();
                cargarDocentesPorTurno();
                $(".sesion-dia").each(function() {
                    cargarDocentesPorTurnoFila($(this).closest('.row'));
                });
            });

            $(document).on('change', '.sesion-dia', function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
                cargarDocentesPorTurno();
            });

            $(document).on('change', '.sesion-horainicio, .sesion-horafin', function() {
                cargarDocentesPorTurnoFila($(this).closest('.row'));
            });

            $('#docente').on('change', function() {
                actualizarInfoMododocente();
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

            $('#botonplus').on('click', function() {
                crearSesion();
                $("#boton-aceptar").removeClass('d-none');
                $("#titulosesion").removeClass('bg-warning').addClass('bg-success');
                var $ultima = $("#sesiones .row").last();
                cargarDocentesPorTurnoFila($ultima);
            });

            $(document).on('click', '.quitar-sesion', function() {
                $(this).closest('.row').remove();
                cantida_sesiones = Math.max(0, cantida_sesiones - 1);
                refrescarColoresSesiones();
                actualizarTitulo();
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
