<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\OpcionController;
use Illuminate\Support\Facades\Auth;
//use SweetAlert;
use UxWeb\SweetAlert\SweetAlert as SweetAlert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('alert', function () {
    $var=SweetAlert::success('Success Message', 'Optional Title');
    //dd($var->);
    return view('user.index2');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ninacos', function () {
    return view('ninaco.index');
});

Auth::routes();


Route::get('/home',function(){
    return view('persona.estudiantes');
})->name('inicio')->middleware('auth');

Route::get('personas.todos', function () {
    return view('persona.index');
});


Route::get('/paises/listar',function(){
    return view('pais.index');
})->name('listar');


Route::get('personas/opciones/{id}', function ($id) {
    return view('persona.opciones');
})->name('personas.opciones');

Route::put('persona/{persona}/subirfoto','PersonaController@guardarfoto')->name('guardarfoto');
Route::put('persona/{persona}/subirfotojpg', 'PersonaController@guardarfotojpg')->name('guardarfotojpg');
//Route::put('persona/subirfoto', 'PersonaController@guardarfoto')->name('actualizarfoto');

Route::resource('personas', "PersonaController");
Route::resource('paises', "PaisController");
Route::resource('ciudades', "CiudadController");
Route::resource('zonas', "ZonaController");
//Route::resource('usuarios', "UserController");
Route::resource('menus', "MenuController");
//Route::resource('grado', "GradoController");
Route::resource('departamentos', "DepartamentoController");
Route::resource('provincias', "ProvinciºaController");
Route::resource('municipios', "MunicipioController");
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% C O L E G I O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('colegios', "ColegioController");
Route::get('colegio/all', 'ColegioController@todos');
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  F I N   C O L E G I O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

Route::resource('modalidads', "ModalidadController");
Route::resource('nivels', "NivelController");
Route::resource('inscripciones', "InscripcioneController");


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       E S T D U D I A N T E S         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('/hoy','EstudianteController@hoy')->name('estudiantes.hoy');
Route::get('/historial/{estudiante}','EstudianteController@historia')->name('estudiante.historia');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       D O C E N T E S         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('docentes','DocenteController@index')->name('estudiante.index');
Route::get('opciones/docentes/{persona}',[OpcionController::class,'docentes'])->name('opcion.docentes');
Route::delete('eliminar/docente/{docente}', 'DocenteController@destroy')->name('eliminar.docente');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       A D M I N I S T R AT I V O S         %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('administrativos','AdministrativoController@index')->name('administrativo.index');
Route::get('opciones/administrativos/{persona}',[OpcionController::class,'administrativos'])->name('opcion.administrativos');
//Route::get('opciones/docentes/{persona}','OpcionController@docentes')->name('opcion.docentes');
//Route::delete('eliminar/docente/{docente}', 'DocenteController@destroy')->name('eliminar.docente');


/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  T E M A S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::get('temas/{materia_id}','TemaController@listar')->name('tamas.listar');

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       P  A  G  O  S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('pagos', "PagoController");
Route::get('pago/crear/{inscripcione}', 'PagoController@crear')->name('pagos.crear');
Route::get('pago/mostrar/{pago}', 'PagoController@mostrar')->name('pagos.mostrar');
Route::get('pago/editar/{pago}', 'PagoController@editar')->name('pago.editar');
Route::get('pagos/inscripcion/{inscripcione}', 'PagoController@detallar')->name('pagos.detallar');
Route::post('pagos/realizar/{inscripcione}', 'PagoController@guardar')->name('pagos.guardar');
Route::patch('pago/actualizar/{pago}', "PagoController@actualizar")->name('pago.actualizar');



/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       B  I  L  L  E  T  E  S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('billetes', "BilleteController");
Route::get('billetes/crear/{pago}', "BilleteController@crear")->name('billete.crear');
Route::post('billetes/crear/{pago}', 'BilleteController@guardar')->name('billetes.guardar');



Route::resource('feriados', "FeriadoController");
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%       R O U T E S  C L A S E S          %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
Route::resource('clases', "ClaseController");
Route::get('clase/editar/{clase}',"ClaseController@edit")->name('clase.editar');
Route::get('clase/editar',"ClaseController@editar")->name('clase.editar.ajax'); /* editar mediante ajax desde presentes */
Route::get('clase/actualizar/{clase}',"ClaseController@actualizar")->name('clase.actualizar');
Route::get('clase/mostrar/',"ClaseController@mostrar")->name('clase.mostrar');
Route::get('clase/listar',"ClaseController@index")->name('clase.index');
Route::get('clase/finalizar/', 'ClaseController@finalizarClase')->name('clases.finalizar');
Route::get('clases/presentes/ahorita', 'ClaseController@clasesPresentes')->name('clases.presente');
Route::get('presentes', function () {
    return view('clase.presentes');
})->name('clase.presentes');



/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  G R A D O S  %%%%%%%%%%%%%%%%%%%%%%%%%%*/
//Route::resource('grados', [GradoController::class]);
Route::get('grados',[GradoController::class,'index'])->name('grados.index');
Route::get('grados/create',[GradoController::class,'create'])->name('grados.create');
Route::get('grados/store',[GradoController::class,'store'])->name('grados.store');
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





// Route::get('gestiones/editar78', [GestionController::class, 'edition'])->name('gestion.editar');

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%  R O U T E S  M O T I V O S %%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('motivos', "MotivoController");
Route::get('motivo/mostrar/', "MotivoController@mostrar")->name("motivo.mostrar");
Route::get('motivo/editar/', "MotivoController@editar")->name("motivo.editar");
Route::get('motivo/actualizar/', "MotivoController@actualizar")->name("motivo.actualizar");
Route::delete('eliminar/motivo/{motivo}', 'MotivoController@destroy')->name('eliminar.motivo');

Route::resource('personas', "PersonaController");
Route::resource('telefonos', "TelefonoController");
Route::resource('licencias', 'LicenciaController');
Route::resource('users', 'UserController');

Route::get('user/crear', "UserController@crear")->name('users.crear');
Route::post('user/guardar', "UserController@guardar")->name('users.guardar');

Route::get('marcar/asistencia/', 'ClaseController@marcado')->name('marcado');
Route::get('clase/crear', 'ClaseController@crear')->name('clase.crear');
Route::get('clase/marcar/rapido/{programacion_id}', 'ClaseController@marcadoRapido')->name('marcado.presente.rapido');

Route::post('programa/estado/general/', 'ClaseController@marcadoGeneral')->name('programa.estado.general');
Route::post('/clase/guardar/normal/{progrmacion_id}', 'ClaseController@guardar')->name('clases.guardar');

Route::get('apoderado/existente/{persona}', 'TelefonoController@apoderadoExistente')->name('apoderado.existente');
Route::get('telefono/agregar/{persona_id}/{apoderado_id}', 'TelefonoController@agregarApoderado')->name('agregar.apoderado');
Route::post('guardar/apoderado/existente', 'TelefonoController@guardarApoderadoExistente')->name('guardar.apoderado.existente');
Route::get('modalidad/cosultar/', 'ModalidadController@consultar')->name('modalidad.consultar');

Route::get('tus_inscripciones/{estudiante_id}', 'InscripcioneController@tusinscripciones')->name('tus.inscripciones');
Route::get('listar/inscripciones/{persona}', 'InscripcioneController@listar')->name('listar_inscripciones');
Route::get('inscripcione/crear/{persona}', 'InscripcioneController@crear')->name('inscribir');
Route::post('inscripcion/guardar/configuracion/{id}', 'InscripcioneController@guardarconfiguracion')->name('inscripcion.guardar.configuracion');
Route::post('inscripcion/actualizar/configuracion/{id_inscripcion}', 'InscripcioneController@actualizarConfiguracion')->name('inscripcion.actualizar.configuracion');
Route::get('inscripcion/actualizar/fechapago/{fecha}/{id}', 'InscripcioneController@actualizar_fecha_proximo_pago')->name('set.fecha.proximo.pago');

Route::get('telefonos/vista/{persona}','TelefonoController@mostrarvista')->name('telefonos.persona');
Route::get('telefono/crear/{persona}', 'TelefonoController@crear')->name('telefonos.crear');
Route::get('telefonos/{persona}', 'PersonaController@index')->name('telefono.de.persona');
Route::get('telefono/{persona}/{id}/editar','TelefonoController@editar')->name('telefono.editar');
Route::put('telefono/{persona_id}/{apoderaçdo_id}', 'TelefonoController@actualizar')->name('telefono.actualizar');
Route::post('crear/contacto/{persona}','PersonaController@storeContacto')->name('persona.storeContacto');

/** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% P R O G R A M A C I O N   C O N T R E L L E R %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
Route::resource('programacions', "ProgramacionController");
Route::get('generar/programa/{inscripcione}', 'ProgramacionController@generarPrograma')->name('generar.programa');
Route::get('programacion/mostrar/', "ProgramacionController@mostrar")->name('programacion.mostrar');
Route::get('programacion/mostrar/clases', "ProgramacionController@mostrarClases")->name('programacion.mostrar.clases');
Route::get('programacion/hoy/{inscripcion}', "ProgramacionController@programacionesHoy")->name('programaciones.hoy');
Route::get('programacion/editar/', "ProgramacionController@editar")->name('programacion.editar');
Route::get('programacion/actualizar/', "ProgramacionController@actualizar")->name('programacion.actualizar');
Route::get('regenerar/programa/{inscripcione}/{fecha}', 'ProgramacionController@regenerarPrograma')->name('regenerar.programa');
Route::get('mostrar/programa/{inscripcione}', 'ProgramacionController@mostrarPrograma')->name('mostrar.programa');
Route::get('imprimir/programa/{inscripcione}', 'ProgramacionController@imprimirPrograma')->name('imprimir.programa');
Route::get('actualizar/programa/segunpago/{inscripcione}', 'ProgramacionController@actualizarProgramaSegunPago')->name('actualizar.programa.segun.pago');
Route::get('clase/marcar/normal/{programacion_id}', 'ProgramacionController@marcadoNormal')->name('marcado.presente.normal');
Route::get('guardar/observacion/programacion', 'ProgramacionController@guardarObservacion')->name('guardar.observacion.programacion');

/**
 * clases
 */
Route::get('programa/marcar/{inscripcine_id}', 'ClaseController@marcadoGeneral')->name('clases.marcado.general');
Route::get('inscripciones/vigentes/{estudiante_id}', 'InscripcioneController@inscripcionesVigentes')->name('inscripciones.vigentes');











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
Route::delete('eliminar/usuario/{id}', 'UserController@destroy')->name('eliminar.user');
Route::delete('eliminar/pago/{pago}', 'PagoController@destroy')->name('eliminar.user');

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