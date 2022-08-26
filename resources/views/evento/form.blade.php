<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
        @if($errors->has('evento'))
        <span class="text-danger"> {{ $errors->first('evento')}}</span>
        @endif
    </div>
</div> 
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="evento" id="evento"  class="form-control @error('evento') is-invalid @enderror" value="{{old('evento',$evento->evento ?? '')}}" autocomplete="off">
            <label for="evento">Ingrese un evento</label>
        </div>
    </div>
</div> 