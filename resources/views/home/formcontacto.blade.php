<div class="card card-primary">
    {{-- <div class="card-header btn-main"> --}}
        <div class="item">
			<div class="pricing pricing-three">
				<div class="pricing-top top-three">
					<h3>ESCRIBANOS</h3>
				</div>
			</div>
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
                        <input type="text" class="form-control" id="nombre" name="nombre" value="DAVID" placeholder="Ingrese su nombre">
                    </div>
                </div>
                <div class="col-sm-12">
                    <p id="error-telefono" class="d-none text-danger text-left"></p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="number" class="form-control" id="telefono" name="telefono" value="71039910" placeholder="Ingrese su número de telefono">
                    </div>
                </div>
                <div class="col-sm-12">
                    <p id="error-comentario" class="d-none text-danger text-left"></p>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Comenteneos su su necesidad..." name="comentario" id="comentario" rows="5">esto es un comentario</textarea>
                    </div>
                </div>
                <input type="number" class="form-control" hidden id="como_id" name="como_id" value="6" placeholder="Ingrese su número de telefono">
                {{-- <input type="text" class="form-control"  id="g-recaptcha-response" name="g-recaptcha-response"  value=""> --}}
               
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

                                
                            <div class="col-sm-12">
                                <p id="error-recaptcha" class="d-none text-danger text-left"></p>
                            </div>
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>	
                                </div>
                            </div>
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button type="submit" id="enviar" class="btn btn-main">Enviar <i class="far fa-save"></i></button>        
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