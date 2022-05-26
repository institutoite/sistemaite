

@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Municipio Editar')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('title', 'Municipio Crear')
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Municipio</span>
                    </div>
                    {{-- {{ $municipio}} --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('municipios.update', $municipio->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
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
            $.get('../../api/pais/'+ pais_id +'/departamentos',function (data) {
                console.log(data);
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
            $.get('../../api/departamento/'+ departamento_id +'/provincias',function (data) {
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


