@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Colegio Crear')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Crear Colegio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colegios.store') }}"  role="form" enctype="multipart/form-data" id="formulario">
                            @csrf
                            @include('colegio.form')
                            @include('include.botones')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
$(document).ready(function(){
    $('#formulario').trigger("reset");
    function cargarProvincias(){
                var departamento = $('#departamento').val();
                if(!departamento){
                $('#provincia').html('<option value="1" required selected>Andres Ibañez </option>');
                    return;
                }
                $.get('../departamento/mis/provincias/'+departamento,function (data) {
                    console.log(data); //cambiar dpto es constante en el controlador
                    var html_select='';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].provincia +'</option>';
                    }
                    $('#provincia').html(html_select);
                });
            }
            
            function cargarMunicipios(){
                var provincia = $('#provincia').val();
                if(!provincia){
                $('#municipio').html('<option value="" required>Seleccione un municipio </option>');
                    return;
                }
                $.get('../api/provincia/'+ provincia +'/municipios',function (data) {
                    html_select='';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].municipio +'">' +data[i].municipio +'</option>';
                    }
                    $('#municipio').html(html_select);
                });
            }
        cargarProvincias();
        $('#departamento').on('change', cargarProvincias); 
        $('#provincia').on('change', cargarMunicipios); 
        // cargarMunicipios();
        //$('#city').on('change', cargarzonas);
    });
</script>
@stop

