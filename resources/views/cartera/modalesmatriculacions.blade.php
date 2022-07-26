{{-- $%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MOSTRAR PERSONA MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-mostrar-persona">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRAR PERSONA')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Atributo</th>
                                    <th colspan="2">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-mostrar-persona">
                                
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
{{-- $%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MOSTRAR INSCRIPCIONES MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="modal" tabindex="-1" id="modal-mostrar-inscripcion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRAR INSCRIPCION')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Atributo</th>
                                    <th colspan="2">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-mostrar-inscripcion">
                                
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
{{-- $%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MOSTRAR INSCRIPCIONES MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="modal" tabindex="-1" id="modal-mostrar-pagos">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRAR PAGOS')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ATRIBUTO</th>
                                    <th>VALOR</th>
                                    <th>FOTOGRAFIA</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-mostrar-pagos">
                                
                            </tbody>
                        </table>
                        <div class="card">
                            <div class="card-body">
                                 <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>MONTO</th>
                                            <th>PAGOCON</th>
                                            <th>CAMBIO</th>
                                            <th>FECHA</th>
                                            <th>DETALLAR</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pagos">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL DETALLAR  --}}
<div class="modal" tabindex="-1" id="modal-detallar-pago">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header">
                MOSTRANDO UN PAGO
                {{-- <button class="btn btn-danger close" data-dismiss="modal">&times;</button> --}}
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ATRIBUTO</th>
                            <th>VALOR</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-detalle-pago">
                        {{-- se carga datos con ajax --}}
                    </tbody>
                </table>

                <table id="billetes" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>CORTE</th>
                            <th>CANTIDAD</th>
                            <th>TIPO</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-billete-pago">
                        {{-- se carga datos con ajax --}}
                    </tbody>
                </table>

                <table id="cambio" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>CORTE</th>
                            <th>CANTIDAD</th>
                            <th>TIPO</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-billete-cambio">
                        
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
        
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL OBSERVACIONES  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-observaciones">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL PROGRAMACION  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-programacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('MOSTRAR CLASES PROGRAMADAS')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FECHA</th>
                                    <th>HORARIO</th>
                                    <th>DOCENTE</th>
                                    <th>ESTADO</th>
                                    <th>MATERIA</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-programacion">
                                
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL ULTIMA PROGRAMACIONCOM  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-ultima-programacioncom">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('PROGRAMACION DE ULTIMA MATRICULACION EN DETALLE')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>FECHA</th>
                                    <th>HORARIO</th>
                                    <th>HORAS/CLASE</th>
                                    <th>DOCENTE</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-ultima-programacioncom">
                                
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL ULTIMA MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}
<div class="modal" tabindex="-1" id="modal-mostrar-ultimamatriculacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('ULTIMA MATRICULACION')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ATRIBUTO</th>
                                    <th>VALOR</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-ultimamatriculacion">
                                
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL MOSTRAR CONTACTOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}
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
                                    <th>OPTIONS</th>
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

