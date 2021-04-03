
{{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Nombres</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona->nombre ?? '')}}" placeholder="Ingrese un  nombre">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('nombre'))
            <p class="text-danger"> {{ $errors->first('nombre')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary " for="">ApellidoP</label> 
        <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('apellidop'))
            <p class="text-danger"> {{ $errors->first('apellidop')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}


<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ApellidoM</label> 
        <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona->apellidom ?? '')}}" placeholder="Ingrese su apellido Materno(Opcional)">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('apellidom'))
            <p class="text-danger"> {{ $errors->first('apellidom')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row">
    @isset($persona)
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento',$persona->fechanacimiento->format('Y-m-d') ?? '')}}">
        </div>
    @else
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento' ?? '')}}">
        </div>
    @endisset
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('fechanacimiento'))
            <p class="text-danger"> {{ $errors->first('fechanacimiento')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">PAIS</label> 
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
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('pais_id'))
            <p class="text-danger"> {{ $errors->first('pais_id')}}</p>
        @endif
    </div>
</div>


{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CIUDAD</label> 
        <select class="form-control" name="ciudad_id" id="city">
            <option value=""> Elija una ciudad</option>
            {{-- @foreach ($ciudades as $item)
                @isset($zona)     
                    <option value="{{ $item->id }}" {{ $item->id==$zona->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                @else
                    <option value="{{ $item->id }}" {{ old('ciudad_id') == $item->id ? 'selected':'' }} >{{ $item->ciudad }}</option>
                @endisset 
            @endforeach --}}
        </select>
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('ciudad_id'))
            <p class="text-danger"> {{ $errors->first('ciudad_id')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO ZONA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ZONA</label> 
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
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('zona_id'))
            <p class="text-danger"> {{ $errors->first('zona_id')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DIRECCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Dirección</label> 
        <input  type="text" name="direccion" class="form-control col-9 @error('direccion') is-invalid @enderror" value="{{old('direccion',$persona->direccion ?? '')}}" placeholder="Ingrese una dirección">
    </div>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('direccion'))
            <p class="text-danger"> {{ $errors->first('direccion')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  CARNET  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CARNET</label> 
        <input  type="text" name="carnet" class="form-control col-9 @error('carnet') is-invalid @enderror" value="{{old('carnet',$persona->carnet ?? '')}}" placeholder="Ingrese un numero de carnet">
    </div>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('carnet'))
            <p class="text-danger"> {{ $errors->first('carnet')}}</p>
        @endif
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">EXPEDIDO</label> 
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
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('expedido'))
            <p class="text-danger"> {{ $errors->first('expedido')}}</p>
        @endif
    </div>
</div>



{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Género</label> 
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
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('genero'))
            <p class="text-danger"> {{ $errors->first('genero')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Observación</label> 
        <textarea  placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" rows="2" class="form-control" value="{{old('observacion',$persona->observacion ?? '')}}">{{old('observacion')}}</textarea>
            
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('observacion'))
            <p class="text-danger"> {{ $errors->first('observacion')}}</p>
        @endif
    </div>
</div>



{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE ENTERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Como inf?</label> 
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
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('como'))
            <p class="text-danger"> {{ $errors->first('como')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}
<div class="row"> 
    <div class="input-group mb-2" >
        <select   name="papel" hidden>
            <option value="proveedor"  selected >Proveedor</option>
        </select>
    </div>
</div>




