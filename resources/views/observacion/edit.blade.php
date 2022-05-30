@extends('layouts.app')

@section('template_title')
    Update Observacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Observacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('observacions.update', $observacion->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('observacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
