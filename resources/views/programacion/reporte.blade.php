
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

    body {
    
    font-family: helvetica, arial, sans-serif, Montserrat;
    text-rendering: optimizeLegibility;
    }
    body {
    margin: 0;
    }

    div.table-title {
    display: block;
    margin: auto; 
    width: 100%;
    }

    .table-title h3 {
    color: #fafafa;
    font-size: 20px;
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
    
    font-size:14px;
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
    font-size:16px;
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
    font-size:15px;
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
    
    {{-- <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('custom/css/reporte.css')}}"> --}}
    
</head>
<body>
    

   
{{-- <div class="divencabezado">
       
        {{-- <div class="cuadros" id="direccion">
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
<hr> --}}

    {{-- <div class="titulos inscripcion" ><h3> CODIGO:{{$persona->id}}<h3></div> --}}

    
<div class="">
   <table class="table">
    <tbody>
        <tr>
            <td>Estudiante</td>
            <td>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</td>
            <td>Documento CI</td>
            <td>>{{$persona->carnet}}</td>
            <td>Usuario</td>
            <td>>{{$usuario->name}}</td>
        </tr>
        <tr>
            <td>Modalidad</td>
            <td>{{$modalidad->modalidad}}</td>
            <td>Total horas</td>
            <td>>{{$inscripcion->totalhoras}}</td>
            <td>Nivel</td>
            <td>>{{$nivel->nivel}}</td>
        </tr>
    </tbody>
   </table>
        <div class="inscripciondata cuadrosdatos " >
            <span class="titulos"> <strong> INSCRIPCION</strong> </span><br>
            <span>{{$modalidad->modalidad}}</span>
            <span>{{$inscripcion->totalhoras}}</span><br>
            <span>{{$nivel->nivel}}</span><br>
            <span>Usuario:{{$usuario->name}}</span>
        </div>
        <div class="academico cuadrosdatos" >
            <span class="titulos"> <strong> ACADEMICO </strong> </span><br>
            <span>{{$colegio->nombre}}</span><br>
            <span>{{$grado->grado}}</span>
            <span>{{$colegio->turno}}</span><br>
            <span>{{$colegio->direccion}}</span>
        </div> 

</div>
    
    <div class="divtabla" styker="page-break-inside: auto;">
        <table class="table-fill table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>FECHA</th>
                    <th>DIA</th>
                    <th>HORARIO</th>
                    <th>HRAS</th>
                    <th>DOCENTE/MATERIA/AULA</th>
                    <th>FRAC</th>
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
                    <td>{{$programa->hora_ini->isoFormat('HH:mm').'-'.$programa->hora_fin->isoFormat('HH:mm')}}</td>
                    <td>{{$programa->horas_por_clase}}</td>
                    <td>{{$programa->nombre.'/'.$programa->materia.'/'.$programa->aula}}</td>
                    <td>
                        @php
                            if($programa->habilitado==1){
                                echo "activado";
                            }else{
                                echo "inactivo";
                            }
                            @endphp
                    </td>
                </tr>
                @if($loop->iteration%25==0){
                    <tr> <td colspan="7"> <div style="page-break-before:always;"> </div> </td></tr>
                @endif
                @endforeach

                <tfoot>
                    <tr class={{$clase}}>
                        <th colspan="3"></th>
                        <th colspan="2">Total:{{round($inscripcion->totalhoras,1)}} Horas</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>

            </tbody>
            <tfoot>
                este es el pie de pagina
            </tfoot>
        </table>
    </div>
</body>
</html>


