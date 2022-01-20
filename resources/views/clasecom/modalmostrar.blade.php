<div class="modal" tabindex="-1" id="modal-mostrarcom">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MOSTRANDO UNA CLASE
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="estudiante" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ATRIBUTO</th>
                            <th>VALOR</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-modalcom">
                        {{-- se carga datos con ajax --}}
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal" aria-label="Close">Aceptar</button>
            </div>  
        </div>
    </div>
</div>