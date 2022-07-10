

@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Municipio Create')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('title', 'Municipio Crear')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Municipio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('municipios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('municipio.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>

<script src="{{asset('dist/js/steepfocus.js') }}"></script>
<script>
    $(document).ready(function(){
        function cargardepartamentos(){
            var pais_id = $('#pais_id').val();
            console.log(pais_id);
            html_select="";
            $.get('../api/pais/'+ pais_id +'/departamentos',function (data) {
                console.log(data);
                html_select+='<option value="">Seleccione un departamento</option>';
                for (var i = 0; i < data.length; i++) {
                    html_select+='<option value="'+ data[i].id +'">' +data[i].departamento +'</option>';
                }
                $('#departamento_id').html(html_select);
            });
        }
        html_select="";
        function cargarprovincias(){
            var departamento_id = $('#departamento_id').val();
            console.log(departamento_id);
            html_select="";
            $.get('../api/departamento/'+ departamento_id +'/provincias',function (data) {
                console.log(data);
                for (var i = 0; i < data.length; i++) {
                    html_select+='<option value="'+ data[i].id +'">' +data[i].provincia +'</option>';
                }
                $('#provincia_id').html(html_select);
            });
        }
        $('#pais_id').on('change', cargardepartamentos);
        $('#departamento_id').on('change', cargarprovincias);

    });
</script>
@endsection

