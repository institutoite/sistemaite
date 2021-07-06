
        
     
     {{-- $$$$$$$$$$$ MONTO --}}
    
    <input type="text" hidden value="{{ $inscripcion->id }}">

    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 input-group text-sm" >
            @if($errors->has('monto'))
                <span class="text-danger"> {{ $errors->first('monto')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" > 
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Monto</p> 
                    <input  type="text" name="monto" id="monto"  class="form-control col-9 @error('monto') is-invalid @enderror" value="{{old('monto',$pago->monto ?? '')}}" placeholder="Ingrese un  monto" autocomplete="off">
                </div>
            </div>
    </div> 

    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 input-group text-sm" >
            @if($errors->has('pagocon'))
                <span class="text-danger"> {{ $errors->first('pagocon')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Pago Con</p> 
                    <input  type="text" name="pagocon" id="pagocon"  class="form-control @error('pagocon') is-invalid @enderror" value="{{old('pagocon',$pago->pagocon ?? '')}}" placeholder="Con cuanto pagó" autocomplete="off">
                </div>    
            </div>
    </div> 


    <div class="row">
        <div class="col-3"></div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 input-group text-sm" >
            @if($errors->has('cambio'))
                <span class="text-danger"> {{ $errors->first('cambio')}}</span>
            @endif
        </div>
    </div>      
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary text-sm p-1" for="">Cambio</p> 
                    <input  type="text" name="cambio" id="cambio"  class="form-control @error('cambio') is-invalid @enderror" value="{{old('cambio',$persona->cambio ?? '')}}" placeholder="Cambio" readonly>
                </div>
            </div>
    </div> 

            {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
           
        
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            
