
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
        @if($errors->has('tipomotivo'))
        <span class="text-danger"> {{ $errors->first('tipomotivo')}}</span>
        @endif
    </div>
</div> 
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="tipomotivo" id="tipomotivo"  class="form-control @error('tipomotivo') is-invalid @enderror" value="{{old('tipomotivo',$tipomotivo->tipomotivo ?? '')}}" autocomplete="off">
            <label for="tipomotivo">Ingrese un tipomotivo</label>
        </div>
    </div>
</div> 

