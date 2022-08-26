
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Motivos Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('content')
    <section class="content container-fluid pt-4">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <span class="card-title">Create un evento para enviar mensajes masivos</span>
                        
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Por ejemplo!</strong>
                            <ol>
                                <li><i class="fas fa-check-circle"></i>Vacaciones invierno 2022</li>
                                <li><i class="fas fa-check-circle"></i>Vacaciones Verano 2023</li>
                                <li><i class="fas fa-check-circle"></i>Promoción</li>
                            </ol>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('eventos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            @include('evento.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ESTE JS HABILITA LAS  FUNCIONALIDADES DE BOOTSTRAP 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection
