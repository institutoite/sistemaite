
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/reporte.css')}}"> --}}
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

    body {
    
    font-family: helvetica, arial, sans-serif, Montserrat;
    text-rendering: optimizeLegibility;
    }
    body {
    margin: 0;
    }

    .titulo{
        font-size:10px;
        font-weight:12px; 
    }
    .dato{
        font-size:9px;
        background-color:white; 
    }
    .tabla{
        border-collapse: collapse;
        width: 100%;
    }

    div.table-title {
    display: block;
    margin: auto; 
    width: 100%;
    }

    .table-title h3 {
    color: #fafafa;
    font-size: 13px;
    font-weight:300;
    font-style:normal;
    font-family: helvetica, arial, sans-serif, Montserrat;
    text-transform:uppercase;
    }
    .table-fill {
    background: white;
    border-radius:3px;
    border-collapse: collapse;
    margin: auto;
    width: 100%;
    }


    .table{
    border:1px solid #C1C3D1;
    position:absolute;
    }
    
    th {
    color:#4B4B4B;
    border:1px solid #9ea7af;
    
    font-size:12px;
    font-weight: bold;

    text-align:center;
    vertical-align:middle;
    background-color:#ddd;
    }

   
    
    
    tr {
    border:1px solid #d1d1d1;
    border-bottom:1px solid #ddd;
    border-bottom-color: 1px solid #C1C3D1;
    color:#1f1e1e;
    font-size:12px;
    }

  
    
    .table tr:nth-child(odd) td {
        background:#eee;
    }
    
    .table tr:nth-child(odd):hover td {
        background:#000000;
    }

    tr:last-child td:first-child {
    border-bottom-left-radius:3px;
    }
    
    tr:last-child td:last-child {
    border-bottom-right-radius:3px;
    }
    
    td {
    background:#FFFFFF;
    text-align:center;
    vertical-align:middle;
    font-size:11px;
    font-weight:300;
    border-right: 1px solid #C1C3D1;
    border-left: 1px solid #C1C3D1;
    border-top: 1px solid #C1C3D1;
    border-bottom: 1px solid #C1C3D1;
    width: auto;
    }

    td:last-child {
    border-right: 0px;
    }

    th.text-left {
    text-align: left;
    }

    th.text-center {
    text-align: center;
    }

    th.text-right {
    text-align: right;
    }

    td.text-left {
    text-align: left;
    }

    td.text-center {
    text-align: center;
    }

    td.text-right {
    text-align: right;
    }
    </style>
</head>
<body>
    

{{--    
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

</div> --}}
<br>    
<br>    
<br>    
<br>
<div class="float-right">
    CÓDIGO:{{$persona->id}}    
</div>    
<div class="">
   <table class="tabla">
    <tbody>
        <tr>
            <td class="titulo">Estudiante</td>
            <td class="dato">{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</td>
            <td class="titulo">Documento CI</td>
            <td class="dato">{{$persona->carnet}}</td>
            <td class="titulo">Usuario</td>
            <td class="dato">{{$usuario->name}}</td>
        </tr>
        <tr>
            <td class="titulo">Carrera</td>
            <td class="dato">{{$carrera->carrera}}</td>
            <td class="titulo">Total horas</td>
            <td class="dato">{{$matriculacion->totalhoras}}</td>
            <td class="titulo">Asignatura</td>
            <td class="dato">{{$asignatura->asignatura}}</td>
        </tr>
        
        
    </tbody>
   </table>
</div>
<hr style="height:0.2px;border-width:0;color:rgba(214, 213, 213, 0.1);background-color:gray">

    <div class="divtabla">
        <table class="table-fill tabla1">
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
                        $clase .= ''; 
                    }else{
                        if($programa->habilitado==0){
                            $clase .= ''; 
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


