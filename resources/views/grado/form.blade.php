<div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   G R A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="grado_id" id="grado_id">
                
                @foreach ($grados as $grado)
                    <option value="{{$grado->id}}">{{$grado->grado}}</option>
                @endforeach

            </select>
            <label for="grado_id">Grado</label>
        </div>  
    </div> --}}
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   C O L E G I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="colegio_id" id="colegio_id">
                 @foreach ($colegios as $colegio)
                    <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                @endforeach
            </select>
            <label for="colegio_id">Colegios</label>
        </div>
    </div> --}}
    {{-- %%%%%%%%%%%%%%% C A M P O  A N I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="anio" id="anio">
                @php
                    $anio=Carbon\Carbon::now()->format('Y');
                @endphp
                @for ($i = $anio; $i > $anio-12 ; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <label for="anio">Año</label>
        </div>    
    </div> --}}
    {{-- %%%%%%%%%%%%%%% C A M P O  ESTUDIANTE ID %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    {{-- <input type="text" hidden id="estudiante_id" name="estudiante_id" value="{{$estudiante->id}}"> --}}
</div>
