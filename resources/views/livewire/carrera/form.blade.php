<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <label for="pagocon">Materia</label>
            <input class="form-control" wire:model="carrera" type="text" name="carrera">
            @error('carrera') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>
</div>
