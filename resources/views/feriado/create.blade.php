@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Departamento Crear')

@section('template_title')
    Crear Departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Feriado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('feriados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('feriado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

