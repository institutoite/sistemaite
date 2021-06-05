{{-- {{dd($programa->fecha->isoFormat('DD-MM-YYYY'))}} --}}
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <input class="form-control" type="date" name="fecha" value="{{$programa->fecha->isoFormat('YYYY-MM-DD')}}">
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <input class="form-control" type="time" name="horainicio" value="{{$hora_inicio}}">
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <input class="form-control" type="time" name="horafin" value="{{$hora_fin}}">
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <select class="form-control mb-3" name="docente_id" id="docente_id">
            @foreach ($docentes as $docente)
                <option value="{{$docente->id}}" {{($docente->id==$programa->docente_id) ? 'selected':''}} >{{$docente->nombre.' '.$docente->apellidop}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <select class="form-control mb-3" name="materia_id" id="materia_id">
            @foreach ($materias as $materia)
                <option value="{{$materia->id}}" {{($materia->id==$programa->materia_id) ? 'selected':''}} >{{$materia->materia}}</option>
            @endforeach
            
        </select>
    </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" > 
    <div class="input-group mb-2" >
        <select class="form-control mb-3" name="aula_id" id="aula_id">
            @foreach ($aulas as $aula)
                <option value="{{$aula->id}}" {{($aula->id==$programa->aula_id) ? 'selected':''}}>{{$aula->aula}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
