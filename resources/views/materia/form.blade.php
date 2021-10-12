<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="materia" id="materia"  class="form-control @error('materia') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Materia</label>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header bg-primary">
        ELIJA LOS NIVELES 
    </div>
    <div class="card-body">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="guarderia" name="niveles[1]">
            <label class="form-check-label" for="guarderia">Guardería</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inicial" name="niveles[2]">
            <label class="form-check-label" for="inicial">Inicial</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="primaria" name="niveles[3]">
            <label class="form-check-label" for="primaria">Primaria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="secundaria" name="niveles[4]">
            <label class="form-check-label" for="secundaria">Secundaria</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="preuniversitario" name="niveles[5]">
            <label class="form-check-label" for="preuniversitario">Pre-Universitario</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="instituto" name="niveles[6]">
            <label class="form-check-label" for="instituto">Instituto</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="universitario" name="niveles[7]">
            <label class="form-check-label" for="universitario">Universitario</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="profesional" name="niveles[8]">
            <label class="form-check-label" for="profesional">Profesional</label>
        </div>
        
    </div>
</div>