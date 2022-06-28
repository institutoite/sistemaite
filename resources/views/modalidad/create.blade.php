@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Modalidad Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Modalida Crear')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default mt-3">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Modalidadx</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modalidads.store') }}"  role="form">
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
