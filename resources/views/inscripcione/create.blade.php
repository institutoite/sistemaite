@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Configurar')
@section('plugins.Jquery', true)

@section('content')
        <div class="card">
            <div class="card-header bg-secondary">
                <span class="card-title">Formulario Inscripción</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('inscripciones.store') }}"  role="form" enctype="multipart/form-data">
                    @csrf

                    @include('inscripcione.form')

                </form>
            </div>
        </div>
@endsection

@section('js')
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
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
