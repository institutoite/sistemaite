<div class="modal" tabindex="-1" id="modal-mostrar-contactos">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('CONTACTOS')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NOMBRE APODERADO</th>
                                    <th>PARENTEZCO</th>
                                    <th>TELEFONO</th>
                                    <th>REGISTRADO</th>
                                    <th>ACTUALIZADO</th>
                                    <th>FELICITAR</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-contactos">
                                
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