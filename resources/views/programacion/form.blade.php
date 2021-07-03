
<div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   F E C H A  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="Fecha">
            <label for="floatingInput">Fecha</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  I N I C I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3">
            <input  type="time" name="hora_ini" class="form-control @error('hora_ini') is-invalid @enderror" value="{{old('hora_ini',$programacion->horaini ?? '')}}">
            <label for="floatingInput">dfsdfd</label>
        </div>    
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   H O R A  F I N  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3">
            <input  type="time" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="{{old('hora_fin',$programacion->horafin ?? '')}}">
            <label for="floatingInput">dfsdfd</label>
        </div>  
    </div>
</div>

{{ Form::text('estado', $programacion->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
{!! $errors->first('estado', '<div class="invalid-feedback">:message</p>') !!}
{{ Form::text('habilitado', $programacion->habilitado, ['class' => 'form-control' . ($errors->has('habilitado') ? ' is-invalid' : ''), 'placeholder' => 'Habilitado']) }}
                    {!! $errors->first('habilitado', '<div class="invalid-feedback">:message</p>') !!}
{{ Form::date('fecha', $programacion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</p>') !!}

<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('fecha') }}
        </div>

        <div class="form-group">
            {{ Form::label('habilitado') }}
            
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            
        </div>
        <div class="form-group">
            {{ Form::label('hora_ini') }}
            {{ Form::text('hora_ini', $programacion->hora_ini, ['class' => 'form-control' . ($errors->has('hora_ini') ? ' is-invalid' : ''), 'placeholder' => 'Hora Ini']) }}
            {!! $errors->first('hora_ini', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_fin') }}
            {{ Form::text('hora_fin', $programacion->hora_fin, ['class' => 'form-control' . ($errors->has('hora_fin') ? ' is-invalid' : ''), 'placeholder' => 'Hora Fin']) }}
            {!! $errors->first('hora_fin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('docente_id') }}
            {{ Form::text('docente_id', $programacion->docente_id, ['class' => 'form-control' . ($errors->has('docente_id') ? ' is-invalid' : ''), 'placeholder' => 'Docente Id']) }}
            {!! $errors->first('docente_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materia_id') }}
            {{ Form::text('materia_id', $programacion->materia_id, ['class' => 'form-control' . ($errors->has('materia_id') ? ' is-invalid' : ''), 'placeholder' => 'Materia Id']) }}
            {!! $errors->first('materia_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aula_id') }}
            {{ Form::text('aula_id', $programacion->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : ''), 'placeholder' => 'Aula Id']) }}
            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inscripcion_id') }}
            {{ Form::text('inscripcion_id', $programacion->inscripcion_id, ['class' => 'form-control' . ($errors->has('inscripcion_id') ? ' is-invalid' : ''), 'placeholder' => 'Inscripcion Id']) }}
            {!! $errors->first('inscripcion_id', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>