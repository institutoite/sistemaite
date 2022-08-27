@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Menus')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid" id="container">
    <div class="timeline" id="time_line">
            <!-- timeline item -->
            <div>
                <i class="fas fa-plus bg-success"></i>
                <div class="timeline-item">
                    <div class="timeline-footer">
                        <a class="btn btn-success btn-sm" id="crear">Nueva Gestión</a>
                    </div>
                </div>
            </div>
            <!-- END timeline item -->
        @foreach ($grados as $grado)
            <div class="time-label">
                <span class="bg-secondary">{{$grado->anio}}</span>
            </div>

            <!-- timeline item -->
            <div>
                <i class="fas fa-school bg-primary"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i>{{Carbon\Carbon::now()}}</span>
                    @php
                        $colegio=App\Models\Colegio::find($grado->colegio_id)
                    @endphp
                    <h3 class="timeline-header"><a href="#">{{'Colegio:'.$colegio->nombre.', Grado:'.$grado->grado}}</a> </h3>
                    <div class="timeline-body">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Mostrar Colegio detallado</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Atributo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nombre</td>
                                                <td>{{$colegio->nombre}}</td>
                                            </tr>
                                            <tr>
                                                <td>Director</td>
                                                <td>{{$colegio->director}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Direccion</td>
                                                <td>{{$colegio->direccion}}</td>
                                            </tr>
                                            <tr>
                                                <td>Telefono</td>
                                                <td>{{$colegio->telefono}}</td>
                                            </tr>
                                            <tr>
                                                <td>Celular</td>
                                                <td>{{$colegio->direccion}}</td>
                                            </tr>
                                            <tr>
                                                <td>Dependencia</td>
                                                <td>{{$colegio->dependencia}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nivel</td>
                                                <td>{{$colegio->nivel}}</td>
                                            </tr>
                                            <tr>
                                                <td>Turno</td>
                                                <td>{{$colegio->turno}}</td>
                                            </tr>
                                            <tr>
                                                <td>Area Geográfica</td>
                                                <td>{{$colegio->areageografica}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        </div>
        
  </div>
  @include('estudiantes.modales')
@endsection

@section('js')
<script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    
<script>
        $(document).ready(function() {
            $("#crear").on("click", function(){
                $("#modal-crear-gestion").modal("show");
                $.ajax({
                    url : "../colegio/all",
                    success : function(json) {
                        $("#colegio_id").empty();
                        //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  C O L E G I O S %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                        htmlcolegio="";
                        $.each( json, function( key, value ) {
                            htmlcolegio+="<option value='"+ value.id +"''>"+ value.nombre +"</option>"
                        });
                        $("#colegio_id").append(htmlcolegio);
                    },
                    error : function(xhr, status) {
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
                $.ajax({
                    url : "../grados/no/cursados/{{$estudiante_id}}",
                    success : function(json) {
                        $("#grado_id").empty();
                       //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  G R A D O S %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
                        htmlgrado="";
                        $.each( json, function( key, value ) {
                            htmlgrado+="<option value='"+ value.id +"''>"+ value.grado +"</option>"
                        });
                        $("#grado_id").append(htmlgrado);

                        htmlanio="";
                        var anio=moment().format('y')-15; 
                       //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  A Ñ O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
                       while(anio<=moment().format('y')) {
                            htmlanio+="<option value='"+ anio +"''>"+ anio +"</option>"
                            anio++;
                        }
                        $("#anio").empty();
                        $("#anio").append(htmlanio);
                    },
                    error : function(xhr, status) {
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
            });
            $(document).on("submit","#formulario-guardar-gestion",function(e){
                e.preventDefault();
                    var persona_id=$("#persona_id").val();
                    var grado_id=$("#grado_id").val();
                    var colegio_id=$("#colegio_id").val();
                    var anio=$("#anio").val();
                    var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "../guardar/gestion",
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                        persona_id:persona_id,
                        grado_id:grado_id,
                        colegio_id:colegio_id,
                        anio:anio,
                        token:token,
                    },
                    success : function(json) {
                        /*%%%%%%%%% un item de timeline %%%%%%%%%*/
                        $("#modal-crear-gestion").modal("hide");
                        //$('#time_line').load('#container');
                        var htmlitem="";
                         $.each( json, function( key, value ) {
                            
                            htmlitem+="<div class='timeline' id='time_line'>";
                                htmlitem+="<div class='time-label'>";
                                    htmlitem+="<span class='bg-secondary'>"+ value.pivot.anio +"</span>";
                                htmlitem+="</div>";
                                htmlitem+="<div>";
                                    htmlitem+="<i class='fas fa-school bg-primary'></i>";
                                    htmlitem+="<div class='timeline-item'>";
                                        htmlitem+="<span class='time'><i class='fas fa-clock'></i>{{Carbon\Carbon::now()}}</span>";
                                        htmlitem+="<h3 class='timeline-header'><a href='#'>Titulo de la tabla</a> </h3>";
                                        htmlitem+="<div class='timeline-body'>";
                                            htmlitem+="<div class='card card-primary collapsed-card'>";
                                                htmlitem+="<div class='card-header'>";
                                                    htmlitem+="<h3 class='card-title'>Mostrar Colegio detallado</h3>";
                                                    htmlitem+="<div class='card-tools'>";
                                                        htmlitem+="<button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i></button>";
                                                    htmlitem+="</div>";
                                                htmlitem+="</div>";
                                                htmlitem+="<div class='card-body'>";
                                                htmlitem+="</div>";
                                            htmlitem+="</div>";
                                        htmlitem+="</div>";
                                    htmlitem+="</div>";
                                htmlitem+="</div>";
                            htmlitem+="</div>";
                        //});
                        //$('#gestiones').empty();
                        $('#container').after(htmlitem);
                    },
                    error : function(xhr, status) {

                    },  
                });
            });


        });
    </script>
    
@endsection