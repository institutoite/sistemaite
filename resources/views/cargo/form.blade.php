
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('cargo'))
            <span class="text-danger"> {{ $errors->first('cargo')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="cargo" id="cargo"  class="form-control @error('cargo') is-invalid @enderror" value="{{old('cargo',$cargo->cargo ?? '')}}" autocomplete="off">
            <label for="cargo">Cargo</label>
        </div>
    </div>
</div>

