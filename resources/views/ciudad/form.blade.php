
{{-- $$$$$$$$$$$ CAMPO CIUDAD --}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('ciudad'))
            <span class="text-danger"> {{ $errors->first('ciudad')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="ciudad" class="form-control @error('ciudad') is-invalid @enderror" value="{{old('ciudad',$ciudad->ciudad ?? '')}}" placeholder="Ingrese un  nombre de ciudad">
            <label for="carrera">Carrera</label>
        </div>
    </div>
</div>



{{--dd($ciudad)--}}

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('pais_id'))
            <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="pais_id" id="country">
                <option value=""> Elija un pais</option>
                    @foreach ($paises as $item)
                        @isset($ciudad)
                            <option value="{{ $item->id }}" {{ $item->id==$ciudad->pais_id ? 'selected':''}} >{{ $item->nombrepais }}</option>    
                        @else    
                            <option value="{{ $item->id }}" {{ old('pais_id') == 1 ? 'selected':'' }} >{{ $item->nombrepais }}</option> 
                        @endif
                    @endforeach
            </select>
            <label for="carrera">Carrera</label>
        </div>
    </div>
</div>



