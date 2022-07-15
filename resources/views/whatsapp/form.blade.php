<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('nombre'))
        <span class="text-danger"> {{ $errors->first('nombre')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="nombre" id="nombre"  class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$comentario->nombre ?? '')}}" autocomplete="off">
            <label>Nombre</label>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('telefono'))
        <span class="text-danger"> {{ $errors->first('telefono')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="telefono" id="telefono"  class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono',$comentario->telefono ?? '')}}" autocomplete="off">
            <label>telefono</label>
        </div>
    </div>
</div> 


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('interests'))
        <span class="text-danger"> {{ $errors->first('interests')}}</span>
        @endif
    </div>
</div>

<textarea placeholder="Ingrese un mensaje"  name="interests" rows="5" id="interests" class="form-control @error('interests') is-invalid @enderror" >{{old('interests',$comentario->interests ?? '')}}</textarea>