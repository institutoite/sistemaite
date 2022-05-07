
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Create archivo')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)


@section('content')
    <section class="content container-fluid pt-4">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <span class="card-title">Crear Archivo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('files.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('file.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/themes/fas/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/locales/es.js"></script>
    
    <script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector('#descripcion'))
            .catch( error => {
                console.error(error);
        });
            // var url1 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
            //     url2 = 'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg';
            $(document).ready(function(){
                $("#file").fileinput(
                {
                    initialPreview: [url1, url2],
                    initialPreviewAsData: true,
                    initialPreviewConfig: [
                        
                        // {caption: "Earth.jpg", downloadUrl: url2, size: 1218822, width: "120px", key: 2}
                    ],
                    deleteUrl: "/site/file-delete",
                    overwriteInitial: true,
                    maxFileSize: 2000,
                    initialCaption: "The Moon and the Earth",
                    language:'es',
                    theme:'fas',

                    }
                );
            });
    </script>

@endsection
