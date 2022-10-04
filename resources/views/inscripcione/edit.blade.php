@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Inscripcion Configurar')
@section('content')
    
    @includeif('partials.errors')

    <div class="card card-default">
        <div class="card-header bg-primary">
            <span class="card-title">Actualizar Inscripcion</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('inscripciones.update', $inscripcione->id) }}"  role="form">
                {{ method_field('PATCH') }}
                @csrf
                @include('inscripcione.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>
        ClassicEditor
            .create( document.querySelector( '#objetivo' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}

    <script>


        $(document).ready(function() {
            


            $("#modalidad_id").change(function () {
                var modalidad_id=$(this).val();    
                data={modalidad_id};
                $.get('../../modalidad/cosultar/',data,function(respuesta) {
                    $("#costo").val(respuesta.costo);
                    $("#totalhoras").val(respuesta.cargahoraria);
                })
            });
        });
    </script>
@endsection