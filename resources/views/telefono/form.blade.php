    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">    
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
    </div>


    {{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Nombre</p> 
                <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$telefono->nombre ?? '')}}" placeholder="Ingrese un  nombre">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Paterno</p> 
                <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$telefono->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
            </div>    
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('genero'))
                <span class="text-danger"> {{ $errors->first('genero')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('como'))
                <span class="text-danger"> {{ $errors->first('como')}}</span>
            @endif
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 p-1" for="">Número</p> 
                <input class="form-control" type="tel" id="phone" name="telefono" placeholder="71039910" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]">
            </div>
        </div>
        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Parentesco?</p> 
                <select class="form-control @error('parentesco') is-invalid @enderror"  name="parentesco" id="parentesco">
                    <option value="">Grado Parentesco</option>
                        @isset($telefono)
                        
                            <option value="PAPA" @if($telefono->parentesco == 'PAPA') {{'selected'}} @endif>PAPA</option>
                            <option value="MAMA" @if($telefono->parentesco == 'MAMA') {{'selected'}} @endif>MAMA</option>    
                        
                            <option value="ABUELO" @if($telefono->parentesco == 'ABUELO') {{'selected'}} @endif>ABUELO</option>
                            <option value="ABUELA" @if($telefono->parentesco == 'ABUELA') {{'selected'}} @endif>ABUELA</option>
                        
                            <option value="HERMANO" @if($telefono->parentesco == 'HERMANO') {{'selected'}} @endif>HERMANO</option>
                            <option value="HERMANA" @if($telefono->parentesco == 'HERMANA') {{'selected'}} @endif>HERMANA</option>
                        
                            <option value="TIO" @if($telefono->parentesco == 'TIO') {{'selected'}} @endif>TIO</option>
                            <option value="TIA" @if($telefono->parentesco == 'TIA') {{'selected'}} @endif>TIA</option>
                        
                            <option value="ESPOSO" @if($telefono->parentesco == 'ESPOSO') {{'selected'}} @endif>ESPOSO</option>
                            <option value="ESPOSA" @if($telefono->parentesco == 'ESPOSA') {{'selected'}} @endif>ESPOSA</option>
                        
                            <option value="OTRO" @if($telefono->parentesco == 'OTRO') {{'selected'}} @endif>OTRO</option>
                            
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
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
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