@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

@if($errors->any())
    <div class="alert alert-danger alert-dismissible" id="alert" data-auto-dismiss="4000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Hay errores!</h5>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p><i class="fas fa-times"></i>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
    </div>
@endif
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO CREAR PERSONA</span>
        </div>
        <div class="card-body">
            <form action="{{route('personas.store')}}" method="post">
            @csrf
                @include('persona.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
    <script>
        $(document).ready(function(){
            function cargarciudades(){
                var country_id = $('#country').val();
                console.log(country_id);
                if(!country_id){
                $('#city').html('<option value="6" required selected>Santa Cruz de la Sierra </option>');
                    return;
                }
                $.get('../api/pais/'+ country_id +'/ciudades',function (data) {
                    var html_select='<option value="6" required selected>Santa Cruz de la Sierra </option>';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                    //console.log(html_select);
                    }
                    $('#city').html(html_select);
                });
            }
            function cargarzonas(){
                var city_id = $('#city').val();
                
                if(!city_id){
                $('#zona').html('<option value="" required>Seleccione una Zona </option>');
                    return;
                }
                $.get('../api/ciudad/'+ city_id +'/zonas',function (data) {
                    var html_select='<option value="">Seleccione una Ciudad </option>';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
                    //console.log(html_select);
                    }
                    $('#zona').html(html_select);
                });
            }
        cargarciudades();
        $('#country').on('change', cargarciudades); 
        $('#city').on('change', cargarzonas);


    });	 
    </script>
@stop