<div>
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 mt-3 mx-auto">
        <div class="alert alert-{{$color}} border border-primary" role="alert">
            <h4 class="alert-heading text-center">C A L I  F I C A R </h4>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                            @if($errors->has('calificacion'))
                                <span class="text-danger"> {{ $errors->first('calificacion')}}</span>
                            @endif
                    </div>
                </div>
                <div class="text-center">
                    <div class='starrr' id='calificar'></div>
                </div>
                {{$slot}}
                <form action="{{route('calificacion.store')}}" method="post">
                    @csrf
                   
                    <input class="form-control text-shadow-3" type="text" readonly name="calificacion" id="calificacion">
                    <input class="form-control" hidden type="text" name="persona_id" id="persona_id" value="{{$personaid}}">
                    @include('include.botones')
                </form>

                
                    
                    
        </div>
    </div>
</div>