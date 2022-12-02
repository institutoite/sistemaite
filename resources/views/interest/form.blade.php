 <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            @if($errors->has('interest'))
                <span class="text-danger"> {{ $errors->first('interest')}}</span>
            @endif
    </div>
</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="interest" id="interest"  class="form-control @error('interest') is-invalid @enderror" value="" autocomplete="off">
            <label for="interest">Ingrese un interes</label>
        </div>
    </div>
</div> 
 <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            @if($errors->has('interest'))
                <span class="text-danger"> {{ $errors->first('interest')}}</span>
            @endif
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
    <div class="form-floating mb-3 text-gray">
        <textarea rows="12" placeholder="Ingrese una descripción de este convenio"  name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >{{old('descripcion',$plan->descripcion ?? '')}}</textarea>
    </div>
</div>