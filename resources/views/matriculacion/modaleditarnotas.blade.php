<div class="modal" tabindex="-1" id="modal-editarnotas">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                EDITAR NOTAS
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <form id="form-editar-nota">
                        <input class="form-control" hidden type="text" name="matriculacion_id" id="matriculacion_id">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input class="form-control" type="text" name="ser" id="ser">
                                    <label for="grado_id">Asistencia</label>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input class="form-control" type="text" name="hacer" id="hacer">
                                    <label for="grado_id">Practicos</label>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input class="form-control" type="text" name="saber" id="saber">
                                    <label for="grado_id">Examen</label>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input class="form-control" readonly type="text" name="decidir" id="decidir">
                                    <label for="grado_id">Alfa</label>
                                </div>  
                            </div>
                        </div> 
                       
                        
                        <div class="container-fluid h-100 mt-3"> 
                            <div class="row w-100 align-items-center">
                                <div class="col text-center">
                                    <button type="submit" id="actualizarnotas" class="btn btn-dark">Guardar <i class="far fa-save"></i></button>        
                                </div>	
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>
