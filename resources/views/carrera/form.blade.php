<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('carrera'))
            <span class="text-danger"> {{ $errors->first('carrera')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="carrera" id="carrera"  class="form-control @error('carrera') is-invalid @enderror" value="{{old('carrera',$carrera->carrera ?? '')}}" autocomplete="off">
            <label for="carrera">Carrera</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('description'))
            <span class="text-danger"> {{ $errors->first('description')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <textarea placeholder="Ingrese una descripcion del archivo que va subir maximimo 2000 caracteres"  name="description" id="description" class="form-control @error('description') is-invalid @enderror" >{{old('description',$carrera->description ?? '')}}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('precio'))
            <span class="text-danger"> {{ $errors->first('precio')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="number" name="precio" id="precio"  class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$carrera->precio ?? '')}}" autocomplete="off">
            <label for="precio">Precio</label>
        </div>
    </div>
</div>

