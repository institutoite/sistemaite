@extends('layouts.app')

@section('template_title')
    {{ $clase->name ?? 'Show Clase' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Clase</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clases.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $clase->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Pagado:</strong>
                            {{ $clase->pagado }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $clase->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Horainicio:</strong>
                            {{ $clase->horainicio }}
                        </div>
                        <div class="form-group">
                            <strong>Horafin:</strong>
                            {{ $clase->horafin }}
                        </div>
                        <div class="form-group">
                            <strong>Docente Id:</strong>
                            {{ $clase->docente_id }}
                        </div>
                        <div class="form-group">
                            <strong>Materia Id:</strong>
                            {{ $clase->materia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Aula Id:</strong>
                            {{ $clase->aula_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tema Id:</strong>
                            {{ $clase->tema_id }}
                        </div>
                        <div class="form-group">
                            <strong>Programacion Id:</strong>
                            {{ $clase->programacion_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
