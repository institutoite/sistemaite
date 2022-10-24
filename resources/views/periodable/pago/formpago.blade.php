    <ul id="errores" class="text-danger">

    </ul>

    <input type="text" hidden value="{{ $periodable->id}}">
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
                    <input  type="number" name="monto" id="monto"  class="form-control @error('monto') is-invalid @enderror" value="{{old('monto',$pago->monto ?? '')}}" tocomplete="off">
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
                <input  type="number" name="pagocon" id="pagocon"  class="form-control @error('pagocon') is-invalid @enderror" value="{{old('pagocon',$pago->pagocon ?? '')}}" autocomplete="off">
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
                    <input  type="number" name="cambio" id="cambio"  class="form-control @error('cambio') is-invalid @enderror" value="{{old('cambio',$persona->cambio ?? '')}}"  readonly>
                    <label for="cambio">Cambio(Automático)</label>  
                </div>
            </div>
    </div> 

            
