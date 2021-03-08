<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Nombres</label> 
        <input  type="text" name="nombre" class="form-control col-9" value="{{old('nombre',$persona_a_editar->nombre ?? '')}}" placeholder="Ingrese un  nombre">
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ApellidoP</label> 
        <input  type="text" name="apellidop" class="form-control" value="{{old('apellidos',$persona_a_editar->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
    </div>
</div>

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ApellidoM</label> 
        <input  type="text" name="apellidom" class="form-control" value="{{old('apellidom',$persona_a_editar->apellidom ?? '')}}" placeholder="Ingrese su apellido Materno(Opcional)">
    </div>
</div>

<div class="row">
    @isset($persona_a_editar)
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control col-9" value="{{old('fechanacimiento',$persona_a_editar->fechanacimiento->format('Y-m-d') ?? '')}}">
        </div>
    @else
        <div class="input-group mb-2" >
            <label class="col-3 form-control bg-primary" for="">Fecha N.</label> 
            <input  type="date" name="fechanacimiento" min="1900-01-01" class="form-control col-9" value="{{old('fechanacimiento' ?? '')}}">
        </div>
    @endisset
</div>

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Dirección</label> 
        <input  type="text" name="direccion" class="form-control col-9" value="{{old('direccion',$persona_a_editar->direccion ?? '')}}" placeholder="Ingrese una dirección">
    </div>
</div>



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
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Observación</label> 
        <input  type="text" name="observacion" class="form-control" value="{{old('direccion',$persona_a_editar->observacion ?? '')}}" placeholder="Ingrese una nota u observación">
    </div>
</div>    

<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">Dirección</label> 
        <select class="form-control" name="como" id="como">
            <option value=""> Elija una manera</option>
                <option value="PASANDO">Pasando por el lugar</option>
                <option value="REFERENCIA" >Por referencia</option>
                <option value="FACEBOOK">Facebook</option>    
                <option value="GOOGLE" >Google</option>
                <option value="OTRO" >Otra Forma</option>
                
        </select>
    </div>
</div>


    




