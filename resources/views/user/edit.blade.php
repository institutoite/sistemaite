
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
                    @if(session('generated_credentials') && auth()->check() && auth()->user()->hasRole(['Admin']))
                        @php($cred = session('generated_credentials'))
                        <div class="alert alert-warning">
                            <strong>Credenciales generadas para entregar al docente</strong><br>
                            Usuario: <code>{{ $cred['name'] ?? '-' }}</code><br>
                            Correo: <code>{{ $cred['email'] ?? '-' }}</code><br>
                            Contraseña temporal: <code>{{ $cred['password'] ?? '-' }}</code>
                        </div>
                    @endif
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
