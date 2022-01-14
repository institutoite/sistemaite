<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="motivo" id="motivo"  class="form-control @error('motivo') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese un motivo</label>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('tipomotivo_id') is-invalid @enderror" data-old="{{ old('tipomotivo_id') }}" name="tipomotivo_id" id="country">
                <option value="">Elija un tipo motivo</option>
                @foreach ($tipomotivos as $tipomotivo)
                    @isset($motivo)     
                        <option  value="{{$tipomotivo->id}}" {{$tipomotivo->id==$motivo->tipomotivo_id ? 'selected':''}}>{{$tipomotivo->tipomotivo}}</option>     
                    @else
                        <option value="{{ $tipomotivo->id }}" {{ old('carrera_id') == $tipomotivo->id ? 'selected':'' }} >{{ $tipomotivo->tipomotivo }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="pais">Elija tipomotivo*</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @error('tipomotivo_id') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>
    </div>
</div>