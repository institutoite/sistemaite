
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/adminlte.css')}}">

@stop

@section('title', 'Programación')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Programacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('programacion.form')

                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </section>
@endsection
{{--     
    $table->date('fecha');
    $table->boolean('habilitado');
    $table->boolean('activo');
    $table->string('estado', 25);
    $table->time('hora_ini');
    $table->time('hora_fin');
    $table->double('horas_por_clase');
    $table->unsignedInteger('docente_id');
    $table->unsignedInteger('materia_id');
    $table->unsignedInteger('aula_id');
    $table->unsignedInteger('inscripcione_id'); --}}