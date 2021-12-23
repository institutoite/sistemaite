{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <input  type="text" hidden name="computacion_id" value="{{old('computacion_id',$computacion->id ?? '')}}">

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @isset($persona)
                <div class="form-floating mb-3 text-gray">
                    <input  type="date" name="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{old('fechaini',$matriculacion->fechaini->format('Y-m-d') ?? '')}}">
                    <label for="fechaini">fechainicio</label>
                </div>
            @else
                <div class="form-floating mb-3 text-gray">
                    <input  type="date" name="fechaini" class="form-control @error('fechaini') is-invalid @enderror" value="{{old('fechaini' ?? '16-11-2021')}}">
                    <label for="fechaini">fechaini</label>
                </div>
            @endisset
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input type="numeric" class="form-control @error('costo') is-invalid @enderror" name="costo" id="costo" value="{{old('costo',$matriculacion->costo ?? '250')}}">
                <label for="costo">Ingrese Costo</label>    
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input id="totalhoras" type="number" name="totalhoras" class="form-control @error('totalhoras') is-invalid @enderror" value="{{old('totalhoras',$matriculacion->totalhoras ?? '15')}}">
                <label for="totalhoras">Ingrese Total Horas</label>  
            </div> 
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @error('fechaini') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @error('costo') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                @error('totalhoras') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('asignatura_id') is-invalid @enderror" data-old="{{ old('asignatura_id') }}" name="asignatura_id" id="country">
                    @foreach ($asignaturasFaltantes as $asignatura)
                        @isset($matriculacion)     
                            <option  value="{{$asignatura->id}}" {{$asignatura->id==$matriculacion->asignatura_id ? 'selected':''}}>{{$asignatura->asignatura}}</option>     
                        @else
                            <option value="{{ $asignatura->id }}" {{ old('carrera_id') == $asignatura->id ? 'selected':'' }} >{{ $asignatura->asignatura }}</option>
                        @endisset 
                    @endforeach
                </select>
                <label for="pais">Elija pais*</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                <div class="form-floating mb-3 text-gray">
                    @error('asignatura_id') <span class="text-danger">{{$message}}</span> @enderror
                </div>
            </div>
        </div>
    </div>
