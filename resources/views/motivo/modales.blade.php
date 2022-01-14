{{-- %%%%%%%%%%%%%%%%%%%  M O S T R A R %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MOSTRAR MOTIVO
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="cambio" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%   E D I T A R  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL EDITAR MOTIVO
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                    <div id='message-error' class="alert alert-danger danger text-danger" role='alert' style="display: none">
                        <strong id="error"></strong>
                    </div>

                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Editar Motivo</span>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="formulario-editar-motivo">
                            @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="motivo" id="motivo" value="">
                                    <label for="motivo">Motivo</label>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-3"></div>
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
                                    <span class="text-danger" id="error_motivo"></span>
                                </div>
                            </div> 
                            
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control @error('tipomotivo_id') is-invalid @enderror" data-old="{{ old('tipomotivo_id') }}" name="tipomotivo_id" id="tipomotivo_id">
                                        
                                        </select>
                                        <label for="pais">Elija tipomotivo*</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                        <div class="form-floating mb-3 text-gray">
                                            @error('tipomotivo_id') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            


                            <input class="form-control" type="text" hidden name="motivo_id" id="motivo_id">
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="actualizar-clase" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
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