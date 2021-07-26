<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('motivo') }}
            {{ Form::text('motivo', $motivo->motivo, ['class' => 'form-control' . ($errors->has('motivo') ? ' is-invalid' : ''), 'placeholder' => 'Motivo']) }}
            {!! $errors->first('motivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
</div>