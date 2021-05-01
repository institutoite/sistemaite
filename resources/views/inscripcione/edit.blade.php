@extends('layouts.app')

@section('template_title')
    Update Inscripcione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Inscripcione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('inscripciones.update', $inscripcione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('inscripcione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
