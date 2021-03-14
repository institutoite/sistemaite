
{{-- $$$$$$$$$$$ CAMPO NOMBRE DE PAIS --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">CIUDAD</label> 
        <input  type="text" name="ciudad" class="form-control col-9 @error('ciudad') is-invalid @enderror" value="{{old('ciudad',$pais->ciudad ?? '')}}" placeholder="Ingrese un  nombre de ciudad">
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

