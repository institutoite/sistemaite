{{-- %%%%%%%%%%%%%%%%%%%%%%%%% COMPONENTE CONTACTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="{{$idmodal}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{__($titulo)}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        {{$header}}
                        <div class="float-right">
                            <a id="personal" href="" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                {{ __('Telefono Personal') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="contactos" class="table table-bordered table-hover table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOP</th>
                                    <th>PARENTESCO</th>
                                    <th>ACTUALIZADO</th>
                                    <th>OPCIONES </th>
                                </tr>
                            </thead>
                            <tbody>
                                
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

