    {{-- $$$$$$$$$$$ GRUPO BILLETES BOLIVIANOS --}}
    <div>
        <label for="">BILLETES PAGOS (Bs.)</label>
    </div>
    <div class="row p-3">
        {{-- $$$$$$$$$$$ GRUPO BILLETES 200 BOLIVIANOS --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" > 
            <div class="input-group" >
                <p class="col-5 form-control bg-secondary text-sm p-1" for="">200 Bs.</p> 
                <input  type="number" name="billetecambio200" class="form-control text-sm col-7 @error('billetecambio200') is-invalid @enderror" value="{{old('billetecambio200',$billetecambio->billete200 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO BILLETE BS. 100 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" >
            <div class="input-group" >
                <p class="col-5 form-control bg-secondary text-sm p-1" for="">100 Bs.</p> 
                <input  type="number" name="billetecambio100" class="form-control text-sm col-7 @error('billetecambio100') is-invalid @enderror" value="{{old('billetecambio100',$billetecambio->billete100 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 50 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">50 Bs.</p> 
            <input  type="number" name="billetecambio50" class="form-control text-sm col-7 @error('billetecambio50') is-invalid @enderror" value="{{old('billetecambio50',$billetecambio->billete50 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 20 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">20 Bs.</p> 
            <input  type="number" name="billetecambio20" class="form-control text-sm col-7 @error('billetecambio20') is-invalid @enderror" value="{{old('billetecambio20',$billetecambio->billete20 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 10 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">10 Bs.</p> 
            <input  type="number" name="billetecambio10" class="form-control text-sm col-7 @error('billetecambio10') is-invalid @enderror" value="{{old('billetecambio10',$billetecambio->billete10 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
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
                <p class="col-5 form-control bg-secondary text-sm p-1" for="">5 Bs.</p> 
                <input  type="number" name="monedacambio5" class="form-control text-sm col-7 @error('monedacambio5') is-invalid @enderror" value="{{old('monedacambio5',$billete->moneda5 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO BILLETE BS. 100 --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 input-group text-sm" >
            <div class="input-group" >
                <p class="col-5 form-control bg-secondary text-sm p-1" for="">2 Bs.</p> 
                <input  type="number" name="monedacambio2" class="form-control text-sm col-7 @error('monedacambio2') is-invalid @enderror" value="{{old('monedacambio2',$billete->moneda2 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 50 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">1 Bs.</p> 
            <input  type="number" name="monedacambio1" class="form-control text-sm col-7 @error('monedacambio1') is-invalid @enderror" value="{{old('monedacambio1',$billete->moneda1 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO BILLETES DE BOLIVIANOS 20 %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">50 Cv</p> 
            <input  type="number" name="monedacambio50" class="form-control text-sm col-7 @error('monedacambio50') is-invalid @enderror" value="{{old('monedacambio50',$billete->moneda50 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group" >
            <p class="col-5 form-control bg-secondary text-sm p-1" for="">20 Cv</p> 
            <input  type="number" name="monedacambio20" class="form-control text-sm col-7 @error('monedacambio20') is-invalid @enderror" value="{{old('monedacambio20',$billete->moneda20 ?? '0')}}" min="0" pattern="^[0-9]+" placeholder="0">
            </div>
        </div>
        
    </div>
