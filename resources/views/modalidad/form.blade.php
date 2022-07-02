<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('modalidad'))
            <span class="text-danger"> {{ $errors->first('modalidad')}}</span>
        @endif
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input type="text" class="form-control @error('modalidad') is-invalid @enderror" name="modalidad" id="modalidad" value="{{old('modalidad',$modalidad->modalidad ?? '')}}">
            <label for="modalidad">Ingrese Modalidad</label>    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('costo'))
        <span class="text-danger"> {{ $errors->first('costo')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input type="number" class="form-control @error('costo') is-invalid @enderror" name="costo" id="costo" value="{{old('costo',$modalidad->costo ?? '')}}">
            <label for="costo">Ingrese costo</label>    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('cargahoraria'))
        <span class="text-danger"> {{ $errors->first('cargahoraria')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input type="number" class="form-control @error('cargahoraria') is-invalid @enderror" name="cargahoraria" id="cargahoraria" value="{{old('cargahoraria',$modalidad->cargahoraria ?? '')}}">
            <label for="cargahoraria">Ingrese cargahoraria</label>    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('nivel_id'))
        <span class="text-danger"> {{ $errors->first('nivel_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('nivel_id') is-invalid @enderror" data-old="{{ old('nivel_id') }}" name="nivel_id" id="nivel">
                <option value="">Seleccione nivel</option>
                @foreach ($niveles as $nivel)
                    @isset($modalidad)     
                        <option  value="{{$nivel->id}}" {{$nivel->id==$modalidad->nivel_id ? 'selected':''}}>{{$nivel->nivel}}</option>     
                        @else
                        <option value="{{ $nivel->id }}" {{ old('nivel_id') == $nivel->id ? 'selected':'' }} >{{ $nivel->nivel }}</option>
                    @endisset 
                @endforeach
            </select>    
            <label for="nivel_id">Elija Nivel</label>    
        </div>
    </div>
</div>