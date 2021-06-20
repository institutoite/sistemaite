<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();

Route::get('/home',function(){
    return view('persona.estudiantes');
})->name('inicio');

Route::get('personas.todos', function () {
    return view('persona.index');
});


Route::get('/paises/listar',function(){
    return view('pais.index');
})->name('listar');

Route::resource('personas', "PersonaController");
Route::get('personas/opciones/{id}', function ($id) {
    return view('persona.opciones');
})->name('personas.opciones');

Route::put('persona/{persona}/subirfoto','PersonaController@guardarfoto')->name('guardarfoto');
Route::put('persona/{persona}/subirfotojpg', 'PersonaController@guardarfotojpg')->name('guardarfotojpg');
//Route::put('persona/subirfoto', 'PersonaController@guardarfoto')->name('actualizarfoto');


Route::resource('paises', "PaisController");
Route::resource('ciudades', "CiudadController");
Route::resource('zonas', "ZonaController");
//Route::resource('usuarios', "UserController");
Route::resource('menus', "MenuController");
Route::resource('grado', "GradoController");
Route::resource('departamentos', "DepartamentoController");
Route::resource('provincias', "ProvinciaController");
Route::resource('municipios', "MunicipioController");
Route::resource('colegios', "ColegioController");
Route::resource('modalidads', "ModalidadController");
Route::resource('nivels', "NivelController");
Route::resource('inscripciones', "InscripcioneController");
Route::resource('pagos', "PagoController");
Route::resource('billetes', "BilleteController");
Route::resource('programacions', "ProgramacionController");
Route::resource('feriados', "FeriadoController");
Route::resource('clases', "ClaseController");
Route::resource('personas', "PersonaController");
Route::resource('telefonos', "TelefonoController");
Route::resource('licencias', 'LicenciaController');
Route::resource('users', 'UserController');

Route::get('user/crear', "UserController@crear")->name('users.crear');
Route::post('user/guardar', "UserController@guardar")->name('users.guardar');



Route::get('marcar/asistencia/', 'ClaseController@marcado')->name('marcado');
Route::get('clase/crear', 'ClaseController@crear')->name('clase.crear');
Route::get('clase/marcar/rapido/{programacion_id}', 'ClaseController@marcadoRapido')->name('marcado.presente.rapido');
Route::get('clase/marcar/normal/{programacion_id}', 'ProgramacionController@marcadoNormal')->name('marcado.presente.normal');
Route::post('programa/estado/general/', 'ClaseController@marcadoGeneral')->name('programa.estado.general');
Route::post('/clase/guardar/normal/{progrmacion_id}', 'ClaseController@guardar')->name('clases.guardar');


Route::get('clases/presentes/ahorita', 'ClaseController@clasesPresentes')->name('clases.presente');
Route::get('clase/finalizar/', 'ClaseController@finalizarClase')->name('clases.finalizar');


Route::get('apoderado/existente/{persona}', 'TelefonoController@apoderadoExistente')->name('apoderado.existente');
Route::get('telefono/agregar/{persona_id}/{apoderado_id}', 'TelefonoController@agregarApoderado')->name('agregar.apoderado');
Route::post('guardar/apoderado/existente', 'TelefonoController@guardarApoderadoExistente')->name('guardar.apoderado.existente');



Route::get('presentes',function(){
    return view('clase.presentes');
});



Route::get('tus_inscripciones/{estudiante_id}', 'InscripcioneController@tusinscripciones')->name('tus.inscripciones');
Route::get('listar/inscripciones/{persona}', 'InscripcioneController@listar')->name('listar_inscripciones');
Route::get('listar/inscripciones/crear/{persona}', 'InscripcioneController@crear')->name('inscribir');
Route::post('inscripcion/guardar/configuracion/{id}', 'InscripcioneController@guardarconfiguracion')->name('inscripcion.guardar.configuracion');
Route::post('inscripcion/actualizar/configuracion/{id_inscripcion}', 'InscripcioneController@actualizarConfiguracion')->name('inscripcion.actualizar.configuracion');
Route::get('inscripcion/actualizar/fechapago/{fecha}/{id}', 'InscripcioneController@actualizar_fecha_proximo_pago')->name('set.fecha.proximo.pago');


Route::get('telefonos/vista/{persona}','TelefonoController@mostrarvista')->name('telefonos.persona');
Route::get('telefono/crear/{persona}', 'TelefonoController@crear')->name('telefonos.crear');
Route::get('telefonos/{persona}', 'PersonaController@index')->name('telefono.de.persona');
Route::get('telefono/{persona}/{id}/editar','TelefonoController@editar')->name('telefono.editar');
Route::put('telefono/{persona_id}/{apoderado_id}', 'TelefonoController@actualizar')->name('telefono.actualizar');

Route::post('crear/contacto/{persona}','PersonaController@storeContacto')->name('persona.storeContacto');

Route::get('pago/crear/{inscripcione}','PagoController@crear')->name('pagos.crear');
Route::post('pagos/realizar/{id}', 'PagoController@guardar')->name('pagos.guardar');


Route::post('billetes/crear/{id}', 'BilleteController@guardar')->name('billetes.guardar');

Route::get('generar/programa/{inscripcione}', 'ProgramacionController@generarPrograma')->name('generar.programa');
Route::get('regenerar/programa/{inscripcione}/{fecha}', 'ProgramacionController@regenerarPrograma')->name('regenerar.programa');
Route::get('mostrar/programa/{inscripcione}', 'ProgramacionController@mostrarPrograma')->name('mostrar.programa');
Route::get('imprimir/programa/{inscripcione}', 'ProgramacionController@imprimirPrograma')->name('imprimir.programa');
Route::get('actualizar/programa/segunpago/{inscripcione}/{pago}', 'ProgramacionController@actualizarProgramaSegunPago')->name('actualizar.programa.segun.pago');

/**
 * clases
 */
Route::get('programa/marcar/{inscripcine_id}', 'ClaseController@marcadoGeneral')->name('clases.marcado.general');
Route::get('inscripciones/vigentes/{estudiante_id}', 'InscripcioneController@inscripcionesVigentes')->name('inscripciones.vigentes');











Route::get('opciones/{id}','OpcionController@index')->name('opcion.principal');
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
Route::delete('eliminar/inscripcion/{id}', 'InscripcioneController@destroy')->name('eliminar.nivel');

Route::get('tomarfoto', function () {return view('persona.tomarfoto');})->name('tomarfoto');
Route::get('tomarfoto/{persona}', 'PersonaController@tomarfoto')->name('tomar.foto.persona');

/**
* si tiene inscripción que aparesca el boton caso contrario no 
* si tiene una inscripción que aparesca de una vez el marcado 
* si tieene varias inscripciones vigentes que puede elegir entre las inscripciones 
* tambien pueden haber inscripciones de colegio. 
**/