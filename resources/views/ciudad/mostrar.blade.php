@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ciudad: {{$ciudad->ciudad}}</h1>
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
                        <td>{{$ciudad->id}}</td>
                    </tr>
                    <tr>
                        <td>Ciudad</td>
                        <td>{{$ciudad->ciudad}}</td>
                    </tr>
                    <tr>
                        <td>Pais</td>
                        <td>{{$pais->nombrepais}}</td>
                    </tr>
                    <tr>
                        <td>Creado</td>
                        <td>{{$ciudad->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Actualizado</td>
                        <td>{{$ciudad->updated_at}}</td>
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