<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\MatriculacionController;
use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\PagocomController;
use App\Http\Controllers\ProgramacioncomController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\ClasecomController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TipomotivoController;
use App\Http\Controllers\DiaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MotivoController;
use App\Http\Controllers\ObservacionController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\InscripcioneController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PersonaReporteController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\TipofileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\FelicitadoController;
use App\Http\Controllers\ComputacionController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\MensajeadoController;
use App\Http\Controllers\MensajeableController;
use App\Http\Controllers\ComoController;
use App\Http\Controllers\MododocenteController;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as SweetAlert;

Route::get('prueba',[ComentarioController::class,'listarInterests'])->name('prueba');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ninacos', function () {
    return view('ninaco.index');
});

Auth::routes();
Route::get('/home',function(){
    return view('persona.estudiantes');
})->name('home')->middleware('auth');

Route::get('personas.todos', function () {
    return view('persona.index');
});


Route::get('/paises/listar',function(){
    return view('pais.index');
})->name('listar');


Route::get('personas/opciones/{id}', function ($id) {
    return view('persona.opciones');
})->name('personas.opciones');


/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%PERSONA RUTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

Route::put('persona/{persona}/subirfoto','PersonaController@guardarfoto')->name('guardarfoto');
Route::put('persona/{persona}/subirfotojpg', 'PersonaController@guardarfotojpg')->name('guardarfotojpg');

Route::resource('personas', "PersonaController");
Route::get('persona/papeles/{persona_id}', 'PersonaController@configurar_papeles')->name('personas.agregar.papel');
Route::post('guardar/papeles/{persona}', 'PersonaController@guardarNuevoPapel')->name('guardar.nuevo.papel');

Route::get('persona/mostrar', [PersonaController::class,'personaMostrarAjax'])->name('persona.mostrar.ajax');
Route::get('persona/mostrar/ajax', [PersonaController::class,'personaMostrarAjaxInscripcion'])->name('persona.mostrar.ajax');
Route::get('persona/mostrar/ajax/matriculacion', [PersonaController::class,'personaMostrarAjaxMatriculacion'])->name('persona.mostrar.matriculacion.ajax');
Route::get('persona/ultimaobservacion', [PersonaController::class,'ultimaObservacion'])->name('persona.ultima.observacion');
Route::get('persona/primerabservacion', [PersonaController::class,'primeraObservacion'])->name('persona.primera.observacion');
Route::get('persona/primeraultima/observacion', [PersonaController::class,'ultimaPrimeraObservacion'])->name('persona.ultima.primera.observacion');
Route::get('persona/ultima/matriculacion', [PersonaController::class,'ultimaMatriculacion'])->name('persona.ultima.matriculacion');
Route::get('persona/ultima/programacioncom', [PersonaController::class,'ultimaProgramacioncom'])->name('persona.ultima.programacioncom');
Route::get('persona/enviar/mensaje', [PersonaController::class,'enviarMensaje'])->name('persona.enviar.mensaje');
Route::get('persona/enviar/mensaje/componente', [PersonaController::class,'enviarMensajeParaComponente'])->name('persona.enviar.mensaje.componente');
Route::get('persona/enviar/mensaje/personal', [PersonaController::class,'enviarMensajePersonal'])->name('persona.enviar.mensaje.personal');
Route::get('persona/enviar/mensaje/cumpleaneros', [PersonaController::class,'enviarMensajeCumpleanero'])->name('persona.enviar.mensaje.cumpleaneros');
Route::get('persona/enviar/mensaje/faltones', [PersonaController::class,'enviarMensajeFaltones'])->name('persona.enviar.mensaje.faltones');
Route::get('persona/enviar/mensaje/faltonescom', [PersonaController::class,'enviarMensajeFaltonesComputacion'])->name('persona.enviar.mensaje.faltonescom');
Route::get('persona/descargar/contacto/{persona}', [PersonaController::class,'descargarContacto'])->name('descargar.contacto');
Route::get('persona/actualizar/vuelvefecha', [PersonaController::class,'actualizarVuelveFecha'])->name('persona.update.vuelvefecha');
Route::get('persona/actualizar/volvera', [PersonaController::class,'actualizarVolvera'])->name('persona.update.volvera');

Route::get('persona/ultima/inscripcion', [PersonaController::class,'ultimaInscripcion'])->name('persona.ultima.inscripcion');
Route::get('persona/ultima/programacion', [PersonaController::class,'ultimaProgramacion'])->name('persona.ultima.programacion');
Route::post('persona/felicitado', [PersonaController::class,'felicitado'])->name('persona.felicitado'); //agrega felicitado enla tabla felicitados 
Route::post('persona/faltainformar', [PersonaController::class,'faltaInformar'])->name('persona.faltaInformar'); //Falta informar 

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%CONTACTO EDITAR %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('persona/crear/contacto', [PersonaController::class,'crearSoloContacto'])->name('personas.crear.contacto'); //Falta informar 
Route::get('persona/editar/contacto/{persona}', [PersonaController::class,'editarSoloContacto'])->name('personas.editar.contacto'); //Falta informar 
Route::post('persona/contacto/store', [PersonaController::class,'guardarSoloContacto'])->name('personas.store.contacto');
Route::post('persona/contacto/update/{persona}', [PersonaController::class,'actualizarSoloContacto'])->name('personas.uptate.contacto');
Route::get('contactos', [PersonaController::class,'contactos'])->name('personas.contactos.view');
Route::get('persona/contactos', [PersonaController::class,'listarContactos'])->name('personas.contactos');

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%RAPIDINGO EDITAR %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('personas/crear/rapidingo/',[PersonaController::class,'crearRapido'] )->name('crear.persona.rapido');
Route::post('persona/guardar/rapidingo',[PersonaController::class,'guardarRapidingo'])->name('personas.guardar.rapidindo');
Route::get('persona/potenciales', function () {return view('persona.rapidingo.potenciales');});
    Route::get('potenciales', [PersonaController::class,'potenciales'])->name('personas.potenciales');
    Route::get('ver/potencial', [PersonaController::class,'verPotencial'])->name('personas.ver.potenciales');
    Route::get('persona/potenciales/unsuscribe', [PersonaController::class,'unsuscribe'])->name('personas.unsuscribe');
    Route::get('persona/potenciales/suscribe', [PersonaController::class,'suscribe'])->name('personas.suscribe');
    Route::post('persona/rapidingo/update/{persona}', [PersonaController::class,'actualizarRapidingo'])->name('personas.update.rapidingo');
    Route::get('persona/editar/rapidingo/{persona}', [PersonaController::class,'editarRapidingo'])->name('personas.editar.rapidingo'); //Falta informar 

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%DEUDORES RUTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('deudores/view', [PagoController::class,'deudoresView'])->name('deudores.index');
Route::get('deudores/inscripcion', [PagoController::class,'deudoresInscripcion'])->name('deudores.inscripcion');
Route::get('deudores/matriculacion', [PagoController::class,'deudoresMatriculacion'])->name('deudores.matriculacion');



/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% EVENTOS RUTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('eventos',"EventoController");
Route::get('listar/eventos',[EventoController::class,'listar'])->name('listar.eventos');
Route::get('seleccionar/evento/{evento}',[EventoController::class,'seleccionarEvento'])->name('seleccionar.evento');



Route::get('reporte/potenciales', [PersonaReporteController::class,'potencialesPorInteresView']);
Route::get('potenciales/hoy', [PersonaReporteController::class,'potencialesHoyView']);
Route::get('potenciales/between', [PersonaReporteController::class,'potencialesBetweenView']);
Route::get('potenciales/user', [PersonaReporteController::class,'potencialesUserView']);

Route::get('reporte/potenciales/interest', [PersonaReporteController::class,'potencialesPorInteres'])->name('reporte.potenciales.interest');
Route::get('reporte/potenciales/hoy', [PersonaReporteController::class,'potencialesDeHoy'])->name('reporte.potenciales.hoy');
Route::post('reporte/potenciales/between', [PersonaReporteController::class,'potencialesBetween'])->name('reporte.potenciales.between');

Route::resource('paises', "PaisController");
Route::resource('telefonos', "TelefonoController");
Route::resource('users', 'UserController');
Route::get('quien', [UserController::class,'quien'])->name('quien');

Route::resource('ciudades', "CiudadController");
Route::resource('zonas', "ZonaController");
//Route::resource('usuarios', "UserController");
Route::resource('menus', "MenuController");
//Route::resource('grado', "GradoController");
Route::resource('departamentos', "DepartamentoController");
Route::resource('provincias', "ProvinciaController");
Route::resource('municipios', "MunicipioController");
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% C O L E G I O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('colegios', "ColegioController");
Route::get('colegio/all', 'ColegioController@todos');

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  F I N   C O L E G I O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('modalidads', "ModalidadController");
Route::resource('nivels', "NivelController");
Route::resource('inscripciones', "InscripcioneController");
// Route::resource('matriculacion', "MatriculacionController");


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%COMO   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('como', "ComoController");
Route::delete('eliminar/como', [ComoController::class,'destroy'])->name('como.delete');
Route::get('listar/comos',[ComoController::class,'listar'])->name('comos.listar');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%MODODOCENTE         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('mododocentes', "MododocenteController");
Route::delete('eliminar/mododocente', [MododocenteController::class,'destroy'])->name('mododocente.delete');
Route::get('listar/mododocentes',[MododocenteController::class,'listar'])->name('mododocente.Mododocente');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%ESTDUDIANTES         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('/historial/{estudiante}','EstudianteController@historia')->name('estudiante.historia');
Route::get('cumpleaneros',[EstudianteController::class,'cumpleaneros'])->name('cumpleaneros');
Route::get('estudiante/faltones',[EstudianteController::class,'estudiantesFaltones'])->name('estudiante.faltones');
Route::get('estudiante/sinfalta',[EstudianteController::class,'estudiantesSinFalta'])->name('estudiante.sinfalta');
Route::get('estudiante/recordatorio',[EstudianteController::class,'estudiantesRecordatorio'])->name('estudiante.recordatorio');
Route::get('estudiantes/finalizando',[EstudianteController::class,'estudiantesFinalizando'])->name('estudiantes.finalizando');
Route::get('estudiantes/empezando',[EstudianteController::class,'estudiantesEmpezando'])->name('estudiantes.empezando');
Route::get('faltones/view',[EstudianteController::class,'faltonesView'])->name('estudiante.faltones.view');
Route::get('sinfalta/view',[EstudianteController::class,'sinfaltaView'])->name('estudiante.sinfalta.view');
Route::get('recordatorio/view',[EstudianteController::class,'recordatorioView'])->name('estudiante.recordatorio.view');
Route::get('cumpleaneros/view',[EstudianteController::class,'cumplenerosView'])->name('cumpleaneros.view');
Route::get('finalizando/view',[EstudianteController::class,'finalizandoView'])->name('finalizando.view');
Route::get('empezando/view',[EstudianteController::class,'empezandoView'])->name('empezando.view');
Route::get('iniciando/view',[EstudianteController::class,'cumplenerosView'])->name('cumpleaneros.view');
// Route::get('yaesta/felicitado/{persona}',[EstudianteController::class,'yaSeFelicito'])->name('yaesta.felicitado');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       COMENTARIO         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('comentario/guardar',[ComentarioController::class,'guardarComentario'])->name('comentario.guardar');
Route::get('comentarios',[ComentarioController::class,'index'])->name("comentario.index");
Route::get('comentarios/create',[ComentarioController::class,'create'])->name("comentario.create");
Route::get('comentario/mostrar/{comentario}',[ComentarioController::class,'show'])->name("comentario.show");
Route::get('listar/comentarios', [ComentarioController::class,'listar'])->name('comentario.ajax');
Route::get('comentario/interests/{comentario_id}', [ComentarioController::class,'listarInterests'])->name('listar.interests.de,comentario');
Route::get('comentario/editar/{comentario}', [ComentarioController::class,'edit'])->name("comentario.edit");
Route::post('comentario/actualizar/{comentario}', [ComentarioController::class,'update'])->name("comentario.update");
Route::post('comontarios/guardar', [ComentarioController::class,'guardarComentarioDesdeSistema'])->name("comentario.guardar.sistema");
Route::delete('eliminar/comentario/{comentario}', [ComentarioController::class,'destroy'])->name('comentario.delete');
Route::get('darbaja/comentario',[ComentarioController::class,'darbaja'])->name('comentario.darbaja');
Route::get('daralta/comentario/',[ComentarioController::class,'daralta'])->name('comentario.daralta');
Route::get('crear/contacto/{comentario}',[ComentarioController::class,'crearContactoComentario'])->name('comentario.descargar');
Route::get('estudiantizar/comentario/{comentario}',[ComentarioController::class,'estudiantizarComentario'])->name('estudiantizar.comentario');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%DOCENTES RUTAS        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('docentes/create',[DocenteController::class,'create'])->name('docente.create');
Route::get('docentes','DocenteController@index')->name('docentes.index');
Route::get('docentes/niveles/{persona}', 'DocenteController@configurar_niveles')->name('docentes.gestionar.niveles');
Route::post('docentes/niveles/configurar/{docente}', 'DocenteController@GuardarConfigurarNiveles')->name('docentes.niveles.configurar');
Route::get('opciones/docentes/{persona}',[OpcionController::class,'docentes'])->name('opcion.docentes');
Route::get('docente/edit/{docente}',[DocenteController::class,'edit'])->name('docente.edit');
//Route::get('misclases/{persona_id}',[DocenteController::class,'misclases'])->name('misestudiantes.actuales.view');
Route::get('misclases/actuales',[DocenteController::class,'ClasesDeUnDocente'])->name('misestudiantes.actuales.ajax');
Route::get('listar/docentes',[DocenteController::class,'listarDocentes'])->name('listar.docentes');
Route::delete('eliminar/docente/{docente}', 'DocenteController@destroy')->name('eliminar.docente');
Route::patch('docente/actualizar/{docente}', [DocenteController::class,'update'])->name('docente.update');
Route::resource('docentes', "DocenteController");
// Route::post('docente/store', [DocenteController::class,'store'])->name('docente.store');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       A D M I N I S T R AT I V O S         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('administrativos','AdministrativoController@index')->name('administrativo.index');
Route::get('micartera/view',[AdministrativoController::class,'vistaCartera'])->name('administrativo.vistaCartera');
Route::get('micartera/inscripciones',[AdministrativoController::class,'miCarteraInscripciones'])->name('administrativo.micartera.inscripciones');
Route::get('micartera/inscripciones/desvigentes',[AdministrativoController::class,'miCarteraInscripcionesDesvigentes'])->name('administrativo.micartera.inscripciones.desvigentes');
Route::get('micartera/matriculaciones',[AdministrativoController::class,'miCarteraMatriculaciones'])->name('administrativo.micartera.matriculacioenes');
Route::get('micartera/matriculaciones/desvigentes',[AdministrativoController::class,'miCarteraMatriculacionesDesvigentes'])->name('administrativo.micartera.matriculacioenes.desvigentes');
Route::get('opciones/administrativos/{persona}',[OpcionController::class,'administrativos'])->name('opcion.administrativos');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%COMPUTACIONES         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('computaciones','ComputacionController@index')->name('computacion.index');
Route::get('computacion/carreras/{persona}', 'ComputacionController@mostrar_carreras')->name('configuracion.gestionar.carreras');
Route::get('opciones/computacion/{persona}',[OpcionController::class,'computacion'])->name('opcion.computacion');
Route::post('computacion/carreras/configurar/{persona}', 'ComputacionController@GuardarNuevaCarrera')->name('computacion.carreras.guardar');
Route::get('computacion/faltones',[ComputacionController::class,'computacionsFaltones'])->name('computacion.faltones');
Route::get('computacion/sinfalta',[ComputacionController::class,'computacionsSinFalta'])->name('computacion.sinfalta');
Route::get('computacion/recordatorio',[ComputacionController::class,'computacionsRecordatorio'])->name('computacion.recordatorio');
Route::get('computacion/finalizando',[ComputacionController::class,'computacionFinalizando'])->name('computacion.finalizando');
Route::get('computacion/empezando',[ComputacionController::class,'computacionEmpezando'])->name('computacion.empezando');
//Route::get('faltones/view',[EstudianteController::class,'faltonesView'])->name('estudiante.faltones.view');




/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  T E M A S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('temas/{materia_id}',[TemaController::class,'listar'])->name('tamas.listar');
Route::get('tema/index',[TemaController::class,'lista'])->name('tema.listar');
Route::get('temas',[TemaController::class,'index'])->name('tema.index');
Route::get('tema/create',[TemaController::class,'create'])->name('tema.create');
Route::get('tema/show/{tema}',[TemaController::class,'show'])->name('tema.show');
Route::get('tema/edit/{tema}',[TemaController::class,'edit'])->name('tema.edit');
Route::delete('eliminar/tema',[TemaController::class,'destroy'])->name('eliminar.tema');
Route::patch('tema/actualizar/{tema}', [TemaController::class,'update'])->name('tema.update');
Route::post('tema/store', [TemaController::class,'store'])->name('tema.store');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  M A T E R I A S    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('materias', "MateriaController");
Route::get('listar/materias',[MateriaController::class,'listar'])->name('materias.listar');
Route::get('materias/niveles/{materia}', 'MateriaController@configurar_niveles')->name('materias.gestionar.niveles');
Route::post('materias/niveles/configurar/{materia}', 'MateriaController@GuardarConfigurarNiveles')->name('materias.configurar.niveles.guardar');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       P  A  G  O  S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('pagos', "PagoController");
Route::get('pago/crear/{inscripcione}', 'PagoController@crear')->name('pagos.crear');
Route::get('pago/mostrar/{pago}', 'PagoController@mostrar')->name('pagos.mostrar');
Route::get('pago/editar/{pago}', 'PagoController@editar')->name('pago.editar');
Route::get('pagos/inscripcion/{inscripcione}', 'PagoController@detallar')->name('pagos.detallar');
Route::post('pagos/realizar/{inscripcione}', 'PagoController@guardar')->name('pagos.guardar');
Route::patch('pago/actualizar/{pago}', "PagoController@actualizar")->name('pago.actualizar');
Route::get('pagos/mostrar/ajax',[PagoController::class,'pagosMostrarAjax'])->name('pagos.mostrar.ajax');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%PAGOS COMPUTACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('pagocom/crear/{matriculacion}',[PagocomController::class,'crear'])->name('pagocom.crear');
Route::get('pagocom/mostrar/{pagocom}',[PagocomController::class,'mostrar'])->name('pagocom.mostrar');
Route::get('pagocom/editar/{pagocom}',[PagocomController::class,'editar'])->name('pagocom.editar');
Route::get('pagocom/inscripcion/{matriculacion}',[PagocomController::class,'detallar'])->name('pagocom.detallar');
Route::post('pagocom/realizar/{matriculacion}',[PagocomController::class,'guardar'])->name('pagocom.guardar');
Route::patch('pagocom/actualizar/{pagocom}', [PagocomController::class,'actualizar'])->name('pagocom.actualizar');
Route::get('pagoscom/mostrar/ajax',[PagocomController::class,'pagosComMostrarAjax'])->name('pagoscom.mostrar.ajax');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%BILLETES          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('billetes', "BilleteController");
Route::get('billetes/crear/{pago}', "BilleteController@crear")->name('billete.crear');
Route::post('billetes/guardar/{pago}', 'BilleteController@guardar')->name('billetes.guardar');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       BILLETES COMPUTACION       %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
//Route::get('billetes', [BilleteController::class,'index']);
Route::get('billetecom/crear/{pago}', "BilletecomController@crear")->name('billetecom.crear');
Route::post('billetecom/guardar/{pago}', 'BilletecomController@guardar')->name('billetecom.guardar');



/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  FERIADOS          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('feriados', "FeriadoController");

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  DIA          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('dias','DiaController');
Route::get('dia/listar',[DiaController::class,'listar'])->name('dias.listar');



/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  C L A S E S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('clases', "ClaseController");
Route::get('clase/editar/{clase}',"ClaseController@edit")->name('clase.editar');
Route::get('clase/editar',"ClaseController@editar")->name('clase.editar.ajax'); /* editar mediante ajax desde presentes */
Route::get('clase/actualizar/{clase}',"ClaseController@actualizar")->name('clase.actualizar');
Route::get('clase/mostrar/',"ClaseController@mostrar")->name('clase.mostrar');
Route::get('clase/listar',"ClaseController@index")->name('clase.index');
Route::get('clase/finalizar/', 'ClaseController@finalizarClase')->name('clases.finalizar');
Route::get('clases/presentes/ahorita', [ClaseController::class,'clasesPresentes'])->name('clases.presente');
Route::get('presentes', function () {return view('clase.presentes');})->name('clase.presentes');
Route::get('programa/marcar/{inscripcine_id}', 'ClaseController@marcadoGeneral')->name('clases.marcado.general');
Route::get('clases/de/docente/{docente_id}', 'ClaseController@clasesDeDocete')->name('clases.de.un.docente');

Route::get('marcar/asistencia/', 'ClaseController@marcado')->name('marcado');
Route::get('clase/crear', 'ClaseController@crear')->name('clase.crear');
Route::get('clase/marcar/rapido/{programacion_id}', 'ClaseController@marcadoRapido')->name('marcado.presente.rapido');
Route::post('/clase/guardar/normal/{progrmacion_id}', 'ClaseController@guardar')->name('clases.guardar');
Route::post('programa/estado/general/', 'ClaseController@marcadoGeneral')->name('programa.estado.general');



/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  C L A S E S C O M         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('programacioncom/marcar/{matriculacion}', [ClasecomController::class,'marcadoGeneral'])->name('clases.marcadocom.general');
Route::get('clasecom/marcar/rapido/{programacion_id}', 'ClasecomController@marcadoRapido')->name('marcadocom.presente.rapido');  // MARCADO RAPIDO COMPUTACION
Route::get('clasescom/presentes/ahorita', 'ClasecomController@clasesPresentes')->name('clasescom.presente');
Route::get('clasecom/crear', 'ClasecomController@crear')->name('clasecom.crear');
Route::post('/clasecom/guardar/normal/{progrmacioncom_id}', 'ClasecomController@guardar')->name('clasescom.guardar');
Route::get('clasecom/mostrar/',[ClasecomController::class,'mostrarcom'])->name('clasecom.mostrar');
Route::get('clasecom/editar/{clasecom}', [ClasecomController::class,'edit'])->name('clasescom.edit');
Route::patch('clasecom/actualizar/{clasecom}', [ClasecomController::class,'actualizar'])->name("clasecom.update");
Route::get('clasecom/finalizar/', [ClasecomController::class,'finalizarClasecom'])->name('clasecom.finalizar');

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  G R A D O S  %%%%%%%%%%%%%%%%%%%%%%%%%%*/
//Route::resource('grados', [GradoController::class]);
Route::get('grados',[GradoController::class,'index'])->name('grados.index');
Route::get('grados/create',[GradoController::class,'create'])->name('grados.create');
Route::post('grados/store',[GradoController::class,'store'])->name('grados.store');
Route::get('grados/no/cursados/{estudiante}','GradoController@gradosAunNoCursados')->name('grados.no.cursados');
Route::get('/guardar/gestion',[GradoController::class,'agregarGrado'])->name('agregar.grado');

Route::get('grado/mostrar/', "GradoController@mostrar")->name("grado.mostrar");
Route::get('grado/editar/', "GradoController@editar")->name("grado.editar");
Route::get('grado/actualizar/', "GradoController@actualizar")->name("grado.actualizar");
Route::delete('eliminar/grado/{grado}', 'GradoController@destroy')->name('eliminar.grado');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  G E S T I O N E S  %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('gestiones/{estudiante}', [GestionController::class,'index'])->name('gestion.index');
Route::post('gestiones/guardar', [GestionController::class,'store'])->name('gestion.store');
Route::get('gestion/editar/', [GestionController::class,'editar'])->name('gestion.editar');
Route::get('gestion/create/{estudiante}', [GestionController::class,'create'])->name('gestion.create');
Route::get('gestion/actualizar', [GestionController::class, 'actualizar'])->name("gestion.actualizar");
Route::delete('eliminar/gestion/{gestion}', [GestionController::class, 'destroy'])->name('eliminar.gestion');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  ESTADOS   %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('estados', [EstadoController::class, 'index'])->name('estado.index');
Route::get('estado/create',[EstadoController::class,'create'])->name('estado.create');
Route::get('estados/show/{estado}', [EstadoController::class, 'show'])->name('estado.show');
Route::post('estado/guardar',[EstadoController::class,'store'])->name('estado.store');
Route::get('estado/mostrar/{estado}', [EstadoController::class,'show'])->name("estado.show");
Route::get('estado/editar/{estado}', [EstadoController::class,'edit'])->name("estado.edit");
Route::get('estado/actualizar/{estado}', [EstadoController::class,'update'])->name("estado.update");
Route::delete('eliminar/estado/{estado}', [EstadoController::class,'destroy'])->name('estado.destroy');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  C A R R E R A S   %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('carreras', [CarreraController::class, 'index'])->name('carrera.index');
Route::get('carrera/create',[CarreraController::class,'create'])->name('carrera.create');
Route::get('carreras/show/{carrera}', [CarreraController::class, 'show'])->name('carrera.show');
Route::post('carrera/guardar',[CarreraController::class,'store'])->name('carrera.store');
Route::get('carrera/mostrar/{carrera}', [CarreraController::class,'show'])->name("carrera.show");
Route::get('carrera/editar/{carrera}', [CarreraController::class,'edit'])->name("carrera.edit");
Route::get('carrera/actualizar/{carrera}', [CarreraController::class,'update'])->name("carrera.update");
Route::delete('eliminar/carrera/{carrera}', [CarreraController::class,'destroy'])->name('carrera.destroy'); 
Route::get('listar/carreras', [CarreraController::class,'listar'])->name('carrera.ajax');
//Route::resource('carrera', "CarreraController")->names('carrera');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%MATRICULACION  RUTAS  %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('matriculacion/create/{computacion}/{carrera}',[MatriculacionController::class,'create'])->name('matriculacion.create');
Route::get('miscarreras/{computacion}', [MatriculacionController::class, 'misCarreras'])->name('miscarreras.listar');
Route::get('carrerasajax/{computacion}', [MatriculacionController::class, 'CarrerasComptacion'])->name('miscarrerasajax');
Route::post('matriculacion/guardar',[MatriculacionController::class,'store'])->name('matriculacion.store');

Route::get('matriculacion/editar/{matriculacion}', [MatriculacionController::class,'edit'])->name("matriculacion.edit");
Route::patch('matriculacion/actualizar/{matriculacion}', [MatriculacionController::class,'update'])->name("matriculacion.update");
Route::get('matriculacion/mostrar/{matriculacion}', [MatriculacionController::class,'show'])->name("matriculacion.show");

Route::post('matriculacion/guardar/configuracion', 'MatriculacionController@guardarconfiguracion')->name('matriculacion.guardar.configuracion');
Route::post('matriculacion/actualizar/configuracion/{matriculacion_id}', [MatriculacionController::class,'actualizarConfiguracion'])->name('matriculacion.actualizar.configuracion');

Route::get('matriculacion/actualizar/fechapago/{fecha}/{id}',[MatriculacionController::class,'actualizar_fecha_proximo_pago'])->name('setcom.fecha.proximo.pago');
Route::get('tusmatriculaciones', [MatriculacionController::class,'tusMatriculacionesVigentes'])->name('matriculaciones.de.estudiante');
Route::get('matriculaciones/vigentes/view', function () {return view('matriculaciones.vigentes');})->name('matriculaciones.vigentes.view');
Route::get('matriculaciones/vigentes/ajax', "MatriculacionController@vigentesAjax")->name('matriculaciones.vigentes.ajax');  
Route::get('matriculacioncita/ajax/show', [MatriculacionController::class,'matriculacionMostrarAjax'])->name('matriculacion.mostrar.ajax');
Route::get('saldo/matriculacion', [MatriculacionController::class,'Saldo'])->name('matriculacion.saldo.ajax');  
//Route::get('tumatriculaciones', [MatriculacionController::class,'tusMatriculacionesVigentes'])->name('matriculaciones');
//Route::get('imprimir/matriculacion/{matriculacion}',[MatriculacionController::class,'imprimir'] )->name('imprimir.matriculacion');
Route::get('matriculacion/configuracion/{matriculacion}', [MatriculacionController::class,'configurarView'])->name('matriculacion.configuracion');
Route::get('reservar/matriculacion/{matriculacion}', [MatriculacionController::class,'reservar'])->name('reservar.matriculacion');
Route::get('darbaja/matriculacion',[MatriculacionController::class,'darbaja'])->name('matriculacion.darbaja');
Route::get('daralta/matriculacion',[MatriculacionController::class,'daralta'])->name('matriculacion.daralta');
// Route::get('gestiones/editar78', [GestionController::class, 'edition'])->name('gestion.editar');

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  TIPOMOTIVOS %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('tipomotivos', [TipomotivoController::class,'index'])->name('tipomotivo.index');
Route::get('listar/tipomotivos', [TipomotivoController::class,'listar'])->name('tipomotivo.ajax');
Route::get('tipomotivo/mostrar', "TipomotivoController@mostrar")->name("tipomotivo.mostrar");
Route::get('tipomotivo/editar/', "TipomotivoController@editar")->name("tipomotivo.editar");
Route::get('tipomotivo/actualizar/', "TipomotivoController@actualizar")->name("tipomotivo.actualizar");
Route::delete('eliminar/tipomotivo/{tipomotivo}', 'TipomotivoController@destroy')->name('eliminar.tipomotivo');
Route::get('tipomotivo/create',[TipomotivoController::class,'create'])->name('tipomotivo.create');
Route::post('tipomotivo/guardar',[TipomotivoController::class,'store'])->name('tipomotivo.store');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  TIPOFILES %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('tipofiles', [TipofileController::class,'index'])->name('tipofile.index');
Route::get('listar/tipofiles', [TipofileController::class,'listar'])->name('tipofile.ajax');
Route::get('tipofile/mostrar', [TipofileController::class,'mostrar'])->name("tipofile.mostrar");
Route::get('tipofile/editar/', [TipofileController::class,'editar'])->name("tipofile.editar");
Route::get('tipofile/actualizar/', [TipofileController::class,'actualizar'])->name("tipofile.actualizar");
Route::delete('eliminar/tipofile/{tipofile}', [TipofileController::class,'destroy'])->name('eliminar.tipofile');
Route::get('tipofile/create',[TipofileController::class,'create'])->name('tipofile.create');
Route::post('tipofile/guardar',[TipofileController::class,'store'])->name('tipofile.store');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  INTEREST  %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('interests', [InterestController::class,'index'])->name('interest.index');
Route::get('interests/get', [InterestController::class,'getParaHome'])->name('interest.para.home');
Route::get('listar/interests', [InterestController::class,'listar'])->name('interest.ajax');
Route::get('interest/mostrar', "InterestController@mostrar")->name("interest.mostrar");
Route::get('interest/editar/', "InterestController@editar")->name("interest.editar");
Route::get('interest/actualizar/', "InterestController@actualizar")->name("interest.actualizar");
Route::delete('eliminar/interest/{interest}', 'InterestController@destroy')->name('eliminar.interest');
Route::get('interest/create',[InterestController::class,'create'])->name('interest.create');
Route::post('interest/guardar',[InterestController::class,'store'])->name('interest.store');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  MOTIVOS %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('motivos', "MotivoController");
Route::get('motivo/mostrar/',[MotivoController::class,'mostrar'])->name("motivo.mostrar");
Route::get('listar/motivos', [MotivoController::class,'listar'])->name('motivo.ajax');
Route::get('motivo/editar/', [MotivoController::class,'editar'])->name("motivo.editar");
Route::get('motivo/actualizar/', [MotivoController::class,'actualizar'])->name("motivo.actualizar");
Route::delete('eliminar/motivo/{motivo}', [MotivoController::class,'destroy'])->name('eliminar.motivo');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%MENSAJEADO %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('store/mensajeado',[MensajeadoController::class,'storeMensajeado'])->name("store.mensajeado");
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%MENSAJEABLE %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('mensajeble/store',[MensajeableController::class,'storeMensajeable'])->name("store.mensajeable");


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  MENSAJE %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('mensajes',[MensajeController::class,'index'])->name("mensaje.index");
Route::get('mensajes/create',[MensajeController::class,'create'])->name("mensaje.create");
Route::get('mensaje/mostrar/{mensaje}',[MensajeController::class,'show'])->name("mensaje.show");
Route::get('listar/mensajes', [MensajeController::class,'listar'])->name('mensaje.ajax');
Route::get('listar/mensajes/enviar', [MensajeController::class,'listarMensajes'])->name('mensaje.ajax.enviar');
Route::get('mensaje/editar/{mensaje}', [MensajeController::class,'edit'])->name("mensaje.edit");
Route::post('mensaje/actualizar/{mensaje}', [MensajeController::class,'update'])->name("mensaje.update");
Route::delete('eliminar/mensaje/{mensaje}', [MensajeController::class,'destroy'])->name('mensaje.delete');
Route::post('mensaje/guardar',[MensajeController::class,'store'])->name('mensaje.store');
Route::get('darbaja/mensaje',[MensajeController::class,'darbaja'])->name('mensaje.darbaja');
Route::get('daralta/mensaje/',[MensajeController::class,'daralta'])->name('mensaje.daralta');
Route::get('mensaje/generico',[MensajeController::class,'getMensajeGenerico'])->name('mensaje.generico');// get mensaje(id)

Route::get('masivo/view', [MensajeController::class,'masivoView'])->name('masivo.index');
Route::get('estudiantes/masivo/contactar/evento', [MensajeController::class,'MensajeMasivo'])->name('masivo.descente');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  MOTIVOS %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('aulas', "AulaController");
Route::get('aula/mostrar/',[AulaController::class,'mostrar'])->name("aula.mostrar");
Route::get('listar/aulas', [AulaController::class,'listar'])->name('aula.ajax');
Route::get('aula/editar/', [AulaController::class,'editar'])->name("aula.editar");
Route::get('aula/actualizar/', [AulaController::class,'actualizar'])->name("aula.actualizar");
Route::delete('eliminar/aula/{aula}', [AulaController::class,'destroy'])->name('eliminar.aula');

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  FILES %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('files', "FileController");
Route::get('file/mostrar/',[FileController::class,'mostrar'])->name("file.mostrar");
Route::get('listar/files', [FileController::class,'listar'])->name('file.ajax');
Route::get('file/editar/', [FileController::class,'editar'])->name("file.editar");
Route::get('file/actualizar/', [FileController::class,'actualizar'])->name("file.actualizar");
Route::get('file/descargar/{file_id}/', [FileController::class,'download'])->name("file.download");
Route::delete('eliminar/file/{file}', [FileController::class,'destroy'])->name('eliminar.file');

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  ASIGNATURAS %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('asignaturas', [AsignaturaController::class,'index'])->name('asignatura.index');
Route::get('asignatura/create',[AsignaturaController::class,'create'])->name('asignatura.create');
Route::post('asignatura/guardar',[AsignaturaController::class,'store'])->name('asignatura.store');
Route::get('asignatura/mostrar/{asignatura}', [AsignaturaController::class,'show'])->name("asignatura.show");
Route::get('asignatura/editar/{asignatura}', [AsignaturaController::class,'edit'])->name("asignatura.edit");
Route::get('asignatura/actualizar/{asignatura}', [AsignaturaController::class,'update'])->name("asignatura.update");
Route::delete('eliminar/asignatura/{asignatura}', [AsignaturaController::class,'destroy'])->name('asignatura.destroy');


// Route::get('user/crear', "UserController@crear")->name('users.crear');
// Route::post('user/guardar', "UserController@guardar")->name('users.guardar');
Route::get('share/credential/{user}', [UserController::class,'share'])->name('share.credentials');




Route::get('apoderado/existente/{persona}', 'TelefonoController@apoderadoExistente')->name('apoderado.existente');
Route::get('telefono/agregar/{persona_id}/{apoderado_id}', 'TelefonoController@agregarApoderado')->name('agregar.apoderado');
Route::post('guardar/apoderado/existente', 'TelefonoController@guardarApoderadoExistente')->name('guardar.apoderado.existente');
Route::get('modalidad/cosultar/', 'ModalidadController@consultar')->name('modalidad.consultar');



/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%LICENCIAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('licencias', [LicenciaController::class,'index'])->name('licencia.index');
Route::get('licenciacom/crear', [LicenciaController::class,'createcom'])->name('licenciacom.crear');
Route::get('licenciacom/guardar', [LicenciaController::class,'storecom'])->name('licenciacom.storecom');
Route::get('licenciaprogramacion/crear', [LicenciaController::class,'createprogramacion'])->name('licenciaprogramacion.crear');
Route::get('licenciaprogramacion/guardar', [LicenciaController::class,'storeprogramacion'])->name('licenciaprogramacion.guardar');

/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%INSCRIPCIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('tus_inscripciones/{estudiante_id}', 'InscripcioneController@tusinscripciones')->name('tus.inscripciones');
Route::get('listar/inscripciones/{persona}', 'InscripcioneController@listar')->name('listar_inscripciones');
Route::get('inscripcione/crear/{persona}', 'InscripcioneController@crear')->name('inscribir');
Route::post('inscripcion/guardar/configuracion/{id}', 'InscripcioneController@guardarconfiguracion')->name('inscripcion.guardar.configuracion');
Route::get('inscripcion/configuracion/{inscripcione}', 'InscripcioneController@configurarView')->name('inscripcion.configuracion');
Route::post('inscripcion/actualizar/configuracion', 'InscripcioneController@actualizarConfiguracion')->name('inscripcion.actualizar.configuracion');
Route::get('inscripcion/actualizar/fechapago/{fecha}/{id}', 'InscripcioneController@actualizar_fecha_proximo_pago')->name('set.fecha.proximo.pago');
Route::get('tusinscripciones', 'InscripcioneController@tusInscripcionesVigentes')->name('inscripciones.de.estudiante');
Route::get('inscripcines/vigentes/view', function () {return view('inscripcione.vigentes');})->name('inscripciones.vigentes.view');
Route::get('inscripciones/vigentes/ajax', [InscripcioneController::class,'vigentesAjax'])->name('inscripciones.vigentes.ajax');  
Route::get('inscripcion/mostrar/ajax', [InscripcioneController::class,'inscripcionMostrarAjax'])->name('inscripcion.mostrar.ajax');  
Route::get('saldo/inscripcion', [InscripcioneController::class,'Saldo'])->name('inscripcion.saldo.ajax');  
Route::get('reservar/inscripcion/{inscripcione}', [InscripcioneController::class,'reservar'])->name('reservar.inscripcion');  
Route::get('darbaja/inscripcion',[InscripcioneController::class,'darbaja'])->name('inscripcion.darbaja');
Route::get('daralta/inscripcion',[InscripcioneController::class,'daralta'])->name('inscripcion.daralta');
Route::get('inscripcion/actualizar/fecha_proximo_pago',[InscripcioneController::class,'fecharProximoPago'])->name('inscripcion.fechar.proximo.pago');

/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%TELEFONOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('telefonos/vista/{persona}','TelefonoController@mostrarvista')->name('telefonos.persona');
Route::get('telefono/vista/{persona_id}','TelefonoController@mostrarvistaConIdPersona')->name('telefonos.personaid');
Route::get('telefono/crear/{persona}', 'TelefonoController@crear')->name('telefonos.crear');
Route::get('telefonos/{persona}', 'PersonaController@index')->name('telefono.de.persona');
Route::get('telefono/{persona}/{apoderado_id}/editar','TelefonoController@editar')->name('telefono.editar');
Route::put('telefono/{persona_id}/{apoderado_id}', 'TelefonoController@actualizar')->name('telefono.actualizar');
Route::post('crear/contacto/{persona}','PersonaController@storeContacto')->name('persona.storeContacto');

Route::post('calificacion/store', [CalificacionController::class,'store'])->name('calificacion.store');  
Route::get('calificacion/editar',[CalificacionController::class,'edit'])->name('calificacion.editar');
Route::post('calificacion/actualizar', [CalificacionController::class,'update'])->name("calificacion.update");
Route::get('get/calificacion', [CalificacionController::class,'getCalificacion'])->name("get.calificacion");
Route::get('set/calificacion', [CalificacionController::class,'setCalificacion'])->name("set.calificacion");

/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ROUTES P R O G R A M A C I O N   C O N T R E L L E R %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('programacions', "ProgramacionController");
Route::get('generar/programa/{inscripcione}', 'ProgramacionController@generarPrograma')->name('generar.programa');
Route::get('generar/programa/guarderia/{inscripcione}', 'ProgramacionController@generarProgramaGuarderia')->name('generar.programa.guarderia');
Route::get('programacion/mostrar/', "ProgramacionController@mostrar")->name('programacion.mostrar');
Route::get('programacion/mostrar/clases', "ProgramacionController@mostrarClases")->name('programacion.mostrar.clases');
Route::get('programacion/hoy/{inscripcion}', "ProgramacionController@programacionesHoy")->name('programaciones.hoy');
Route::get('programacion/editar/', "ProgramacionController@editar")->name('programacion.editar');
Route::get('programacion/actualizar/', "ProgramacionController@actualizar")->name('programacion.actualizar');
Route::get('regenerar/programa/{inscripcione}/{fecha}/{unModo?}', 'ProgramacionController@regenerarPrograma')->name('regenerar.programa');
Route::get('mostrar/programa/{inscripcione}', 'ProgramacionController@mostrarPrograma')->name('mostrar.programa');
Route::get('imprimir/programa/{inscripcione}', 'ProgramacionController@imprimirPrograma')->name('imprimir.programa');
Route::get('actualizar/programa/segunpago/{inscripcione}', 'ProgramacionController@actualizarProgramaSegunPago')->name('actualizar.programa.segun.pago');
Route::get('clase/marcar/normal/{programacion_id}', 'ProgramacionController@marcadoNormal')->name('marcado.presente.normal');
Route::get('guardar/observacion/programacion', 'ProgramacionController@guardarObservacion')->name('guardar.observacion.programacion');
Route::get('programacion/futuro/{inscripcion}', [ProgramacionController::class,'programacionesFuturo'])->name('programacion.futuro');
Route::get('programacion/asistencia/ajax', [ProgramacionController::class,'asisntecia'])->name('asistencia.ajax');
Route::get('programacion/asignarfalta/ajax', [ProgramacionController::class,'asignarFaltasFechasPasadas'])->name('programacion.asignarFaltas');
Route::get('programados/hoy', function () {return view('programacion.programados');})->name('programas.hoy.view');
Route::get('hoy','ProgramacionController@hoy')->name('programas.hoy');
Route::get('programacion/mostrar/ajax', [ProgramacionController::class,'programacionMostrarAjax'])->name('programacion.mostrar..ajax');

/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% P R O G R A M A C I O N  COMPUTACION  C O N T R E L L E R %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('generar/programacioncom/{matriculacion}',[ProgramacioncomController::class,'generarProgramacom'])->name('generar.programacioncom');
//Route::get('programacioncom/mostrar/{matriculacion}', [ProgramacioncomController::class,'mostrar'])->name('programacioncom.mostrar');
Route::get('programacioncom/mostrar', [ProgramacioncomController::class,'mostrarClases'])->name('programacioncom.mostrar');
Route::get('programacioncom/hoy/{matriculacion}', [ProgramacioncomController::class,'programacionescomHoy'])->name('programacioncom.hoy');
Route::get('programacioncom/futuro/{matriculacion}', [ProgramacioncomController::class,'programacionescomFuturo'])->name('programacioncom.futuro');
Route::get('programacioncom/editar/', [ProgramacioncomController::class,'editar'])->name('programacioncom.editar');
Route::get('programacioncom/actualizar/', [ProgramacioncomController::class,'actualizar'])->name('programacioncom.actualizar');
Route::get('regenerar/programacom/{matriculacion}/{fecha}/{unModo?}', [ProgramacioncomController::class,'regenerarProgramacom'])->name('regenerar.programacioncom');
Route::get('mostrar/programacom/{matriculacion}', [ProgramacioncomController::class,'mostrarProgramacom'])->name('mostrar.programacioncom');
Route::get('imprimir/programacom/{matriculacion}', [ProgramacioncomController::class,'imprimirProgramacom'])->name('imprimir.programacioncom');
Route::get('actualizar/programacom/segunpago/{matriculacion}', [ProgramacioncomController::class,'actualizarProgramaSegunPagocom'])->name('actualizar.programacioncom.segun.pago');
Route::get('clasecom/marcar/normal/{programacioncom_id}', [ProgramacioncomController::class,'marcadoNormal'])->name('marcadocom.presente.normal.programacioncom');
Route::get('guardar/observacion/programacioncom', [ProgramacioncomController::class,'guardarObservacion'])->name('guardar.observacion.programacioncom');
Route::get('inscripciones/vigentes/{estudiante_id}', 'InscripcioneController@inscripcionesVigentes')->name('inscripciones.vigentes');
Route::get('programacioncom/asistencia/ajax', [ProgramacioncomController::class,'asisntecia'])->name('asistenciacom.ajax');
Route::get('programacioncom/asignarfalta/ajax', [ProgramacioncomController::class,'asignarFaltasFechasPasadas'])->name('programacioncom.asignarFaltas');
Route::get('programacioncom/mostrar/ajax', [ProgramacioncomController::class,'programacioncomMostrarAjax'])->name('programacioncom.mostrar..ajax');

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%OBSERVACION RUTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::get('observacion/create/{observable_id}/{observable_type}',[ObservacionController::class,'create'])->name('observacion.create');
Route::get('observacion/editar',[ObservacionController::class,'edit'])->name('observacion.editar');
Route::get('observacion/actualizar',[ObservacionController::class,'update'])->name('observacion.actualizar');
Route::get('darbaja/observacion',[ObservacionController::class,'darbaja'])->name('observacion.darbaja');
Route::get('daralta/observacion',[ObservacionController::class,'daralta'])->name('observacion.daralta');
Route::get('observacion/guardar',[ObservacionController::class,'GuardarObservacion'])->name('observacion.guardar');
Route::post('observacion/store',[ObservacionController::class,'store'])->name('observacion.store');
Route::delete('eliminar/observacion/{observacion}',[ObservacionController::class,'destroy'])->name('eliminar.observacion');
Route::delete('eliminar/general',[ObservacionController::class,'eliminarGeneral'])->name('eliminar.observacion.general');
Route::get('observaciones/{observable_id}/{observable_type}',[ObservacionController::class,'listar'])->name('observaciones.listar');
// Route::get('observaciones',[ObservacionController::class,'listar'])->name('observaciones.listar');
Route::get('observaciones/general',[ObservacionController::class,'listarGeneral'])->name('observaciones.listar.general');
Route::get('guardar/observacion', 'ObservacionController@guardarObservacionGeneral')->name('guardar.observacion.general');

/**
 * clases
 */
Route::get('opciones/{persona}','OpcionController@index')->name('opcion.principal');

//Route::get('principal/{id}', 'OpcionController@principal')->name('opcion.index');
Route::delete('eliminar/pais/{id}','PaisController@eliminarPais')->name('eliminar.pais');
Route::delete('eliminar/ciudad/{id}','CiudadController@eliminarCiudad')->name('eliminar.ciudad');
Route::delete('eliminar/zona/{id}','ZonaController@eliminarZona')->name('eliminar.zona');
Route::delete('eliminar/usuario/{id}','UserController@eliminarUsuario')->name('eliminar.usuario');
Route::delete('eliminar/persona/{id}','PersonaController@eliminarPersona')->name('eliminar.persona');
Route::delete('eliminar/telefono/{persona}/{id}', 'TelefonoController@eliminarTelefono')->name('telefono.eliminar');
Route::delete('eliminar/menu/{id}','MenuController@eliminarMenu')->name('eliminar.menu');
Route::delete('eliminar/grado/{id}', 'GradoController@destroy')->name('eliminar.grado');
Route::delete('eliminar/departamento/{id}', 'DepartamentoController@destroy')->name('eliminar.departamento');
Route::delete('eliminar/provincia/{id}', 'ProvinciaController@destroy')->name('eliminar.provincia');
Route::delete('eliminar/municipio/{id}', 'MunicipioController@destroy')->name('eliminar.municipio');
Route::delete('eliminar/colegio/{id}', 'ColegioController@destroy')->name('eliminar.colegio');
Route::delete('eliminar/modalidad/{id}', 'ModalidadController@destroy')->name('eliminar.modalidad');
Route::delete('eliminar/nivel/{id}', 'NivelController@destroy')->name('eliminar.nivel');
Route::delete('eliminar/inscripcion/{id}', 'InscripcioneController@destroy')->name('eliminar.inscripcione');
Route::delete('eliminar/matriculacion/{id}', 'MatriculacionController@destroy')->name('eliminar.matriculacion');
Route::delete('eliminar/usuario/{id}', 'UserController@destroy')->name('eliminar.user');
Route::delete('eliminar/pago/{pago}', 'PagoController@destroy')->name('eliminar.pago');
Route::delete('eliminar/computacion/{computacion}', 'ComputacionController@destroy')->name('eliminar.computacion');
Route::delete('eliminar/carrera/{carrera}', 'CarreraController@destroy')->name('eliminar.carrera');
Route::delete('eliminar/dia/{carrera}', 'DiaController@destroy')->name('eliminar.dia');
Route::delete('eliminar/feriado/{carrera}', 'FeriadoController@destroy')->name('eliminar.feriado');



Route::get('tomarfoto', function () {return view('persona.tomarfoto');})->name('tomarfoto');
Route::get('tomarfoto/{persona}', 'PersonaController@tomarfoto')->name('tomar.foto.persona');
/**
* si tiene inscripción que aparesca el boton caso contrario no 
* si tiene una inscripción que aparesca de una vez el marcado 
* si tieene varias inscripciones vigentes que puede elegir entre las inscripciones 
* tambien pueden haber inscripciones de colegio. 
**/


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
Route::view('ninacos', 'livewire.ninacos.index')->middleware('auth');


/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  HOME ITE   %%%%%%%%%%%%%%%%%%%%%%%%%%*/






/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  HOME ITE   %%%%%%%%%%%%%%%%%%%%%%%%%%*/

Route::get('/',[HomeController::class, 'index']);

Route::get('home/edit', [HomeController::class, 'edit'])->name('home.edit');

Route::put('home/update/{text}', [HomeController::class, 'update'])->name('home.update');


Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/questions', [HomeController::class, 'questions'])->name('questions');

Route::resource('schedule', HomeScheduleController::class)->names('homeschedule');

Route::resource('question', HomeQuestionController::class)->names('homequestion');

Route::resource('meta', MetaController::class)->names('meta');

Route::resource('curso', CursoController::class)->names('curso');

Route::resource('requisito', RequisitoController::class)->names('requisito');

Route::resource('role', RoleController::class)->names('role');

Route::resource('rolusers', RolUsersController::class)->only(['index', 'edit', 'update'])->names('rolusers');

Route::get('messages/{id}',[MessageController::class, 'create'])->name('messages.create');

Route::get('messages/{message}',[MessageController::class, 'show'])->name('messages.show');

Route::post('messages', [MessageController::class, 'store'])->name('messages.store');