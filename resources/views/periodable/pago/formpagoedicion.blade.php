    <ul id="erroresedicion" class="text-danger">
        <li>dcsfds</li>
        <li>dcsfds</li>
        <li>dcsfds</li>
        <li>dcsfds</li>
    </ul>

    <input type="number" hidden value="{{ $periodable->id}}">
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('montoedicion'))
                <span class="text-danger"> {{ $errors->first('montoedicion')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
                <div class="form-floating mb-3 text-gray">
                    <input  type="number" name="montoedicion" id="montoedicion"  class="form-control @error('montoedicion') is-invalid @enderror" value="{{old('montoedicion',$pago->montoedicion ?? '')}}" tocomplete="off">
                    <label for="montoedicion">Ingrese Montoedicion que esta pagando</label>  
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('pagoconedicion'))
                <span class="text-danger"> {{ $errors->first('pagoconedicion')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="pagoconedicion" id="pagoconedicion"  class="form-control @error('pagoconedicion') is-invalid @enderror" value="{{old('pagoconedicion',$pago->pagoconedicion ?? '')}}" autocomplete="off">
                <label for="pagoconedicion">Ingrese con cuanto está pagando</label>
            </div>
        </div>
    </div> 


    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
            @if($errors->has('cambioedicion'))
                <span class="text-danger"> {{ $errors->first('cambioedicion')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <input  type="text" name="cambioedicion" id="cambioedicion"  class="form-control @error('cambioedicion') is-invalid @enderror" value="{{old('cambioedicion',$persona->cambioedicion ?? '')}}"  readonly>
                    <label for="cambioedicion">Cambio(Automático)</label>  
                </div>
            </div>
    </div> 

    <input type="number" hidden value="" id="pago_idedicion" name="pago_idedicion">

            
