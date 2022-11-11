    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO NOMBRE %%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$colegio->nombre ?? '')}}">
                <label for="nombre">nombre de colegio</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('director'))
                <span class="text-danger"> {{ $errors->first('director')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="director" class="form-control @error('director') is-invalid @enderror" value="{{old('director',$colegio->director ?? '')}}">
                <label for="director">director de colegio</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('direccion'))
                <span class="text-danger"> {{ $errors->first('direccion')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion',$colegio->direccion ?? '')}}">
                <label for="direccion">dirección de colegio</label>
            </div>
        </div>
    </div>
    
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                @if($errors->has('rue'))
                    <span class="text-danger"> {{ $errors->first('rue')}}</span>
                @endif
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                @if($errors->has('telefono'))
                    <span class="text-danger"> {{ $errors->first('telefono')}}</span>
                @endif
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="rue" class="form-control @error('rue') is-invalid @enderror" value="{{old('rue',$colegio->rue ?? '')}}">
                <label for="rue">rue</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$colegio->telefono ?? '')}}">
                <label for="telefono">telefono</label>
            </div>    
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('dependencia'))
                <span class="text-danger"> {{ $errors->first('dependencia')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('turno'))
                <span class="text-danger"> {{ $errors->first('turno')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('areageografica'))
                <span class="text-danger"> {{ $errors->first('areageografica')}}</span>
            @endif
        </div>
    </div>
{{-- {{dd($colegio)}} --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('dependencia') is-invalid @enderror"  name="dependencia" id="dependencia">
                    <option value=""> Elija dependencia</option>
                    @isset($colegio)
                        <option value="PARTICULAR" @if($colegio->dependencia == 'PARTICULAR') {{'selected'}} @endif>PARTICULAR</option>
                        <option value="FISCAL" @if($colegio->dependencia == 'FISCAL') {{'selected'}} @endif>FISCAL</option>
                        <option value="CONVENIO" @if($colegio->dependencia == 'CONVENIO') {{'selected'}} @endif>CONVENIO</option>
                    @else 
                        <option value="PARTICULAR" @if(old('dependencia') == 'PARTICULAR') {{'selected'}} @endif>PARTICULAR</option>
                        <option value="FISCAL" @if(old('dependencia') == 'FISCAL') {{'selected'}} @endif>FISCAL</option>
                        <option value="CONVENIO" @if(old('dependencia') == 'CONVENIO') {{'selected'}} @endif>CONVENIO</option>
                    @endisset
                    </select>
                <label for="rue">Dependencia</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('turno') is-invalid @enderror"  name="turno" id="turno">
                    <option value=""> Elija turno</option>
                    @isset($colegio)
                        <option value="MAÑANA" @if($colegio->turno == 'MAÑANA') {{'selected'}} @endif>Mañana</option>
                        <option value="TARDE" @if($colegio->turno == 'TARDE') {{'selected'}} @endif>TARDE</option>
                        <option value="NOCHE" @if($colegio->turno == 'NOCHE') {{'selected'}} @endif>NOCHE</option>
                        <option value="MIXTO" @if($colegio->turno == 'MIXTO') {{'selected'}} @endif>MIXTO</option>
                        <option value="--" @if($colegio->turno == '--') {{'selected'}} @endif>--</option>
                    @else 
                        <option value="MAÑANA" @if(old('turno') == 'MAÑANA') {{'selected'}} @endif>Mañana</option>
                        <option value="TARDE" @if(old('turno') == 'TARDE') {{'selected'}} @endif>TARDE</option>
                        <option value="NOCHE" @if(old('turno') == 'NOCHE') {{'selected'}} @endif>NOCHE</option>
                        <option value="MIXTO" @if(old('turno') == 'MIXTO') {{'selected'}} @endif>MIXTO</option>
                        <option value="--" @if(old('turno') == '--') {{'selected'}} @endif>--</option>
                    @endisset
                    
                </select>
                <label for="telefono">turno</label>
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('areageografica') is-invalid @enderror"  name="areageografica" id="areageografica">
                <option value=""> Elija Área Geográfica</option>
                @isset($colegio)
                    <option value="RURAL" @if($colegio->areageografica == 'RURAL') {{'selected'}} @endif>RURAL</option>
                    <option value="URBANA" @if($colegio->areageografica == 'URBANA') {{'selected'}} @endif>URBANA</option>
                @else 
                    <option value="RURAL" @if(old('areageografica') == 'RURAL') {{'selected'}} @endif>RURAL</option>
                    <option value="URBANA" @if(old('areageografica') == 'URBANA') {{'selected'}} @endif>URBANA</option>
                @endisset
                
            </select>
            <label for="areageografica">Área Geográfica</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('departamento'))
                <span class="text-danger"> {{ $errors->first('departamento')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('provincia'))
                <span class="text-danger"> {{ $errors->first('provincia')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('municipio'))
                <span class="text-danger"> {{ $errors->first('municipio')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('departamento') is-invalid @enderror" data-old="{{ old('departamento') }}" name="departamento" id="departamento">
                {{-- <option value="" selected>seleccione un departamento</option> --}}
                @foreach ($departamentos as $item)
                    @isset($colegio)     
                        <option  value="{{$item->id}}" {{$departamento->item==$departamento->id ? 'selected':''}}>{{$item->departamento}}</option>     
                    @else
                        <option value="{{ $item->id}}" {{ old('departamento') == $item->departamento ? 'selected':'' }} >{{ $item->departamento }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="departamento">departamento</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('provincia') is-invalid @enderror" name="provincia" id="provincia">
                <option value=""> Elija una provincia</option>
                    @foreach ($provincias as $item)
                        @isset($colegio) 
                            <option value="{{ $item->id }}" {{ $item->id==$provincia->id ? 'selected':''}} >{{ $item->provincia }}</option>
                        @endisset
                    @endforeach 
            </select>
            <label for="provincia">Provincia</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('municipio') is-invalid @enderror" name="municipio" id="municipio">
                    <option value="" > Seleccione una municipio</option>
                    @foreach ($municipios as $item)
                        @isset($colegio)     
                            <option  value="{{$item->id}}" {{$municipio->id==$item->id ? 'selected':''}}>{{$item->municipio}}</option>     
                        @else
                            <option value="{{ $item->id }}" {{ old('municipio') == $item->id ? 'selected':'' }} >{{ $item->municipio }}</option>
                        @endisset  
                    @endforeach
                </select>
            <label for="municipio">Municipio</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('imagen'))
                <span class="text-danger"> {{ $errors->first('imagen')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input type="file" class="form-control mb-2" name="imagen" id="imagen" >
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('nivel'))
                <span class="text-danger"> {{ $errors->first('niveles')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="nivel" class="form-control @error('nivel') is-invalid @enderror" value="{{old('nivel',$colegio->nivel ?? '')}}">
                <label for="nivel">Niveles Ejemplo inicial/primiaria/secundaria</label>
            </div>
        </div>
    </div>

    


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('coordenadax'))
                <span class="text-danger"> {{ $errors->first('coordenadax')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('coordenaday'))
                <span class="text-danger"> {{ $errors->first('coordenaday')}}</span>
            @endif
        </div>
    </div>
  

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="number" step="0.000000000001" name="coordenadax" class="form-control @error('coordenadax') is-invalid @enderror" value="{{old('coordenadax',$colegio->coordenadax ?? '')}}">
                <label for="coordenadax">coordenada X</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" step="0.000000000001" name="coordenaday" class="form-control @error('coordenaday') is-invalid @enderror" value="{{old('coordenaday',$colegio->coordenaday ?? '')}}">
                <label for="coordenaday">coordenada Y</label>
            </div>    
        </div>
    </div>