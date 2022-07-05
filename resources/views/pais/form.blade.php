<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('nombrepais'))
        <span class="text-danger"> {{ $errors->first('nombrepais')}}</span>
        @endif
    </div>
</div>
<div class="form-floating mb-3">
    <input  type="text" name="nombrepais" class="form-control @error('nombrepais') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de Pais">
    <label for="floatingInput">Pais</label>
</div>