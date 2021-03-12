@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pais: {{$pais_actualizado->nombrepais}}</h1>
@stop

@section('content')
    @isset($Mensaje)
        <p>{{$Mensaje}}</p>    
    @endisset
    
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
                        <td>{{$pais_actualizado->id}}</td>
                    </tr>
                    <tr>
                        <td>Pais</td>
                        <td>{{$pais_actualizado->nombrepais}}</td>
                    </tr>
                    <tr>
                        <td>Creado</td>
                        <td>{{$pais_actualizado->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>{{$pais_actualizado->updated_at}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    
@stop

@section('css')
   
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop