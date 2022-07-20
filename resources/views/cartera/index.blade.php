@extends('adminlte::page')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Mi cartera')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Inscripciones') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripciones" class="table table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>modalidad</th>
										<th>Costo</th>
										<th>Proximo</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Maatriculaciones') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="matriculaciones" class="table table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>modalidad</th>
										<th>Costo</th>
										<th>Proximo</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    @include('cartera.modales')
@endsection
@section('js')
    {{-- <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    
    
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('dist/js/moment.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    
    
<script>
        $(document).ready(function() {
        
        var tablainscripciones=$('#inscripciones').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                             $(row).addClass('text-success')
                        }else{
                             $(row).addClass('text-danger')
                        }
                        $('td', row).eq(4).html(moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));
                    },
                    "ajax": "{{ url('micartera/inscripciones') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'nombre'},
                        {data: 'modalidad'},
                        {data: 'costo'},
                        {data: 'fecha_proximo_pago'},
                        {data: 'btn'},
                    ],
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 3, targets: -1 }
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );
        var tablamatriculaciones=$('#matriculaciones').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success')
                        }else{
                            $(row).addClass('text-danger')
                        }
                        $('td', row).eq(4).html(moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));
                    },
                    "ajax": "{{ url('micartera/matriculaciones') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'nombre'},
                        {data: 'asignatura'},
                        {data: 'costo'},
                        {data: 'fecha_proximo_pago'},
                        {data: 'btn'},
                    ],
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 3, targets: -1 }
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PERSONA DE INSCRIPCIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarpersona', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                // console.log(inscripcion_id);
                $("#tabla-mostrar-persona").empty();
                $html="";
                $.ajax({
                    url:"{{url('persona/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                        $html+="<tr>"+"<td>NOMBRE</td><td>"+ json.persona.nombre+" "+json.persona.apellidop+" "+json.persona.apellidom+"</td><td rowspan='4'><img class='img-fluid rounded img-thumbnail' alt='"+ json.persona.nombre +"' src={{URL::to('/')}}"+"/storage/"+json.persona.foto +"></td>></tr>";
                        $html+="<tr>"+"<td>CARNET</td><td>"+ json.persona.carnet+" "+json.persona.expedido+"</td></tr>";
                        $html+="<tr>"+"<td>PAIS</td><td>"+ json.pais.nombrepais +", "+json.ciudad.ciudad+","+json.zona.zona+","+json.persona.direccion+"</td></tr>";
                        $html+="<tr>"+"<td>COMO LLEGO</td><td>"+ json.persona.como +"</td></tr>";
                        $html+="<tr>"+"<td>FECHA NACIMIENTO</td><td colspan='2'>"+ moment(json.persona.fechanacimiento).format('DD-MM-YYYY')+ " "+json.edad+"</td></tr>";
                        $html+="<tr>"+"<td>GENERO</td><td colspan='2'>"+ json.persona.genero +"</td></tr>";
                        $html+="<tr>"+"<td>HABILITADO</td><td colspan='2'>"+ json.persona.habilitado +"</td></tr>";
                        $html+="<tr>"+"<td>PAPEL INICIAL</td><td colspan='2'>"+ json.persona.papelinicial +"</td></tr>";
                        $html+="<tr>"+"<td>TELEFONO</td><td colspan='2'>"+ json.persona.telefono +"</td></tr>";
                        $html+="<tr>"+"<td>VOTOS</td><td colspan='2'>"+ json.persona.votos +"</td></tr>";                        
                        $html+="<tr>"+"<td>CREADO</td><td colspan='2'>"+ moment(json.persona.created_at).format('DD-MM-YYYY') + " "+ json.creado+"</td></tr>";                        
                        $html+="<tr>"+"<td>ACTUALIZADO</td><td colspan='2'>"+ moment(json.persona.updated_at).format('DD-MM-YYYY')+ " "+ json.actualizado +"</td></tr>";  
                        $('#tabla-mostrar-persona').append($html); 
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-persona").modal("show");
            });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarinscripcion', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                // console.log(inscripcion_id);
                $("#tabla-mostrar-inscripcion").empty();
                $html="";
                $.ajax({
                    url:"{{url('inscripcion/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                        $html+="<tr>"+"<td>NOMBRE</td><td>"+ json.persona.nombre+" "+json.persona.apellidop+" "+json.persona.apellidom+"</td><td rowspan='4'><img class='img-fluid rounded img-thumbnail' alt='"+ json.persona.nombre +"' src={{URL::to('/')}}"+"/storage/"+json.persona.foto +"></td>></tr>";
                        $html+="<tr>"+"<td>OBJETIVO</td><td>"+ json.inscripcion.objetivo+"</td></tr>";
                        $html+="<tr>"+"<td>COSTO</td><td>"+ json.inscripcion.costo+"</td></tr>";
                        $html+="<tr>"+"<td>TOTAL HORAS</td><td>"+ json.inscripcion.totalhoras +"</td></tr>";
                        $html+="<tr>"+"<td>INICIO</td><td colspan='2'>"+ moment(json.inscripcion.fechaini).format('DD-MM-YYYY')+ " "+json.empezo+"</td></tr>";
                        $html+="<tr>"+"<td>FINALIZA</td><td colspan='2'>"+ moment(json.inscripcion.fechafin).format('DD-MM-YYYY')+ " "+json.finaliza+"</td></tr>";
                        $html+="<tr>"+"<td>FECHA PAGO</td><td colspan='2'>"+ moment(json.inscripcion.fecha_proximo_pago).format('DD-MM-YYYY')+ " "+json.proximo_pago+"</td></tr>";
                        $html+="<tr>"+"<td>INICIO</td><td colspan='2'>"+ json.persona.genero +"</td></tr>";
                        $html+="<tr>"+"<td>HABILITADO</td><td colspan='2'>"+ json.persona.habilitado +"</td></tr>";
                        $html+="<tr>"+"<td>PAPEL INICIAL</td><td colspan='2'>"+ json.persona.papelinicial +"</td></tr>";
                        $html+="<tr>"+"<td>TELEFONO</td><td colspan='2'>"+ json.persona.telefono +"</td></tr>";
                        $html+="<tr>"+"<td>VOTOS</td><td colspan='2'>"+ json.persona.votos +"</td></tr>";                        
                        $html+="<tr>"+"<td>CREADO</td><td colspan='2'>"+ moment(json.persona.created_at).format('DD-MM-YYYY') + " "+ json.creado+"</td></tr>";                        
                        $html+="<tr>"+"<td>ACTUALIZADO</td><td colspan='2'>"+ moment(json.persona.updated_at).format('DD-MM-YYYY')+ " "+ json.actualizado +"</td></tr>";  
                        $('#tabla-mostrar-persona').append($html); 
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-inscripcion").modal("show");
            });
        } );
        
    </script>
@stop