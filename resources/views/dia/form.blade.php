
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('dia'))
            <span class="text-danger"> {{ $errors->first('dia')}}</span>
        @endif
    </div>
</div>

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="dia" id="dia"  class="form-control @error('dia') is-invalid @enderror" value="{{old('dia',$dia->dia ?? '')}}" autocomplete="off">
            <label for="dia">Día</label>
        </div>
    </div>
</div> 

