<div>
    <div class="col-12 mt-3">
        <div class="alert alert-{{$color}} border border-primary" role="alert">
            <h4 class="alert-heading text-center">C A L I  F I C A R </h4>
                <div class="text-center">
                    <div class='starrr' id='calificar'></div>
                </div>
                <form action="{{route('calificacion.store')}}" method="post">
                    @csrf
                    <textarea class="form-control" placeholder="Escribe aquí un comentario..." name="comentario" id="comentario" cols="30" rows="2"></textarea>
                    <input class="form-control" hidden type="text" name="calificacion" id="calificacion">
                    @include('include.botones')
                </form>
            
        </div>
    </div>
    

</div>