
{{-- $$$$$$$$$$$ CAMPO NOMBRE DE USUARIO --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">USUARIO</label> 
        <input  type="text" name="name" class="form-control col-9 @error('name') is-invalid @enderror" value="{{old('name',$user->name ?? '')}}" placeholder="Ingrese un  nombre de usuario" autocomplete="false">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('name'))
            <p class="text-danger"> {{ $errors->first('name')}}</p>
        @endif
    </div>
</div>

{{-- $$$$$$$$$$$ CAMPO NOMBRE DE EMAIL --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">EMAIL</label> 
        <input  type="text" name="email" class="form-control col-9 @error('email') is-invalid @enderror" value="{{old('email',$user->email ?? '')}}" placeholder="Ingrese un correo electronico">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('email'))
            <p class="text-danger"> {{ $errors->first('email')}}</p>
        @endif
    </div>
</div>
{{-- $$$$$$$$$$$ CAMPO CONTRASEÑA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CONTRASEÑA</label> 
        <input  type="password" name="password" class="form-control col-9 @error('password') is-invalid @enderror"  placeholder="Ingrese un  nombre de usuario">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('password'))
            <p class="text-danger"> {{ $errors->first('password')}}</p>
        @endif
    </div>
</div>
{{-- $$$$$$$$$$$ CAMPO REPETIR CONTRASEÑA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CONTRASEÑA</label> 
        <input  type="password" name="password_confirmation" class="form-control col-9 @error('password_confirmation') is-invalid @enderror" value="{{old('password_confirmation','' ?? '')}}" placeholder="Ingrese un  nombre de usuario">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('password_confirmation'))
            <p class="text-danger"> {{ $errors->first('password_confirmation')}}</p>
        @endif
    </div>
</div>

{{-- $$$$$$$$$$$ CAMPO REPETIR CONTRASEÑA --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">FOTO</label> 
        <input type="file" accept=".png, .jpg, .jpeg, .gif" name="foto[]" id="foto" accept="image/*"   data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                

    </div>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('foto'))
            <p class="text-danger"> {{ $errors->first('foto')}}</p>
        @endif
    </div>
</div>