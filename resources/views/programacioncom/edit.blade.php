@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Programación')
@section('content') 
    <section class="content container-fluid pt-3">
        <div class="card card-primary">
            <div class="card-header bg-primary">
                <span class="card-title">Actualizar Programacion</span>
            </div>
            {{-- {{dd($programacion->habilitado)}} --}}
            <div class="card-body">
                <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('programacion.form')
                    @include('include.botones')
                </form>
            </div>
        </div> 
    </section>
@endsection
