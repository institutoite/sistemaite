@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Modalidad Editar')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Actualizar Modalidad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modalidads.update', $modalidad->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('modalidad.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
