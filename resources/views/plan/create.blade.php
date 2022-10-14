@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
@stop

@section('title', 'Plan Crear')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Crear Plan <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('plan.index')}}">Listar Planes</a>
        </div>
        <div class="card-body">
            <form action="{{route('plan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('plan.form')
                @include('include.botones')
            </form>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fas/theme.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/es.js"></script>

<script>
    CKEDITOR.replace('descripcion', {
        height: 150,
        width: "100%",
        removeButtons: 'PasteFromWord'
    });
    $("#foto").fileinput(
        {
            initialPreview: [],
            initialPreviewAsData: true,
            initialPreviewConfig: [],
            overwriteInitial: true,
            maxFileSize: 2000,
            initialCaption: "Click en examinar para cambiar imagen",
            language:'es',
            theme:'fas',
            showRemove: false,
            showUpload: false,
            showCancel: false,
            
        }
    ); 
</script>
@stop