
@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Usuarios')


@section('content_header')
    
@stop
@section('content')
    <section class="content container-fluid">
        <div class="container p-3">
            <div class="card">
                <div class="card-header bg-secondary">
                    <span class="card-title">Actualizar Usuario</span>
                            <a href="{{route('users.index')}}" class="ml-auto float-right">
                                Listar Usuarios
                            </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('user.form')

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
