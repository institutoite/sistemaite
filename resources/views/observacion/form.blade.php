<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Objetivo') }}
            {{ Form::text('Objetivo', $observacion->Objetivo, ['class' => 'form-control' . ($errors->has('Objetivo') ? ' is-invalid' : ''), 'placeholder' => 'Objetivo']) }}
            {!! $errors->first('Objetivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('activo') }}
            {{ Form::text('activo', $observacion->activo, ['class' => 'form-control' . ($errors->has('activo') ? ' is-invalid' : ''), 'placeholder' => 'Activo']) }}
            {!! $errors->first('activo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inscripcione_id') }}
            {{ Form::text('inscripcione_id', $observacion->inscripcione_id, ['class' => 'form-control' . ($errors->has('inscripcione_id') ? ' is-invalid' : ''), 'placeholder' => 'Inscripcione Id']) }}
            {!! $errors->first('inscripcione_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>