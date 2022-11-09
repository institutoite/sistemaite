{{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   G R A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('grado_id'))
            <span class="text-danger"> {{ $errors->first('grado_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('grado_id') is-invalid @enderror" style="width:100%" name="grado_id" id="grado_id">
                <option value="">Seleccion Grado</option>
                @foreach ($grados as $grado)
                    <option value="{{$grado->id}}">{{$grado->grado}}</option>
                @endforeach
            </select>
            {{-- <label for="grado_id">Grado</label> --}}
        </div>  
    </div>
</div> 

    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   C O L E G I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('colegio_id'))
            <span class="text-danger"> {{ $errors->first('colegio_id')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" > 
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('colegio_id') is-invalid @enderror" style="width:100%" name="colegio_id" id="colegio_id">
                <option value="">Seleccione Colegio</option>
                @foreach ($colegios as $colegio)
                <option value="{{$colegio->id}}">{{$colegio->nombre."-".$colegio->rue."-".$colegio->direccion."-".$colegio->nivel}}</option>
                @endforeach
            </select>
            {{-- <label for="colegio_id">Colegios</label> --}}
        </div>
    </div>
</div>

    {{-- %%%%%%%%%%%%%%% C A M P O  A N I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @if($errors->has('anio'))
            <span class="text-danger"> {{ $errors->first('anio')}}</span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control @error('anio') is-invalid @enderror" style="width:100%" name="anio" id="anio">
                <option value="">Seleccione Año</option>
                @php
                    $anio=Carbon\Carbon::now()->format('Y');
                @endphp
                @for ($i = $anio; $i > $anio-12 ; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            {{-- <label for="anio">Año</label> --}}
        </div>    
    </div>
</div>
    {{-- %%%%%%%%%%%%%%% C A M P O  ESTUDIANTE ID %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <input type="text" hidden id="estudiante_id" name="estudiante_id" value="{{$estudiante->id}}">

