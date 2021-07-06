
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MO D A L   M O S T R A R  P A G O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                MOSTRANDO UN PAGO
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

                <table id="billetes" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>CORTE</th>
                            <th>CANTIDAD</th>
                            <th>TIPO</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-pago">
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
                    <tbody id="tabla-cambio">
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

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MO D A L   E D I T A R  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                EDITAR PAGO
                <button class="btn btn-danger close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <form method="POST" action="{{ route('pagos.actualizar',['pago'=>$pago])}}" id="form-editar">
                        {{ @method_field('PUT') }}
                        @csrf
                            @include('pago.formeditar')
                            <div class="container-fluid h-100"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" id="editar" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer text-gray">
                <p>Raiz de todos los males es el amor al dinero:</p>
            </div>
        </div>
    </div>
</div>
