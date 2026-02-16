@php
    $idSuffix = $idSuffix ?? '';
    $idSuffixValue = $idSuffix !== '' ? '-' . $idSuffix : '';
@endphp

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <input class="form-control" type="date" name="fecha" id="fecha{{ $idSuffixValue }}" value="{{$programa->fecha->isoFormat('YYYY-MM-DD')}}">
        <label for="fecha{{ $idSuffixValue }}">Fecha</label>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <input class="form-control" type="time" name="horainicio" id="horainicio{{ $idSuffixValue }}" value="{{$hora_inicio}}">
        <label for="horainicio{{ $idSuffixValue }}">Hora Inicio</label>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <input class="form-control" type="time" name="horafin" id="horafin{{ $idSuffixValue }}" value="{{$hora_fin}}">
        <label for="horafin{{ $idSuffixValue }}">Hora Fin</label>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <select class="form-control mb-3" name="docente_id" id="docente_id{{ $idSuffixValue }}">
            @foreach ($docentes as $docente)
                <option value="{{$docente->id}}" {{($docente->id==$programa->docente_id) ? 'selected':''}} >{{$docente->nombre.' '.$docente->apellidop.' '.$docente->id}}</option>
            @endforeach
        </select>
        <label for="docente_id{{ $idSuffixValue }}">Docente</label>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <select class="form-control mb-3" name="materia_id" id="materia_id{{ $idSuffixValue }}">
            @foreach ($materias as $materia)
                <option value="{{$materia->id}}" {{($materia->id==$programa->materia_id) ? 'selected':''}} >{{$materia->materia}}</option>
            @endforeach
            
        </select>
        <label for="materia_id{{ $idSuffixValue }}">Materia</label>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" > 
    <div class="form-floating mb-3">
        <select class="form-control mb-3" name="aula_id" id="aula_id{{ $idSuffixValue }}">
            @foreach ($aulas as $aula)
                <option value="{{$aula->id}}" {{($aula->id==$programa->aula_id) ? 'selected':''}}>{{$aula->aula}}</option>
            @endforeach
        </select>
        <label for="aula_id{{ $idSuffixValue }}">Aula</label>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
    <div class="form-floating mb-3">
        <select class="form-control mb-3" name="tema_id" id="tema_id{{ $idSuffixValue }}" style="width: 100%">
            
        </select>
    </div>
</div>

