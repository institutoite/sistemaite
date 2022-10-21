{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  M O S T R A R   U N A   P R O G R A M A C I O N  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRAR PROGRAMACIÓN DE UNA INSCRIPCIÓN')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="programacion" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-programacion">
                            
                        </tbody>
                    </table>
                    <table id="observaciones" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>Usuario</th>
                                <th>Observacion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-observaciones">
                            
                        </tbody>
                    </table>
                    <table id="clases" class="table table-bordered table-hover table-striped text-small table-responsive">
                        <thead class="bg-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>HoraIni</th>
                                <th>HoraFin</th>
                                <th>Docente</th>
                                <th>Materia</th>
                                <th>Aula</th>
                                <th>Asuario</th>
                                <th>Tema</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-clases">
                            
                        </tbody>
                    </table>
                    <table id="licencias" class="table table-bordered table-hover table-striped table-responsive">
                        <thead class="bg-primary">
                            <tr>
                                <th>MOTIVO</th>
                                <th>SOLICITANTE</th>
                                <th>PARENTESCO</th>

                                <th>USUARIO</th>
                                <th>SOLICITADO</th>
                                <th>OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-licencias">
                            
                        </tbody>
                    </table>
                    


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A   E D I T A R %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                EDITAR PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title">Actualizar Programacion</span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data"> --}}
                        <form id="formulario-editar" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            {{-- @include('programacion.form') --}}
                            @include('include.botones')
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-gregar-observacion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL OBSERVACION DE PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-guardar-observacion" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="text" name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror" value="{{old('observacion')}}">
                                    <label for="observacion">Observación</label>
                                </div>  
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="number" hidden name="id_programacion" id="id_programacion" class="form-control">
                                </div>  
                            </div>
                            
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar-programacion-hoy">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL OBSERVACION DE PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-guardar-observacio" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            
                           <div class="row">
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   F E C H A  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3 text-gray">
                                        <input type="date" name='fecha' class="form-control texto-plomo" id="floatingInput" placeholder="fecha" value="">
                                        <label for="fecha">Fecha</label>
                                    </div>
                                </div>
                                {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  I N I C I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <input  type="time" name="hora_ini" class="form-control @error('hora_ini') is-invalid @enderror" value="">
                                        <label for="hora_ini">Hora inicio</label>
                                    </div>    
                                </div>
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   H O R A  F I N  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <input  type="time" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="">
                                        <label for="hora_fin">Hora fin</label>
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacioxn" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL CREAR LICENCIACOM  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="licencia-crear">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                FORMULARIO LICENCIA
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title">Licencia</span>
                    </div>
                    <div id="errordiv" class="alert alert-danger d-none">
                        <ul id="error">

                        </ul>
                    </div>
                    <div class="card-body">
                        <form id="formulario-licencia" method="POST" action="{{route('programacioncom.actualizar')}}">
                            @csrf
                            
                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL EDITAR LICENCIACOM  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="licencia-editar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                FORMULARIO LICENCIA EDITAR
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="estadolicencia" class="list-group">
                    
                </ul>

                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title">Licencia</span>
                    </div>
                    <div id="errordiveditar" class="alert alert-danger d-none">
                        <ul id="erroreditar">

                        </ul>
                    </div>

                    <div class="card-body">
                        <form id="formulario-licencia-editar" method="POST" action="{{route('licencia.actualizar')}}">
                            @csrf
                            
                           
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL EDITAR OBSERVACION  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="editar-observacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                EDITAR OBSERVACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-secondary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Observacion Editar</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-editar-observacion" method="POST" action="{{route('programacioncom.actualizar')}}">
                            @csrf
                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>