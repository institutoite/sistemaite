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
{{-- {{dd($municipios)}} --}}
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
                var departamento_id = $('#departamento_id').val();
                console.log(departamento_id);
                if(!departamento_id){
                $('#provincia_id').html('<option value="1" required selected>Andres Ibañez </option>');
                    return;
                }
                $.get('../api/departamento/'+ departamento_id +'/provincias',function (data) {
                    var html_select='';
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].provincia +'</option>';
                    //console.log(html_select);
                    }
                    $('#provincia_id').html(html_select);
                });
            }
            

            function cargarMunicipios(){
                var provincia_id = $('#provincia_id').val();
                console.log(provincia_id+"idpro");
                if(!provincia_id){
                $('#municipio_id').html('<option value="" required>Seleccione un municipio </option>');
                    return;
                }
                $.get('../api/provincia/'+ provincia_id +'/municipios',function (data) {
                    html_select='';
                    console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        html_select+='<option value="'+ data[i].id +'">' +data[i].municipio +'</option>';
                    //console.log(html_select);
                    }
                    $('#municipio_id').html(html_select);
                });
            }
        
        
        cargarProvincias();
        $('#departamento_id').on('change', cargarProvincias); 
        $('#provincia_id').on('change', cargarMunicipios); 
        // cargarMunicipios();
        //$('#city').on('change', cargarzonas);
    });
</script>
@stop

