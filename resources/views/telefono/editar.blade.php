@extends('adminlte::page')
@section('css')
    
@stop

@section('title', 'Editar')

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <span class="text-center">FORMULARIO EDITAR CONTACTO TELEFONICO </span>
        </div>
        <div class="card-body">
            <form action="{{route('telefono.actualizar',['persona_id'=>$registro_pivot[0]->persona_id,'apoderado_id'=>$registro_pivot[0]->persona_id_apoderado])}}" method="POST">
                {{ @method_field('PUT') }}
                @csrf
                @include('telefono.form')
                @include('include.botones')
                {{-- GCONTACT --}}
                <div id="tokenExpiration"></div>
                <a href="{{ route('signIn') }}" id="signIn" class="btn btn-google">
                    <i class="fab fa-google"></i>Contact
                </a>
                {{-- GCONTACT --}}

            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            var intervalId;
            function actualizarTokenExpiration() {
                $.ajax({
                    url: "{{ route('token-expiration') }}",
                    type: "GET",
                    success: function(response) {
                        $('#tokenExpiration').text('Tiempo Token: ' + response);
                        $('#signIn').show();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            intervalId = setInterval(actualizarTokenExpiration, 1000);
        });
    </script>

@stop