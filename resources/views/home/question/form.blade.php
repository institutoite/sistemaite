<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="question" id="question"  class="form-control @error('question') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese pregunta</label>
        </div>
        <div class="form-floating mb-3 text-gray">
            <input  type="text" name="answer" id="answer"  class="form-control @error('answer') is-invalid @enderror" value="" autocomplete="off">
            <label for="pagocon">Ingrese respuesta</label>
        </div>
    </div>
</div> 