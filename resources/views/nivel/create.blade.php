@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Nivel Crear')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Nivel</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nivels.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('nivel.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
