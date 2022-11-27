    
    <input  type="text" name="estudiante_id"  value="{{ $persona->estudiante->id }}" hidden>    

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-sm">
            @if($errors->has('modalidad_id'))
                <span class="text-danger"> {{ $errors->first('modalidad_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-sm">    
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
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-sm">    
            @if($errors->has('fechaini'))
                <span class="text-danger"> {{ $errors->first('fechaini')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-sm">
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
                    <input  type="date" name="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{ old('fechaini' ?? '')}}">
                @endif
                <label for="fechaini">Fecha Inicio</label>  

            </div>    
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <input id="totalhoras" type="number" step="any" name="totalhoras" class="form-control @error('totalhoras') is-invalid @enderror" value="{{old('totalhoras',$ultima_inscripcion->totalhoras ?? '')}}" placeholder="Total Horas">
                <label for="totalhoras">Ingrese Total Horas</label>  
            </div>    
        </div>
    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
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

    @isset($editando)
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if($errors->has('estado_id'))
                    <span class="text-danger"> {{ $errors->first('estado_id')}}</span>
                @endif
            </div>
        </div>
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <select class="form-control @error('estado_id') is-invalid @enderror" data-old="{{ old('estado_id') }}" name="estado_id" id="estado_id">
                        <option value="" > Seleccione Estado </option>
                        @foreach ($estados as $estado)
                            @isset($ultima_inscripcion)     
                                <option  value="{{$estado->id}}" {{$estado->id==$ultima_inscripcion->estado_id ? 'selected':''}}>{{$estado->estado}}</option>     
                            @else
                                <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected':'' }} >{{ $estado->estado }}</option>
                            @endisset 
                        @endforeach
                    </select>
                    <label for="motivo">Elija un estado</label>  
                </div>    
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                @if($errors->has('condonado'))
                    <span class="text-danger"> {{ $errors->first('condonado')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <select class="form-control @error('condonado') is-invalid @enderror" name="condonado" id="condonado">
                        <option value=""> Elija tipo condonacion</option>
                            @if(isset($ultima_inscripcion->condonado))
                                @if($ultima_inscripcion->condonado==0)
                                    <option value="{{ $ultima_inscripcion->condonado }}" {{ 0==$ultima_inscripcion->condonado ? 'selected':''}} >No condonar</option>
                                    <option value="1">Condonar</option>
                                @else
                                    <option value="{{$ultima_inscripcion->condonado }}" {{ 1==$ultima_inscripcion->condonado ? 'selected':''}} > Condonar </option>
                                    <option value="0">No condonar</option>
                                @endif
                            @else  
                                <option value="MUJER" @if(old('condonado') == 'MUJER') {{'selected'}} @endif>MUJER</option>
                                <option value="HOMBRE" @if(old('condonado') == 'HOMBRE') {{'selected'}} @endif>HOMBRE</option>
                            @endif 
                    </select>
                    <label for="condonado">Elija condonado*</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                @if($errors->has('vigente'))
                    <span class="text-danger"> {{ $errors->first('vigente')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                <div class="form-floating mb-3 text-gray">
                    <select class="form-control @error('vigente') is-invalid @enderror" name="vigente" id="vigente">
                        <option value=""> Elija tipo de vigencia</option>
                            @if(isset($ultima_inscripcion->vigente))
                                @if($ultima_inscripcion->vigente==0)
                                    <option value="{{ $ultima_inscripcion->vigente }}" {{ 0==$ultima_inscripcion->vigente ? 'selected':''}} >Desvigente</option>
                                    <option value="1">Vigente</option>
                                @else
                                    <option value="{{$ultima_inscripcion->vigente }}" {{ 1==$ultima_inscripcion->vigente ? 'selected':''}} > Vigente </option>
                                    <option value="0">Desvigente</option>
                                @endif
                            @else  
                                <option value="1" @if(old('vigente') == '1') {{'selected'}} @endif>Vigente</option>
                                <option value="0" @if(old('vigente') == '0') {{'selected'}} @endif>Desvigente</option>
                            @endif 
                    </select>
                    <label for="vigente">Elija Vigencia*</label>
                </div>
            </div>
        </div>
    @endisset

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @if($errors->has('objetivo'))
                <span class="text-danger"> {{ $errors->first('objetivo')}}</span>
            @endif
        </div>
    </div>


 
    <textarea name="objetivo" class="form-control @error('objetivo') is-invalid @enderror" id="objetivo" cols="30" rows="3" row="6" placeholder="Introduce el objetivo de la inscripcion">{{ old('objetivo') ?? $ultima_inscripcion->objetivo ?? '' }}</textarea>
   
