
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/reporte.css')}}">
    
</head>
<body>
    

   
<div class="divencabezado">
    <div class="logo">    
        <img src="{{asset('imagenes/logo.png')}}" width="130px" alt="Logotipo de ite">    
    </div>    
        <div class="cuadros" id="direccion">
            <span class="titulos"> <strong> ENCUENTRANOS </strong> </span>
            <span>Av. Tres pasos al Frente # 4710</span>
            <span>Villa 1 Mayo Calle:16 Oeste #9</span>
            <span>www.ite.com.bo</span>
            <span>www.educabol.com</span>
        </div>
        <div class="cuadros" id="sucursales">
            <span class="titulos"> <strong>NIVELES</strong> </span><br>
            <span>Guardería</span>
            <span>Inicial</span>
            <span>Primaria</span>
            <span>Secundaria</span> 
            <span>Pre Universitario</span> 
            <span>Unversitario</span> 
            <span>Profesional</span> 
        </div>
        <div class="cuadros" id="contactos">
            <span class="titulos"> <strong> CONTACTANOS </strong> </span>
            <span>71039910  75553338 71324941</span><br>
            <span>3-219050</span><br>
            <span>info@ite.com.bo</span>
            
        </div> 
</div>
<hr>

    <div class="titulos inscripcion" ><h3> CODIGO:{{$persona->id}}<h3></div>

    
<div class="datos">
        <div class="personal cuadrosdatos">
            <span class="titulos"> <strong> DATOS PERSONALES </strong> </span><br>
            <span>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</span><br>
            <span>{{$persona->direccion }}</span><br>
            <span>{{$persona->carnet}} </span> 
        </div>
        <div class="inscripciondata cuadrosdatos " >
            <span class="titulos"> <strong> INSCRIPCION</strong> </span><br>
            <span>{{$carrera->carrera}}</span>
            <span>{{$matriculacion->totalhoras}}</span><br>
            <span>Usuario:{{$usuario->name}}</span>
        </div>
        <div class="academico cuadrosdatos" >
            <span class="titulos"> <strong> ACADEMICO </strong> </span><br>
            
            
        </div> 

</div>

    <div class="divtabla">
        <table class="table-fill table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>FECHA</th>
                    <th>DIA</th>
                <th>HORARIO</th>
                <th>HRAS</th>
                <th>DOCENTE/MATERIA/AULA</th>
                <th>PAGO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programacion as $programa)
            @php
                    echo $programa->materia;
                    $hoy=Carbon\Carbon::now();
                    $clase="";
                    if($programa->fecha->isoFormat('DD/MM/YYYY')==$hoy->isoFormat('DD/MM/YYYY')){
                        $clase .= 'bg-success'; 
                    }else{
                        if($programa->habilitado==0){
                            $clase .= 'bg-danger'; 
                        }
                        }
                        @endphp
                <tr class="{{$clase}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$programa->fecha->isoFormat('DD/MM/YYYY')}}</td>
                    <td>{{$programa->fecha->isoFormat('dddd')}}</td>
                    <td>{{$programa->horaini->isoFormat('HH:mm').'-'.$programa->horafin->isoFormat('HH:mm')}}</td>
                    <td>{{$programa->horas_por_clase}}</td>
                    <td>{{$programa->nombre.'/'.$programa->aula}}</td>
                    <td>
                        @php
                            if($programa->habilitado==1){
                                echo "ok";
                            }else{
                                echo "impaga";
                            }
                            @endphp
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
            <tfoot>
                este es el pie de pagina
            </tfoot>
        </table>
    </div>
</body>
</html>


