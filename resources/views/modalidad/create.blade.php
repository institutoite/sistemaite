@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Modalida Crear')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create Modalidad</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('modalidads.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('modalidad.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
