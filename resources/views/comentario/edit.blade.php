
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Editar Comentario')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <span class="card-title">Actualizar Comentario</span>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('comentario.update', $comentario->id) }}"  role="form" enctype="multipart/form-data">
                            
                            @csrf

                            @include('comentario.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% CKEDITOR --}}
    <script>
        CKEDITOR.replace('comentario', {
            height: 150,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        CKEDITOR.replace('interests', {
            height: 150,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });

    </script>
        {{-- %%%%%%%%%%%%%%%%%%%%%%%%%% FIN CKEDITOR --}}

    <script>

        $(document).ready(function() {
            
        });
    </script>
@endsection
