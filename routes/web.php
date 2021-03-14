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

Route::get('alerta', function () {
    alert()->success('You have been logged out.', 'Good bye!');
    return redirect('/');//->with('success','Este mensaje es de Sweet alert');
});


Route::resource('personas', "PersonaController");
Route::resource('paises', "PaisController");
Route::resource('ciudades', "CiudadController");
Route::resource('zonas', "ZonaController");

