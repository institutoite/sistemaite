<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('grado'))
            <span class="text-danger"> {{ $errors->first('grado')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="grado" id="grado"  class="form-control @error('grado') is-invalid @enderror" value="{{old('grado',$grado->grado ?? '')}}" autocomplete="off">
            <label for="grado">grado</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('nivel_id'))
            <span class="text-danger"> {{ $errors->first('nivel_id')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('nivel_id') is-invalid @enderror" data-old="{{ old('nivel_id') }}" name="nivel_id" id="nivel_id">
                <option value=""> Elija un nivel </option>
                @foreach ($niveles as $nivel)
                    @isset($nivel)     
                        <option  value="{{$nivel->id}}" {{$nivel->id==$nivel->nivel_id ? 'selected':''}}>{{$nivel->nivel}}</option>     
                    @else
                        <option value="{{ $nivel->id }}" {{ old('nivel') == $nivel->id ? 'selected':'' }} >{{ $nivel->nivel }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="nivel_id">Nivel*</label>
        </div>
    </div>
</div>