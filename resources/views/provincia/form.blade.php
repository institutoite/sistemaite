<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('provincia'))
        <span class="text-danger"> {{ $errors->first('provincia')}}</span>
        @endif
    </div>
</div>
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="provincia" class="form-control @error('provincia') is-invalid @enderror" value="{{old('provincia',$provincia->provincia ?? '')}}">
            <label for="provincia">Provincia</label>
        </div>    
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        @if($errors->has('pais_id'))
        <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        @if($errors->has('departamento_id'))
        <span class="text-danger"> {{ $errors->first('departamento_id')}}</span>
        @endif
    </div>
</div>

<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('pais_id') is-invalid @enderror" data-old="{{ old('pais_id') }}" name="pais_id" id="pais_id">
                <option value="">Elija un pais</option>
                @foreach ($paises as $pais)
                    @isset($provincia)     
                        <option  value="{{$pais->id}}" {{$pais->id==App\Models\Departamento::findOrFail($provincia->departamento_id)->pais->id ? 'selected':''}}>{{$pais->nombrepais}}</option>     
                    @else
                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->nombrepais }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="pais">Elija pais*</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('departamento_id') is-invalid @enderror" name="departamento_id" id="departamento_id">
                <option value=""> Elija un departamento</option>
                    @foreach ($departamentos as $item)
                        @isset($provincia) 
                            <option value="{{ $item->id }}" {{ $item->id==$provincia->departamento_id ? 'selected':''}} >{{ $item->departamento }}</option>
                        @endisset
                    @endforeach 
            </select>
            <label for="pais">Elija Departamento*</label>
        </div>
    </div>
</div>