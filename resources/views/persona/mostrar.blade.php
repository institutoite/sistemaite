@extends('adminlte::page')

@section('title', 'Persona Mostrar')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('dist/css/starrr.css')}}">

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            CALIFICACION
        </div>
        <div class="card-body">
            
            @if ($calificado==0)
                <x-calificacion color="primary" :personaid="$persona->id">
                    <x-slot name="title">
                        Calificar este Modelo
                    </x-slot>
                </x-calificacion>
            @else
            <div class="row">
                <div class="col-10">
                    <div class="border  position-relative">
                        <div class="text-center col-auto p-5">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{($promedio/5)*100}}%"></div>
                            </div>
                            <a href="" class="editar_calificacion" ><i class="fa fa-fw fa-edit text-primary"></i></a>
                            Mi calificaion {{$micalificacion}}
                        </div>
                        
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center border">
                        <div class="circulo bg-primary">
                            <h1>{{ $promedio }}</h1> 
                        </div>
                        Calificación    
                    </div>
                </div>
            </div>
                
                
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped"> 
                <tr class="bg-primary">
                        <th>ATRIBUTO</th>
                        <th>VALOR</th>
                </tr>
                <tbody>
                    <tr>
                        <td>Codigo</td>
                        <td>{{$persona->id}}</td>
                    </tr>
                    <tr>
                        <td>Fotografía
                        </td>
                        <td> 
                            <div class="text-center">
                                <img class="rounded img-thumbnail img-fluid border-primary border-5" src="{{URL::to('/').Storage::url("$persona->foto")}}" alt="{{$persona->nombre.' '.$persona->apellidop}}"> 
                                <p>{!!$observacion!!}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</td>
                    </tr>
                    <tr>
                        <td>fechanacimiento</td>
                        <td>'Nacido el: <strong> {{$persona->fechanacimiento}} </strong> Nació <strong>{{ $persona->fechanacimiento->diffForHumans()}} </strong> </td>
                    </tr>
                    <tr>
                        <td>Carnet</td>
                        <td>{{$persona->carnet." ".$persona->expedido}} </td>
                    </tr>
                    <tr>
                        <td>Género</td>
                        <td>{{$persona->genero}} </td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{$persona->telefono}} </td>
                    </tr>
                    <tr>
                        <td>Pais</td>
                        <td>{{$pais->nombrepais}} </td>
                    </tr>
                    <tr>
                        <td>Ciudad</td>
                        <td>{{$ciudad->ciudad}} </td>
                    </tr>
                    <tr>
                        <td>Zona</td>
                        <td>{{$zona->zona}} </td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td>{{$persona->direccion}} </td>
                    </tr>
                    <tr>
                        <td>Como se enteró</td>
                        <td>{{$persona->como}} </td>
                    </tr>
                    <tr>
                        <td>Papel Inicial</td>
                        <td>{{$persona->papelinicial}} </td>
                    </tr>
                    <tr>
                        <td>Recomendado por</td>
                        @isset($recomendado)
                            <td> <a href="{{route('personas.show',$recomendado)}}">{{$recomendado->nombre.' '.$recomendado->apellidop}}</a> </td>
                        @endisset
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>{{$persona->updated_at}}</td>
                    </tr>
                    <tr>
                        <td>vino por primera vez</td>
                        <td>{{$persona->created_at}} </td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td>
                            {{$user->name}}
                            <img  src="{{URL::to('/').Storage::url("$user->foto")}}" alt="{{$user->name}}" class="rounded img-thumbnail img-fluid border-primary border-5"> 
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Apoderados
        </div>
        <div class="card-body">
            <table id="telefonos" class="table table-hover table-bordered table-striped display responsive nowrap" width="100%">
                <thead class="bg-primary">
                    <th>#</th>
                    <th>APODERADOS</th>
                    <th>NUMERO</th>
                    <th>PARENTESCO</th>
                    <th>ACTUALIZADO</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>
                        {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}
                    </td>
                    <td>
                       <a class="text-bold" href="tel:{{$persona->telefono}}">{{$persona->telefono}}</a> 
                    </td>
                    <td>
                        Personal
                    </td>
                    <td>{{$persona->updated_at->diffForHumans()}}</td>
                

                    @foreach ($apoderados as $apoderado)
                        <tr>
                            <td>{{$loop->iteration+1}}</td>
                            <td>
                                {{$apoderado->nombre.' '.$apoderado->apellidop.' '.$apoderado->apellidom}}
                            </td>
                            <td>
                                <a class="text-bold" href="tel:{{$apoderado->telefono}}">{{$apoderado->pivot->telefono}}</a>
                            </td>
                            <td>
                                {{$apoderado->pivot->parentesco}}
                            </td>
                            <td>{{$apoderado->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Observaciones de esta persona
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Observacion</th>
                        <th>activo</th>
                        <th>Usuario</th>
                        <th>creado</th>
                        <th>Actualizado</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($observaciones as $observacion)
                        <tr>
                            <td>{{ $observacion->id }}</td>
                            <td>{{ $observacion->observacion }}</td>
                            <td>{{ $observacion->activo }}</td>
                            <td>{{ App\Models\User::findOrFail($observacion->userable->user_id)->name}}</td>
                            <td>{{ $observacion->created_at }}</td>
                            <td>{{ $observacion->updated_at }}</td>
                            <td>
                                editar 
                                eliminar
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('persona.modalescalificacion')
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('dist/js/starrr.js')}}"></script>

    <script src="https://kit.fontawesome.com/067a2afa7e.js" crossorigin="anonymous"></script>

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
         $('.starrr').starrr({
            max: 5,
            change: function(e, value){
                if (value) {
                    $("#calificacion").val(value);
                } else {
                    $('.your-choice-was').hide();
                }
                
            }
        });

        $(document).ready(function(){
            $('.editar_calificacion').on('click',function(e) {
                e.preventDefault(); 
                let persona_id ="{{ $persona->id }}";
                console.log(persona_id);
                    $.ajax({
                    url : "../calificacion/editar",
                    data : { persona_id :persona_id },
                    success : function(json) {
                            console.log(json.calificacion.calificacion);
                            $("#editar-calificacion").modal("show");
                            $('#calificacion').val(json.calificacion.calificacion);
                            $('#calificacion_id').val(json.calificacion.id);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },  
                });
            });
        });

    </script>
@stop