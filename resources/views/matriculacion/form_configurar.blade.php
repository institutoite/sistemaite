
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
        
       <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <select class="form-control mb-3" name="docente" id="docente">
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
                <input type="time" class="form-control is-invalid hora" name="horainicio" id="horainicio">
            </div>    
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm" >
            <div class="input-group mb-2" >
                <input type="time" class="form-control is-invalid hora" name="horafin" id="horafin"><i class="fas fa-arrow-circle-right text-success fa-2x"></i>
            </div>    
        </div>

        
    </div>


