<div class="modal" tabindex="-1" id="modal-mostrar-observaciones-inscripcion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('MOSTRAR INSCRIPCION')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table id="observaciones" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>OBSERVACION</th>
                                    <th>AUTOR</th>
                                    <th>CREADO</th>
                                    <th>ACTUALIZADO</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-observaciones">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>