    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">    
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('apellidom'))
                <span class="text-danger"> {{ $errors->first('apellidom')}}</span>
            @endif
        </div>
    </div>


    {{-- $$$$$$$$$$$ GRUPO BILLETES BOLIVIANOS --}}
    <div>
        <label for="">BILLETES PAGOS (Bs.)</label> 
        <div class="bg-prymary">

        </div>
    </div>
    <div class="row p-3">
        {{-- $$$$$$$$$$$ GRUPO BILLETES 200 BOLIVIANOS --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" > 
            <div class="input-group" >
                <p class="col-5 form-control bg-primary text-sm p-1" for="">200 Bs.</p> 
                <input  type="number" name="billete200" class="form-control text-sm col-7 @error('billete200') is-invalid @enderror" value="{{old('billete200',$billete->billete200 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO BILLETE BS. 100 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" >
            <div class="input-group" >
                <p class="col-5 form-control bg-primary text-sm p-1" for="">100 Bs.</p> 
                <input  type="number" name="billete100" class="form-control text-sm col-7 @error('billete100') is-invalid @enderror" value="{{old('billete100',$billete->billete100 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 50 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">50 Bs.</p> 
            <input  type="number" name="billete50" class="form-control text-sm col-7 @error('billete50') is-invalid @enderror" value="{{old('billete50',$billete->billete50 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 20 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">20 Bs.</p> 
            <input  type="number" name="billete20" class="form-control text-sm col-7 @error('billete20') is-invalid @enderror" value="{{old('billete20',$billete->billete20 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 10 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">10 Bs.</p> 
            <input  type="number" name="billete10" class="form-control text-sm col-7 @error('billete10') is-invalid @enderror" value="{{old('billete10',$billete->billete10 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
    </div>

    {{-- $$$$$$$$$$$ GRUPO QUINTOS BOLIVIANOS --}}
    <div>
        <label for="">Monedas Quintos (Bs. )</label>
    </div>
    <div class="row p-3">
        {{-- $$$$$$$$$$$ GRUPO BILLETES 200 BOLIVIANOS --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" > 
            <div class="input-group" >
                <p class="col-5 form-control bg-primary p-1" for="">5 Bs.</p> 
                <input  type="number" name="moneda5" class="form-control col-7 @error('moneda5') is-invalid @enderror" value="{{old('moneda5',$billete->moneda5 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO BILLETE BS. 100 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" >
            <div class="input-group" >
                <p class="col-5 form-control bg-primary p-1" for="">2 Bs.</p> 
                <input  type="number" name="moneda2" class="form-control col-7 @error('moneda2') is-invalid @enderror" value="{{old('moneda2',$billete->moneda2 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 50 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">1 Bs.</p> 
            <input  type="number" name="moneda1" class="form-control text-sm col-7 @error('moneda1') is-invalid @enderror" value="{{old('moneda1',$billete->moneda1 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 20 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">0.5 Cv</p> 
            <input  type="number" name="moneda50" class="form-control text-sm col-7 @error('moneda50') is-invalid @enderror" value="{{old('moneda50',$billete->moneda50 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES 20 CENTAVOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-primary text-sm p-1" for="">20 Cv</p> 
            <input  type="number" name="moneda20" class="form-control text-sm col-7 @error('moneda20') is-invalid @enderror" value="{{old('moneda20',$billete->moneda20 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
    </div>
