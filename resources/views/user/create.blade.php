@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Usuarios')

@section('content_header')
    <div class="d-flex">
        <h1>CREAR USUARIO</h1>
        <a href="{{route('users.index')}}" class="ml-auto">
            <button class="btn btn-primary">
            Listar Usuarios
        </button>
        </a>
    </div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @if (Session::has('success'))
                  <script>
                      console.log("llega success");
                  </script>
                    <div class="alert alert-primary" role="alert">
                        <h4 class="alert-heading">Header</h4>
                        {{$message}}
                    </div>
                @endif

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Create User</span>
                    </div>
                    <div class="card-body">
                       <form action="{{route('users.guardar')}}" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            {{ csrf_field() }}
                            @include('user.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
@endsection
@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
