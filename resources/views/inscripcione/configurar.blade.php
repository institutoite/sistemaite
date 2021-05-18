@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Crear')

@section('content')
    
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Configurar Inscripción</span>
                    </div>
                    {{-- {{dd($tipo)}} --}}
                    <div class="card-body border border-2 border-secondary">
                        @if ($tipo=='guardando')
                            <form method="POST" action="{{ route('inscripcion.guardar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                @include('inscripcione.form_configurar')
                            </form>
                        @endif
                        @if ($tipo=='actualizando')
                            <form method="POST" action="{{ route('inscripcion.actualizar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                @include('inscripcione.form_configurar')
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
