<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="estado" id="estado"  class="form-control @error('estado') is-invalid @enderror" value="{{old('estado',$estado->estado ?? '')}}" autocomplete="off">
            <label for="pagocon">Estado</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" >
        <div class="form-floating mb-3 text-gray">
            @error('estado') <span class="text-danger">{{$message}}</span> @enderror
        </div>
    </div>
</div>
