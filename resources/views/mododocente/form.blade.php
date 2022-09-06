
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('mododocente'))
            <span class="text-danger"> {{ $errors->first('mododocente')}}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="mododocente" id="mododocente"  class="form-control @error('mododocente') is-invalid @enderror" value="{{old('mododocente',$mododocente->mododocente ?? '')}}" autocomplete="off">
            <label for="mododocente">Un mododocente</label>
        </div>
    </div>
</div>

