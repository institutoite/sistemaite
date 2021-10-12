@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Materias')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Materia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('materias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('materia.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

