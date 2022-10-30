<div class="card card-primary card-items bg-primary">
    {{-- <div class="card-header btn-main"> --}}
        <div class="card-header text-center">
					<h3 class="text-white">ESCRIBANOS</h3>
		</div>
    {{-- </div> --}}
              <!-- /.card-header -->
    <div class="card-body table-secondary">
        <form id="formulario">
            @csrf
            <ul id="error">
                
            </ul>
            <div class="row">
                <div class="col-sm-12">
                    <p id="error-nombre" class="d-none text-danger text-left"></p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control card-items" name="nombre" id="nombre" value="" placeholder="Ingrese su nombre">
                    </div>
                </div>
                <div class="col-sm-12">
                    <p id="error-telefono" class="d-none text-danger text-left"></p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="number" class="form-control card-items" name="telefono" id="telefono" value="" placeholder="Ingrese su número de telefono">
                    </div>
                </div>
                <div class="col-sm-12">
                    <p id="error-comentario" class="d-none text-danger text-left"></p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control card-items" placeholder="Coméntenos su su necesidad..." name="comentario" id="comentario" rows="5"></textarea>
                    </div>
                </div>
                <input type="number" class="form-control" hidden name="como_id" id="como_id" value="6" placeholder="Ingrese su número de telefono">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="card-interests" class="card card-primary card-outline">
                        
                        <div class="card-body">
                            
                            <p class="alert text-left text-black">Marque los productos o servicios que le gustaría tomar</p>
                            <div class="col-sm-12">
                                <p id="error-interests" class="d-none text-danger text-left"></p>
                            </div>
                            <div id="interests" class="">

                            </div>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" id="enviar" class="btn form-inline btn-outline-primary boton-line-turqueza">Enviar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> <!-- /.fin -->