
    <div class="text-secondary">
        Marque los días que va asistir el Ñiñaco
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input dias" type="checkbox" name="dia[]" id="lunes" value="dias">
        <label class="form-check-label" for="inlineCheckbox1">LUNES</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input dias" type="checkbox" name="dia[]" id="martes" value="dias">
        <label class="form-check-label" for="inlineCheckbox2">MARTES</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input dias" type="checkbox" name="dia[]" id="miercoles" value="dias">
        <label class="form-check-label" for="inlineCheckbox3">MIERCOLES</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input dias" type="checkbox" name="dia[]" id="jueves" value="dias">
        <label class="form-check-label" for="inlineCheckbox1">JUEVES</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input dias" type="checkbox" name="dia[]" id="viernes" value="dias">
        <label class="form-check-label" for="inlineCheckbox2">VIERNES</label>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input type="time" class="form-control hora" name="horainicio" id="horainicio">
                <label for="costo">Hora Inicio</label>    
        </div> 
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            <input type="time" class="form-control hora" name="horafin" id="horafin">
            <label for="costo">Hora Fin</label>    
        </div>   
    </div>
</div>
<hr>

    <input  type="text" name="estudiante_id"  value="{{ $persona->estudiante->id }}" hidden>    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">
            @if($errors->has('modalidad_id'))
                <span class="text-danger"> {{ $errors->first('modalidad_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">    
            @if($errors->has('costo'))
                <span class="text-danger"> {{ $errors->first('costo')}}</span>
            @endif
        </div>  
    </div>

    {{-- $$$$$$$$$$$ CAMPO horainicio  --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('modalidad_id') is-invalid @enderror" data-old="{{ old('modalidad_id') }}" name="modalidad_id" id="modalidad_id">
                    <option value="" > Seleccione Modalidad </option>
                    @foreach ($modalidades as $modalidad)
                        @isset($ultima_inscripcion)     
                            <option  value="{{$modalidad->id}}" {{$modalidad->id==$ultima_inscripcion->modalidad_id ? 'selected':''}}>{{$modalidad->modalidad}}</option>     
                        @else
                            <option value="{{ $modalidad->id }}" {{ old('modalidad_id') == $modalidad->id ? 'selected':'' }} >{{ $modalidad->modalidad }}</option>
                        @endisset 
                    @endforeach
                </select>
                <label for="modalidad_id">Elija modalidad</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO HORA FIN --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input type="numeric" class="form-control @error('costo') is-invalid @enderror" name="costo" id="costo" value="{{old('costo',$ultima_inscripcion->costo ?? '')}}">
                <label for="costo">Ingrese Costo</label>    
            </div>
            
        </div>
    </div>

    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">    
            @if($errors->has('fechaini'))
                <span class="text-danger"> {{ $errors->first('fechaini')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm">
            @if($errors->has('totalhoras'))
                <span class="text-danger"> {{ $errors->first('totalhoras')}}</span>
            @endif
        </div>
        
    </div>

    <div class="row"> 
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                @isset($ultima_inscripcion)
                    <input  type="date" name="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{ old('fechaini', $ultima_inscripcion->fechaini->format('Y-m-d') ?? '')}}">    
                @else
                    <input  type="date" name="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                @endif
                <label for="fechaini">Fecha Inicio</label>  

            </div>    
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input id="totalhoras" type="number" name="totalhoras" class="form-control @error('totalhoras') is-invalid @enderror" value="{{old('totalhoras',$ultima_inscripcion->totalhoras ?? '')}}" placeholder="Total Horas">
                <label for="totalhoras">Ingrese Total Horas</label>  
            </div>    
        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('motivo_id'))
                <span class="text-danger"> {{ $errors->first('motivo_id')}}</span>
            @endif
        </div>
    </div>
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('motivo_id') is-invalid @enderror" data-old="{{ old('motivo_id') }}" name="motivo_id" id="motivo">
                    <option value="" > Seleccione Motivo </option>
                    @foreach ($motivos as $motivo)
                        @isset($ultima_inscripcion)     
                            <option  value="{{$motivo->id}}" {{$motivo->id==$ultima_inscripcion->motivo_id ? 'selected':''}}>{{$motivo->motivo}}</option>     
                        @else
                            <option value="{{ $motivo->id }}" {{ old('motivo_id') == $motivo->id ? 'selected':'' }} >{{ $motivo->motivo }}</option>
                        @endisset 
                    @endforeach
                </select>
                 <label for="motivo">Elija el motivo de las clases</label>  
            </div>    
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('objetivo'))
                <span class="text-danger"> {{ $errors->first('objetivo')}}</span>
            @endif
        </div>
    </div>


 
                <textarea name="objetivo" class="form-control @error('objetivo') is-invalid @enderror" id="objetivo" cols="30" rows="3" row="6" placeholder="Introduce el objetivo de la inscripcion">{{ old('objetivo') ?? $ultima_inscripcion->objetivo ?? '' }}</textarea>
    {{-- <div id="toolbar-container"></div>
    <div id="editor" name="objetivo">

    </div> --}}

    
