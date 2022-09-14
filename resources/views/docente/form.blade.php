

    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('nombrecorto'))
                <span class="text-danger"> {{ $errors->first('nombrecorto')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('fecha_inicio'))
                <span class="text-danger"> {{ $errors->first('fecha_inicio')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('dias_prueba'))
                <span class="text-danger"> {{ $errors->first('dias_prueba')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                @isset($docente)
                    <input  type="text" name="nombrecorto" class="form-control @error('nombrecorto') is-invalid @enderror" value="{{old('nombrecorto',$docente->nombrecorto ?? '')}}">
                @else
                    <input  type="text" name="nombrecorto" class="form-control @error('nombrecorto') is-invalid @enderror" value="{{old('nombrecorto')}}">
                @endisset
                <label for="nombrecorto">nombre corto</label>
            </div>
        </div>

        <!-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @isset($docente)
                    <input  type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{old('fecha_inicio',$docente->fecha_inicio->format('Y-m-d') ?? '')}}">
                @else
                    <input  type="date" name="fecha_inicio" class="form-control @error('fecha_inicio') is-invalid @enderror" value="{{old('fecha_inicio')}}">
                @endisset
                <label for="fecha_inicio">Fecha Ingreso</label>
            </div>    
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <input  type="number" name="dias_prueba" class="form-control @error('dias_prueba') is-invalid @enderror" value="{{old('dias_prueba',$docente->dias_prueba ?? '')}}">
            <label for="dias_prueba">días prueba</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('sueldo'))
                <span class="text-danger"> {{ $errors->first('sueldo')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('mododocente_id'))
                <span class="text-danger"> {{ $errors->first('mododocente_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('estado_id'))
                <span class="text-danger"> {{ $errors->first('estado_id')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="sueldo" class="form-control @error('sueldo') is-invalid @enderror" value="{{old('sueldo',$docente->sueldo ?? '')}}">
                <label for="sueldo">Sueldo</label>
            </div>
        </div>

        <!-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('mododocente_id') is-invalid @enderror" data-old="{{ old('mododocente_id') }}" name="mododocente_id" id="mododocente_id">
                    <option value="" >Seleccione Modo</option>
                    @foreach ($mododocentes as $modo)
                        @isset($docente)     
                            <option  value="{{$modo->id}}" {{$modo->id==$docente->mododocente_id ? 'selected':''}}>{{$modo->mododocente}}</option>     
                        @else
                            <option value="{{ $modo->id }}" {{ old('mododocente_id') == $modo->id ? 'selected':'' }} >{{ $modo->mododocente }}</option>
                        @endisset 
                    @endforeach
                </select>
                <label for="mododocente">Mododocente</label>
            </div>    
        </div>
        <!-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('estado_id') is-invalid @enderror" data-old="{{ old('estado_id') }}" name="estado_id" id="estado_id">
                    <option value="" >Seleccione Estado</option>
                    @foreach ($estados as $estado)
                        @isset($docente)     
                            <option  value="{{$estado->id}}" {{$estado->id==$docente->estado_id ? 'selected':''}}>{{$estado->estado}}</option>     
                        @else
                            <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected':'' }} >{{ $estado->estado }}</option>
                        @endisset 
                    @endforeach
                </select>
            <label for="estado_id">Estado</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                @if($errors->has('perfil'))
                    <span class="text-danger"> {{ $errors->first('perfil')}}</span>
                @endif
        </div>
    </div>
    
    <textarea placeholder="Ingrese perfil del profesor"  name="perfil" id="perfil" class="form-control @error('perfil') is-invalid @enderror" >{{old('perfil',$docente->perfil ?? '')}}</textarea>
    




