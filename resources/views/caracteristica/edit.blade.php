@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('title', 'Plan Caracteristica')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Editar Caracterisitica
        </div>
        <div class="card-body">
            <form action="{{ route('caracteristica.update',$caracteristica) }}" method="POST"  enctype="multipart/form-data">
                 @csrf
                {{ @method_field('PUT') }} 
                @include('caracteristica.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
      {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
    
    <script>
        CKEDITOR.replace('caracteristica', {
            height: 150,
            width: "100%",
            maxCharCount:50,
            removeButtons: 'PasteFromWord'
        });
    </script>
@stop   