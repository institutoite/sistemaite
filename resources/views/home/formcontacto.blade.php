<div class="card card-primary">
    <div class="card-header btn-main">
        <h3 class="text-white text-center">Déjenos su número</h3>
    </div>
              <!-- /.card-header -->
    <div class="card-body">
        <form id="formulario">
            @csrf
            <ul id="error">
                
            </ul>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control border-info" id="nombre" value="DAVID FLORES" placeholder="Ingrese su nombre">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="number" class="form-control border-info" id="telefono" value="71039910" placeholder="Ingrese su número de telefono">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" name="comentario" id="comentario" rows="5">Este curso no tiene requisitos previos. ¿A quién va dirigido el curso? Desarrolladores Laravel que deseen aprender a mejorar la seguridad de sus</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                        
                        <div class="card-body">
                            
                            <span class="">Marque los productos o servicios que le gustaría tomar</span>
                            <div id="interests" class="">

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