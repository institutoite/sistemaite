<?php

use Illuminate\Support\Facades\Route;
use App\Persona;

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

Route::get('opciones/{id}','OpcionController@index')->name('opcion.index');

Route::delete('eliminar/pais/{id}','PaisController@eliminarPais')->name('eliminar.pais');
Route::delete('eliminar/ciudad/{id}','CiudadController@eliminarCiudad')->name('eliminar.ciudad');
Route::delete('eliminar/zona/{id}','ZonaController@eliminarZona')->name('eliminar.zona');
Route::delete('eliminar/usuario/{id}','UserController@eliminarUsuario')->name('eliminar.usuario');
Route::delete('eliminar/persona/{id}','PersonaController@eliminarPersona')->name('eliminar.persona');
Route::delete('eliminar/menu/{id}','MenuController@eliminarMenu')->name('eliminar.menu');

Route::get('tomarfoto', function () {
    return view('persona.tomarfoto');
});