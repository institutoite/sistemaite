<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('constante'))
            <span class="text-danger"> {{ $errors->first('constante')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="constante" id="constante"  class="form-control @error('constante') is-invalid @enderror" value="{{old('constante',$constante->constante ?? '')}}" autocomplete="off">
            <label for="constante">Ingrese constante</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('valor'))
            <span class="text-danger"> {{ $errors->first('valor')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="valor" id="valor"  class="form-control @error('valor') is-invalid @enderror" value="{{old('valor',$constante->valor ?? '')}}" autocomplete="off">
            <label for="valor">Ingrese valor</label>
        </div>
    </div>
</div>