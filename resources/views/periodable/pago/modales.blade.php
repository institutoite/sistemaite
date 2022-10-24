<div class="modal" tabindex="-1" id="modal-editar-pago">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                EDITAR PAGO
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title"></span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data"> --}}
                        <form id="formulario-editar-pago" method="POST" action="{{route('pago.actualizar')}}">
                            @csrf
                                @include('periodable.pago.formpagoedicion')
                                <div class="container-fluid h-100 mt-3"> 
                                    <div class="row w-100 align-items-center">
                                        <div class="col text-center">
                                            <button type="submit" id="actualizarpago" class="btn btn-primary text-white btn-lg">Actualizar Pago <i class="far fa-save"></i></button>        
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