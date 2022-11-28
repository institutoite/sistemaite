@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop
@section('title', 'Matriculacion create')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            
            @if ($carrera)
                {{ Breadcrumbs::render('matriculacion.create', $computacion,$carrera,$computacion->persona) }}
            @endif
            
            <div class="col-md-12 mt-3">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Matricular</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('matriculacion.store') }}"  role="form">
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

