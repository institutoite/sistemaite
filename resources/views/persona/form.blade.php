
{{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Nombres</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona_a_editar->nombre ?? '')}}" placeholder="Ingrese un  nombre">
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
        <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona_a_editar->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
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
        <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona_a_editar->apellidom ?? '')}}" placeholder="Ingrese su apellido Materno(Opcional)">
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
    @isset($persona_a_editar)
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento',$persona_a_editar->fechanacimiento->format('Y-m-d') ?? '')}}">
        </div>
    @else
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento' ?? '')}}">
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

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DIRECCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Dirección</label> 
        <input  type="text" name="direccion" class="form-control col-9 @error('direccion') is-invalid @enderror" value="{{old('direccion',$persona_a_editar->direccion ?? '')}}" placeholder="Ingrese una dirección">
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

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Pais</label> 
        <select class="form-control @error('pais') is-invalid @enderror"  name="pais" id="pais">
            <option value=""> Elija un pais</option>
                
        </select>
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('pais'))
            <p class="text-danger"> {{ $errors->first('pais')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ciudad?</label> 
        <select class="form-control @error('ciudad') is-invalid @enderror"  name="ciudad" id="ciudad">
            <option value=""> Elija una ciudad</option>
                
        </select>
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

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO ZONA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Zona?</label> 
        <select class="form-control @error('zona') is-invalid @enderror"  name="zona" id="zona">
            <option value=""> Elija una zona</option>
                
        </select>
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('zona'))
            <p class="text-danger"> {{ $errors->first('zona')}}</p>
        @endif
    </div>
</div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Género</label> 
        <select class="form-control" name="genero" id="genero">
            <option value=""> Elija tu género</option>
        
            @isset($persona_a_editar)      
                @if($persona_a_editar->genero=="MUJER")
                    <option value="{{ $persona_a_editar->genero }}" {{ "MUJER"==$persona_a_editar->genero ? 'selected':''}} >{{ $persona_a_editar->genero }}</option>
                    <option value="HOMBRE">HOMBRE</option>
                @else
                    <option value="{{ $persona_a_editar->genero }}" {{ "HOMBRE"==$persona_a_editar->genero ? 'selected':''}} >{{ $persona_a_editar->genero }}</option>
                    <option value="MUJER" >MUJER</option>
                @endif
                
            @else
                <option value="MUJER" >MUJER</option>
                <option value="HOMBRE" >HOMBRE</option>
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
        <textarea  placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" rows="2" class="form-control" value="{{old('obsrvacion',$persona_a_editar->observacion ?? '')}}"></textarea>
            
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
                <option value="PASANDO">Pasando por el lugar</option>
                <option value="REFERENCIA" >Por referencia</option>
                <option value="FACEBOOK">Facebook</option>    
                <option value="GOOGLE" >Google</option>
                <option value="OTRO" >Otra Forma</option>
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



    




