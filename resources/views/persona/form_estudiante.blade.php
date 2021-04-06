    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">    
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('apellidom'))
                <span class="text-danger"> {{ $errors->first('apellidom')}}</span>
            @endif
        </div>
    </div>


    {{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary p-1" for="">Nombre</p> 
                <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona->nombre ?? '')}}" placeholder="Ingrese un  nombre">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary p-1" for="">Paterno</p> 
                <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
            <p class="col-3 form-control bg-secondary text-sm p-1" for="">Materno</p> 
            <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona->apellidom ?? '')}}" placeholder="Ingrese su apellido Materno(Opcional)">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('fechanacimiento'))
                <span class="text-danger"> {{ $errors->first('fechanacimiento')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('carnet'))
                <span class="text-danger"> {{ $errors->first('carnet')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('expedido'))
                <span class="text-danger"> {{ $errors->first('expedido')}}</span>
            @endif
        </div>    
    </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @isset($persona)
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-primary" for="">Fecha N.</p> 
                    <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento',$persona->fechanacimiento->format('Y-m-d') ?? '')}}">
                </div>
            @else
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-primary" for="">Fecha N.</p> 
                    <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento' ?? '')}}">
                </div>
            @endisset
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  CARNET  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary" for="">C.I.</p> 
                <input  type="text" name="carnet" class="form-control col-9 @error('carnet') is-invalid @enderror" value="{{old('carnet',$persona->carnet ?? '')}}" placeholder="Ingrese un numero de carnet">
            </div>
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  expedido del carnet  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                <p class="col-3 form-control bg-primary" for="">DPTO</p> 
                <select class="form-control @error('expedido') is-invalid @enderror"  name="expedido" id="expedido">
                    <option value=""> Elija Expedido</option>
                        <option value="SCZ" @if(old('expedido') == 'SCZ') {{'selected'}} @endif>Santa Cruz</option>
                        <option value="LPZ" @if(old('expedido') == 'LPZ') {{'selected'}} @endif>La Paz</option>
                        <option value="CBBA" @if(old('expedido') == 'CBBA') {{'selected'}} @endif>Cochabamba</option>

                        <option value="BEN" @if(old('expedido') == 'BEN') {{'selected'}} @endif>Beni</option>
                        <option value="TAR" @if(old('expedido') == 'TAR') {{'selected'}} @endif>Tarija</option>
                        <option value="PND" @if(old('expedido') == 'PND') {{'selected'}} @endif>Pando</option>

                        <option value="ORU" @if(old('expedido') == 'ORU') {{'selected'}} @endif>Oruro</option>
                        <option value="POT" @if(old('expedido') == 'POT') {{'selected'}} @endif>Potosí</option>
                        <option value="CHU" @if(old('expedido') == 'CHU') {{'selected'}} @endif>Chuquisaca</option>
                </select> 
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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('papel'))
                <span class="text-danger"> {{ $errors->first('papel')}}</span>
            @endif
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary p-1" for="">Género</p> 
                <select class="form-control" name="genero" id="genero">
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
        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary" for="">Como inf?</p> 
                <select class="form-control @error('como') is-invalid @enderror"  name="como" id="como">
                    <option value=""> Elija una manera</option>
                        <option value="PASANDO" @if(old('como') == 'PASANDO') {{'selected'}} @endif>Pasando por el lugar</option>
                        <option value="REFERENCIA" @if(old('como') == 'REFERENCIA') {{'selected'}} @endif>Por referencia</option>
                        <option value="FACEBOOK" @if(old('como') == 'FACEBOOK') {{'selected'}} @endif>Facebook</option>    
                        <option value="GOOGLE" @if(old('como') == 'GOOGLE') {{'selected'}} @endif>Google</option>
                        <option value="YOUTUBE" @if(old('como') == 'YOUTUBE') {{'selected'}} @endif>Google</option>
                        <option value="OTRO" @if(old('como') == 'OTRO') {{'selected'}} @endif>Otra Forma</option>
                </select>
            </div>
        </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary " for="">Persona</p> 
                <select class="form-control @error('papel') is-invalid @enderror"  name="papel" id="papel">
                    <option value=""> Elija Papel</option>
                        <option value="estudiante" @if(old('papel') == 'estudiante') {{'selected'}} @endif>Estudiante</option>
                        <option value="docente" @if(old('papel') == 'docente') {{'selected'}} @endif>Docente</option>
                        <option value="cliservicio" @if(old('papel') == 'cliservicio') {{'selected'}} @endif>Servicio Técnico</option>

                        <option value="clicopy" @if(old('papel') == 'clicopy') {{'selected'}} @endif>Fotocopia e Impresiones</option>
                        <option value="administrativo" @if(old('papel') == 'administrativo') {{'selected'}} @endif>Adminitrativo</option>
                        <option value="proveedor" @if(old('papel') == 'PND') {{'proveedor'}} @endif>Proveedor</option>
                </select>
            </div> 
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('pais_id'))
                <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('ciudad_id'))
                <span class="text-danger"> {{ $errors->first('ciudad_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('zona_id'))
                <span class="text-danger"> {{ $errors->first('zona_id')}}</span>
            @endif
        </div>
    </div>

    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary p-1" for="">PAIS</p> 
                <select class="form-control" data-old="{{ old('pais_id') }}" name="pais_id" id="country">
                    <option value="1" selected> Bolivia</option>
                    @foreach ($paises as $pais)
                        @isset($persona)     
                            <option  value="{{$pais->id}}" {{$pais->id==$zona->pais_id ? 'selected':''}}>{{$pais->nombrepais}}</option>     
                        @else
                            <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected':'' }} >{{ $pais->nombrepais }}</option>
                        @endisset 
                    @endforeach
                </select>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-primary p-1" for="">CITY</p> 
                <select class="form-control" name="ciudad_id" id="city">
                    <option value=""> Elija una ciudad</option>
                </select>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO ZONA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
            <p class="col-3 form-control bg-primary" for="">ZONA</p> 
            <select class="form-control" name="zona_id" id="zona">
                <option value="" > Seleccione una Zona</option>
                @foreach ($zonas as $zona)
                    @isset($persona)     
                        <option  value="{{$zona->id}}" {{$zona->id==$zona->ciudad_id ? 'selected':''}}>{{$zona->zona}}</option>     
                    @else
                        <option value="{{ $zona->id }}" {{ old('zona_id') == $zona->id ? 'selected':'' }} >{{ $zona->zona }}</option>
                    @endisset 
                @endforeach
            </select>
        </div>
        </div>
    </div>


     {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DIRECCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                @if($errors->has('direccion'))
                    <span class="text-danger"> {{ $errors->first('direccion')}}</span>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-2 form-control bg-primary p-1" for="">Dirección</p> 
                <input  type="text" name="direccion" class="form-control col-10 @error('direccion') is-invalid @enderror" value="{{old('direccion',$persona->direccion ?? '')}}" placeholder="Ingrese una dirección">
            </div>
        </div>
    </div>

    

    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('observacion'))
                <span class="text-danger"> {{ $errors->first('observacion')}}</span>
            @endif
        </div>
    </div>
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-2 form-control bg-primary" for="">Observación</p> 
                <textarea  placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" rows="2" class="form-control @error('observacion') is-invalid @enderror" value="{{old('observacion',$persona->observacion ?? '')}}">{{old('observacion')}}</textarea>
                    
            </div>
        </div>
    </div>
    

    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE ENTERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-9">
            
        </div>
    </div>


    {{-- $$$$$$$$$$$ CAMPO REPETIR FOTOGRAFIA --}}
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
        <div class="input-group" >
            <input type="file" accept=".png, .jpg, .jpeg, .gif" name="foto" id="foto" accept="image/*" data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm">
        @if($errors->has('foto'))
            <p class="text-danger"> {{ $errors->first('foto')}}</p>
        @endif
    </div>
</div>






