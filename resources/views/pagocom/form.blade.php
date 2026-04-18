
    {{-- $$$$$$$$$$$ MONTO --}}
    <input type="text" hidden value="{{ $matriculacion->id }}">
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('monto'))
                <span class="text-danger"> {{ $errors->first('monto')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
                <div class="form-floating mb-3 text-gray">
                    <input  type="text" name="monto" id="monto"  class="form-control @error('monto') is-invalid @enderror" value="{{old('monto',$pago->monto ?? '')}}" tocomplete="off">
                    <label for="monto">Ingrese Monto que esta pagando</label>  
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('pagocon'))
                <span class="text-danger"> {{ $errors->first('pagocon')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="pagocon" id="pagocon"  class="form-control @error('pagocon') is-invalid @enderror" value="{{old('pagocon',$pago->pagocon ?? '')}}" autocomplete="off">
                <label for="pagocon">Ingrese con cuanto está pagando</label>
            </div>
        </div>
    </div> 


    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('cambio'))
                <span class="text-danger"> {{ $errors->first('cambio')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <input  type="text" name="cambio" id="cambio"  class="form-control @error('cambio') is-invalid @enderror" value="{{old('cambio',$persona->cambio ?? '')}}"  readonly>
                     <label for="cambio">Cambio(Automático)</label>  
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('forma_pago'))
                <span class="text-danger">{{ $errors->first('forma_pago') }}</span>
            @endif
            <div class="card card-outline card-secondary mb-3">
                <div class="card-body py-2">
                    <label class="mb-2 d-block"><strong>Forma de pago (obligatorio)</strong></label>
                    @php
                        $formaPagoActual = old('forma_pago', $pago->forma_pago ?? null);
                    @endphp
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pagocom_forma_pago_efectivo" name="forma_pago" value="EFECTIVO" class="custom-control-input" {{ $formaPagoActual === 'EFECTIVO' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="pagocom_forma_pago_efectivo">Efectivo</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="pagocom_forma_pago_qr" name="forma_pago" value="QR" class="custom-control-input" {{ $formaPagoActual === 'QR' ? 'checked' : '' }} required>
                        <label class="custom-control-label" for="pagocom_forma_pago_qr">QR</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

            
