<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('asignatura'))
            <span class="text-danger"> {{ $errors->first('asignatura')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="asignatura" id="asignatura"  class="form-control @error('asignatura') is-invalid @enderror" value="{{old('asignatura',$asignatura->asignatura ?? '')}}" autocomplete="off">
            <label for="asignatura">Asignatura</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        @if($errors->has('carrera_id'))
            <span class="text-danger"> {{ $errors->first('carrera_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('carrera_id') is-invalid @enderror" data-old="{{ old('carrera_id') }}" name="carrera_id" id="country">
                <option value="">Elija carrera</option>
                
                @foreach ($carreras as $carrera)
                    @isset($asignatura)     
                        <option  value="{{$carrera->id}}" {{$carrera->id==$asignatura->carrera_id ? 'selected':''}}>{{$carrera->carrera}}</option>     
                    @else
                        <option value="{{ $carrera->id }}" {{ old('carrera') == $carrera->id ? 'selected':'' }} >{{ $carrera->carrera }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="pais">Elija carrera al que pertence esta materia*</label>
        </div>
    </div>
</div>

