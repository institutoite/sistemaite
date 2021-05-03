<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('horainicio') }}
            {{ Form::text('horainicio', $inscripcione->horainicio, ['class' => 'form-control' . ($errors->has('horainicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horainicio', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horafin') }}
            {{ Form::text('horafin', $inscripcione->horafin, ['class' => 'form-control' . ($errors->has('horafin') ? ' is-invalid' : ''), 'placeholder' => 'Horafin']) }}
            {!! $errors->first('horafin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaini') }}
            {{ Form::text('fechaini', $inscripcione->fechaini, ['class' => 'form-control' . ($errors->has('fechaini') ? ' is-invalid' : ''), 'placeholder' => 'Fechaini']) }}
            {!! $errors->first('fechaini', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('totalhoras') }}
            {{ Form::text('totalhoras', $inscripcione->totalhoras, ['class' => 'form-control' . ($errors->has('totalhoras') ? ' is-invalid' : ''), 'placeholder' => 'Totalhoras']) }}
            {!! $errors->first('totalhoras', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horasxclase') }}
            {{ Form::text('horasxclase', $inscripcione->horasxclase, ['class' => 'form-control' . ($errors->has('horasxclase') ? ' is-invalid' : ''), 'placeholder' => 'Horasxclase']) }}
            {!! $errors->first('horasxclase', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('objetivo') }}
            {{ Form::text('objetivo', $inscripcione->Objetivo, ['class' => 'form-control' . ($errors->has('Objetivo') ? ' is-invalid' : ''), 'placeholder' => 'Objetivo']) }}
            {!! $errors->first('Objetivo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lunes') }}
            {{ Form::checkbox('lunes', $inscripcione->lunes, ['class' => 'form-control' . ($errors->has('lunes') ? ' is-invalid' : ''), 'placeholder' => 'Lunes']) }}
            {!! $errors->first('lunes', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('martes') }}
            {{ Form::checkbox('martes', $inscripcione->martes, ['class' => 'form-control' . ($errors->has('martes') ? ' is-invalid' : ''), 'placeholder' => 'Martes']) }}
            {!! $errors->first('martes', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('miercoles') }}
            {{ Form::checkbox('miercoles', $inscripcione->miercoles, ['class' => 'form-control' . ($errors->has('miercoles') ? ' is-invalid' : ''), 'placeholder' => 'Miercoles']) }}
            {!! $errors->first('miercoles', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jueves') }}
            {{ Form::checkbox('jueves', $inscripcione->jueves, ['class' => 'form-control' . ($errors->has('jueves') ? ' is-invalid' : ''), 'placeholder' => 'Jueves']) }}
            {!! $errors->first('jueves', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('viernes') }}
            {{ Form::checkbox('viernes', $inscripcione->viernes, ['class' => 'form-control' . ($errors->has('viernes') ? ' is-invalid' : ''), 'placeholder' => 'Viernes']) }}
            {!! $errors->first('viernes', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sabado') }}
            {{ Form::checkbox('sabado', $inscripcione->sabado, ['class' => 'form-control' . ($errors->has('sabado') ? ' is-invalid' : ''), 'placeholder' => 'Sabado']) }}
            {!! $errors->first('sabado', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estudiante_id') }}
            {{ Form::text('estudiante_id', $inscripcione->estudiante_id, ['class' => 'form-control' . ($errors->has('estudiante_id') ? ' is-invalid' : ''), 'placeholder' => 'Estudiante Id']) }}
            {!! $errors->first('estudiante_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modalidad_id') }}
            {{ Form::text('modalidad_id', $inscripcione->modalidad_id, ['class' => 'form-control' . ($errors->has('modalidad_id') ? ' is-invalid' : ''), 'placeholder' => 'Modalidad Id']) }}
            {!! $errors->first('modalidad_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>