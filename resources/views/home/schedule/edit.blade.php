@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'homeschedules')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
<section class="content container-fluid pt-4">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header bg-primary">
                    <span class="card-title">Editar Horario</span>
                </div>
                <div class="card-body">
                    {!! Form::model($homeschedule, ['route' => ['homeschedule.update',$homeschedule], 'method' => 'put']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Titulo del horario') !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el nombre del nivel']) !!}
                        
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Descripcion del horario') !!}
                            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el nombre del nivel']) !!}
                        
                            @error('description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {!! Form::submit('Actualizar horario', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
