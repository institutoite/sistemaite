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
                        <form id="formulario-guardar-observacion" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="date" name="fecha" value="">
                                    <label for="fecha">Fecha</label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" name="horainicio" value="">
                                    <label for="horainicio">Hora Inicio</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="time" name="horafin" value="">
                                    <label for="horafin">Hora Fin</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="text" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="">
                                    <label for="hora_fin">Hora fin</label>
                                </div>  
                            </div>
                            {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
                                <div class="form-floating mb-3">
                                    <select class="form-control mb-3" name="docente_id" id="docente_id">
                                        @foreach ($docentes as $docente)
                                            <option value="{{$docente->id}}" {{($docente->id==$programa->docente_id) ? 'selected':''}} >{{$docente->nombre.' '.$docente->apellidop}}</option>
                                        @endforeach
                                    </select>
                                    <label for="docente_id">Docente</label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
                                <div class="form-floating mb-3">
                                    <select class="form-control mb-3" name="materia_id" id="materia_id">
                                        @foreach ($materias as $materia)
                                            <option value="{{$materia->id}}" {{($materia->id==$programa->materia_id) ? 'selected':''}} >{{$materia->materia}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <label for="materia_id">Materia</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
                                <div class="form-floating mb-3">
                                    <select class="form-control mb-3" name="aula_id" id="aula_id">
                                        @foreach ($aulas as $aula)
                                            <option value="{{$aula->id}}" {{($aula->id==$programa->aula_id) ? 'selected':''}}>{{$aula->aula}}</option>
                                        @endforeach
                                    </select>
                                    <label for="aula_id">Aula</label>
                                </div>
                            </div> --}}
                            
                            
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