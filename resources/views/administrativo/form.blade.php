    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('fechaingreso'))
                <span class="text-danger"> {{ $errors->first('fechaingreso')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('diasprueba'))
                <span class="text-danger"> {{ $errors->first('diasprueba')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('sueldo'))
                <span class="text-danger"> {{ $errors->first('sueldo')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @isset($administrativo)
                    <input  type="date" name="fechaingreso" class="form-control @error('fechaingreso') is-invalid @enderror" value="{{old('fechaingreso',$administrativo->fechaingreso->format('Y-m-d') ?? '')}}">
                @else
                    <input  type="date" name="fechaingreso" class="form-control @error('fechaingreso') is-invalid @enderror" value="{{old('fechaingreso')}}">
                @endisset
                <label for="fechaingreso">Fecha Ingreso</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="diasprueba" class="form-control @error('diasprueba') is-invalid @enderror" value="{{old('diasprueba',$administrativo->diasprueba ?? '12')}}">
                <label for="diasprueba">Días prueba</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" name="sueldo" class="form-control @error('sueldo') is-invalid @enderror" value="{{old('sueldo',$administrativo->sueldo ?? '2000')}}">
                <label for="sueldo">Sueldo</label>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('estado_id'))
                <span class="text-danger"> {{ $errors->first('estado_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @if($errors->has('cargo_id'))
                <span class="text-danger"> {{ $errors->first('cargo_id')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('estado_id') is-invalid @enderror" data-old="{{ old('estado_id') }}" name="estado_id" id="estado_id">
                    <option value="" >Seleccione Estado</option>
                    @foreach ($estados as $estado)
                        @isset($administrativo)     
                            <option  value="{{$estado->id}}" {{$estado->id==$administrativo->estado_id ? 'selected':''}}>{{$estado->estado}}</option>     
                        @else
                            <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected':'' }} >{{ $estado->estado }}</option>
                        @endisset 
                    @endforeach
                </select>
            <label for="estado_id">Estado</label>
            </div>
        </div>
        <!-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('cargo_id') is-invalid @enderror" data-old="{{ old('cargo_id') }}" name="cargo_id" id="cargo_id">
                    <option value="" >Seleccione Cargo</option>
                    @foreach ($cargos as $cargo)
                        @isset($administrativo)     
                            <option  value="{{$cargo->id}}" {{$cargo->id==$administrativo->cargo_id ? 'selected':''}}>{{$cargo->cargo}}</option>     
                        @else
                            <option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected':'' }} >{{ $cargo->cargo }}</option>
                        @endisset 
                    @endforeach
                </select>
            <label for="cargo_id">Cargo</label>
            </div>
        </div>
    </div>

    @isset($persona)
    <input  type="number" name="persona_id"  value="{{$persona->id}}">
    @endisset