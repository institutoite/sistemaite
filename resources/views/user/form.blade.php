
{{-- $$$$$$$$$$$ CAMPO NOMBRE DE USUARIO --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">USUARIO</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de usuario">
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

{{-- $$$$$$$$$$$ CAMPO NOMBRE DE EMAIL --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">USUARIO</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de usuario">
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
{{-- $$$$$$$$$$$ CAMPO CONTRASEÑA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">USUARIO</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de usuario">
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
{{-- $$$$$$$$$$$ CAMPO REPETIR CONTRASEÑA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">USUARIO</label> 
        <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de usuario">
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