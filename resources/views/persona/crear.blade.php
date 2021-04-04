@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#estudiante" data-toggle="tab">Estudiante</a></li>
                <li class="nav-item"><a class="nav-link" href="#tecnico" data-toggle="tab">S. Tecnico</a></li>
                <li class="nav-item"><a class="nav-link" href="#fotocopia" data-toggle="tab">Fotocopia/Impresión</a></li>
                <li class="nav-item"><a class="nav-link" href="#docente" data-toggle="tab">Docente</a></li>
                <li class="nav-item"><a class="nav-link" href="#administrativo" data-toggle="tab">Administrativo</a></li>
                <li class="nav-item"><a class="nav-link" href="#proveedor" data-toggle="tab">Proveedor</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="estudiante">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @include('persona.form_estudiante')
                        @include('include.botones')
                    </form>
                </div>
                <div class="tab-pane" id="tecnico">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('persona.form_tecnico')
                        @include('include.botones')
                    </form>
                </div>
                <div class="tab-pane" id="fotocopia">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('persona.form_fotocopia')
                        @include('include.botones')
                    </form>
                    
                </div>
                <div class="tab-pane" id="docente">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('persona.form_docente')
                        @include('include.botones')
                    </form>
                    
                </div>
                <div class="tab-pane" id="administrativo">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('persona.form_administrativo')
                        @include('include.botones')
                    </form>
                    
                </div>
                <div class="tab-pane" id="proveedor">
                    <form action="{{route('personas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('persona.form_proveedor')
                        @include('include.botones')
                    </form>
                    
                </div>

            </div>
        
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('dist/js/steepfocus.js') }}"></script>
        <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
        This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
    3.3.x versions without popper.min.js. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>
    <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fa/theme.js"></script>
    <!-- optionally if you need translation for your language then include  locale file as mentioned below -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/(lang).js"></script>

    
    <script>
        $(document).ready(function(){
            
            $("#foto").fileinput();


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

{{-- <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO CREAR PERSONA</span>
        </div>
        <div class="card-body">
            <form action="{{route('personas.store')}}" method="post">
            @csrf
                @include('persona.formestudiante')
                @include('include.botones')
            </form>
        </div>
    </div> --}}