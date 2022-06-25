<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('departamento'))
            <span class="text-danger"> {{ $errors->first('departamento')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="departamento" id="departamento"  class="form-control @error('departamento') is-invalid @enderror" value="{{old('departamento',$departamento->departamento ?? '')}}" autocomplete="off">
            <label for="departamento">Ingres un numevo departamento</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('pais_id'))
            <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('pais_id') is-invalid @enderror" data-old="{{ old('pais_id') }}" name="pais_id" id="pais">
                <option value="">Seleccione pais</option>
                @foreach ($paises as $pais)
                    @isset($departamento)     
                        <option  value="{{$pais->id}}" {{$pais->id==$departamento->pais_id ? 'selected':''}}>{{$pais->nombrepais}}</option>     
                    @else
                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->nombrepais }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="departamento">Ingres un numevo departamento</label>
        </div>
    </div>
</div>