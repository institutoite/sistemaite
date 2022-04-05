{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <textarea placeholder="Ingrese una descripcion del archivo que va subir maximimo 500 caracteres"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$descripcion ?? '')}}</textarea>
            </div>
        </div>


        <div>
            <label for="descripcion" class="form-label">Seleccine un archivo </label>
            <input class="form-control form-control-lg" id="descripcion"  name="file" type="file">
        </div>



<div class="modal" tabindex="-1" id="modal-ite">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header">
                Seleccione la persona referenciadorax
                <button class="btn btn-danger close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="personas" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>OLD</th>
                            <th>NOMBRE</th>
                            <th>APATERNO</th>
                            <th>AMATERNO</th>
                            <th>FOTO</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

            </div>
            <div class="modal-footer">
                pie del modal 
            </div>
        </div>
    </div>
</div>





