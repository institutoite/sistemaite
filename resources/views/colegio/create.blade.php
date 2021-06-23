@extends('adminlte::page')

@section('title', 'Colegio Crear')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Crear Colegio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colegios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('colegio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@stop
