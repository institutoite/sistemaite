<!-- Modal -->
<div class="modal fade" id="modalGcontact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Formulario ite Contactos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><p id="tokenExpiration"></p></strong> si tienes tiempo suficiente para registrar no es necesario iniciar ite contactos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  
                <div class="container-fluid h-100 mt-3"> 
                    <div class="row w-100 align-items-center">
                        <div class="col text-center">
                            <a href="{{ route('signIn') }}" id="signIn" class="btn btn-primary text-white">
                                Iniciar ITE CONTACTOS
                            </a>
                        </div>	
                    </div>
                </div>
                
                
               
            </div>
        </div>
    </div>
</div>
