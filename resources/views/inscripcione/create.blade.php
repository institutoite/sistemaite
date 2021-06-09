@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Configurar')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Formulario Inscripción</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('inscripciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('inscripcione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            //validar aqui $('#totalhoras').change()
        });
    </script>
@endsection
