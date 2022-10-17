<div class="modal" tabindex="-1"  id="{{$idmodalformulario}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                {{$titulo}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">{{$modo}}</span>
                    </div>

                    <div class="card-body">
                        <div id="diverror" class="diverror alert alert-danger alert-dismissible d-none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <p class="error"id="error"></p>
                        </div>
                        
                        <textarea cols="80" id="{{$id}}" name="{{$nombre}}" rows="10" data-sample-short>
                        </textarea>
                        <input type="text" hidden class="observable_id" name="observable_id" id="observable_id" value="">
                        <input type="text" hidden class="observable_type" name="observable_type" id="observable_type" value="{{$observabletype}}">

                        <div class="container-fluid h-100 mt-3"> 
                            <div class="row w-100 align-items-center">
                                <div class="col text-center">
                                    <button id="{{$btnguardar}}" class="btn btn-primary text-white btn-lg">{{$btnlabel}}<i class="far fa-save"></i></button>        
                                </div>	
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>