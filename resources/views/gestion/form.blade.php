 <div class="row">
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   G R A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="grado_id" id="grado_id">
                {{-- se cargan los opction desde Ajax  presentes.blade--}}
            </select>
            <label for="grado_id">Grado</label>
        </div>  
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   C O L E G I O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="colegio_id" id="colegio_id">
                {{-- se cargan los opction desde Ajax  presentes.blade--}}
            </select>
            <label for="colegio_id">Colegios</label>
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  A N I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
        <div class="form-floating mb-3 text-gray">
            <select class="form-control" name="anio" id="anio">
                {{-- se cargan los opction desde Ajax  presentes.blade--}}
            </select>
            <label for="anio">Año</label>
        </div>    
    </div>
    {{-- %%%%%%%%%%%%%%% C A M P O  ESTUDIANTE ID %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <input type="text" id="persona_id" value="{{$id}}">
</div>