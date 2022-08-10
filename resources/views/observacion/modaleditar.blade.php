{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL EDITAR OBSERVACION  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="editar-observacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            
            <div class="modal-header bg-primary">
                MODAL EDITAR OBSERVACIONx
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-secondary">
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