@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Crear Contacto')
@section('plugins.Jquery', true)
@section('plugins.Datatables', true)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            CREAR CONTACTO SUPER RAPIDO
        </div>
        {{-- {{dd($persona)}} --}}
        <div class="card-body">
            <form action="{{route('personas.uptate.contacto',$persona)}}" id="formulario" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                @csrf
                @include('persona.contacto.formcontacto')
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
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>
        CKEDITOR.replace('observacion');
    </script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}
    <script>
        $(document).ready(function(){

        });
    </script>

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

