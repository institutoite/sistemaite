<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="banner" id="banner"  class="form-control @error('banner') is-invalid @enderror" value="" autocomplete="off">
            <label>Ingrese texto del banner del home</label>
        </div>
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="heading" id="heading"  class="form-control @error('heading') is-invalid @enderror" value="" autocomplete="off">
            <label>Ingrese titulo de las materias</label>
        </div>
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="subheading" id="subheading"  class="form-control @error('subheading') is-invalid @enderror" value="" autocomplete="off">
            <label>Ingrese subtitulo de las materias</label>
        </div>
    </div>
</div> 