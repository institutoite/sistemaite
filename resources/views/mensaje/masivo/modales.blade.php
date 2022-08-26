{{-- <div class="modal" tabindex="-1" id="modal-fechar"> --}}
<div class="modal fade" id="modal-fechar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
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
                            <input class="form-control" type="date" id="fecha_proximo_pago" name="fecha_proximo_pago">
                            <input class="form-control" type="text" hidden id="inscripcione_id" name="inscripcione_id">
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