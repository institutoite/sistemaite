<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header">
                MOSTRANDO UNA CLASE
                <button class="btn btn-danger close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="estudiante" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ATRIBUTO</th>
                            <th>VALOR</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-modal">
                        {{-- se carga datos con ajax --}}
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">Aceptar</button>
            </div>
        </div>
    </div>
</div>