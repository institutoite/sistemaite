@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Modalidad mostrar')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Show Modalidad</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('modalidads.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Modalidad:</strong>
                            {{ $modalidad->modalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $modalidad->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Cargahoraria:</strong>
                            {{ $modalidad->cargahoraria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
