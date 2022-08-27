<div class="modal fade" id="{{$idmodal}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('CALIFICAR ESTA PERSONA')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <input class="form-control" hidden type="number" name="id_persona" id="id_persona">
                            <input class="form-control" hidden type="number" name="calificacion_id" id="calificacion_id">
                            <input class="form-control" hidden type="text" name="storeupdate" id="storeupdate">
                            <select class="form-control" required name="calificacion" id="calificacion">
                                <option value="">Selecione...</option>
                                <option value="1">1 (pésimo cliente)</option>
                                <option value="2">2 (malo cliente)</option>
                                <option value="3">3 (regular cliente)</option>
                                <option value="4">4 (Bueno cliente)</option>
                                <option value="5">5 (Excelente cliente)</option>
                            </select>
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="btn-calificar" class="btn btn-primary text-white btn-lg">Calificar<i class="far fa-save"></i></button>        
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