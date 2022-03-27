@extends('adminlte::page')

@section('title', 'Persona Mostrar')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('dist/css/starrr.css')}}">
@endsection

@section('content_header')
    
@stop

@section('content')
{{-- {{dd($persona)}} --}}
    <div class="card">
        <div class="card-body">

            <x-alert color="primary" califable="Personilla" calificableid="5">
                <x-slot name="title">
                    Calificar este Modelo
                </x-slot>
            </x-alert>

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
                        <td>Fotografía</td>
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
                        <td>primera vez vino</td>
                        <td>{{$persona->created_at}} </td>
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
                    @foreach ($apoderados as $apoderado)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                {{$apoderado->nombre.' '.$apoderado->apellidop.' '.$apoderado->apellidom}}
                            </td>
                            <td>
                                <a href="tel:{{$apoderado->telefono}}">{{$apoderado->pivot->telefono}}</a> 
                            </td>
                            <td>
                                {{$apoderado->pivot->parentesco}}
                            </td>
                            <td>{{$apoderado->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('dist/js/starrr.js')}}"></script>

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

    </script>
@stop