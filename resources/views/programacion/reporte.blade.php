
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/reporte.css')}}">
    
</head>
<body>
    
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
                
               
                
                
                <div class="card-body">
                    <br><br><br><br><br><br>
                    <table class="table-fill">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FECHA</th>
                                <th>DIA</th>
                                <th>HORARIO</th>
                                <th>DOCENTE</th>
                                <th>MATERIA</th>
                                <th>AULA</th>
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
                                    <td>{{$programa->hora_ini->isoFormat('HH:mm').'-'.$programa->hora_fin->isoFormat('HH:mm')}}</td>
                                    <td>{{$programa->nombre}}</td>
                                    <td>{{$programa->materia}}</td>
                                    <td>{{$programa->aula}}</td>
                                </tr>

                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

</body>
</html>


