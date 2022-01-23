
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3">
            <input class="form-control" type="date" name="fecha" value="{{$programacioncom->fecha->isoFormat('YYYY-MM-DD')}}">
            <label for="fecha">Fecha</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3">
            <select class="form-control mb-3" name="docente_id" id="docente_id">
                @foreach ($docentes as $docente)
                <option value="{{$docente->id}}" {{($docente->id==$programacioncom->docente_id) ? 'selected':''}} >{{$docente->nombre.' '.$docente->apellidop}}</option>
                @endforeach
            </select>
            <label for="docente_id">Docente</label>
        </div>
    </div>

    
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3">
            <input class="form-control" type="time" name="horainicio" value="{{$hora_inicio}}">
            <label for="horainicio">Hora Inicio</label>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3">
            <input class="form-control" type="time" name="horafin" value="{{$hora_fin}}">
            <label for="horafin">Hora Fin</label>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3">
            <select class="form-control mb-3" name="aula_id" id="aula_id">
                @foreach ($aulas as $aula)
                <option value="{{$aula->id}}" {{($aula->id==$programacioncom->aula_id) ? 'selected':''}}>{{$aula->aula}}</option>
                @endforeach
            </select>
            <label for="aula_id">Aula</label>
        </div>
    </div>
</div>