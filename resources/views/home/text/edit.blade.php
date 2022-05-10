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
                    <span class="card-title">Editar Texto de la Pagina de Inicio</span>
                </div>
                <div class="card-body">
                    {!! Form::model($text, ['route' => ['home.update',$text], 'method' => 'put','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <p>La imagen tiene que tener 1400 px de ancho x 300 px de alto </p>
                            {!! Form::label('banner', 'Texto del banner') !!}
                            {{-- {!! Form::textarea('banner', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el texto del banner','rows'=>8]) !!} --}}
                            <input type="file" name="banner" id="banner">
                            @error('banner')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('header', 'Texto presentacion') !!}
                            {!! Form::text('header', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el texto de presentacion']) !!}
                        
                            @error('header')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('mensaje', 'Texto de Whatsapp') !!}
                            {!! Form::text('mensaje', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese el texto automatico para whatsapp cuando nos escriban']) !!}
                            @error('mensaje')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('heading', 'Texto titulo de los cursos') !!}
                            {!! Form::text('heading', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese titulo de los cursos']) !!}
                        
                            @error('heading')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('subheading', 'Texto subtitulo de los cursos') !!}
                            {!! Form::text('subheading', null, ['class' => 'form-control', 'placeholder'=> 'Ingrese subtitulo de los cursos']) !!}
                        
                            @error('subheading')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {!! Form::submit('Actualizar texto', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/decoupled-document/ckeditor.js"></script> --}}
    <script>
        ClassicEditor
            .create( document.querySelector('#banner' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script>
@endsection
