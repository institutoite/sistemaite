<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            @if($errors->has('materia'))
                <span class="text-danger"> {{ $errors->first('materia')}}</span>
            @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="materia" id="materia"  class="form-control @error('materia') is-invalid @enderror" value="{{old('materia',$materia->materia ?? '')}}" autocomplete="off">
            <label for="pagocon">Materia</label>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            @if($errors->has('niveles'))
                <span class="text-danger"> {{ $errors->first('niveles')}}</span>
            @endif
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary">
        ELIJA LOS NIVELES 
    </div>
    <div class="card-body">

    @isset($nivelesCurrents)
        @foreach ($nivelesCurrents as $nivel)
            <div class="form-check form-switch ">
                <input class="form-check-input" type="checkbox" id="{{ $nivel->nivel }}" name="niveles[{{ $nivel->id}}]" checked>

                <label class="form-check-label" for="{{ $nivel->nivel }}">{{ $nivel->nivel }}</label>
            </div>
        @endforeach
    @endisset        
        @foreach ($nivelesMissings as $nivel)
             <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $nivel->nivel }}" name="niveles[{{ $nivel->id}}]" >
                <label class="form-check-label" for="{{ $nivel->nivel }}">{{ $nivel->nivel }}</label>
            </div>
        @endforeach    
    </div>
</div>