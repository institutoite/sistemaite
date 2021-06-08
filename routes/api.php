<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Persona;
use App\Models\Pais;
use App\Models\Ciudad;
use App\Models\Zona;
use App\Models\User;
use App\Models\Menu;
use App\Models\Grado;
use App\Models\Departamento;
use App\Models\Provincia;
use App\Models\Municipio;
use App\Models\Colegio;
use App\Models\Modalidad;
use App\Models\Nivel;
use App\Models\Inscripcione;
use Illuminate\Support\Facades\DB;

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

Route::get('estudiantes',function(){
   $persona=Persona::join('estudiantes','estudiantes.persona_id','=','personas.id')
                    ->select('personas.id',DB::raw('concat_ws(" ",nombre,apellidop,apellidom) as nombre'),'foto');
   //dd($persona);
   //=Persona::join('estudiantes','personas.id','=','estudiantes.persona_id')->select('personas.id','idantiguo','nombre','apellidop','apellidom','foto',)->get())
   return datatables()->of($persona)
        ->addColumn('btn','persona.action')
        ->rawColumns(['btn','foto'])
        ->toJson();
});

Route::get('referencias',function(){
    return datatables()->of(Persona::select('id','nombre','apellidop','apellidom','foto'))
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
Route::get('personas', function () {
    $persona=Persona::select('id',DB::raw('concat_ws(" ",nombre,apellidop,apellidom) as nombre'),'foto');
    return datatables()->of($persona)
        ->addColumn('btn', 'persona.actiontodos')
        ->rawColumns(['btn'])
        ->toJson();
})->name('personas.todos');
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

Route::get('modalidades', function () {
    return datatables()->of(Modalidad::get())
        ->addColumn('btn', 'modalidad.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('niveles', function () {
    return datatables()->of(Nivel::get())
        ->addColumn('btn', 'nivel.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('inscripciones', function () {
    return datatables()->of(Inscripcione::get())
        ->addColumn('btn', 'inscripcione.action')
        ->rawColumns(['btn'])
        ->toJson();
});

Route::get('pais/{id}/ciudades','CiudadController@city_of_country');
Route::get('ciudad/{id}/zonas','ZonaController@zona_of_city');

Route::get('departamento/{id}/provincias', 'ProvinciaController@provincia_of_departamento');
Route::get('provincia/{id}/municipios', 'MunicipioController@municipio_of_provincia');
