@extends('adminlte::page')

@section('title', 'Persona Mostrar')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@endsection

@section('content_header')
    
@stop

@section('content')
{{-- {{dd($persona)}} --}}
    <div class="card">
            <div class="card-header">
                    Mostrar Docente <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('docentes.index')}}">Listar docentes</a>
            </div>
        <div class="card-body">
            <table class="table table-bordered table-striped"> 
                <tr class="bg-primary">
                    
                        <th>ATRIBUTO</th>
                        <th>VALOR</th>
                    
                </tr>
                <tbody>
                    <tr>
                        <td>Codigo</td>
                        <td>{{$docente->id}}</td>
                    </tr>
                    
                    <tr>
                        <td>Fotografía</td>
                            
                        <td> 
                            
                            <div class="text-center">
                                
                                {{-- <img class="rounded img-thumbnail img-fluid border-primary border-5" src="{{URL::to('/').Storage::url("$persona->foto")}}" alt="{{$persona->nombre.' '.$persona->apellidop}}">  --}}
                                <p>{!!$docente->perfil!!}</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre</td>
                        <td>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</td>
                    </tr>
                    <tr>
                        <td>Nombre corto</td>
                        <td>{{$docente->nombrecorto}}</td>
                    </tr>


                    <tr>
                        <td>Fecha Inicio</td>
                        <td>'Empezo a trabajar: <strong> {{$docente->fecha_inicio}} </strong> Hace <strong>{{ $docente->fecha_inicio->diffForHumans()}} </strong> </td>
                    </tr>
                    <tr>
                        <td>Dias prueba</td>
                        <td>{{$docente->dias_prueba}} </td>
                    </tr>
                    <tr>
                        <td>Sueldo</td>
                        <td>{{$docente->sueldo}} </td>
                    </tr>
                    <tr>
                        <td>Mododocente</td>
                        <td>{{$docente->mododocente->mododocente}} </td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{$docente->estado->estado}} </td>
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>{{$docente->updated_at}}</td>                       
                    </tr>
                    <tr>
                        <td>Registro</td>
                        <td>{{$docente->created_at}} </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>
@stop


@section('js')
    
@stop