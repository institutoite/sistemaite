<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="descripcion" id="descripcion"  class="form-control @error('descripcion') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese Ventaja</label>
        </div>
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('interest_id') is-invalid @enderror" data-old="{{ old('interest_id') }}" name="interest_id" id="interest_id">
                <option value="">Elija un interes</option>
                @foreach ($interests as $interest)
                    @isset($motivo)     
                        <option  value="{{$interest->id}}" {{$interest->id==$motivo->interest_id ? 'selected':''}}>{{$interest->interest}}</option>     
                    @else
                        <option value="{{ $interest->id }}" {{ old('interest_id') == $interest->id ? 'selected':'' }} >{{ $interest->interest }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="interest">Elija interes</label>
        </div>
        
    </div>
</div> 