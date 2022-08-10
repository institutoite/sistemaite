<div class="modal" tabindex="-1"  id="modal-agregar-observacion-matriculacion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL AGREGA OBSERVACION DE MATRICULACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <div id="erroresdiv" class="alert alert-danger d-none">
                            <ul id=errores>
                                
                            </ul>
                        </div>
                        <form id="formulario-guardar-observacion" method="POST">
                            @csrf
                            <textarea cols="80" id="editor2" name="editor2" rows="10" data-sample-short>
                            </textarea>
                            <input type="text" name="observable_id_matriculacion"  id="observable_id_matriculacion" value="">
                            <input type="text" name="observable_type_matriculacion"  id="observable_type_matriculacion" value="">

                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion-matriculacion" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL OBSERVACIONES DE INSCRIPCION  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-observaciones-inscripcion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('MOSTRAR OBSERVACIONES INSCRIPCION')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table id="observaciones" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OBSERVACION</th>
                                    <th>AUTOR</th>
                                    <th>CREADO</th>
                                    <th>ACTUALIZADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-observaciones-inscripcion">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL OBSERVACIONES DE MATRICULACION  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-observaciones-matriculacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('MOSTRAR OBSERVACIONES DE UNA MATRICULACION')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table id="observaciones" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OBSERVACION</th>
                                    <th>AUTOR</th>
                                    <th>CREADO</th>
                                    <th>ACTUALIZADO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-observaciones-matriculacion">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>