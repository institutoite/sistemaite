@extends('adminlte::page')

@section('title', 'Persona Mostrar')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@endsection

@section('content_header')
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped"> 
                <tr class="bg-primary">
                    
                        <th>ATRIBUTO</th>
                        <th>VALOR</th>
                    
                </tr>
                <tbody>
                    <tr>
                        <td>Id</td>
                        <td>{{$persona->id}}</td>
                    </tr>
                    
                    <tr>
                        <td>Fotografía</td>
                            
                        <td> 
                            
                            <div class="text-center">
                                
                                <img class="rounded img-thumbnail img-fluid border-primary border-5" src="{{URL::to('/').Storage::url("$persona->foto")}}" alt="{{$persona->nombre.' '.$persona->apellidop}}"> 
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
                        <td>{{$persona->carnet}} </td>
                    </tr>
                    <tr>
                        <td>Expedido</td>
                        <td>{{$persona->expedido}} </td>
                    </tr>
                    <tr>
                        <td>Género</td>
                        <td>{{$persona->genero}} </td>
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
                        <td>{{$persona->persona_id}} </td>
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
@stop


@section('js')
    <script> console.log('Hi!'); </script>
@stop