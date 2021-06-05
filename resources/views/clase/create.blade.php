
@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <span class="card-title">Create Clase</span>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Objetivo</h4>
                            {{ $inscripcion->objetivo }}
                        </div>
                        <form method="POST" action="{{ route('clases.guardar',$programa->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @include('clase.form')    
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
