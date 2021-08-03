<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO nombre de colegio %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 input-group text-sm" > 
                <div class="input-group mb-2" >
                    {{-- Form::text('nombre', $colegio->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del colegio']) --}}
                    <input  type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$colegio->nombre ?? '')}}" placeholder="Ingrese un  nombre">
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO RUE --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 input-group text-sm" >
                <div class="input-group mb-2" >
                    {{-- Form::text('rue', $colegio->rue, ['class' => 'form-control' . ($errors->has('rue') ? ' is-invalid' : ''), 'placeholder' => 'Rue']) --}}
                    <input  type="text" name="rue" class="form-control @error('rue') is-invalid @enderror" value="{{old('rue',$colegio->rue ?? '')}}" placeholder="Ingrese un  rue">
                </div>    
            </div>
        </div>


        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DEPENDENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 input-group text-sm" > 
                <div class="input-group mb-2" >
                    {{-- Form::text('director', $colegio->director, ['class' => 'form-control' . ($errors->has('director') ? ' is-invalid' : ''), 'placeholder' => 'Director /a del colegio']) --}}
                    <input  type="text" name="director" class="form-control @error('director') is-invalid @enderror" value="{{old('director',$colegio->director ?? '')}}" placeholder="Ingrese un  director">
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO TURNO --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 input-group text-sm" >
                <div class="input-group mb-2" >
                    {{-- Form::text('telefono', $colegio->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) --}}
                    <input  type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$colegio->telefono ?? '')}}" placeholder="Ingrese un  telefono">
                </div>    
            </div>
        </div>


        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DEPENDENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 input-group text-sm" > 
                <div class="input-group mb-2" >
                    {{-- Form::text('direccion', $colegio->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) --}}
                    <input  type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion',$colegio->direccion ?? '')}}" placeholder="Ingrese un  direccion">
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO TURNO --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 input-group text-sm" >
                <div class="input-group mb-2" >
                    {{-- Form::text('celular', $colegio->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) --}}
                    <input  type="text" name="celular" class="form-control @error('celular') is-invalid @enderror" value="{{old('celular',$colegio->celular ?? '')}}" placeholder="Ingrese un  celular">
                </div>    
            </div>
        </div>

        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DEPENDENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" > 
                <div class="input-group mb-2" >
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
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO TURNO --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    <select class="form-control @error('turno') is-invalid @enderror"  name="turno" id="turno">
                        <option value=""> Elija turno</option>
                        @isset($colegio)
                            <option value="manana" @if($colegio->turno == 'manana') {{'selected'}} @endif>Mañana</option>
                            <option value="tarde" @if($colegio->turno == 'tarde') {{'selected'}} @endif>Tarde</option>
                            <option value="noche" @if($colegio->turno == 'noche') {{'selected'}} @endif>Noche</option>
                        @else 
                            <option value="manana" @if(old('turno') == 'manana') {{'selected'}} @endif>Mañana</option>
                            <option value="tarde" @if(old('turno') == 'tarde') {{'selected'}} @endif>Fiscal</option>
                            <option value="noche" @if(old('turno') == 'noche') {{'selected'}} @endif>Noche</option>
                        @endisset
                        
                    </select>
                </div>    
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO NIVEL  --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    <select class="form-control @error('turno') is-invalid @enderror"  name="nivel" id="nivel">
                        <option value=""> Elija Nivel</option>
                        @isset($colegio)
                            <option value="inicial" @if($colegio->nivel == 'inicial') {{'selected'}} @endif>Inicial</option>
                            <option value="primaria" @if($colegio->nivel == 'primaria') {{'selected'}} @endif>Primaria</option>
                            <option value="secundaria" @if($colegio->nivel == 'secundaria') {{'selected'}} @endif>Secundaria</option>

                            <option value="inicial-primaria" @if($colegio->nivel == 'inicial-primaria') {{'selected'}} @endif>Inicial y primaria</option>
                            <option value="primaria-secundaria" @if($colegio->nivel == 'primaria-secundaria') {{'selected'}} @endif>Primaria y secundaria</option>
                            <option value="inicial-primaria-secundaria" @if($colegio->nivel == 'inicial-primaria-secundaria') {{'selected'}} @endif>Inicial Primaria y Secundaria</option>
                            
                        @else
                            <option value="inicial" @if(old('nivel') == 'inicial') {{'selected'}} @endif>Inicial</option>
                            <option value="primaria" @if(old('nivel') == 'primaria') {{'selected'}} @endif>Primaria</option>
                            <option value="secundaria" @if(old('nivel') == 'secundaria') {{'selected'}} @endif>Secundaria</option>

                            <option value="inicial-primaria" @if(old('nivel') == 'inicial-primaria') {{'selected'}} @endif>Inicial y primaria</option>
                            <option value="primaria-secundaria" @if(old('nivel') == 'primaria-secundaria') {{'selected'}} @endif>Primaria y secundaria</option>
                            <option value="inicial-primaria-secundaria" @if(old('nivel') == 'inicial-primaria-secundaria') {{'selected'}} @endif>Inicial Primaria y Secundaria</option>
                        @endisset
                        
                    </select>
                </div>    
            </div>
        </div>

        
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DEPARTAMENTO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        {{--dd($departamentos)--}}
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-secondary p-1 p-1" for="">Dpto</p> 
                    <select class="form-control @error('departamento_id') is-invalid @enderror" data-old="{{ old('departamento_id') }}" name="departamento_id" id="departamento">
                        <option value="" selected>seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                            @isset($colegio)     
                                <option  value="{{$colegio->departamento}}" {{$departamento->id==$colegio->departamento ? 'selected':''}}>{{$departamento->departamento}}</option>     
                            @else
                                <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected':'' }} >{{ $departamento->departamento }}</option>
                            @endisset 
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PROVINCIA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-secondary p-1 p-1" for="">provincia</p> 
                    <select class="form-control @error('provincia_id') is-invalid @enderror" name="provincia_id" id="provincia">
                        <option value=""> Elija una provincia</option>
                            {{-- @foreach ($provincias as $item)
                                @isset($colegio) 
                                    <option value="{{ $colegio->provincia_id }}" {{ $item->id==$colegio->provincia_id ? 'selected':''}} >{{ $item->provincia }}</option>
                                @endisset
                            @endforeach  --}}
                    </select>
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO MUNICIPIO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Municipio</p> 
                <select class="form-control @error('municipio_id') is-invalid @enderror" name="municipio_id" id="municipio">
                    <option value="" > Seleccione una municipio</option>
                    @foreach ($municipios as $municipio)
                        @isset($colegio)     
                            <option  value="{{$municipio->id}}" {{$municipio->id==$colegio->municipio_id ? 'selected':''}}>{{$municipio->municipio}}</option>     
                        @else
                            <option value="{{ $municipio->id }}" {{ old('municipio_id') == $municipio->id ? 'selected':'' }} >{{ $municipio->municipio }}</option>
                        @endisset  
                    @endforeach
                </select>
            </div>
            </div>
        </div>


        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DEPENDENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" > 
                <div class="input-group mb-2" >
                    {{-- Form::text('areageografica', $colegio->areageografica, ['class' => 'form-control' . ($errors->has('areageografica') ? ' is-invalid' : ''), 'placeholder' => 'Areageografica']) 
                    <input  type="text" name="areageografica" class="form-control @error('areageografica') is-invalid @enderror" value="{{old('areageografica',$colegio->areageografica ?? '')}}" placeholder="Ingrese un  areageografica">--}}
                    <select class="form-control @error('areageografica') is-invalid @enderror"  name="areageografica" id="areageografica">
                        <option value=""> Elija areageografica</option>
                        @isset($colegio)
                            <option value="rural" @if($colegio->areageografica == 'rural') {{'selected'}} @endif>Rural</option>
                            <option value="urbana" @if($colegio->areageografica == 'urbana') {{'selected'}} @endif>Urbana</option>
                        @else 
                            <option value="rural" @if(old('areageografica') == 'rural') {{'selected'}} @endif>Rural</option>
                            <option value="urbana" @if(old('areageografica') == 'urbana') {{'selected'}} @endif>Urbana</option>
                        @endisset
                        
                    </select>
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO TURNO --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    {{-- Form::text('coordenadax', $colegio->coordenadax, ['class' => 'form-control' . ($errors->has('coordenadax') ? ' is-invalid' : ''), 'placeholder' => 'Coordenadax']) --}}
                    <input  type="text" name="coordenadax" class="form-control @error('coordenadax') is-invalid @enderror" value="{{old('coordenadax',$colegio->coordenadax ?? '')}}" placeholder="Ingrese un  coordenadax">
                </div>    
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO NIVEL  --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
                <div class="input-group mb-2" >
                    {{-- Form::text('coordenaday', $colegio->coordenaday, ['class' => 'form-control' . ($errors->has('coordenaday') ? ' is-invalid' : ''), 'placeholder' => 'Coordenaday']) --}}
                    <input  type="text" name="coordenaday" class="form-control @error('coordenaday') is-invalid @enderror" value="{{old('coordenaday',$colegio->coordenaday ?? '')}}" placeholder="Ingrese un  coordenaday">
                </div>    
            </div>

        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>