    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm">    
            @if($errors->has('apellidom'))
                <span class="text-danger"> {{ $errors->first('apellidom')}}</span>
            @endif
        </div>
    </div>


    {{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Nombre</p> 
                <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona->nombre ?? '')}}" placeholder="Ingrese un  nombre">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Paterno</p> 
                <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Materno</p> 
                <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona->apellidom ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
            </div>    
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('telefono'))
                <span class="text-danger"> {{ $errors->first('telefono')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('parentesco'))
            <span class="text-danger"> {{ $errors->first('parentesco')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('genero'))
                <span class="text-danger"> {{ $errors->first('genero')}}</span>
            @endif
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 p-1" for="">Número</p> 
                <input class="form-control" type="tel" id="phone" name="telefono" placeholder="71039910" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" value="{{old('telefono',$persona->telefono ?? '')}}">
            </div>
        </div>
        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}

        {{--dd($parentesco->parentesco)--}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Parentesco?</p> 
                <select class="form-control @error('parentesco') is-invalid @enderror"  name="parentesco" id="parentesco">
                    <option value="">Grado Parentesco</option>
                        @isset($registro_pivot)
                        
                            <option value="PAPA" @if($registro_pivot[0]->parentesco == 'PAPA') {{'selected'}} @endif>PAPA</option>
                            <option value="MAMA" @if($registro_pivot[0]->parentesco == 'MAMA') {{'selected'}} @endif>MAMA</option>    
                        
                            <option value="ABUELO" @if($registro_pivot[0]->parentesco == 'ABUELO') {{'selected'}} @endif>ABUELO</option>
                            <option value="ABUELA" @if($registro_pivot[0]->parentesco == 'ABUELA') {{'selected'}} @endif>ABUELA</option>
                        
                            <option value="HERMANO" @if($registro_pivot[0]->parentesco == 'HERMANO') {{'selected'}} @endif>HERMANO</option>
                            <option value="HERMANA" @if($registro_pivot[0]->parentesco == 'HERMANA') {{'selected'}} @endif>HERMANA</option>
                        
                            <option value="TIO" @if($registro_pivot[0]->parentesco == 'TIO') {{'selected'}} @endif>TIO</option>
                            <option value="TIA" @if($registro_pivot[0]->parentesco == 'TIA') {{'selected'}} @endif>TIA</option>
                        
                            <option value="ESPOSO" @if($registro_pivot[0]->parentesco == 'ESPOSO') {{'selected'}} @endif>ESPOSO</option>
                            <option value="ESPOSA" @if($registro_pivot[0]->parentesco == 'ESPOSA') {{'selected'}} @endif>ESPOSA</option>
                        
                            <option value="OTRO" @if($registro_pivot[0]->parentesco == 'OTRO') {{'selected'}} @endif>OTRO</option>
                            
                        @else 
                        
                            <option value="PAPA" @if(old('parentesco') == 'PAPA') {{'selected'}} @endif>PAPA</option>
                            <option value="MAMA" @if(old('parentesco') == 'MAMA') {{'selected'}} @endif>MAMA</option>    
                        
                            <option value="ABUELO" @if(old('parentesco') == 'ABUELO') {{'selected'}} @endif>ABUELO</option>
                            <option value="ABUELA" @if(old('parentesco') == 'ABUELA') {{'selected'}} @endif>ABUELA</option>
                        
                            <option value="HERMANO" @if(old('parentesco') == 'HERMANO') {{'selected'}} @endif>HERMANO</option>
                            <option value="HERMANA" @if(old('parentesco') == 'HERMANA') {{'selected'}} @endif>HERMANA</option>
                        
                            <option value="TIO" @if(old('parentesco') == 'TIO') {{'selected'}} @endif>TIO</option>
                            <option value="TIA" @if(old('parentesco') == 'TIA') {{'selected'}} @endif>TIA</option>
                        
                            <option value="ESPOSO" @if(old('parentesco') == 'ESPOSO') {{'selected'}} @endif>ESPOSO</option>
                            <option value="ESPOSA" @if(old('parentesco') == 'ESPOSA') {{'selected'}} @endif>ESPOSA</option>
                        
                            <option value="OTRO" @if(old('parentesco') == 'OTRO') {{'selected'}} @endif>OTRO</option>
                        @endisset
                </select>
            </div>
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO DEL FAMILIAR ---}}
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
        <div class="input-group mb-2" >
            <p class="col-3 form-control bg-secondary p-1 p-1" for="">Género</p> 
            <select class="form-control @error('expedido') is-invalid @enderror" name="genero" id="genero">
                <option value=""> Elija tu género</option>
            
                @isset($persona)      
                    @if($persona->genero=="MUJER")
                        <option value="{{ $persona->genero }}" {{ "MUJER"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                        <option value="HOMBRE">HOMBRE</option>
                    @else
                        <option value="{{ $persona->genero }}" {{ "HOMBRE"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                        <option value="MUJER" >MUJER</option>
                    @endif
                    
                @else
                    <option value="MUJER" @if(old('genero') == 'MUJER') {{'selected'}} @endif>MUJER</option>
                    <option value="HOMBRE" @if(old('genero') == 'HOMBRE') {{'selected'}} @endif>HOMBRE</option>
                @endisset    
            </select>
        </div>
    </div>
</div>
