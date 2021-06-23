@extends('adminlte::page')
@section('title', 'Grado Crear')

@section('content')
   
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Grado</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('grados.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('grado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection
