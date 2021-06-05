<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">MARCAR ASISTENCIA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                
                        <form method="POST" action="{{route('programacions.store') }}">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <input class="form-control" type="date" name="fecha" id="fecha">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <input class="form-control" type="time" name="horainicio" id="horainicio">
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <input class="form-control" type="time" name="horafin" id="horafin" >
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <select class="form-control"  name="docente" id="docente">
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <select class="form-control"  name="" id="">
                                        <option value="">Profe1</option>
                                        <option value="">Profe1</option>
                                        <option value="">Profe1</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm mb-3" >
                                    <select class="form-control"  name="" id="">
                                        <option value="">Profe1</option>
                                        <option value="">Profe1</option>
                                        <option value="">Profe1</option>
                                    </select>
                                </div>
                            </div>
                        </form>
            </div>
            <div class="modal-footer justify-content-between bg-secondary">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>