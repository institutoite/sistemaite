<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRANDO UN POTENCIAL CLIENTE')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="potencial" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-potencial">
                            
                        </tbody>
                    </table>
                    <table id="observaciones" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>OBSERVACION</th>
                                <th>CREADO</th>
                                <th>Opciones</th>
                                <th>AUTOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-observaciones">
                            
                        </tbody>
                    </table>
                    <table id="contactos" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>TELEFONO</th>
                                <th>CREADO</th>
                                <th>AUTOR</th>
                                <th>PARENTESCO</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-contactos">

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
                                    <input  type="number" hidden name="observable_id" id="observable_id" class="form-control" value="">
                                </div>  
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="text" hidden  name="observable_type" id="observable_type" class="form-control" value="">
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

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL EDITAR OBSERVACION  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
{{-- <div class="modal" tabindex="-1" id="editar-observacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                EDITAR OBSERVACIONx
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
</div> --}}

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL FECHAR  --}}
<div class="modal" tabindex="-1" id="modal-fechar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('AGENDAR O FECHAR UN POSIBLE REGRESO')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div id='erroresdiv' class="alert alert-danger danger text-danger d-none" role='alert'>
                            <div class="alert alert-danger">
                                <h4 class="alert-heading">Error</h4>
                                <ul id="error">
                                    
                                </ul>
                            </div>
                        </div>
                            <input class="form-control" type="date" id="vuelvefecha" name="vuelvefecha">
                            <input class="form-control" type="text" hidden id="persona_id" name="persona_id">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="agendar" class="btn btn-primary text-white btn-lg">Agendar<i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL CALIFICAR  --}}
<div class="modal" tabindex="-1" id="modal-calificar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('CALIFICAR UNA PERSONA')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div id='erroresdiv' class="alert alert-danger danger text-danger d-none" role='alert'>
                            <div class="alert alert-danger">
                                <h4 class="alert-heading">Error</h4>
                                <ul id="error">
                                    
                                </ul>
                            </div>
                        </div>
                            <select id="volvera" class="form-control">
                                <option value="1">No piensa volver(20%)</option>
                                <option value="2">Poco probable que vuelva(40%)</option>
                                <option value="3">Es posible que vuelva(60%)</option>
                                <option value="4">Casi seguro que vuelva(80%)</option>
                                <option value="5">Va volver con seguridad(100%)</option>
                            </select>
                            <input class="form-control" type="text" hidden id="persona_id" name="persona_id">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="calificar" class="btn btn-primary text-white btn-lg">Calificar<i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

