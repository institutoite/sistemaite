<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
        @if($errors->has('tipofile'))
        <span class="text-danger"> {{ $errors->first('tipofile')}}</span>
        @endif
    </div>
</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="tipofile" id="tipofile"  class="form-control @error('tipofile') is-invalid @enderror" value="{{old('tipofile',$tipofile->tipofile ?? '')}}" autocomplete="off">
            <label for="tipofile">Ingrese un tipofile</label>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
        @if($errors->has('programa'))
        <span class="text-danger"> {{ $errors->first('programa')}}</span>
        @endif
    </div>
</div>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="programa" id="programa"  class="form-control @error('programa') is-invalid @enderror" value="{{old('programa',$tipofile->programa ?? '')}}" autocomplete="off">
            <label for="programa">Ingrese un programa que lo abre</label>
        </div>
    </div>
</div> 