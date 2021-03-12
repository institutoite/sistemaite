
{{-- $$$$$$$$$$$ CAMPO NOMBRE DE PAIS --}}
<div class="row"> 
    <div class="input-group mb-2" >
        <label class="col-3 form-control bg-primary" for="">PAIS</label> 
        <input  type="text" name="nombrepais" class="form-control col-9 @error('nombrepais') is-invalid @enderror" value="{{old('nombrepais',$pais->nombrepais ?? '')}}" placeholder="Ingrese un  nombre de Pais">
    </div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
        @if($errors->has('nombrepais'))
            <p class="text-danger"> {{ $errors->first('nombrepais')}}</p>
        @endif
    </div>
</div>

