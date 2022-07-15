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
                        
                            @include('include.botones')
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1"  id="modal-gregar-observacion">
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
                        <form id="formulario-guardar-observacion" method="POST">
                            @csrf
                            <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short>
                            </textarea>
                            <input type="text" name="observable_id" id="observable_id" value="">
                            <input type="text" name="observable_type" id="observable_type" value="">

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