<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Feriado;
use App\Models\Homequestion;
use App\Models\Homeschedule;
use App\Models\Hometext;
use App\Models\Modalidad;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all()->where('estado','activo');
 
        return view('home.index', compact(['docentes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //dd($request->all());
        //$hometext=new Hometext();
        // $text->banner=$request->banner;
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
