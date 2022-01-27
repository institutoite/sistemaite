{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL EDITAR CLASE
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Editar Clase</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-editar-clase" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            <div class="row" id="inputs">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="date" name="fecha" id="fecha" value="">
                                        <label for="fecha">Fecha</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="time" name="horainicio" id="horainicio" value="">
                                        <label for="horainicio">Hora Inicio</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="time" name="horafin" id="horafin" value="">
                                        <label for="horafin">Hora Fin</label>
                                    </div>
                                </div>
                            </div>
                            
                            <select class="form-control" name="tema_id" id="tema_id">
                                {{-- se cargan los opction desde Ajax  presentes.blade--}}
                            </select>
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="actualizar-clase" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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