<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="materia" id="materia"  class="form-control @error('materia') is-invalid @enderror" value="{{old('materia',$materia->materia ?? '')}}" autocomplete="off">
            <label for="pagocon">Materia</label>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-primary">
        ELIJA LOS NIVELES 
    </div>
    <div class="card-body">

        @foreach ($nivelesCurrents as $nivel)
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $nivel->nivel }}" checked>
                <label class="form-check-label" for="{{ $nivel->nivel }}">{{ $nivel->nivel }}</label>
            </div>
        @endforeach
        
        @foreach ($nivelesMissings as $nivel)
             <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $nivel->nivel }}" >
                <label class="form-check-label" for="{{ $nivel->nivel }}">{{ $nivel->nivel }}</label>
            </div>
        @endforeach

       
        
    </div>
</div>