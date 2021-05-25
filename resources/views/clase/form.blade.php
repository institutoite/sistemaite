<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $clase->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pagado') }}
            {{ Form::text('pagado', $clase->pagado, ['class' => 'form-control' . ($errors->has('pagado') ? ' is-invalid' : ''), 'placeholder' => 'Pagado']) }}
            {!! $errors->first('pagado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $clase->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horainicio') }}
            {{ Form::text('horainicio', $clase->horainicio, ['class' => 'form-control' . ($errors->has('horainicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horainicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horafin') }}
            {{ Form::text('horafin', $clase->horafin, ['class' => 'form-control' . ($errors->has('horafin') ? ' is-invalid' : ''), 'placeholder' => 'Horafin']) }}
            {!! $errors->first('horafin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('docente_id') }}
            {{ Form::text('docente_id', $clase->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'Docente Id']) }}
            {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materia_id') }}
            {{ Form::text('materia_id', $clase->materia_id, ['class' => 'form-control' . ($errors->has('materia_id') ? ' is-invalid' : ''), 'placeholder' => 'Materia Id']) }}
            {!! $errors->first('materia_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aula_id') }}
            {{ Form::text('aula_id', $clase->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : ''), 'placeholder' => 'Aula Id']) }}
            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tema_id') }}
            {{ Form::text('tema_id', $clase->tema_id, ['class' => 'form-control' . ($errors->has('tema_id') ? ' is-invalid' : ''), 'placeholder' => 'Tema Id']) }}
            {!! $errors->first('tema_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('programacion_id') }}
            {{ Form::text('programacion_id', $clase->programacion_id, ['class' => 'form-control' . ($errors->has('programacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Programacion Id']) }}
            {!! $errors->first('programacion_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>