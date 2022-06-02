{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%   MODAL EDITAR OBSERVACION  %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="editar-calificacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                EDITAR CALIFICACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-secondary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Calificacion Editar</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-editar-calificacion" method="POST" action="{{route('calificacion.update')}}">
                            {{-- {{ @method_field('PUT') }} --}}
                            @csrf
                            <x-calificacion color="primary" :personaid="$persona->id">
                                <x-slot name="title">
                                    Calificar este Modelo
                                </x-slot>
                                 <input class="form-control" hidden type="text" name="calificacion_id" id="calificacion_id">
                            </x-calificacion>

                           
                            {{-- @include('include.botones') --}}
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
