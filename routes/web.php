<?php

use Illuminate\Support\Facades\Route;
use App\Persona;

use Barryvdh\DomPDF\Facade as PDF;


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
//Route::put('persona/subirfoto', 'PersonaController@guardarfoto')->name('actualizarfoto');


Route::resource('paises', "PaisController");
Route::resource('ciudades', "CiudadController");
Route::resource('zonas', "ZonaController");
Route::resource('usuarios', "UserController");
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


Route::get('pdf', function(){
    //$pdf = resolve('dompdf.wrapper');
    $pdf=PDF::loadView('persona.index');
    return $pdf->stream();
});


Route::get('tus_inscripciones/{id}', 'InscripcioneController@tusinscripciones')->name('tus.inscripciones');
Route::get('listar/inscripciones/{persona}', 'InscripcioneController@listar')->name('listar_inscripciones');
Route::get('listar/inscripciones/crear/{persona}', 'InscripcioneController@crear')->name('inscribir');
Route::post('inscripcion/guardar/configuracion/{id}', 'InscripcioneController@guardarconfiguracion')->name('inscripcion.guardar.configuracion');
Route::post('inscripcion/actualizar/configuracion/{id}', 'InscripcioneController@actualizarConfiguracion')->name('inscripcion.actualizar.configuracion');
Route::get('inscripcion/actualizar/fechapago/{fecha}/{id}', 'InscripcioneController@actualizar_fecha_proximo_pago')->name('set.fecha.proximo.pago');


Route::resource('telefonos', "TelefonoController");
Route::get('telefonos/vista/{persona}','TelefonoController@mostrarvista')->name('telefonos.persona');
Route::get('telefono/crear/{persona}', 'TelefonoController@crear')->name('telefonos.crear');
Route::get('telefonos/{persona}', 'PersonaController@index')->name('telefono.de.persona');
Route::get('telefono/{persona}/{id}/editar','TelefonoController@editar')->name('telefono.editar');
Route::put('telefono/{persona_id}/{apoderado_id}', 'TelefonoController@actualizar')->name('telefono.actualizar');

Route::post('crear/contacto/{persona}','PersonaController@storeContacto')->name('persona.storeContacto');

Route::post('pagos/realizar/{id}', 'PagoController@guardar')->name('pagos.guardar');

Route::post('billetes/crear/{id}', 'BilleteController@guardar')->name('billetes.guardar');

Route::get('generar/programa/{inscripcion}', 'ProgramacionController@generarPrograma')->name('generar.programa');
Route::get('mostrar/programa/{inscripcion}', 'ProgramacionController@mostrarPrograma')->name('mostrar.programa');

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

Route::get('tomarfoto', function () {return view('persona.tomarfoto');})->name('tomarfoto');
Route::get('tomarfoto/{persona}', 'PersonaController@tomarfoto')->name('tomar.foto.persona');
