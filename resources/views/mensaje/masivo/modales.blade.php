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

<x-calificar
idmodal="modal-editar-calificacion"
>

</x-calificar>