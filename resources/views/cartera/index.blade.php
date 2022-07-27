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
                                <thead class="thead">
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
                                <thead class="thead">
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
                                {{ __('Mis clientes con inscripciones finalizadas') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripcionesdesvigentes" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>NRO</th>
										<th>NOMBRE</th>
										<th>APELLIDOP</th>
										<th>APELLIDOM</th>
										<th>ULTIMA VEZ</th>
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
                                {{ __('Mis clientes con matriculaciones finalizadas') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="matriculacionesdesvigentes" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>NRO</th>
										<th>NOMBRE COMPLETO</th>
										<th>ULTIMA OBSERVACION</th>
                                        <th>OPCIONES</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    @include('cartera.modalesmatriculacions')
    @include('observacion.modalcreate')
    @include('cartera.modales')
    @include('whatsapp.modalmensajes')
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>

    <script src="{{asset('assets/js/observacion.js')}}"></script>
    
    
<script>
    let tablamensajes;
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

            var tablainscripcionesdesvigentes=$('#inscripcionesdesvigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); 
                    },
                    "ajax": "{{ url('micartera/inscripciones/desvigentes') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'nombre'},
                        {data: 'apellidop'},
                        {data: 'apellidom'},
                        {data: 'fecha'},
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

            var tablamatriculacionesdesvigentes=$('#matriculacionesdesvigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']);
                            persona_id = data['id'];
                            $.ajax({
                                url:"{{url('persona/ultimaobservacion')}}",
                                data:{persona_id:persona_id},
                                success : function(json) {
                                    $('td', row).eq(2).html(json.observacion.observacion +'('+ json.usuario.name +')');  
                                },
                            });
                        $('td', row).eq(1).html(data['nombre']+' '+data['apellidop']+' '+data['apellidom']); 
                           
                    },
                    "ajax": "{{ url('micartera/matriculaciones/desvigentes') }}",
                    "columns": [
                        {data:'id'},
                        {data:'nombre'},
                        {data:'apellidop'},
                        {data:'btn'},
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
                /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% este data table es para mostrar los mensajes actuales %%%%%%%%%%%%%%%%%%%%%*/
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PERSONA DE INSCRIPCIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarpersona', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
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
                console.log(inscripcion_id);
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
                        $html+="<tr>"+"<td>CONDONADO</td><td colspan='2'>"+ json.inscripcion.condonado +"</td></tr>";
                        $html+="<tr>"+"<td>OBJETIVO</td><td colspan='2'>"+ json.inscripcion.objetivo +"</td></tr>";;
                        $html+="<tr>"+"<td>MODALIDAD</td><td colspan='2'>"+ json.modalidad.modalidad +"</td></tr>";
                        $html+="<tr>"+"<td>MOTIVO</td><td colspan='2'>"+ json.motivo.motivo +"</td></tr>";
                        $html+="<tr>"+"<td>CREADO</td><td colspan='2'>"+ moment(json.persona.created_at).format('DD-MM-YYYY') + " "+ json.creado+"</td></tr>";                        
                        $html+="<tr>"+"<td>ACTUALIZADO</td><td colspan='2'>"+ moment(json.persona.updated_at).format('DD-MM-YYYY')+ " "+ json.actualizado +"</td></tr>";  
                        $('#tabla-mostrar-inscripcion').append($html); 
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-inscripcion").modal("show");
            });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PAGOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarpagos', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
                $("#tabla-mostrar-pagos").empty();
                $("#pagos").empty();
                $html="";
                $.ajax({
                    url:"{{url('pagos/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                        console.log(json);
                            $html+="<tr>"+"<td>NOMBRE</td><td>"+ json.persona.nombre+" "+json.persona.apellidop+" "+json.persona.apellidom+"</td><td rowspan='4'><img class='rounded float-end img-thumbnail' alt='"+ json.persona.nombre +"' src={{URL::to('/')}}"+"/storage/"+json.persona.foto +"></td>></tr>";
                            $html+="<tr>"+"<td>ACUENTA</td><td>"+ json.acuenta+"</td></tr>";
                            $html+="<tr>"+"<td>SALDO</td><td>"+ json.saldo+"</td></tr>";
                            $html+="<tr>"+"<td>TOTAL</td><td>"+ json.total+"</td></tr>";
                            $('#tabla-mostrar-pagos').append($html); 
                            $pagosHtml="";
                             for (let j in json.pagos) {
                                $pagosHtml+="<tr id='"+ json.pagos[j].id +"' ><td>"+ json.pagos[j].id +"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].monto+"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].pagocon+"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].cambio+"</td>";
                                $pagosHtml+="<td>"+moment(json.pagos[j].created_at).format('LLL')+"</td>";
                                $pagosHtml+="<td><a class='detallarpago btn-accion-tabla tooltipsC mr-2' title='Ver este pago'><i class='fa fa-fw fa-eye text-primary'></i></a></td>";
                            }
                            $('#pagos').append($pagosHtml); 

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-pagos").modal("show");
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DETALLA PAGO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
               $('table').on('click', '.detallarpago', function(e) {
                e.preventDefault(); 
                var pago_id =$(this).closest('tr').attr('id');

                var fila=$(this).closest('tr');
                console.log(pago_id);
                $.ajax({
                    url : "../pago/mostrar/"+pago_id,
                    
                    success : function(json) {
                        //console.log(json);
                        $("#modal-detallar-pago").modal("show");
                        $("#tabla-billete-pago").empty();
                        $("#tabla-billete-cambio").empty();
                        $("#tabla-detalle-pago").empty();
                        $html="";
                        $html+="<tr><td>Monto</td>"+"<td>Bs. "+json.pago.monto+"</td></tr>";
                        $html+="<tr><td>Pago Con</td>"+"<td>Bs. "+json.pago.pagocon+"</td></tr>";
                        $html+="<tr><td>Cambio</td>"+"<td>Bs. "+json.pago.cambio+"</td></tr>";
                        $html+="<tr><td>Usuario</td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>Fecha y hora Pago</td>"+"<td>"+moment(json.pago.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>Ultima Actualizacion</td>"+"<td>"+moment(json.pago.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-detalle-pago").append($html);    
                        
                        $htmlBilletesPago="";
                        $htmlBilletesCambio="";
                        $sumaPago=0;
                        $sumaCambio=0;
                        for (let j in json.billetes) {
                            if(json.billetes[j].pivot.tipo=='pago'){
                                $htmlBilletesPago+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaPago+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                                
                            }else{
                                $htmlBilletesCambio+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaCambio+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                            }
                        }
                        $htmlBilletesPago+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;P&nbsp;&nbsp;A&nbsp;&nbsp;G&nbsp;&nbsp;O&nbsp;&nbsp; </td>"+"<td>Bs. "+$sumaPago+"</td></tr>";
                        $htmlBilletesCambio+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;A&nbsp;&nbsp;M&nbsp;&nbsp;B&nbsp;&nbsp;I&nbsp;&nbsp;O&nbsp;&nbsp;</td>"+"<td>Bs. "+$sumaCambio+"</td></tr>";
                        $("#tabla-billete-pago").append($htmlBilletesPago);
                        $("#tabla-billete-cambio").append($htmlBilletesCambio);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                
                $('table').on('click', '.mostrarobservaciones', function(e) {
                    e.preventDefault();
                    console.log('MostrarClick'); 
                    observable_id =$(this).closest('tr').attr('id');
                    observable_type ="Inscripcione";
                        var fila=$(this).closest('tr');
                        console.log(observable_id);
                        $("#modal-mostrar-observaciones").modal("show");
                        $("#tabla-observaciones").empty();
                             $.ajax({
                                url :"../observaciones/general",
                                data:{
                                    observable_id:observable_id,
                                    observable_type:observable_type,
                                },
                                success : function(json) {
                                    $html="";
                                    $clase="";
                                    for (let j in json) {
                                        if(json[j].activo==1){
                                            $clase="text-success";
                                        }else{
                                            $clase="text-danger";    
                                        }
                                        $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                        $html+="<td>"+json[j].name+"</td>";
                                        $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                        $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                    }
                                    $("#tabla-observaciones").append($html);
                                },
                                error : function(xhr, status) {
                                    alert('Disculpe, existió un problema');
                                },
                            });
                    });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% AGREAGAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

            CKEDITOR.replace('editor1', {
                height: 120,
                width: "100%",
                removeButtons: 'PasteFromWord'
            });
             $('table').on('click', '.agregarobservacion', function(e) {
                e.preventDefault();
                console.log("click");
                $("#editor1").val("");
                let objeto_id = $(this).closest('tr').attr('id');
                $("#observable_id").val(objeto_id);
                $("#observable_type").val("Inscripcione");
                CKEDITOR.instances.editor1.setData('');
                $("#modal-gregar-observacion").modal("show");
                //$("#formulario-guardar-observacion").empty();
            });

            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  GUARDA OBSERVACION CON AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
          
            $('#guardar-observacion').on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                let observable_id = $("#observable_id").val();
                let observable_type = $("#observable_type").val();
                for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
                $.ajax({
                    url: "../guardar/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion: $("#editor1").val(),
                        observable_id: observable_id,
                        observable_type: observable_type,
                    },
                    success: function (json) {
                        if(json.errores){
                            console.log(json.errores);
                            $html="";
                            for (let j in json.errores) {
                                $html+="<li>"+ json.errores.observacion[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#errores").append($html);
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            })
                            Toast.fire({
                                type: 'success',
                                title: "Guardado corectamente: " + json.observacion,
                            })
                            $("#modal-gregar-observacion").modal("hide");
                        }
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                
            });
        
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% AGREAGAR MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.mostrarprogramacion', function(e) {
                 e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
                $programacionHtml="";
                $("#tabla-programacion").empty();
                $.ajax({
                    url:"{{url('programacion/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                             for (let j in json) {
                                $programacionHtml+="<tr id='"+ json[j].id +"' ><td>"+ (parseInt(j)+1) +"</td>";
                                $programacionHtml+="<td>"+moment(json[j].fecha).format('DD-MM-YYYY')+"</td>";
                                $programacionHtml+="<td>"+moment(json[j].hora_ini).format('hh:mm:ss')+"-"+moment(json[j].hora_fin).format('hh:mm:ss')+"</td>";
                                $programacionHtml+="<td>"+json[j].nombre+'/'+json[j].aula+"</td>";
                                $programacionHtml+="<td>"+json[j].estado+"</td>";
                                $programacionHtml+="<td>"+json[j].materia+"</td>";
                            }
                            $('#tabla-programacion').append($programacionHtml); 
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-programacion").modal("show");
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MATRICULACION JS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            
              /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PERSONA DE MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarpersonamatriculacion', function(e) {
                e.preventDefault();
                let matriculacion_id=$(this).closest('tr').attr('id'); 
                console.log(matriculacion_id+" OK");
                $("#tabla-mostrar-persona").empty();
                $html="";
                $.ajax({
                    url:"{{url('persona/mostrar/ajax/matriculacion')}}",
                    data:{
                        matriculacion_id:matriculacion_id,
                    },
                    success : function(json) {
                        //console.log(json);
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
            $('table').on('click', '.mostrarpersonamatriculaciondesvigente', function(e) {
                e.preventDefault();
                let persona_id=$(this).closest('tr').attr('id'); 
                console.log(persona_id+" OK");
                $("#tabla-mostrar-persona").empty();
                $html="";
                $.ajax({
                    url:"{{url('persona/mostrar')}}",
                    data:{
                        persona_id:persona_id,
                    },
                    success : function(json) {
                        //console.log(json);
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
            $('table').on('click', '.mostrarinscripcionmatriculacion', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
                $("#tabla-mostrar-matriculacion").empty();
                $html="";
                $.ajax({
                    url:"{{url('matriculacion/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                        $html+="<tr>"+"<td>NOMBRE</td><td>"+ json.persona.nombre+" "+json.persona.apellidop+" "+json.persona.apellidom+"</td><td rowspan='4'><img class='img-fluid rounded img-thumbnail' alt='"+ json.persona.nombre +"' src={{URL::to('/')}}"+"/storage/"+json.persona.foto +"></td>></tr>";
                        $html+="<tr>"+"<td>OBJETIVO</td><td>"+ json.matriculacion.objetivo+"</td></tr>";
                        $html+="<tr>"+"<td>COSTO</td><td>"+ json.inscripcion.costo+"</td></tr>";
                        $html+="<tr>"+"<td>TOTAL HORAS</td><td>"+ json.inscripcion.totalhoras +"</td></tr>";
                        $html+="<tr>"+"<td>INICIO</td><td colspan='2'>"+ moment(json.inscripcion.fechaini).format('DD-MM-YYYY')+ " "+json.empezo+"</td></tr>";
                        $html+="<tr>"+"<td>FINALIZA</td><td colspan='2'>"+ moment(json.inscripcion.fechafin).format('DD-MM-YYYY')+ " "+json.finaliza+"</td></tr>";
                        $html+="<tr>"+"<td>FECHA PAGO</td><td colspan='2'>"+ moment(json.inscripcion.fecha_proximo_pago).format('DD-MM-YYYY')+ " "+json.proximo_pago+"</td></tr>";
                        $html+="<tr>"+"<td>CONDONADO</td><td colspan='2'>"+ json.inscripcion.condonado +"</td></tr>";
                        $html+="<tr>"+"<td>OBJETIVO</td><td colspan='2'>"+ json.inscripcion.objetivo +"</td></tr>";;
                        $html+="<tr>"+"<td>MODALIDAD</td><td colspan='2'>"+ json.modalidad.modalidad +"</td></tr>";
                        $html+="<tr>"+"<td>MOTIVO</td><td colspan='2'>"+ json.motivo.motivo +"</td></tr>";
                        $html+="<tr>"+"<td>CREADO</td><td colspan='2'>"+ moment(json.persona.created_at).format('DD-MM-YYYY') + " "+ json.creado+"</td></tr>";                        
                        $html+="<tr>"+"<td>ACTUALIZADO</td><td colspan='2'>"+ moment(json.persona.updated_at).format('DD-MM-YYYY')+ " "+ json.actualizado +"</td></tr>";  
                        $('#tabla-mostrar-inscripcion').append($html); 
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-inscripcion").modal("show");
            });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PAGOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            $('table').on('click', '.mostrarpagosmatriculacion', function(e) {
                e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
                $("#tabla-mostrar-pagos").empty();
                $("#pagos").empty();
                $html="";
                $.ajax({
                    url:"{{url('pagos/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                        console.log(json);
                            $html+="<tr>"+"<td>NOMBRE</td><td>"+ json.persona.nombre+" "+json.persona.apellidop+" "+json.persona.apellidom+"</td><td rowspan='4'><img class='rounded float-end img-thumbnail' alt='"+ json.persona.nombre +"' src={{URL::to('/')}}"+"/storage/"+json.persona.foto +"></td>></tr>";
                            $html+="<tr>"+"<td>ACUENTA</td><td>"+ json.acuenta+"</td></tr>";
                            $html+="<tr>"+"<td>SALDO</td><td>"+ json.saldo+"</td></tr>";
                            $html+="<tr>"+"<td>TOTAL</td><td>"+ json.total+"</td></tr>";
                            $('#tabla-mostrar-pagos').append($html); 
                            $pagosHtml="";
                             for (let j in json.pagos) {
                                $pagosHtml+="<tr id='"+ json.pagos[j].id +"' ><td>"+ json.pagos[j].id +"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].monto+"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].pagocon+"</td>";
                                $pagosHtml+="<td>"+json.pagos[j].cambio+"</td>";
                                $pagosHtml+="<td>"+moment(json.pagos[j].created_at).format('LLL')+"</td>";
                                $pagosHtml+="<td><a class='detallarpago btn-accion-tabla tooltipsC mr-2' title='Ver este pago'><i class='fa fa-fw fa-eye text-primary'></i></a></td>";
                            }
                            $('#pagos').append($pagosHtml); 

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-pagos").modal("show");
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DETALLA PAGO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
               $('table').on('click', '.detallarpagomatriculacion', function(e) {
                e.preventDefault(); 
                var pago_id =$(this).closest('tr').attr('id');

                var fila=$(this).closest('tr');
                console.log(pago_id);
                $.ajax({
                    url : "../pago/mostrar/"+pago_id,
                    
                    success : function(json) {
                        //console.log(json);
                        $("#modal-detallar-pago").modal("show");
                        $("#tabla-billete-pago").empty();
                        $("#tabla-billete-cambio").empty();
                        $("#tabla-detalle-pago").empty();
                        $html="";
                        $html+="<tr><td>Monto</td>"+"<td>Bs. "+json.pago.monto+"</td></tr>";
                        $html+="<tr><td>Pago Con</td>"+"<td>Bs. "+json.pago.pagocon+"</td></tr>";
                        $html+="<tr><td>Cambio</td>"+"<td>Bs. "+json.pago.cambio+"</td></tr>";
                        $html+="<tr><td>Usuario</td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>Fecha y hora Pago</td>"+"<td>"+moment(json.pago.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>Ultima Actualizacion</td>"+"<td>"+moment(json.pago.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-detalle-pago").append($html);    
                        
                        $htmlBilletesPago="";
                        $htmlBilletesCambio="";
                        $sumaPago=0;
                        $sumaCambio=0;
                        for (let j in json.billetes) {
                            if(json.billetes[j].pivot.tipo=='pago'){
                                $htmlBilletesPago+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaPago+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                                
                            }else{
                                $htmlBilletesCambio+="<tr><td>Corte de Bs. "+json.billetes[j].corte+"</td>"+"<td>"+json.billetes[j].pivot.cantidad+"</td><td>"+ json.billetes[j].pivot.tipo +"</td><td>Bs. "+  json.billetes[j].pivot.cantidad*json.billetes[j].corte +"</td></tr>";
                                $sumaCambio+=json.billetes[j].corte*json.billetes[j].pivot.cantidad;
                            }
                        }
                        $htmlBilletesPago+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;P&nbsp;&nbsp;A&nbsp;&nbsp;G&nbsp;&nbsp;O&nbsp;&nbsp; </td>"+"<td>Bs. "+$sumaPago+"</td></tr>";
                        $htmlBilletesCambio+="<tr><td colspan='3'>T&nbsp;&nbsp;O&nbsp;&nbsp;T&nbsp;&nbsp;A&nbsp;&nbsp;L&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;A&nbsp;&nbsp;M&nbsp;&nbsp;B&nbsp;&nbsp;I&nbsp;&nbsp;O&nbsp;&nbsp;</td>"+"<td>Bs. "+$sumaCambio+"</td></tr>";
                        $("#tabla-billete-pago").append($htmlBilletesPago);
                        $("#tabla-billete-cambio").append($htmlBilletesCambio);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                
                $('table').on('click', '.mostrarobservacionesmatriculacion', function(e) {
                    e.preventDefault();
                    console.log('MostrarClick'); 
                    observable_id =$(this).closest('tr').attr('id');
                    observable_type ="Inscripcione";
                        var fila=$(this).closest('tr');
                        console.log(observable_id);
                        $("#modal-mostrar-observaciones").modal("show");
                        $("#tabla-observaciones").empty();
                             $.ajax({
                                url :"../observaciones/general",
                                data:{
                                    observable_id:observable_id,
                                    observable_type:observable_type,
                                },
                                success : function(json) {
                                    $html="";
                                    $clase="";
                                    for (let j in json) {
                                        if(json[j].activo==1){
                                            $clase="text-success";
                                        }else{
                                            $clase="text-danger";    
                                        }
                                        $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                        $html+="<td>"+json[j].name+"</td>";
                                        $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                        $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                    }
                                    $("#tabla-observaciones").append($html);
                                },
                                error : function(xhr, status) {
                                    alert('Disculpe, existió un problema');
                                },
                            });
                    });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                
                $('table').on('click', '.mostrarobservacionespersona', function(e) {
                    e.preventDefault();
                    console.log('MostrarClick este metodito'); 
                    observable_id =$(this).closest('tr').attr('id');
                    observable_type ="Persona";
                        var fila=$(this).closest('tr');
                        console.log(observable_id);
                        $("#modal-mostrar-observaciones").modal("show");
                        $("#tabla-observaciones").empty();
                             $.ajax({
                                url :"../observaciones/general",
                                data:{
                                    observable_id:observable_id,
                                    observable_type:observable_type,
                                },
                                success : function(json) {
                                    console.log(json);
                                    $html="";
                                    $clase="";
                                    for (let j in json) {
                                        if(json[j].activo==1){
                                            $clase="text-success";
                                        }else{
                                            $clase="text-danger";    
                                        }
                                        $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                        $html+="<td>"+json[j].name+"</td>";
                                        $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                        $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                    }
                                    $("#tabla-observaciones").append($html);
                                },
                                error : function(xhr, status) {
                                    alert('Disculpe, existió un problema');
                                },
                            });
                    });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% AGREAGAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

            CKEDITOR.replace('editor1', {
                height: 120,
                width: "100%",
                removeButtons: 'PasteFromWord'
            });
             $('table').on('click', '.agregarobservacionmatriculacion', function(e) {
                e.preventDefault();
                console.log("click");
                $("#editor1").val("");
                let objeto_id = $(this).closest('tr').attr('id');
                $("#observable_id").val(objeto_id);
                $("#observable_type").val("Inscripcione");
                CKEDITOR.instances.editor1.setData('');
                $("#modal-gregar-observacion").modal("show");
                //$("#formulario-guardar-observacion").empty();
            });
             CKEDITOR.replace('editor2', {
                height: 120,
                width: "100%",
                removeButtons: 'PasteFromWord'
            });
             $('table').on('click', '.agregarobservacionpersona', function(e) {
                e.preventDefault();
                console.log("clicked agregarobservacionpersona");
                $("#editor2").val("");
                let objeto_id = $(this).closest('tr').attr('id');
                $("#observable_id").val(objeto_id);
                $("#observable_type").val("Persona");
                CKEDITOR.instances.editor1.setData('');
                $("#modal-agregar-observacion-persona").modal("show");
                //$("#formulario-guardar-observacion").empty();
            });
             
            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  GUARDA OBSERVACION CON  AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#guardar-observacion').on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                let observable_id = $("#observable_id").val();
                let observable_type = $("#observable_type").val();
                for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
                $.ajax({
                    url: "../guardar/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion: $("#editor1").val(),
                        observable_id: observable_id,
                        observable_type: observable_type,
                    },
                    success: function (json) {
                        if(json.errores){
                            console.log(json.errores);
                            $html="";
                            for (let j in json.errores) {
                                $html+="<li>"+ json.errores.observacion[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#errores").append($html);
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            })
                            Toast.fire({
                                type: 'success',
                                title: "Guardado corectamente: " + json.observacion,
                            })
                            $("#modal-gregar-observacion").modal("hide");
                        }
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                
            });
            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  GUARDA OBSERVACION PERSONA DESVIGENTIZADA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#guardar-observacion-persona').on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                let observable_id = $("#observable_id").val();
                let observable_type = $("#observable_type").val();
                for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
                $.ajax({
                    url: "../guardar/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion: $("#editor2").val(),
                        observable_id: observable_id,
                        observable_type: observable_type,
                    },
                    success: function (json) {
                        if(json.errores){
                            console.log(json.errores);
                            $html="";
                            for (let j in json.errores) {
                                $html+="<li>"+ json.errores.observacion[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#errores").append($html);
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            })
                            Toast.fire({
                                type: 'success',
                                title: "Guardado corectamente: " + json.observacion,
                            })
                            $("#modal-agregar-observacion-persona").modal("hide");
                        }
                        tablamatriculacionesdesvigentes.ajax.reload();
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                
            });
        
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% AGREAGAR MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.mostrarprogramacionmatriculacion', function(e) {
                 e.preventDefault();
                let inscripcion_id=$(this).closest('tr').attr('id'); 
                console.log(inscripcion_id);
                $programacionHtml="";
                $("#tabla-programacion").empty();
                $.ajax({
                    url:"{{url('programacion/mostrar/ajax')}}",
                    data:{
                        inscripcion_id:inscripcion_id,
                    },
                    success : function(json) {
                    
                             for (let j in json) {
                                $programacionHtml+="<tr id='"+ json[j].id +"' ><td>"+ (parseInt(j)+1) +"</td>";
                                $programacionHtml+="<td>"+moment(json[j].fecha).format('DD-MM-YYYY')+"</td>";
                                $programacionHtml+="<td>"+moment(json[j].hora_ini).format('hh:mm:ss')+"-"+moment(json[j].hora_fin).format('hh:mm:ss')+"</td>";
                                $programacionHtml+="<td>"+json[j].nombre+'/'+json[j].aula+"</td>";
                                $programacionHtml+="<td>"+json[j].estado+"</td>";
                                $programacionHtml+="<td>"+json[j].materia+"</td>";
                            }
                            $('#tabla-programacion').append($programacionHtml); 

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-mostrar-programacion").modal("show");
                
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR LA ULTIMA MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

            $('table').on('click', '.ultimamatriculacion', function(e) {
                e.preventDefault();
                console.log('ULTIMA MATRICULACION'); 
                persona_id =$(this).closest('tr').attr('id');
                    var fila=$(this).closest('tr');
                    console.log(persona_id);
                    $("#modal-mostrar-ultimamatriculacion").modal("show");
                    $("#tabla-ultimamatriculacion").empty();
                            $.ajax({
                            url :"../persona/ultima/matriculacion",
                            data:{
                                persona_id:persona_id,
                            },
                            success : function(json) {
                                console.log(json);
                                $html="";
                                $html+="<tr>"+"<td>COSTO</td><td>"+ json.matriculacion.costo+"</td></tr>";
                                $html+="<tr>"+"<td>TOTAL HORAS</td><td>"+ json.matriculacion.totalhoras +"</td></tr>";
                                $html+="<tr>"+"<td>INICIO</td><td colspan='2'>"+ moment(json.matriculacion.fechaini).format('DD-MM-YYYY')+ " "+json.empezo+"</td></tr>";
                                $html+="<tr>"+"<td>FINALIZA</td><td colspan='2'>"+ moment(json.matriculacion.fechafin).format('DD-MM-YYYY')+ " "+json.finaliza+"</td></tr>";
                                $html+="<tr>"+"<td>FECHA PAGO</td><td colspan='2'>"+ moment(json.matriculacion.fecha_proximo_pago).format('DD-MM-YYYY')+ " "+json.proximo_pago+"</td></tr>";
                                $html+="<tr>"+"<td>CONDONADO</td><td colspan='2'>"+ json.matriculacion.condonado +"</td></tr>";
                                $html+="<tr>"+"<td>MODALIDAD</td><td colspan='2'>"+ json.asignatura.asignatura +"</td></tr>";
                                $html+="<tr>"+"<td>MOTIVO</td><td colspan='2'>"+ json.motivo.motivo +"</td></tr>";
                                $html+="<tr>"+"<td>CREADO</td><td colspan='2'>"+ moment(json.matriculacion.created_at).format('DD-MM-YYYY') + " "+ json.creado+"</td></tr>";                        
                                $html+="<tr>"+"<td>ACTUALIZADO</td><td colspan='2'>"+ moment(json.matriculacion.updated_at).format('DD-MM-YYYY')+ " "+ json.actualizado +"</td></tr>";  
                                $("#tabla-ultimamatriculacion").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRA LA ULTIMA PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.ultimaprogramacioncom', function(e) {
                e.preventDefault();
                persona_id =$(this).closest('tr').attr('id');
                console.log(persona_id); 
                $("#modal-mostrar-ultima-programacioncom").modal("show");
                $("#tabla-ultima-programacioncom").empty();
                            $.ajax({
                            url :"../persona/ultima/programacioncom",
                            data:{
                                persona_id:persona_id
                            },
                            success : function(json) {
                                console.log(json);
                                $html="";
                                $clase="";
                                for (let j in json) {
                                    if(json[j].habilitado==1){
                                        $clase="text-success";
                                        if(moment(json[j].fecha).format('DD-MM-YYYY')==moment().format('DD-MM-YYYY')){
                                            $clase+=" bg-success text-white";
                                        }
                                    }else{
                                        $clase="text-danger";    
                                        if(moment(json[j].fecha).format('DD-MM-YYYY')==moment().format('DD-MM-YYYY')){
                                            $clase+=" bg-danger text-white";
                                        }
                                    }
                                   
                                    //console.log();
                                    // console.log(moment(json[j].fecha).format('DD-MM-YYYY'));
                                    $html+="<tr class='"+$clase+"'><td>"+ moment(json[j].fecha).format("L") +"</td>";
                                    $html+="<td>"+moment(json[j].horaini).format('hh:mm-ss')+" - "+moment(json[j].horafin).format('hh:mm:ss')+"</td>";
                                    $html+="<td>"+json[j].horas_por_clase+"</td>";
                                    $html+="<td>"+json[j].nombre+"</td>";
                                    $html+="<td>"+json[j].estado+"</td>";
                                }
                                $("#tabla-ultima-programacioncom").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                }); 
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ENVIAR MENSAJES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.enviarmensaje', function(e) {
                e.preventDefault();
                console.log("enviar mensajes");
                persona_id =$(this).closest('tr').attr('id');
                console.log(persona_id); 
                    $("#modal-mostrar-contactos").modal("show");
                    $("#tabla-contactos").empty();
                            $.ajax({
                            url :"../persona/enviar/mensaje",
                            data:{
                                persona_id:persona_id,
                            },
                            success : function(json) {
                                console.log(json);
                                $html="<tr id='"+ json.persona.telefono +"'><td>"+ json.persona.nombre +"</td>";
                                $html+="<td>Teléfono personal</td>";
                                $html+="<td>"+json.persona.telefono+"</td>";
                                $html+="<td>"+moment(json.persona.created_at).format('L') +"</td>";
                                $html+="<td>"+moment(json.persona.updated_at).format('L') +"</td>";
                                $html+="<td><a class='btn listarmensajes'><i class='far fa-comment-dots fa-2x'></i></a></td></tr>";

                                for (let j in json.apoderados) {
                                    $html+="<tr id='"+ json.apoderados[j].telefono +"'><td>"+ json.apoderados[j].nombre +"</td>";
                                    $html+="<td>"+json.apoderados[j].pivot.parentesco+"</td>";
                                    $html+="<td>"+json.apoderados[j].telefono+"</td>";
                                    $html+="<td>"+moment(json.apoderados[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>"+moment(json.apoderados[j].updated_at).format('LLL') +"</td>";
                                    $html+="<td><a class='btn listarmensajes'><i class='far fa-comment-dots fa-2x'></i></a></td></tr>";

                                }
                                $("#tabla-contactos").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                }); 
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% HACER LLAMADAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.llamar', function(e) {
                e.preventDefault();
                console.log("LLAMAR CLICK");
                persona_id =$(this).closest('tr').attr('id');

                        $ultimacelda="<td><a class='btn listarmensajes'><i class='far fa-comment-dots fa-2x'></i></a><a target='_blank' onclick='descargar()' title='Envia este mensaje'>";
                                    $ultimacelda+="<i class='fas fa-download fa-2x'></i></a> </td></tr>";

                    $("#modal-mostrar-contactos").modal("show");
                    $("#tabla-contactos").empty();
                            $.ajax({
                            url :"../persona/enviar/mensaje",
                            data:{
                                persona_id:persona_id,
                            },
                            success : function(json) {
                                console.log(json);
                                $html="<tr id='"+ json.persona.telefono +"'><td>"+ json.persona.nombre +"</td>";
                                $html+="<td>Teléfono personal</td>";
                                $html+="<td><a href='tel:+591"+json.persona.telefono+"'><i class='fas fa-phone-volume'></i> "+json.persona.telefono+"</a></td>";
                                $html+="<td>"+moment(json.persona.created_at).format('L') +"</td>";
                                $html+="<td>"+moment(json.persona.updated_at).format('L') +"</td>";
                                $html+=$ultimacelda;

                                for (let j in json.apoderados) {
                                    $html+="<tr id='"+ json.apoderados[j].telefono +"'><td>"+ json.apoderados[j].nombre +"</td>";
                                    $html+="<td>"+json.apoderados[j].pivot.parentesco+"</td>";
                                    $html+="<td><a href='tel:+591"+json.apoderados[j].telefono+"'><i class='fas fa-phone-volume'></i>"+json.apoderados[j].telefono+"</a></td>";
                                    $html+="<td>"+moment(json.apoderados[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>"+moment(json.apoderados[j].updated_at).format('LLL') +"</td>";
                                    $hhtml+=$ultimacelda;

                                }
                                $("#tabla-contactos").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                }); 
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% LLAMAR  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.listarmensajes', function(e) {
                e.preventDefault();
                telefono =$(this).closest('tr').attr('id');
                console.log(telefono);
                    MostrarMensajes(telefono);
                    $("#modal-mensajes").modal("show");
                }); 
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FECHAR UNA FECHA A PROXIMADA DE REGRESO A CLASES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.fechar', function(e) {
                e.preventDefault();
                console.log('MostrarClick'); 
                observable_id =$(this).closest('tr').attr('id');
                observable_type ="Inscripcione";
                
                    var fila=$(this).closest('tr');
                    console.log(observable_id);
                    $("#modal-mostrar-observaciones").modal("show");
                    $("#tabla-observaciones").empty();
                            $.ajax({
                            url :"../observaciones/general",
                            data:{
                                observable_id:observable_id,
                                observable_type:observable_type,
                            },
                            success : function(json) {
                                $html="";
                                $clase="";
                                for (let j in json) {
                                    if(json[j].activo==1){
                                        $clase="text-success";
                                    }else{
                                        $clase="text-danger";    
                                    }
                                    $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                    $html+="<td>"+json[j].name+"</td>";
                                    $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                }
                                $("#tabla-observaciones").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                }); 
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CALIFICAR EL GRADO DE REGRESO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.calificar', function(e) {
                e.preventDefault();
                console.log('MostrarClick'); 
                observable_id =$(this).closest('tr').attr('id');
                observable_type ="Inscripcione";
                    var fila=$(this).closest('tr');
                    console.log(observable_id);
                    $("#modal-mostrar-observaciones").modal("show");
                    $("#tabla-observaciones").empty();
                            $.ajax({
                            url :"../observaciones/general",
                            data:{
                                observable_id:observable_id,
                                observable_type:observable_type,
                            },
                            success : function(json) {
                                $html="";
                                $clase="";
                                for (let j in json) {
                                    if(json[j].activo==1){
                                        $clase="text-success";
                                    }else{
                                        $clase="text-danger";    
                                    }
                                    $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                    $html+="<td>"+json[j].name+"</td>";
                                    $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                }
                                $("#tabla-observaciones").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                }); 
        } );
        
        function MostrarMensajes(UnTelefono){
                $("#mensajes").dataTable().fnDestroy();
                tablamensajes=$('#mensajes').DataTable({
                    "responsive":true,
                    "searching":true,
                    "paging":   true,
                    "autoWidth":false,
                    "ordering": true,
                    "info":     true,
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); 
                        if(data['vigente']==1){
                            $(row).addClass('text-success');
                        }else{
                            $(row).addClass('text-danger');
                        }
                        $('td', row).eq(3).html(data['telefono']);
                        
                    },
                    "ajax":{
                        "url": "../listar/mensajes/enviar",
                        "data":{
                            telefono:UnTelefono,
                        },
                    },
                    "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'mensaje'},
                        {data: 'telefono'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },  
                        { responsivePriority: 2, targets: -1 }
                    ],
                    "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                });
        }

        function descargar(){
            var blob = new Blob(["This is my first text."], {type: "text/plain;charset=utf-8"});
            saveAs(blob, "testfile1.txt");
        }

      
           

        descargar();
    </script>
@stop