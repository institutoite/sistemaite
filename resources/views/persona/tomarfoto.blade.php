@extends('adminlte::page')

@section('title', 'Persona Mostrar')

@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('custom/css/camara/main.css')}}"> --}}
@endsection

@section('content_header')
    
@stop

@section('content')
    <div class="container bg-danger p-3">
    <div class="row">    
        <div class="col-1"></div>
        <div class="col-4 p-2 bg-dark border-3">
            <video playsinline autoplay></video>
        </div>
        <div class="col-2"></div>
        <div class="col-4 p-lg-4 bg-success">
            <canvas id='canvas' width="200" height="200" style='border: 1px solid #CCC;'>
                <p>Tu navegador no soporta canvas</p>
            </canvas>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row text-center">
        <div class="text p-3">
            <button class="btn btn-primary">Tomar Foto</button>
            <input type="file" name="foto" id="foto">
        </div>
    </div>
    </div>

    <!-- creamos el form para el envio -->
<form id='formCanvas' method='post' action='{{route('guardarfoto',$persona)}}' ENCTYPE='multipart/form-data'>
    {{ @method_field('PUT') }}
    @csrf
   <button type='button' onclick='GuardarTrazado()'>Guardar</button>
   <input type='hidden' name='imagen' id='imagen' />
</form>
 
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        'use strict';
        // Put variables in global scope to make them available to the browser console.
        const video = document.querySelector('video');
        const canvas = window.canvas = document.querySelector('canvas');
        canvas.width = 250;
        canvas.height = 250;
        
        const button = document.querySelector('button');
            
            button.onclick = function() {
                canvas.width = 100;//video.videoWidth;
                canvas.height = 100;//video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                console.log('me dieron click');   
            };

        const constraints = {
            audio: false,
            video: true
        };

        function handleSuccess(stream) {
            window.stream = stream; // make stream available to browser console
            video.srcObject = stream;
        }
    

        function handleError(error) {
            console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
        }

        navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
    
        $(document).ready(function() {

            $('button').on('click',function (e) {
                canvas.width =250 ;//video.videoWidth;
                canvas.height =250 ;//video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                
                imagen.src = canvas.toDataURL("image/png");
                //console.log($('imagen').html());
            });
            /* Enviar el trazado */
            
            
        });
        function GuardarTrazado(){
            document.getElementById('imagen').value=document.getElementById('canvas').toDataURL('image/png');
            document.forms['formCanvas'].submit();
        }
    </script>
   
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>    
@stop


    