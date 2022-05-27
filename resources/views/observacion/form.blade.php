<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="observacion" class="form-control @error('observacion') is-invalid @enderror" value="{{old('observacion',$observacion->observacion ?? '')}}">
            <label for="observacion">observacion</label>
        </div>    
    </div>
</div>

<input type="text" name="observable_id" id="observable_id" value="{{ $observable_id }}">
<input type="text" name="observable_type" type="observable_type" value="{{ $observable_type }}">