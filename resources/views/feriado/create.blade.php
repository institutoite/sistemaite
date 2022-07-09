@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Feriado Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
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
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

