<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Convenio;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Feriado;
use App\Models\Homequestion;
use App\Models\Homeschedule;
use App\Models\Hometext;
use App\Models\Modalidad;
use App\Models\Persona;
use App\Models\Plan;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('can:Editar Homes')->only('edit','update');
        $this->middleware('can:Eliminar Homes')->only('destroy');
    }

    public function index()
    {
        $docentes = Docente::where('estado_id','11')->get();
        $convenios = Convenio::all();
        $colegios = Colegio::all();
        $hometext= Hometext::all();
        $horarios= Homeschedule::all();
        $intereses= Interest::where('id',"<",10)->get();
        
        
        return view('home.index', compact(['docentes','convenios','colegios','hometext','intereses','horarios']));
    }

    public function plan($id)
    {
        $convenio = Convenio::find($id);
        $planes = $convenio->planes;
        return view('home.fronted.plan', compact(['planes']));
    }

    public function about()
    {
        return view('home.fronted.about');
    } 
    
    public function contact()
    {
        return view('home.fronted.contact');
    }

    public function privacy()
    {
        return view('home.fronted.privacy');
    }

    public function termscondition()
    {
        return view('home.fronted.termscondition');
    }
    
    public function questions()
    {
        $questions = Homequestion::all();
        return view('home.questions', compact('questions'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $text = Hometext::get()->last();
        return view('home.text.edit', compact('text'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hometext $text)
    {
        $text->header=$request->header;
        $text->heading=$request->heading;
        $text->subheading=$request->subheading;

         if ($request->hasFile('banner')) {
            // verificando si exites la foto actual
            
            
            if (Storage::disk('public')->exists($text->banner)) {
                // aquí la borro
                Storage::disk('public')->delete($text->banner);
            }

            $banner = $request->file('banner');
            $nombreImagen = 'banners/' . Str::random(20) . '.jpg';
            /** las convertimos en jpg y la redimensionamos */
            $imagen = Image::make($banner)->encode('jpg', 75);
            $imagen->resize(1400, 300, function ($constraint) {
                $constraint->upsize();
            });
            /* las guarda en en la carpeta estudiantes  */
            $bannercillo = Storage::disk('public')->put($nombreImagen, $imagen->stream());

            $text->banner = $nombreImagen;
        }
        $text->save();
        return redirect()->route('home.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
