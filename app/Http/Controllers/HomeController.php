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
use App\Models\Carrera;
use App\Models\Persona;
use App\Models\Nivel;
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
       
        
    }

    public function index()
    {
        return view('layouts.home');
    }

    public function guarderia()
    {
        $modalidadesguarderia=Modalidad::where('vigente',1)->where('nivel_id',1)->get();
        return view('home.fronted.guarderia', compact(['modalidadesguarderia']));
    }

    public function inicial()
    {
        $modalidadesinicial=Modalidad::where('vigente',1)->where('nivel_id',2)->get();
        return view('home.fronted.inicial', compact(['modalidadesinicial']));
    }

    public function primaria()
    {
        $modalidadesprimaria=Nivel::findOrFail(3)->modalidades;
        $horalibre=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%hora libre%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        $semana=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%semana%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        $quincena=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%quincena%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        $mes=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%MES%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        $bimestre=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%bimestre%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        $trimestre=Modalidad::join('nivels','modalidads.nivel_id','nivels.id')
        ->where("modalidad","like",'%trimestre%')// semana es la primer palabra del nombre de la modadalidad
        ->where("modalidads.nivel_id",3) // el 3 es un id del nivel buscado
        ->get();
        return view('home.fronted.primaria', compact(['modalidadesprimaria','horalibre','semana','quincena','mes','bimestre','trimestre']));
    }

    public function secundaria()
    {
        $modalidadessecundaria=Modalidad::where('vigente',1)->where('nivel_id',4)->get();
        return view('home.fronted.secundaria', compact(['modalidadessecundaria']));
    }

    public function preuniversitario()
    {
        $modalidadespreuniversitario=Modalidad::where('vigente',1)->where('nivel_id',5)->get();
        return view('home.fronted.preuniversitario', compact(['modalidadespreuniversitario']));
    }


    public function universitario()
    {
        $modalidadesuniversitario=Modalidad::where('vigente',1)->where('nivel_id',5)->get();
        return view('home.fronted.universitario', compact(['modalidadesuniversitario']));
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
