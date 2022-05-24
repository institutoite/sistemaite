<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nivel') }}
            {{ Form::text('nivel', $nivel->nivel, ['class' => 'form-control' . ($errors->has('nivel') ? ' is-invalid' : ''), 'placeholder' => 'Nivel']) }}
            {!! $errors->first('nivel', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    
</div>