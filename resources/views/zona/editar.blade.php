@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Editar')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO EDITAR ZONA </span>
        </div>
        
        <div class="card-body">
            <form action="{{route('zonas.update',$zona->id)}}" method="POST">
            {{ @method_field('PUT') }}
            @csrf
                @include('zona.form')
                @include('include.botones')
            </form>
        </div>
    </div>
    
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#country').on('change', cargarciudades);  
        });	
    function cargarciudades(){
        var country_id = $(this).val();
        console.log(country_id);
        if(!country_id){
            $('#city').html('<option>Seleccione una Ciudad </option>');
        return;
        }
        $.get('../../api/pais/'+ country_id +'/ciudades',function (data) {
            var html_select='<option value="">Seleccione una Ciudad </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                //console.log(html_select);
            }
            $('#city').html(html_select);
        });
    }
    </script>
@stop