{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-crear-gestion">
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
                        <form id="formulario-guardar-gestion" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            <div class="row">
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   G R A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control" name="grado_id" id="grado_id">
                                            {{-- se cargan los opction desde Ajax  presentes.blade--}}
                                        </select>
                                        <label for="grado_id">Grado</label>
                                    </div>  
                                </div>
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   C O L E G I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control" name="colegio_id" id="colegio_id">
                                            {{-- se cargan los opction desde Ajax  presentes.blade--}}
                                        </select>
                                        <label for="colegio_id">Colegios</label>
                                    </div>
                                </div>
                                {{-- %%%%%%%%%%%%%%% C A M P O  A N I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control" name="anio" id="anio">
                                            {{-- se cargan los opction desde Ajax  presentes.blade--}}
                                        </select>
                                        <label for="anio">Año</label>
                                    </div>    
                                </div>
                                {{-- %%%%%%%%%%%%%%% C A M P O  ESTUDIANTE ID %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <input type="text" id="persona_id" value="{{$estudiante_id}}">
                            </div>
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
           
        </div>
    </div>
</div>