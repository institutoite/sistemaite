<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('motivo') }}
            {{ Form::text('motivo', $licencia->motivo, ['class' => 'form-control' . ($errors->has('motivo') ? ' is-invalid' : ''), 'placeholder' => 'Motivo']) }}
            {!! $errors->first('motivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('solicitante') }}
            {{ Form::text('solicitante', $licencia->solicitante, ['class' => 'form-control' . ($errors->has('solicitante') ? ' is-invalid' : ''), 'placeholder' => 'Solicitante']) }}
            {!! $errors->first('solicitante', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parentesco') }}
            {{ Form::text('parentesco', $licencia->parentesco, ['class' => 'form-control' . ($errors->has('parentesco') ? ' is-invalid' : ''), 'placeholder' => 'Parentesco']) }}
            {!! $errors->first('parentesco', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>