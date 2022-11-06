@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Configurar')
@section('plugins.Jquery', true)

@section('content')

{{-- {{dd($persona)}} --}}
{{ Breadcrumbs::render('inscribir', $persona->estudiante,$persona) }}

    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-secondary">
                <span class="card-title">Formulario Inscripción</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('inscripciones.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    {{-- {{$modalidades}} --}}
                    @include('inscripcione.form')
                    @include('include.botones')
                </form>
            </div>
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
                    console.log(respuesta);
                    $("#costo").val(respuesta.costo);
                    $("#totalhoras").val(respuesta.cargahoraria);
                })
            });
        });
    </script>
@endsection
