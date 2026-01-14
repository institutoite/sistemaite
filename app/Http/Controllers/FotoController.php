<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FotoController extends Controller
{
    public function show($filename)
    {
        $path = storage_path('app/public/' . $filename);
        // Debug temporal para ver la ruta y existencia del archivo
        //dd(['path' => $path, 'file_exists' => file_exists($path)]);
        if (!file_exists($path)) {
            abort(404);
        }
        // Ejemplo de protección: solo usuarios autenticados pueden ver la foto
        // if (!Auth::check()) {
        //     abort(403);
        // }
        // Puedes agregar más lógica de permisos aquí
        return response()->file($path);
    }
}
