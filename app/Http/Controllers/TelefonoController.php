<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GuardarApoderadoExistenteRequest;
use App\Http\Requests\TelefonoUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CredencialesPadreNotification;

class TelefonoController extends Controller
{
    private ?bool $hasGcontactQueueColumnsCache = null;
    public function __construct()
    {
        $this->middleware('can:Listar Telefonos')->only("index","mostrarvista","mostrarvistaConIdPersona","apoderadoExistente");
        $this->middleware('can:Crear Telefonos')->only("crear","agregarApoderado");
        $this->middleware('can:Editar Telefonos')->only("editar","actualizar");
        $this->middleware('can:Eliminar Telefonos')->only("eliminarTelefono");
    }

    private function canSyncGoogleContacts(): bool
    {
        return !empty(session('GContactToken'));
    }

    private function hasGcontactQueueColumns(): bool
    {
        if ($this->hasGcontactQueueColumnsCache !== null) {
            return $this->hasGcontactQueueColumnsCache;
        }

        $this->hasGcontactQueueColumnsCache =
            Schema::hasColumn('personas', 'gcontact_sync_pending') &&
            Schema::hasColumn('personas', 'gcontact_sync_error') &&
            Schema::hasColumn('personas', 'gcontact_sync_attempts') &&
            Schema::hasColumn('personas', 'gcontact_sync_last_attempt_at');

        return $this->hasGcontactQueueColumnsCache;
    }

    private function markSyncState(Persona $persona, bool $ok, ?string $error = null): void
    {
        if (!$this->hasGcontactQueueColumns()) {
            return;
        }

        $persona->gcontact_sync_pending = !$ok;
        $persona->gcontact_sync_error = $ok ? null : Str::limit((string) $error, 2000, '');
        $persona->gcontact_sync_attempts = (int) ($persona->gcontact_sync_attempts ?? 0) + 1;
        $persona->gcontact_sync_last_attempt_at = now();
    }

    private function processPendingGoogleQueue(?int $excludePersonaId = null, int $limit = 5): void
    {
        if (!$this->canSyncGoogleContacts() || !$this->hasGcontactQueueColumns()) {
            return;
        }

        $pendientes = Persona::where('gcontact_sync_pending', 1)
            ->when($excludePersonaId, function ($query, $id) {
                $query->where('id', '<>', $id);
            })
            ->orderBy('gcontact_sync_last_attempt_at', 'asc')
            ->limit($limit)
            ->get();

        foreach ($pendientes as $pendiente) {
            $this->syncPersonaWithGoogle($pendiente, false);
        }
    }

    private function syncPersonaWithGoogle(Persona $persona, bool $drainQueue = true): void
    {
        if (!$this->canSyncGoogleContacts()) {
            return;
        }

        try {
            $gcontactController = app(GContactController::class);
            $sincronizado = false;

            if (empty($persona->resourseName) || empty($persona->etag)) {
                $data = $gcontactController->createContact(
                    $persona->nombre,
                    $persona->apellidop,
                    $persona->apellidom,
                    null,
                    $persona->telefono
                );
                if (is_array($data) && count($data) >= 2) {
                    $persona->resourseName = $data[0];
                    $persona->etag = $data[1];
                    $this->markSyncState($persona, true);
                    $sincronizado = true;
                } else {
                    $this->markSyncState($persona, false, 'No se pudo crear el contacto en Google (servicio no disponible o respuesta invalida).');
                    $sincronizado = true;
                }
            } else {
                $nuevoEtag = $gcontactController->updateContact(
                    $persona->nombre,
                    $persona->apellidop,
                    $persona->apellidom,
                    $persona->telefono,
                    $persona->resourseName,
                    $persona->etag
                );
                if (is_string($nuevoEtag) && $nuevoEtag !== '') {
                    $persona->etag = $nuevoEtag;
                    $this->markSyncState($persona, true);
                    $sincronizado = true;
                } else {
                    $this->markSyncState($persona, false, 'No se pudo actualizar el contacto en Google (servicio no disponible o respuesta invalida).');
                    $sincronizado = true;
                }
            }

            if ($sincronizado) {
                $persona->saveQuietly();
            }

            if ($drainQueue) {
                $this->processPendingGoogleQueue($persona->id);
            }
        } catch (\Throwable $e) {
            $this->markSyncState($persona, false, $e->getMessage());
            $persona->saveQuietly();
            report($e);
        }
    }
    
    public function index(Persona $persona)
    {
        if (request()->ajax()) {
            $datos =datatables()->of(Telefono::select('id', 'numero', 'parentesco')->where('persona_id', '=', $persona->id))
            ->addColumn('btn', 'user.action')
            ->rawColumns(['btn', 'icono'])
            ->toJson();    
            return $datos;
        }
    }

    public function telefonoPersona(Persona $persona){
        
       return Telefono::select('id', 'numero', 'parentesco')->where('persona_id', '=', $persona->id);
    }
    

    public function mostrarvista(Persona $persona){
        $apoderados= $persona->apoderados;

        return view('telefono.index',compact('persona','apoderados'));
    }
   
    public function mostrarvistaConIdPersona($persona_id){
        //return response()->json(['d'=>$persona_id]);
        $persona=Persona::find($persona_id);
        $apoderados=$persona->apoderados;

        return view('telefono.index',compact('persona','apoderados'));
    }

   
    public function crear(Persona $persona)
    {
        $gcontactController  = app(GContactController::class);
        $tiempoToken = tiempoEnSegundos($gcontactController->getTokenExpiration());  // metodo esta en Helper.php
     
        return view('telefono.crear',compact('persona','tiempoToken'));
    }

   

    public function apoderadoExistente(Persona $persona){
        
        return view('persona.existente',compact('persona'));
        // return view('persona.existente');
    }
    public function listarApoderados(Persona $persona){
        $apoderados=Persona::all();
        return datatables()->eloquent($apoderados)
        ->addColumn('btn','persona.apoderadoaction')
        ->rawColumns(['btn'])
        ->toJson();
    }
    public function prueba($persona,$apoderado){
        return $persona.$apoderado;
    }

    public function agregarApoderado($persona_id,$apoderado_id){

        $estudiante=Persona::findOrFail($persona_id);
        $apoderado = Persona::findOrFail($apoderado_id);
        return view('telefono.agregarApoderado',compact('estudiante','apoderado'));
    }

    public function guardarApoderadoExistente(GuardarApoderadoExistenteRequest $request){
            $estudiante_id=$request->persona_id;
            $apoderado_id=$request->apoderado_id;
            $apoderado=Persona::findOrFail($apoderado_id);
            $persona=Persona::findOrFail($estudiante_id);
            $apoderado->telefono=$request->telefono;
            $apoderado->save();
            $this->syncPersonaWithGoogle($apoderado);
            $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->parentesco]);

            $existingUser = User::where('persona_id', $apoderado->id)->first();
            if (!$existingUser) {
                $correoBase = Str::slug($apoderado->nombre.$apoderado->apellidop, '');
                $correoGenerado = strtolower($correoBase.$apoderado->id)."@ite.com.bo";
                $plainPassword = Str::random(10);

                $user = new User();
                $user->email = $correoGenerado;
                $user->name = ucfirst(strtolower($apoderado->nombre))." ".ucfirst(strtolower($apoderado->apellidop));
                $user->persona_id = $apoderado->id;
                $user->password = Hash::make($plainPassword);
                $user->foto = "estudiantes/sinperfil.png";
                $user->save();

                $padreRole = Role::firstOrCreate(['name' => 'Padre']);
                // Seguridad: el acceso del padre se gestiona por validacion padre-hijo en backend.
                // No otorgamos permisos globales de listado para evitar acceso horizontal.
                $padreRole->syncPermissions([]);
                $user->assignRole($padreRole);

                $notificables = User::role(['Admin','Secretaria'])->get();
                if ($notificables->isNotEmpty()) {
                    Notification::send($notificables, new CredencialesPadreNotification($user, $plainPassword, $persona, route('telefonos.persona', ['persona' => $persona])));
                }
            }

            return redirect()->Route('telefonos.persona', ['persona' => $persona]);
        
    }
    public function guardarApoderadoExistenteAjax(Request $request){
        
        $estudiante_id=$request->persona_id;
        $apoderado_id=$request->apoderado_id;
        $apoderado=Persona::findOrFail($apoderado_id);
        $persona=Persona::findOrFail($estudiante_id);
        $apoderado->telefono=$request->telefono;
        $apoderado->save();
        $this->syncPersonaWithGoogle($apoderado);
        $persona->apoderados()->attach($apoderado->id, ['telefono' => $request->telefono, 'parentesco' => $request->pariente]);

        $existingUser = User::where('persona_id', $apoderado->id)->first();
        if (!$existingUser) {
            $correoBase = Str::slug($apoderado->nombre.$apoderado->apellidop, '');
            $correoGenerado = strtolower($correoBase.$apoderado->id)."@ite.com.bo";
            $plainPassword = Str::random(10);

            $user = new User();
            $user->email = $correoGenerado;
            $user->name = ucfirst(strtolower($apoderado->nombre))." ".ucfirst(strtolower($apoderado->apellidop));
            $user->persona_id = $apoderado->id;
            $user->password = Hash::make($plainPassword);
            $user->foto = "estudiantes/sinperfil.png";
            $user->save();

            $padreRole = Role::firstOrCreate(['name' => 'Padre']);
            // Seguridad: el acceso del padre se gestiona por validacion padre-hijo en backend.
            // No otorgamos permisos globales de listado para evitar acceso horizontal.
            $padreRole->syncPermissions([]);
            $user->assignRole($padreRole);

            $notificables = User::role(['Admin','Secretaria'])->get();
            if ($notificables->isNotEmpty()) {
                Notification::send($notificables, new CredencialesPadreNotification($user, $plainPassword, $persona, route('telefonos.persona', ['persona' => $persona])));
            }
        }

        return response()->json(['mensaje' =>'Registro guardardo correctamente']);
        
    }

    
    public function editar(Persona $persona,$apoderado_id)
    {
        
        $registro_pivot=DB::table('persona_persona')->select('id','persona_id','persona_id_apoderado','parentesco','telefono')
                    ->where('persona_id_apoderado','=',$apoderado_id)
                    ->where('persona_id','=',$persona->id)->get();
        $persona = Persona::findOrFail($apoderado_id);

        $gcontactController  = app(GContactController::class);
        $tiempoToken = tiempoEnSegundos($gcontactController->getTokenExpiration());  // metodo esta en Helper.php

        return view('telefono.editar',compact('tiempoToken','persona','registro_pivot'));
    }

    
    public function actualizar(TelefonoUpdateRequest $request, $persona_id, $apoderado_id)
    {
        $persona=Persona::findOrFail($persona_id);
        $registro_pivot = DB::table('persona_persona')->select('id', 'persona_id', 'persona_id_apoderado', 'parentesco', 'telefono')
        ->where('persona_id_apoderado', '=', $apoderado_id)
            ->where('persona_id', '=', $persona->id)->get();
        $apoderado=Persona::findOrFail($registro_pivot[0]->persona_id_apoderado);
        $apoderado->nombre = $request->nombre;
        $apoderado->apellidop = $request->apellidop;
        $apoderado->apellidom = $request->apellidom;
        $apoderado->genero = $request->genero;
        $apoderado->telefono = $request->telefono;
        $apoderado->save();

        $this->syncPersonaWithGoogle($apoderado);


        $persona->apoderados()->updateExistingPivot($registro_pivot[0]->persona_id_apoderado,['telefono'=>$request->telefono,'parentesco'=>$request->parentesco],false);
        $apoderados = $persona->apoderados;
        return view('telefono.index', compact('persona', 'apoderados'));
    }
    public function eliminarTelefono(Persona $persona,$id)
    {
        $apoderado=Persona::findOrFail($id);
        $persona->apoderados()->detach($apoderado->id);
        $apoderados = $persona->apoderados;
        $persona->telefono='';
        $persona->save();

        return view('telefono.index',compact('persona','apoderados'));
    }
}
