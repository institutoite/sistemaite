<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('fecha'))
            <span class="text-danger"> {{ $errors->first('fecha')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="date" name="fecha" id="fecha"  class="form-control @error('fecha') is-invalid @enderror" value="{{old('fecha',$feriado->fecha ?? '')}}" autocomplete="off">
            <label for="fecha">Fecha</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('festividad'))
            <span class="text-danger"> {{ $errors->first('festividad')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="festividad" id="festividad"  class="form-control @error('festividad') is-invalid @enderror" value="{{old('festividad',$feriado->festividad ?? '')}}" autocomplete="off">
            <label for="festividad">Festividad</label>
        </div>
    </div>
</div>
