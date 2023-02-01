<div class="modal" tabindex="-1" id="modal-pedir-fecha">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('FECHA PARA LA CONSULTA')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                        <form id="formulario-pedir-fecha">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <input class="form-control" type="date" name="fecha" id="fecha" value="{{date('Y-m-d')}}">       
                                    </div>	
                                </div>
                            </div>
                           <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" id="btn-consultar" class="btn btn-primary">Consultar<i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                        </form>
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>