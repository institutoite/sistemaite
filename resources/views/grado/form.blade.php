<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('grado'))
            <span class="text-danger"> {{ $errors->first('grado')}}</span>
        @endif
    </div>
</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="grado" id="grado"  class="form-control @error('grado') is-invalid @enderror" value="{{old('grado')}}" autocomplete="off">
            <label for="grado">Ingrese un grado</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('nivel_id') is-invalid @enderror" data-old="{{ old('nivel_id') }}" name="nivel_id" id="nivel_id">
                <option value="">elija Un Nivel</option>
                @foreach ($niveles as $nivel)
                    <option value="{{ $nivel->id }}" {{ $nivel->id==old('nivel_id') ? "selected":"" }} >{{ $nivel->nivel }}</option>
                @endforeach
            </select>
            <label for="nivel_id">Elija un nivel</label>
        </div>
    </div>
</div> 
