<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('aula'))
            <span class="text-danger"> {{ $errors->first('aula')}}</span>
        @endif
    </div>
</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="aula" id="aula"  class="form-control @error('aula') is-invalid @enderror" value="" autocomplete="off">
            <label for="aula">Aula</label>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('direccion'))
            <span class="text-danger"> {{ $errors->first('direccion')}}</span>
        @endif
    </div>
</div>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="direccion" id="direccion"  class="form-control @error('direccion') is-invalid @enderror" value="" autocomplete="off">
            <label for="direccion">direccion</label>
        </div>
    </div>
</div> 
