<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" >
        <div class="form-floating mb-3 text-gray">
            <input class="form-control" wire:model="carrera" type="text" name="carrera">
            <label for="pagocon">Materia</label>
        </div>
    </div>

    
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
        <button wire:click="store" class = "btn btn-primary text-white">
            <i class="far fa-save fa-2x text-white"></i>Guardar 
        </button>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" >
        <div class="form-floating mb-3 text-gray">
            @error('carrera') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>
</div>
