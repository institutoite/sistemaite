<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="nombre" id="nombre"  class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$nombre->nombre ?? '')}}" autocomplete="off">
            <label for="nombre">Meta</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('carrera_id') is-invalid @enderror" data-old="{{ old('carrera_id') }}" name="carrera_id" id="country">
                <option value="1">Elija carrera</option>
                
                @foreach ($carreras as $carrera)
                    @isset($meta)     
                        <option  value="{{$carrera->id}}" {{$carrera->id==$meta->carrera_id ? 'selected':''}}>{{$carrera->carrera}}</option>     
                    @else
                        <option value="{{ $carrera->id }}" {{ old('carrera') == $carrera->id ? 'selected':'' }} >{{ $carrera->carrera }}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="pais">Elija carrera al que pertence esta materia*</label>
        </div>
    </div>
</div>

