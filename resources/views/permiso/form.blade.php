<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        @if($errors->has('name'))
        <span class="text-danger"> {{ $errors->first('name')}}</span>
        @endif
    </div>
</div>
<div class="form-floating mb-3">
    <input  type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$permission->name ?? '')}}">
    <label for="floatingInput">Inserte nuevo Permiso</label>
</div>