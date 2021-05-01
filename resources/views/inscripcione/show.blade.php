@extends('layouts.app')

@section('template_title')
    {{ $inscripcione->name ?? 'Show Inscripcione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inscripcione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inscripciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Horainicio:</strong>
                            {{ $inscripcione->horainicio }}
                        </div>
                        <div class="form-group">
                            <strong>Horafin:</strong>
                            {{ $inscripcione->horafin }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaini:</strong>
                            {{ $inscripcione->fechaini }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafin:</strong>
                            {{ $inscripcione->fechafin }}
                        </div>
                        <div class="form-group">
                            <strong>Totalhoras:</strong>
                            {{ $inscripcione->totalhoras }}
                        </div>
                        <div class="form-group">
                            <strong>Horasxclase:</strong>
                            {{ $inscripcione->horasxclase }}
                        </div>
                        <div class="form-group">
                            <strong>Vigente:</strong>
                            {{ $inscripcione->vigente }}
                        </div>
                        <div class="form-group">
                            <strong>Condonado:</strong>
                            {{ $inscripcione->condonado }}
                        </div>
                        <div class="form-group">
                            <strong>Objetivo:</strong>
                            {{ $inscripcione->Objetivo }}
                        </div>
                        <div class="form-group">
                            <strong>Lunes:</strong>
                            {{ $inscripcione->lunes }}
                        </div>
                        <div class="form-group">
                            <strong>Martes:</strong>
                            {{ $inscripcione->martes }}
                        </div>
                        <div class="form-group">
                            <strong>Miercoles:</strong>
                            {{ $inscripcione->miercoles }}
                        </div>
                        <div class="form-group">
                            <strong>Jueves:</strong>
                            {{ $inscripcione->jueves }}
                        </div>
                        <div class="form-group">
                            <strong>Viernes:</strong>
                            {{ $inscripcione->viernes }}
                        </div>
                        <div class="form-group">
                            <strong>Sabado:</strong>
                            {{ $inscripcione->sabado }}
                        </div>
                        <div class="form-group">
                            <strong>Estudiante Id:</strong>
                            {{ $inscripcione->estudiante_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modalidad Id:</strong>
                            {{ $inscripcione->modalidad_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
