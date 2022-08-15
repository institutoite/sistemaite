@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Inscripcion Configurar')
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-primary">
                    <div class="card-header">
                        <span class="card-title">Actualizar Matriculación</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('matriculacion.update', $matriculacion->id) }}"  role="form">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('matriculacion.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
