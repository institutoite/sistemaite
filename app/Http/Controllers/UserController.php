<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use UxWeb\SweetAlert\SweetAlert as SweetAlert;
use Alert;
use App\Models\Persona;
use Illuminate\Support\Facades\Hash;

//use UxWeb\SweetAlert\SweetAlert as SweetAlertSweetAlert;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        //Alert::success('Success Title', 'Success Message');
        //
        //dd($v);
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        //SweetAlert::message('Robots are working!');
        SweetAlert::success('Success Message', 'Optional Title');
        return view('auth.register', compact('user'));
    }
    
    public function crear()
    {
        //dd("hola");
        //return view('vendor.adminlte.auth.register');
        return view('user.create');
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }
    public function guardar(UserStoreRequest $request)
    {
        $usuario=new User();
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password= Hash::make($request->password);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreImagen = 'usuarios/' . Str::random(20) . '.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(160, 160, function ($constraint) {
                $constraint->upsize();
            });
            /* las guarda en en la carpeta estudiantes  */
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());

            $usuario->foto = $nombreImagen;

        }
        $usuario->save();
        
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request->all());

        $user->name=$request->name;
        $user->email=$request->email;
        if($request->password != null){
            $user->password=$request->password;
        }
        if ($request->hasFile('foto')) {
            // verificando si exites la foto actual
            if (Storage::disk('public')->exists($user->foto)) {
                // aquí la borro
                Storage::disk('public')->delete($user->foto);
            }
            //       leandro bruno leaandro
            $foto = $request->file('foto');
            $nombreImagen = 'usuarios/' . Str::random(20) . '.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen = Image::make($foto)->encode('jpg', 75);
            $imagen->resize(160, 160, function ($constraint) {
                $constraint->upsize();
            });
            /* las guarda en en la carpeta correpondiente  */
            $fotillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());

            $user->foto = $nombreImagen;
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return response()->json(['message' => 'Registro Eliminado', 'status' => 200]);
    }
    
    public function share(Persona $persona){
        $apoderados= $persona->apoderados;
        return view('telefono.index',compact('persona','apoderados'));
    }
    public function quien(Request $request){
        $useres=User::join('userables','userables.user_id','users.id')
            ->where('userable_id',69)
            ->where('userables.userable_type',"App\\Models\\Observacion")
            ->select('name')
            ->get();
            
        return response()->json(['user'=>$useres,'d'=>2]);
    }

}
