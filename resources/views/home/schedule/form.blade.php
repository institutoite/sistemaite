<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="title" id="title"  class="form-control @error('title') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese titulo del horario</label>
        </div>
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="description" id="description"  class="form-control @error('description') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese descripcion del horario</label>
        </div>
    </div>
</div> 