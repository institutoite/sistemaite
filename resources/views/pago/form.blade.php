
        
     
     {{-- $$$$$$$$$$$ MONTO --}}
    
    <input type="text" hidden value="{{ $inscripcion->id }}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" > 
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Monto</p> 
                    <input  type="text" name="monto" class="form-control col-9 @error('monto') is-invalid @enderror" value="{{old('monto',$pago->monto ?? '')}}" placeholder="Ingrese un  monto">
                </div>
            </div>
            {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Pago Con</p> 
                    <input  type="text" name="pagocon" class="form-control @error('pagocon') is-invalid @enderror" value="{{old('pagocon',$pago->pagocon ?? '')}}" placeholder="Con cuanto pagó">
                </div>    
            </div>
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                <div class="input-group mb-3" >
                    <p class="col-3 form-control bg-secondary text-sm p-1" for="">Cambio</p> 
                    <input  type="text" name="cambio" class="form-control @error('cambio') is-invalid @enderror" value="{{old('cambio',$persona->cambio ?? '')}}" placeholder="Cambio">
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>




{{-- 
        <div class="form-group">
            {{ Form::label('monto') }}
            {{ Form::text('monto', $pago->monto, ['class' => 'form-control' . ($errors->has('monto') ? ' is-invalid' : ''), 'placeholder' => 'Monto']) }}
            {!! $errors->first('monto', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pagocon') }}
            {{ Form::text('pagocon', $pago->pagocon, ['class' => 'form-control' . ($errors->has('pagocon') ? ' is-invalid' : ''), 'placeholder' => 'Pagocon']) }}
            {!! $errors->first('pagocon', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cambio') }}
            {{ Form::text('cambio', $pago->cambio, ['class' => 'form-control' . ($errors->has('cambio') ? ' is-invalid' : ''), 'placeholder' => 'Cambio']) }}
            {!! $errors->first('cambio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pagable_id') }}
            {{ Form::text('pagable_id', $pago->pagable_id, ['class' => 'form-control' . ($errors->has('pagable_id') ? ' is-invalid' : ''), 'placeholder' => 'Pagable Id']) }}
            {!! $errors->first('pagable_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pagable_type') }}
            {{ Form::text('pagable_type', $pago->pagable_type, ['class' => 'form-control' . ($errors->has('pagable_type') ? ' is-invalid' : ''), 'placeholder' => 'Pagable Type']) }}
            {!! $errors->first('pagable_type', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}