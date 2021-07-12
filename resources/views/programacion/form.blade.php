<div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   F E C H A  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
        <div class="form-floating mb-3 text-gray">
            <input type="date" name='fecha' class="form-control texto-plomo" id="floatingInput" placeholder="fecha" value="{{old('fecha',$programacion->fecha->isoFormat('YYYY-MM-DD') ?? '')}}">
            <label for="fecha">Fecha</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  I N I C I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <input  type="time" name="hora_ini" class="form-control @error('hora_ini') is-invalid @enderror" value="{{old('hora_ini',$programacion->hora_ini->isoFormat('HH:mm') ?? '')}}">
            <label for="hora_ini">Hora inicio</label>
        </div>    
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   H O R A  F I N  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <input  type="time" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="{{old('hora_fin',$programacion->hora_fin->isoFormat('HH:mm') ?? '')}}">
            <label for="hora_fin">Hora fin</label>
        </div>  
    </div>
</div>

<div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   E S T A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
        <div class="form-floating mb-3"> 
            <select class="form-control @error('estado') is-invalid @enderror"  name="estado" id="estado">
                <option value=""> Elija estado</option>
                    @isset($programacion)
                        <option value="PRESENTE" @if($programacion->estado == 'PRESENTE') {{'selected'}} @endif>PRESENTE</option>
                        <option value="FINALIZADO" @if($programacion->estado == 'FINALIZADO') {{'selected'}} @endif>FINALIZADO</option>
                        <option value="INDEFINIDO" @if($programacion->estado == 'INDEFINIDO') {{'selected'}} @endif>INDEFINIDO</option>
                    @else 
                        <option value="PRESENTE" @if(old('habilitado') == 'PRESENTE') {{'selected'}} @endif>PRESENTE</option>
                        <option value="FINALIZADO" @if(old('habilitado') == 'FINALIZADO') {{'selected'}} @endif>FINALIZADO</option>
                        <option value="INDEFINIDO" @if(old('habilitado') == 'INDEFINIDO') {{'selected'}} @endif>INDEFINIDO</option>
                    @endisset
                    
            </select>
            <label for="estado">Elija estado</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  H A B I L I T A D O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('activo') is-invalid @enderror"  name="activo" id="activo">
                    <option value=""> Elija habilitación</option>
                        @isset($programacion)
                            <option value="1" @if($programacion->activo == 1) {{'selected'}} @endif>Pagado</option>
                            <option value="0" @if($programacion->activo == 0) {{'selected'}} @endif>No Pagada</option>
                        @else 
                            <option value="1" @if(old('activo') == 1) {{'selected'}} @endif>Pagada</option>
                            <option value="0" @if(old('activo') == 0) {{'selected'}} @endif>No Pagada</option>
                        @endisset
                        
                </select>
            <label for="activo">Elija estado de pago</label>
        </div>    
    </div>
    
</div>

{{-- %%%%%%%%%%%%%%% C A M P O  I N S C R I P C I O N   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<input  type="text" hidden readonly name="inscripcione_id"  value="{{old('inscripcione_id',$programacion->inscripcione_id ?? '')}}">

<div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   D O C E N T E %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
        <div class="form-floating mb-3">
            <select class="form-control @error('docente_id') is-invalid @enderror" data-old="{{ old('docente_id') }}" name="docente_id" id="docente_id">
                @foreach ($docentes as $docente)
                    @isset($programacion)     
                        <option  value="{{$docente->id}}" {{$docente->id==$programacion->docente_id ? 'selected':''}}>{{$docente->nombre}}</option>     
                    @else
                        <option value="{{ $docente->id }}" {{ old('docente_id') == $docente->id ? 'selected':'' }} >{{ $docente->nombre }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="docente_id">Elija Docente</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  M A T E R I A   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('materia_id') is-invalid @enderror" data-old="{{ old('materia_id') }}" name="materia_id" id="materia_id">
                @foreach ($materias as $materia)
                    @isset($programacion)     
                        <option  value="{{$materia->id}}" {{$materia->id==$programacion->materia_id ? 'selected':''}}>{{$materia->materia}}</option>     
                    @else
                        <option value="{{ $materia->id }}" {{ old('docente_id') == $materia->id ? 'selected':'' }} >{{ $materia->materia }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="materia_id">Elija Materia</label>
        </div>    
    </div>
     {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  A U L A    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('aula_id') is-invalid @enderror" data-old="{{ old('aula_id') }}" name="aula_id" id="aula_id">
                @foreach ($aulas as $aula)
                    @isset($programacion)     
                        <option  value="{{$aula->id}}" {{$aula->id==$programacion->aula_id ? 'selected':''}}>{{$aula->aula}}</option>     
                    @else
                        <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected':'' }} >{{ $aula->aula }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="aula_id">Seleccione Aula</label>
        </div>    
    </div>
</div>
