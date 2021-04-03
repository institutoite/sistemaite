{{-- $$$$$$$$$$$ CAMPO NOMBRE DE MENU --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">MENU</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$user->nombre ?? '')}}" placeholder="Ingrese un  nombre de menu" autocomplete="false">
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

{{-- $$$$$$$$$$$ CAMPO ORDEN DE MENU --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ORDEN</label> 
        <input  type="text" name="orden" class="form-control col-9 @error('orden') is-invalid @enderror" value="{{old('orden',$user->orden ?? '')}}" placeholder="Ingrese un  orden de menu" autocomplete="false">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('orden'))
            <p class="text-danger"> {{ $errors->first('orden')}}</p>
        @endif
    </div>
</div>


{{-- $$$$$$$$$$$ CAMPO icono DE MENU --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">ICONO</label> 
        <input  type="text" name="icono" class="form-control col-9 @error('icono') is-invalid @enderror" value="{{old('icono',$user->icono ?? '')}}" placeholder="Ingrese un  icono de menu" autocomplete="false">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('icono'))
            <p class="text-danger"> {{ $errors->first('icono')}}</p>
        @endif
    </div>
</div>



{{-- $$$$$$$$$$$ CAMPO detalle DE MENU --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">DETALLE</label> 
        <input  type="text" name="detalle" class="form-control col-9 @error('detalle') is-invalid @enderror" value="{{old('detalle',$user->detalle ?? '')}}" placeholder="Ingrese un  detalle de menu" autocomplete="false">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('detalle'))
            <p class="text-danger"> {{ $errors->first('detalle')}}</p>
        @endif
    </div>
</div>


{{-- $$$$$$$$$$$ CAMPO ruta DE MENU --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">RUTA</label> 
        <input  type="text" name="ruta" class="form-control col-9 @error('ruta') is-invalid @enderror" value="{{old('ruta',$user->ruta ?? '')}}" placeholder="Ingrese un  ruta de menu" autocomplete="false">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('ruta'))
            <p class="text-danger"> {{ $errors->first('ruta')}}</p>
        @endif
    </div>
</div>


