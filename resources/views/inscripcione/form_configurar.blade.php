
    <div class="row">
         {{-- %%%%%%%%%%%%%%% CAMPO DIA --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group mb-2" >
                <select class="form-control mb-3" name="dia" id="dia">
                    @foreach ($dias as $dia)
                        <option value="{{$dia->id}}">{{$dia->dia}}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" > 
            <div class="input-group mb-2" >
                <select class="form-control mb-3" name="materia" id="materia">
                    @foreach ($materias as $materia)
                        <option value="{{$materia->id}}">{{$materia->materia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
       <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group mb-2" >
                <select class="form-control mb-3" name="docente" id="docente" data-bs-toggle="tooltip" title="Seleccione docente">
                    @foreach ($docentes as $docente)
                        <option value="{{$docente->id}}">{{$docente->persona->nombre.' '.$docente->persona->apellidop}}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO AULA --}}
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group mb-2" >
                <select class="form-control mb-3" name="aula" id="aula">
                    @foreach ($aulas as $aula)
                        <option value="{{$aula->id}}">{{$aula->aula}}</option>
                    @endforeach
                </select>
            </div>    
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group mb-2" >
                <select class="form-control is-invalid hora" name="horario" id="horario">
                    <option value="">Seleccione horario</option>
                    <option value="07:30|09:00">07:30 - 09:00</option>
                    <option value="09:00|10:30">09:00 - 10:30</option>
                    <option value="10:30|12:00">10:30 - 12:00</option>
                    <option value="14:00|15:30">14:00 - 15:30</option>
                    <option value="15:30|17:00">15:30 - 17:00</option>
                    <option value="17:00|18:30">17:00 - 18:30</option>
                </select>
            </div>    
        </div>

        
    </div>

