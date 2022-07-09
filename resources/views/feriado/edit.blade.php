

@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Feriado Editar')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Feriado Acutalizar</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('feriados.update', $feriado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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

