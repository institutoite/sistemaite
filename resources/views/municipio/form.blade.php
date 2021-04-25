<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $municipio->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('provincia_id') }}
            {{ Form::text('provincia_id', $municipio->provincia_id, ['class' => 'form-control' . ($errors->has('provincia_id') ? ' is-invalid' : ''), 'placeholder' => 'Provincia Id']) }}
            {!! $errors->first('provincia_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>