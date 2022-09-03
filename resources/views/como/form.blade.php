
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('como'))
            <span class="text-danger"> {{ $errors->first('como')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="como" id="como"  class="form-control @error('como') is-invalid @enderror" value="{{old('como',$como->como ?? '')}}" autocomplete="off">
            <label for="como">Como se entero nuevo</label>
        </div>
    </div>
</div>

