<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="carrera" id="carrera"  class="form-control @error('carrera') is-invalid @enderror" value="{{old('carrera',$carrera->carrera ?? '')}}" autocomplete="off">
            <label for="carrera">Carrera</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <textarea placeholder="Ingrese una descripcion del archivo que va subir maximimo 2000 caracteres"  name="description" id="description" class="form-control @error('description') is-invalid @enderror" >{{old('description',$carrera->description ?? '')}}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="number" name="precio" id="precio"  class="form-control @error('precio') is-invalid @enderror" value="{{old('precio',$carrera->precio ?? '')}}" autocomplete="off">
            <label for="precio">Precio</label>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('carrera_id') is-invalid @enderror" data-old="{{ old('carrera_id') }}" name="carrera_id" id="country">
                <option value="1">Elija docente</option>
                
                @foreach ($docentes as $docente)
                    @isset($docente)     
                        <option  value="{{$docente->persona->id}}" {{$docente->persona->id==$docente->persona->docente_id ? 'selected':''}}>{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</option>     
                    @else
                        <option value="{{ $docente->persona->id }}" {{ old('docente') == $docente->persona->id ? 'selected':'' }} >{{ $docente->persona->nombre }} {{$docente->persona->apellidop}}</option>
                    @endisset 
                @endforeach
            </select>
            <label for="pais">Elija docente al que pertence esta materia*</label>
        </div>
    </div>
</div> --}}

