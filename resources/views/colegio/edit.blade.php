@extends('adminlte::page')

@section('title', 'Colegio Crear')

@section('content_header')
    <h1 class="text-center text-primary">Colegios</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Colegio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colegios.update', $colegio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('colegio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
