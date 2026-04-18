<input type="text" name="inscripcion_id" hidden value="{{ $inscripcion->id }}">
<input type="text" id='pago_id' name="pago_id" hidden value="{{ $pago->id }}">

    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('monto'))
                <span class="text-danger"> {{ $errors->first('monto')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
                <div class="form-floating mb-3 text-gray">
                    <input  type="text" id="monto" name="monto"  class="form-control @error('monto') is-invalid @enderror" value="{{old('monto',$pago->monto ?? '')}}" placeholder="Ingrese un  monto" autocomplete="off">
                    <label for="monto">monto</label>
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('pagocon'))
                <span class="text-danger"> {{ $errors->first('pagocon')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <input  type="text" id="pagocon" name="pagocon"  class="form-control @error('pagocon') is-invalid @enderror" value="{{old('pagocon',$pago->pagocon ?? '')}}" placeholder="Con cuanto pagó" autocomplete="off">
                    <label for="pagocon">pago con</label>
                </div>    
            </div>
    </div> 


    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('cambio'))
                <span class="text-danger"> {{ $errors->first('cambio')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <input  id="cambio" type="text" name="cambio"  class="form-control @error('cambio') is-invalid @enderror" value="{{old('cambio',$pago->cambio ?? '')}}" placeholder="Cambio" readonly>
                    <label for="cambio">Cambio</label>
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('forma_pago'))
                <span class="text-danger">{{ $errors->first('forma_pago') }}</span>
            @endif
            @php
                $formaPagoActual = old('forma_pago', $pago->forma_pago ?? null);
            @endphp
            <label class="mb-2 d-block"><strong>Forma de pago (obligatorio)</strong></label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="edit_forma_pago_efectivo" name="forma_pago" value="EFECTIVO" class="custom-control-input" {{ $formaPagoActual === 'EFECTIVO' ? 'checked' : '' }} required>
                <label class="custom-control-label" for="edit_forma_pago_efectivo">Efectivo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="edit_forma_pago_qr" name="forma_pago" value="QR" class="custom-control-input" {{ $formaPagoActual === 'QR' ? 'checked' : '' }} required>
                <label class="custom-control-label" for="edit_forma_pago_qr">QR</label>
            </div>
        </div>
    </div>
