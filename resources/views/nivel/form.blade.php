<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('nivel'))
        <span class="text-danger"> {{ $errors->first('nivel')}}</span>
        @endif
    </div>
</div>
<div class="form-floating mb-3">
    <input  type="text" name="nivel" class="form-control @error('nivel') is-invalid @enderror" value="{{old('nivel',$nivel->nivel ?? '')}}">
    <label for="floatingInput">Inserte nuevo nivel</label>
</div>