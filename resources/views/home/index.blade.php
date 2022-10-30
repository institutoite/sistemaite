@extends('layouts.home')

@section('docentes')
    @foreach ($docentes as $docente)
        {{-- <div class=""> --}}
        <div class="cs-slide">
            <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
                <a href="#" class="cs-card_thumb cs-zoom_effect">
                    <img src="{{URL::to('/')}}/storage/{{$docente->persona->foto}}" alt="Image" class="cs-zoom_item">
                </a>
                <div class="cs-card_info">
                    <h3 class="cs-card_title">{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h3>
                    <div class="cs-card_price">{!!$docente->perfil!!}</div>
                </div>
            </div>
        </div><!-- .cs-slide -->
    @endforeach
@stop


@section('convenios')
    @foreach ($convenios as $convenio)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mb-2">
            <div class="card text-blue p-2 card-items tarjeta">
                <img class="card-img-top img-fluid img-thumbnail" src="{{URL::to('/')."/storage/".$convenio->foto}}" alt="">
                <div class="card-body">
                <h5 class="card-title text-secondary">{{$convenio->titulo}}</h5>
                <p class="card-text">{!!$convenio->descripcion!!}</p>
                </div>
                <div class="card-footer text-center">
                    {{-- <a class="btn form-inline btn-outline-primary boton-line-turqueza" href="{{route('plans.convenio',$convenio)}}"> &nbsp;&nbsp;Planes&nbsp;&nbsp; </a> --}}
                    <a class="btn form-inline btn-outline-primary boton-line-turqueza" target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Quiero%20mas%20información%20del%20sobre%20*{{$convenio->titulo}}*"> Mas info </a>
                </div>
            </div>
        </div> 
    @endforeach
@stop


@section('intereses')
    @foreach ($intereses as $interes)
        <div class="cs-single_moving_item tarjeta">
            <div class="cs-partner">
            {{-- <div class=""> --}}
                <div class="cs-partner_in cs-center cs-white_bg" alt="intereses"></div>
                    <div class="card">
                        <div class="card-header text-center">
                            &nbsp;&nbsp;<h1 class="text-primary">{{$interes->interest}}</h1>&nbsp;&nbsp;
                        </div>
                        <div class="card-body text-secondary">
                            <p>{!!$interes->descripcion!!}</p>
                        </div>
                        <div class="card-footer text-center">
                        <a class="btn form-inline btn-outline-primary boton-line-turqueza" target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text=Quiero%20mas%20información%20del%20sobre%20*{{$interes->intereset}}*"> Mas info </a>    
                        </div>
                    </div>
            </div>
        </div>
    @endforeach
@stop


@section('horarios')
    @foreach ($horarios as $horario)
        <div class="col-xl-3 col-lg-4">
        <a href="#" class="cs-text_box cs-style1 cs-box_shadow text-center cs-white_bg">
          <h3>{{$horario->title}}</h3>
          <p class="text-white">{{$horario->description}}</p>
        </a>
        <div class="cs-height_30 cs-height_lg_30"></div>
      </div>
    @endforeach
@stop


