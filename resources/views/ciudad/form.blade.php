
{{-- $$$$$$$$$$$ CAMPO CIUDAD --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CIUDAD</label> 
        <input  type="text" name="ciudad" class="form-control col-9 @error('ciudad') is-invalid @enderror" value="{{old('ciudad',$ciudad->ciudad ?? '')}}" placeholder="Ingrese un  nombre de ciudad">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('ciudad'))
            <p class="text-danger"> {{ $errors->first('ciudad')}}</p>
        @endif
    </div>
</div>

{{--dd($ciudad)--}}

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row">
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">PAIS</label>
        <select class="form-control col-9" name="pais_id" id="country">
            <option value=""> Elija un pais</option>
                @foreach ($paises as $item)
                    @isset($ciudad)
                        <option value="{{ $item->id }}" {{ $item->id==$ciudad->pais_id ? 'selected':''}} >{{ $item->nombrepais }}</option>    
                    @else    
                        <option value="{{ $item->id }}" {{ old('pais_id') == 1 ? 'selected':'' }} >{{ $item->nombrepais }}</option> 
                    @endif
                @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('pais_id'))
            <p class="text-danger"> {{ $errors->first('pais_id')}}</p>
        @endif
    </div>
</div>



