<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->lunes==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h1 class="card-title"><strong>LUNES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Desea bienvenida, deale lo mejor y recuerdale de siempre hacer preguntas cuando dude.
                    </div>
                </div>
            @else 
                 <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>LUNES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>

            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->martes==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h3 class="card-title"><strong>MARTES</strong></h3>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Indicale que puede vistarnos en internet tanto en facebook, youtube, whatsapp, telegram
                    </div>
                </div>
            @else 
                 <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>MARTES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->miercoles==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h3 class="card-title"><strong>MIERCOLES</strong></h3>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Indicale que puede vistarnos en internet tanto en facebook, youtube, whatsapp, telegram
                    </div>
                </div>
            @else 
                 <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>MIERCOLES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->jueves==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h1 class="card-title"><strong>JUEVES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Desea bienvenida, deale lo mejor y recuerdale de siempre hacer preguntas cuando dude.
                    </div>
                </div>
            @else 
                 <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>JUEVES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>

            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->viernes==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h3 class="card-title"><strong>VIERNES</strong></h3>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Indicale que puede vistarnos en internet tanto en facebook, youtube, whatsapp, telegram
                    </div>
                </div>
            @else 
                <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>VIERNES</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if ($inscripcion->sabado==1)
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h3 class="card-title"><strong>SABADO</strong></h3>
                        <div class="card-tools">
                        <span class="badge badge-primary">OK</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <select class="form-control mb-3" name="materia[]" id="">
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->materia}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-3" name="aula[]" id="">
                            @foreach ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->aula}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mb-3" name="docente[]" id="">
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer text-center">
                        Indicale que puede vistarnos en internet tanto en facebook, youtube, whatsapp, telegram
                    </div>
                </div>
            @else 
                <div class="card border border-3 border-danger">
                    <div class="card-header text-center">
                        <h1 class="card-title text-danger"><strong>SABADO</strong></h1>
                        <div class="card-tools">
                        <span class="badge badge-danger">No</span>
                        </div>
                    </div>

                    <div class="card-body text-danger">
                        Indicale si tiene necesidad, este día tambien puede venir.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="box-footer text-center">
        <button type="submit" class="btn btn-primary">Guardar Configuración</button>
    </div>
