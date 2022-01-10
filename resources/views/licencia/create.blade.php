@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('pugins.Sweetalert2',true)

@section('title', 'Crear licencia')
@section('content')
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Licencia</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('licencias.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('licencia.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@stop

