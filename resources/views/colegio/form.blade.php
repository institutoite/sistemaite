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
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                @if($errors->has('rue'))
                    <span class="text-danger"> {{ $errors->first('rue')}}</span>
                @endif
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                @if($errors->has('telefono'))
                    <span class="text-danger"> {{ $errors->first('telefono')}}</span>
                @endif
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                @if($errors->has('celular'))
                    <span class="text-danger"> {{ $errors->first('celular')}}</span>
                @endif
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="rue" class="form-control @error('rue') is-invalid @enderror" value="{{old('rue',$colegio->rue ?? '')}}">
                <label for="rue">rue</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$colegio->telefono ?? '')}}">
                <label for="telefono">telefono</label>
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <input  type="number" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{old('celular',$colegio->celular ?? '')}}">
            <label for="celular">celular</label>
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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('dependencia') is-invalid @enderror"  name="dependencia" id="dependencia">
                    <option value=""> Elija dependencia</option>
                    @isset($colegio)
                        <option value="particular" @if($colegio->dependencia == 'particular') {{'selected'}} @endif>Particular</option>
                        <option value="fiscal" @if($colegio->dependencia == 'fiscal') {{'selected'}} @endif>Fiscal</option>
                        <option value="convenio" @if($colegio->dependencia == 'convenio') {{'selected'}} @endif>Convenio</option>
                    @else 
                        <option value="particular" @if(old('dependencia') == 'particular') {{'selected'}} @endif>Particular</option>
                        <option value="fiscal" @if(old('dependencia') == 'fiscal') {{'selected'}} @endif>Fiscal</option>
                        <option value="convenio" @if(old('dependencia') == 'convenio') {{'selected'}} @endif>Convenio</option>
                    @endisset
                    </select>
                <label for="rue">rue</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('turno') is-invalid @enderror"  name="turno" id="turno">
                    <option value=""> Elija turno</option>
                    @isset($colegio)
                        <option value="manana" @if($colegio->turno == 'manana') {{'selected'}} @endif>Mañana</option>
                        <option value="tarde" @if($colegio->turno == 'tarde') {{'selected'}} @endif>Tarde</option>
                        <option value="noche" @if($colegio->turno == 'noche') {{'selected'}} @endif>Noche</option>
                        <option value="mixto" @if($colegio->turno == 'mixto') {{'selected'}} @endif>Mixto</option>
                    @else 
                        <option value="manana" @if(old('turno') == 'manana') {{'selected'}} @endif>Mañana</option>
                        <option value="tarde" @if(old('turno') == 'tarde') {{'selected'}} @endif>Fiscal</option>
                        <option value="noche" @if(old('turno') == 'noche') {{'selected'}} @endif>Noche</option>
                        <option value="mixto" @if(old('turno') == 'mixto') {{'selected'}} @endif>Mixto</option>
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
                    <option value="rural" @if($colegio->areageografica == 'rural') {{'selected'}} @endif>Rural</option>
                    <option value="urbana" @if($colegio->areageografica == 'urbana') {{'selected'}} @endif>Urbana</option>
                @else 
                    <option value="rural" @if(old('areageografica') == 'rural') {{'selected'}} @endif>Rural</option>
                    <option value="urbana" @if(old('areageografica') == 'urbana') {{'selected'}} @endif>Urbana</option>
                @endisset
                
            </select>
            <label for="areageografica">Área Geográfica</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('departamento_id'))
                <span class="text-danger"> {{ $errors->first('departamento_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('provincia_id'))
                <span class="text-danger"> {{ $errors->first('provincia_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            @if($errors->has('municipio_id'))
                <span class="text-danger"> {{ $errors->first('municipio_id')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('departamento_id') is-invalid @enderror" data-old="{{ old('departamento_id') }}" name="departamento_id" id="departamento_id">
                {{-- <option value="" selected>seleccione un departamento</option> --}}
                @foreach ($departamentos as $departamento)
                    @isset($colegio)     
                        <option  value="{{$colegio->departamento_id}}" {{$departamento->id==$colegio->departamento_id ? 'selected':''}}>{{$departamento->departamento}}</option>     
                    @else
                        <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected':'' }} >{{ $departamento->departamento }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="departamento_id">departamento</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('provincia_id') is-invalid @enderror" name="provincia_id" id="provincia_id">
                <option value=""> Elija una ciudad</option>
                    @foreach ($provincias as $item)
                        @isset($colegio) 
                            <option value="{{ $item->id }}" {{ $item->id==$colegio->provincia_id ? 'selected':''}} >{{ $item->provincia }}</option>
                        @endisset
                    @endforeach 
            </select>
            <label for="provincia_id">Provincia</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('municipio_id') is-invalid @enderror" name="municipio_id" id="municipio_id">
                    <option value="" > Seleccione una municipio</option>
                    @foreach ($municipios as $municipio)
                        @isset($colegio)     
                            <option  value="{{$municipio->id}}" {{$municipio->id==$colegio->municipio_id ? 'selected':''}}>{{$municipio->municipio}}</option>     
                        @else
                            <option value="{{ $municipio->id }}" {{ old('municipio_id') == $municipio->id ? 'selected':'' }} >{{ $municipio->municipio }}</option>
                        @endisset  
                    @endforeach
                </select>
            <label for="municipio_id">Municipio</label>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('niveles'))
                <span class="text-danger"> {{ $errors->first('niveles')}}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="card bg-warning">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 @error('niveles') is-invalid @enderror">
                @isset($colegio)
                    @foreach ($niveles_currents as $current)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" onclick="return false;" type="checkbox" name="niveles[{{$current->id}}]" checked value="{{$current->nivel}}" id="{{$current->nivel}}">
                            <label class="form-check-label" for="{{$current->id}}">{{$current->nivel}}</label>
                        </div>
                    @endforeach
                    @foreach ($niveles_faltantes as $faltante)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" type="checkbox" name="niveles[{{$faltante->id}}]"  value="{{$faltante->nivel}}" id="{{$faltante->nivel}}">
                            <label class="form-check-label" for="{{$faltante->id}}">{{$faltante->nivel}}</label>
                        </div>
                    @endforeach
                @else
                    @foreach ($niveles as $nivel)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" type="checkbox" name="niveles[{{$nivel->id}}]" value="{{$nivel->nivel}}" id="{{$nivel->nivel}}">
                            <label class="form-check-label" for="{{$nivel->id}}">{{$nivel->nivel}}</label>
                        </div>
                    @endforeach
                @endisset
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
                <input  type="number" name="coordenadax" class="form-control @error('coordenadax') is-invalid @enderror" value="{{old('coordenadax',$colegio->coordenadax ?? '')}}">
                <label for="coordenadax">coordenada X</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="coordenaday" class="form-control @error('coordenaday') is-invalid @enderror" value="{{old('coordenaday',$colegio->coordenaday ?? '')}}">
                <label for="coordenaday">coordenada Y</label>
            </div>    
        </div>
    </div>