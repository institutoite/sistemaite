<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Persona;
use App\Pais;
use App\Ciudad;
use App\Zona;
use App\User;
use App\Menu;
use App\Grado;
use App\Departamento;
use App\Provincia;
use App\Municipio;
use App\Colegio;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('personas',function(){
    return datatables()->of(Persona::all())
        ->addColumn('btn','persona.action')
        ->rawColumns(['btn','foto'])
        ->toJson();
});

Route::get('referencias',function(){
    return datatables()->of(Persona::select('id','idantiguo','nombre','apellidop','apellidom','foto'))
        ->addColumn('btn', 'persona.actionmodal')
        ->rawColumns(['foto','btn'])
        ->toJson();
});



Route::get('paises',function(){
    return datatables()->of(Pais::all())
        ->addColumn('btn','pais.action')
        ->rawColumns(['btn'])
        ->toJson();

});
Route::get('ciudades',function(){
    $ciudades=Ciudad::select('ciudads.id','ciudad','nombrepais')->join('pais','pais.id','=','ciudads.pais_id')->get();
    return datatables()->of($ciudades)
        ->addColumn('btn','ciudad.action')
        ->rawColumns(['btn'])
        ->toJson();
});
Route::get('zonas',function(){
    return datatables()->of(Zona::all())
        ->addColumn('btn','zona.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('usuarios',function(){
    return  datatables()->of(User::select('id','name','email','foto')->get())
        ->addColumn('btn','user.action')
        ->rawColumns(['btn','foto'])
        ->toJson();
});

Route::get('menus', function () {
    return datatables()->of(Menu::get())
        ->addColumn('btn', 'user.action')
        ->rawColumns(['btn','icono'])
        ->toJson();
});

Route::get('grados', function () {
    return datatables()->of(Grado::get())
        ->addColumn('btn', 'grado.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('departamentos', function () {
    return datatables()->of(Departamento::get())
        ->addColumn('btn', 'departamento.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('provincias', function () {
    return datatables()->of(Provincia::select('provincias.id','provincia','departamento')
        ->join('departamentos','departamentos.id','=','provincias.departamento_id')->get())
        ->addColumn('btn', 'provincia.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('municipios', function () {
    return datatables()->of( Municipio::select('municipios.id','municipio','provincia')
        ->join('provincias','provincias.id','=','municipios.provincia_id')->get())
        ->addColumn('btn', 'municipio.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('colegios', function () {
    return datatables()->of(Colegio::select('colegios.id', 'nombre', 'rue','telefono','celular')->get())
        ->addColumn('btn', 'colegio.action')
        ->rawColumns(['btn'])
        ->toJson();
});




Route::get('pais/{id}/ciudades','CiudadController@city_of_country');
Route::get('ciudad/{id}/zonas','ZonaController@zona_of_city');

Route::get('departamento/{id}/provincias', 'ProvinciaController@provincia_of_departamento');
Route::get('provincia/{id}/municipios', 'MunicipioController@municipio_of_provincia');
