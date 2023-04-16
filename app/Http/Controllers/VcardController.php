<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use App\Models\Persona;

class VcardController extends Controller
{
    // public function createVcard(Persona $persona){
    public function createVcard($persona,$vcard){
       
        $Arraynombre=$this->tratarNombre($persona->nombre);
        $lastname = $Arraynombre[0];
        $firstname = $persona->apellidop." ".$persona->apellidom;
        $additional = $Arraynombre[1];
        $prefix = $persona->id;
        $suffix = '';
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
        $vcard->addCompany($persona->id);
        $vcard->addJobtitle($persona->papelinicial);
        // $vcard->addRole('addRole');
        $vcard->addPhoneNumber($persona->telefono, 'PREF;WORK');
        $vcard->addAddress(null, $persona->zona ==null ? 'Zona sin definir' : $persona->zona->zona , $persona->direccion,$persona->ciudad ==null ? 'Ciudad sin definir' : $persona->ciudad->ciudad ,'', '', $persona->pais ==null ? 'Pais sin definir' : $persona->pais->nombrepais);
        // $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('https://wa.me/591'.$persona->telefono);
        $vcard->addURL('https://www.ite.com.bo/actualizar/contacto/'.$persona->id);
        
        $vcard->addBirthday( $persona->fechanacimiento==null ? "":$persona->fechanacimiento->isoFormat("Y-m-d"));
        $vcard->addUrl("https://www.ite.com.bo");
        

        if($persona->foto!=null){
            $path = storage_path('app/public/'.$persona->foto);
            $url=$path = str_replace('\\', '/', $path);
            if (file_exists($path)) {
                $vcard->addPhoto($url);    
            }else{
                $path = storage_path('app/public/estudiantes/foto.jpg');
                $url=$path = str_replace('\\', '/', $path);
                $vcard->addPhoto($url);
            }
        }else{
            $path = storage_path('app/public/estudiantes/foto.jpg');
            $url=$path = str_replace('\\', '/', $path);
            $vcard->addPhoto($url);
        }
        
        $observaciones=$persona->observaciones;
        $contador=1;
        
        if ($persona->estudiante != null) {
            $gestiones=$persona->estudiante->grados()->orderBy('anio', 'asc')->get();
        }else{
            $gestiones=[];
        }

        if(count($gestiones)>0){
            $notagestiones="------------GRADOS---------\n";
            foreach ($gestiones as $grado) {
                $notagestiones.=$contador.".-".$grado->grado." - ".$grado->pivot->anio."\n";
                $contador++;
            }
        }else{
            $notagestiones="Sin gestiones\n";
        }
        $contador=1;
        if(count($observaciones)>0){
            $notaobservaciones="\n----------OBSERVACIONES--------\n";
            foreach ($observaciones as $value) {
                $notaobservaciones.=$contador.".-".strip_tags($value->observacion)."\n";
                $contador++;
            }
         }else{
            $notaobservaciones="Sin observaciones\n";
         }
        if ($persona->estudiante != null) {
            $inscripciones=$persona->estudiante->inscripciones;
            $notainscripciones="\n----------INSCRIPCIONES--------\n";
            $contador=1;
            foreach ($inscripciones as $inscripcion) {
                $notainscripciones.=$contador.".-\n"."Modalidad:".$inscripcion->modalidad->modalidad."\nCosto:".$inscripcion->costo."\nEstado:".$inscripcion->estado->estado."\n";
                $contador++;
            }
        }else{
            $inscripciones=[];
            $notainscripciones="Sin inscripciones\n";
        }
        $contador=1;
         if ($persona->computacion != null) {
            $notamatriculaciones="----------MATRICULACIONES--------\n";
            $matriculaciones=$persona->computacion->matriculaciones;
            foreach ($matriculaciones as $matriculacion) {
            $notamatriculaciones.=$contador.".-\n"."Asignatura:".$matriculacion->asignatura->asignatura."\nCosto:".$matriculacion->costo."\nEstado:".$matriculacion->estado->estado."\n";
            $contador++;
        }
        }else{
            $matriculaciones=[];
            $notamatriculaciones="Sin matriculaciones\n";
        }
        $contador=1;
        $apoderados=$persona->apoderados;
        if(count($apoderados)>0){    
            $notaapoderados="----------APODERADOS--------\n";
            foreach ($apoderados as $apoderado) {
                $notaapoderados.=$contador.".-\n"."Apoderado:".$apoderado->nombre.$apoderado->apellidop."\nParentesco:".$apoderado->pivot->parentesco."\nteléfono:".$apoderado->telefono."\n";
                $vcard->addUrl("https://wa.me/591".$apoderado->telefono);
                $vcard->addPhoneNumber($apoderado->telefono, 'PREF;APODERADO');
                $contador++;
            }
        }else{
            $notaapoderados="Sin apoderados\n";
        }
        $nota=$notagestiones.$notaobservaciones.$notainscripciones.$notamatriculaciones.$notaapoderados;
        $vcard->addNote($nota);
        $lineas = explode(PHP_EOL, $vcard->getOutput());
        $lineas_no_vacias = array_filter($lineas, function($linea) {
            return !empty(trim($linea));
        });
        $texto_nuevo = implode(PHP_EOL, $lineas_no_vacias);
        if($persona->id==22)

        $texto_nuevo= preg_replace("~[\r\n]+~", "\n", $texto_nuevo);
    
        // return $vcard->getOutput();
        return $texto_nuevo;
        // // return vcard as a download
        // $pathcontactos = storage_path('app/public/contactos');
        // $urlcontactos=$pathcontactos = str_replace('\\', '/', $pathcontactos);
        //$vcard->addPhoto($urlcontactos);
         
        // $vcard->setFilename(
        //     $lastName = $inicio."_".$fin,
        // );
        // $vcard->setSavePath($pathcontactos);
        // $vcard->save();
        // return $vcard->download();

        // save vcard on disk
    }


    public function tratarNombre($nombreCompleto)
    {
        $nombreSeparado = explode(" ", $nombreCompleto);
        if (count($nombreSeparado) == 1) {
            array_push($nombreSeparado, "");
        }
        return  $nombreSeparado;
    }

    public function actualizarTarjeta($persona_id){
        $vcard = new VCard();
        $persona=Persona::find($persona_id);
        $this->createVcard($persona,$vcard);
        
        return $vcard->download();
    }

    public function crearContactos(Request $request,$inicio=1, $incremento=100){
            $inicio=$request->inicio;
            $ultimo_id=Persona::get()->last()->id;
            if($incremento+$inicio>$ultimo_id)
                $incremento=$ultimo_id-$inicio;
            $personas=Persona::whereBetween('id',[$inicio,$inicio+$incremento])->get();
            $vcardGrupal="";
            foreach ($personas as $persona) {
                $vcard = new VCard();
                $vcardGrupal.=$this->createVcard($persona,$vcard);
            }
            $pathcontactos = storage_path('app/contactos/todos/'.$inicio."_".$inicio+$incremento.".vcf");
            $file = fopen($pathcontactos, 'w');
            fwrite($file, $vcardGrupal);
            fclose($file);
            $directorio = storage_path("app/contactos/todos");

            $archivos = scandir($directorio);
            return view("persona.contacto.archivos", ['archivos' => $archivos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
