@extends('adminlte::page')
@section('title', 'Error')
@section('content')
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">¡Error!</h4>
            <p>{{ $mensaje }}</p>
            <hr>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
