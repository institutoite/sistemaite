@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Colegio Crear')

@section('content_header')
@stop

@section('content')
    <section class="content container-fluid p-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Colegio: {{$colegio->nombre}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('colegios.index') }}"> Listar colegios</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>ATRIBUTO</th>
                                    <th>VALOR</th>
                                </tr>

                            </thead>   
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $colegio->id }}</td>
                                </tr>
                                <tr>
                                    <td>NOMBRE COLEGIO</td>
                                    <td>{{ $colegio->nombre }}</td>
                                </tr>
                                <tr>
                                    <td>RUE</td>
                                    <td>{{ $colegio->rue }}</td>
                                </tr>
                                <tr>
                                    <td>DIRECTOR</td>
                                    <td>{{ $colegio->director }}</td>
                                </tr>
                                <tr>
                                    <td>DIRECCION</td>
                                    <td>{{ $colegio->direccion }}</td>
                                </tr>
                                <tr>
                                    <td>TELEFONO</td>
                                    <td>{{ $colegio->telefono }}</td>
                                </tr>
                                <tr>
                                    <td>CELULAR</td>
                                    <td>{{ $colegio->celular }}</td>
                                </tr>
                                <tr>
                                    <td>DEPENDENCIA</td>
                                    <td>{{ $colegio->dependencia }}</td>
                                </tr>
                               
                                <tr>
                                    <td>TURNO</td>
                                    <td>{{ $colegio->turno }}</td>
                                </tr>
                                <tr>
                                    <td>DEPARTAMENTO</td>
                                    <td>{{ $colegio->departamento }}</td>
                                </tr>
                                <tr>
                                    <td>PROVINCIA</td>
                                    <td>{{ $colegio->provincia }}</td>
                                </tr>
                                <tr>
                                    <td>NUNICIPIO</td>
                                    <td>{{ $colegio->municipio }}</td>
                                </tr>
                                <tr>
                                    <td>DISTRITO</td>
                                    <td>{{ $colegio->distrito }}</td>
                                </tr>
                                <tr>
                                    <td>AREA GEOGRAFICA</td>
                                    <td>{{ $colegio->areageografica }}</td>
                                </tr>
                                <tr>
                                    <td>NIVELES</td>
                                    <td>
                                        {{$colegio->nivel}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>CORDENADAS</td>
                                    @php
                                        $direccion="https://maps.google.com/?q=".$colegio->coordenadax.",".$colegio->coordenaday."&z=5&t=k";
                                    @endphp
                                    <td> <a target="_blank" href="{{$direccion}}">Ubicación</a> </td>
                                </tr>
                                 <tr>
                                    <td>Usuario</td>
                                    <td>
                                        @isset($user)
                                            {{$user->name}}
                                            <img  src="{{URL::to('/').Storage::url("$user->foto")}}" alt="{{$user->name}}" width="100" class="rounded img-thumbnail img-fluid border-primary border-5"> 
                                        @endisset
                                    </td>
                                </tr>
                                 
                            </tbody>
                        </table>

                        
                      
                        
                       

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
