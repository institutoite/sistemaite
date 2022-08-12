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
            <input  type="text" name="nombre" id="nombre"  class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$mensaje->nombre ?? '')}}" autocomplete="off">
            <label>Nombre</label>
        </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('mensaje'))
        <span class="text-danger"> {{ $errors->first('mensaje')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <textarea placeholder="Ingrese un mensaje"  name="mensaje" rows="5" id="mensaje" class="form-control @error('mensaje') is-invalid @enderror" >{{old('mensaje',$mensaje->mensaje ?? '')}}</textarea>
        </div>
    </div>
</div> 