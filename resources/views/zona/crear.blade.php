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
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO CREAR ZONA</span>
        </div>
        <div class="card-body">
            <form action="{{route('zonas.store')}}" method="post">
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
        function cargarciudades(){
            var country_id = $('#country').val();
            console.log(country_id);
            if(!country_id){
                $('#city').html('<option value="" required>Seleccione una Ciudad </option>');
            return;
            }
            $.get('../api/pais/'+ country_id +'/ciudades',function (data) {
                var html_select='<option value="">Seleccione una Ciudad </option>';
                for (var i = 0; i < data.length; i++) {
                    html_select+='<option value="'+ data[i].id +'">' +data[i].ciudad +'</option>';
                    //console.log(html_select);
                }
                $('#city').html(html_select);
            });
        }
        cargarciudades();
        $('#country').on('change', cargarciudades); 

    });	
    </script>
@stop