
@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection

@section('title', 'Crear Clase')
@section('plugins.Jquery',true)
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)
@section('plugins.Select2',true)

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('content')
    <section class="content container-fluid">
       
        <div class="card card-default">
            <div class="card-header bg-primary">
                <span class="card-title">Create Clase</span>
            </div>
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    <h4 class="alert-heading">Objetivo</h4>
                    {!! $inscripcion->objetivo !!}
                </div>
                <form method="POST" action="{{ route('clases.guardar',$programa->id) }}"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @include('clase.form')    
                    </div>
                    @include('include.botones')
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
     <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tema_id").select2({
                //dropdownParent: $("#modal-editar"),
                placeholder: "Seleccione un tema (Opcional)",
                theme: "bootstrap-5",
                language: "es",
                containerCssClass: "select2--large", // For Select2 v4.0
                selectionCssClass: "select2--large", // For Select2 v4.1
                dropdownCssClass: "select2--large",
            });
            function cargarTemas(){
                var materia_id = $('#materia_id').val();
                if(!materia_id){
                $('#tema_id').html('<option value="" required>Seleccione una Zona </option>');
                    return;
                }
                $.get('../../../api/temas/'+ materia_id,function (data) {
                    
                    var html_select='<option value="">Seleccione un tema </option>';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].tema +'</option>';
                    }
                    $('#tema_id').html(html_select);
                });

            }
            $('#materia_id').on('change', cargarTemas);
            cargarTemas();
        });
    </script>
@endsection
