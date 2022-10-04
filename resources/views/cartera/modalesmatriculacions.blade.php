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
                {{__('MOSTRAR INSCRIPCIONx')}}
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

<div class="modal" tabindex="-1" id="modal-mostrar-pagoscom">
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
                                    <th>ATRIBUTOx</th>
                                    <th>VALOR</th>
                                    <th>FOTOGRAFIA</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-mostrar-pagoscom">
                                
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
                                    <tbody id="pagoscom">
                                        
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
{{-- $%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MOSTRAR MATRICULACION MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="modal" tabindex="-1" id="modal-mostrar-matriculacion">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('MOSTRAR MATRICULACION')}}
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
                            <tbody id="tabla-mostrar-matriculacion">
                                
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

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL OBSERVACIONES  --}}
{{-- <div class="modal" tabindex="-1" id="modal-mostrar-observaciones">
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
</div> --}}
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL FECHAR  --}}
<div class="modal" tabindex="-1" id="modal-fechar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('AGENDAR O FECHAR UN POSIBLE REGRESO')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div id='erroresdiv' class="alert alert-danger danger text-danger d-none" role='alert'>
                            <div class="alert alert-danger">
                                <h4 class="alert-heading">Error</h4>
                                <ul id="error">
                                    
                                </ul>
                            </div>
                        </div>
                            <input class="form-control" type="date" id="vuelvefecha" name="vuelvefecha">
                            <input class="form-control" type="text" hidden id="persona_id" name="persona_id">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="agendar" class="btn btn-primary text-white btn-lg">Agendar<i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL CALIFICAR  --}}
<div class="modal" tabindex="-1" id="modal-calificar">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                {{__('CALIFICAR UNA PERSONA')}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div id='erroresdiv' class="alert alert-danger danger text-danger d-none" role='alert'>
                            <div class="alert alert-danger">
                                <h4 class="alert-heading">Error</h4>
                                <ul id="error">
                                    
                                </ul>
                            </div>
                        </div>
                            <select id="volvera" class="form-control">
                                <option value="1">No piensa volver(20%)</option>
                                <option value="2">Poco probable que vuelva(40%)</option>
                                <option value="3">Es posible que vuelva(60%)</option>
                                <option value="4">Casi seguro que vuelva(80%)</option>
                                <option value="5">Va volver con seguridad(100%)</option>
                            </select>
                            <input class="form-control" type="text" hidden id="persona_id" name="persona_id">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="calificar" class="btn btn-primary text-white btn-lg">Calificar<i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                    </div>
                </div>
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  MODAL PROGRAMACION  --}}
<div class="modal" tabindex="-1" id="modal-mostrar-programacioncom">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__('MOSTRAR CLASES PROGRAMADAS DE COMPUTACION')}}
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
                                </tr>
                            </thead>
                            <tbody id="tabla-programacioncom">
                                
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
<div class="modal" tabindex="-1"  id="modal-agregar-observacion-matriculacion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL AGEREGA OBERACION DE MATRICULACION 4
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
                        <form id="formulario-guardar-observacion-matriculacion" method="POST">
                            @csrf
                            <textarea cols="80" id="editor4" name="editor4" rows="10" data-sample-short>
                            </textarea>
                            <input type="text" id="observable_id_matriculacion" value="">
                            <input type="text" id="observable_type_matriculacion" value="">

                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion-matriculacion" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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

