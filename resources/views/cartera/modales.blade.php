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
            <div class="modal-header bg-primary">
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
                                <tr>
                                    <td>sdfds</td>
                                    <td>fdsf</td>
                                    <td>fdsfd</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
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
                                <tr>
                                    <td>ID</td>
                                    <td>MONTO</td>
                                    <td>PAGOCON</td>
                                    <td>CAMBIO</td>
                                    <td>FECHA</td>
                                    <td>DETALLAR</td>
                                </tr>
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

<div class="modal" tabindex="-1" id="modal-mostrar-programacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
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

<div class="modal" tabindex="-1"  id="modal-agregar-observacion-persona">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL AGREGAR OBSERVACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <div id="erroresdiv" class="alert alert-danger d-none">
                            <ul id="errores">
                                
                            </ul>
                        </div>
                        <form id="formulario-guardar-observacion" method="POST">
                            @csrf
                            <textarea cols="80" id="editor2" name="editor2" rows="10" data-sample-short>
                            </textarea>
                            <input type="text" name="observable_id" hidden id="observable_id" value="">
                            <input type="text" name="observable_type" hidden id="observable_type" value="">

                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion-persona" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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
<div class="modal" tabindex="-1"  id="modal-agregar-observacion-inscripcion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL AGEREGA OBERACION DE INCRIPCION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <div id="erroresdiv" class="alert alert-danger d-none">
                            <ul id=errores>
                                
                            </ul>
                        </div>
                        <form id="formulario-guardar-observacion-inscripcion" method="POST">
                            @csrf
                            <textarea cols="80" id="editor3" name="editor3" rows="10" data-sample-short>
                            </textarea>
                            <input type="text" id="observable_id_inscripcion" hidden value="">
                            <input type="text" id="observable_type_inscripcion" hidden value="">

                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion-inscripcion" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL ULTIMA INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}
<div class="modal" tabindex="-1" id="modal-mostrar-ultimainscripcion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('ULTIMA INSCRIPCION')}}
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
                            <tbody id="tabla-ultimainscripcion">
                                
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

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL ULTIMA PROGRAMACION DE INSCRIPCION  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-ultima-programacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('PROGRAMACION DE ULTIMA INSCRIPCION EN DETALLE')}}
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
                                    <th>HRAS</th>
                                    <th>DOCENTE</th>
                                    <th>ESTADO</th>
                                    <th>MATERIA</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-ultima-programacion">
                                
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
