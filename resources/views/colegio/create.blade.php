@extends('adminlte::page')

@section('title', 'Colegio Crear')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Crear XDFDColegio</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('colegios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('colegio.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    function cargarprovincias(){
        var departamento_id = $('#departamento').val();
        console.log(departamento_id);
        if(!departamento_id){
        $('#provincia').html('<option value="6" selected>Andres Ibañez</option>');
            return;
        }
        $.get('../api/provincias/'+ departamento_id ,function (data) {
            var html_select='<option value="6" selected>Andres Ibañez</option>';
            for (var i = 0; i < json.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].provincia +'</option>';
            //console.log(html_select);
            }
            $('#provincia').html(html_select);
        });
    }
    function cargarmunicipios(){
        var provincia_id = $('#provincia').val();
        
        if(!provincia_id){
        $('#municipio').html('<option value="" required>Seleccione un municipio </option>');
            return;
        }
        $.get('../api/municipios/'+ provincia_id,function (data) {
            var html_select='<option value="">Seleccione un municipio </option>';
            for (var i = 0; i < data.length; i++) {
                html_select+='<option value="'+ data[i].id +'">' +data[i].zona +'</option>';
            //console.log(html_select);
            }
            $('#municipio').html(html_select);
        });
    }
    
    cargarciudades();
    $('#departamento').on('change', cargarprovincias); 
    $('#provincia').on('change', cargarmunicipios);
</script>
@stop

