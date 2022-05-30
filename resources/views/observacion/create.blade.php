@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Municipio Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('title', 'Municipio Crear')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"></span>
                    </div>
                    <div class="card-header bg-primary">
                        Create Observacion  <a class="btn btn-secondary text-white btn-sm float-right" href="javascript:history.back()">Atras</a>
                        
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('observacion.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('observacion.form')
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
        CKEDITOR.replace('observacion', {
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

