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

@section('niveles')
    @php
        $k=100/count($niveles);
        $porcentaje=$k;
    @endphp
    @foreach ($niveles as $nivel)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <a href="{{route('nivel.mostrar',$nivel)}}">
                @if($nivel->id % 2==0)
                    <div class="info-box bg-primary tarjeta">
                @else
                    <div class="info-box bg-secondary tarjeta">
                @endif
                    <span class="info-box-icon"><i class="fas fa-school text-white"></i></span>
                    <div class="info-box-content">
                        <h6><span class="info-box-text text-white">{{$nivel->nivel}}</span></h6>
                        <span class="info-box-number text-white">Vacacional</span>
                        <div class="progress">
                        <div class="progress-bar" style="width:{{$porcentaje}}%"></div>
                        </div>
                        
                        <a href="{{route('nivel.mostrar',$nivel)}}" class="small-box-footer text-white">
                            Mas información <i class="fas fa-arrow-circle-right text-white"></i>
                        </a>
                       
                        
                    </div>
                </div>
            </a>
        </div>
        @php
            $porcentaje=$porcentaje+$k;
        @endphp
    @endforeach
@stop
@section('intereses')
    @foreach ($intereses as $interes)
        
        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 mb-2 tarjeta">
            <a href="{{route('interest.show',$interes)}}">
                <div class="position-relative p-3 bg-gray card-items" > {{-- style="height: 180px" --}}
                    <div class="ribbon-wrapper ribbon-lg text-gray">
                        <div class="ribbon bg-danger">
                            Vacacional
                        </div>
                    </div>
                       <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{$interes->interest}}</h4>
                            <p>{{$interes->descripcion}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div> 
                </div>
            </a>
        </div>
    @endforeach
@stop
@section('carreras')
    @foreach ($carreras as $carrera)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                 <div class="info-box tarjeta">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-number text-secondary">Vacacional</span>
                        <span class="info-box-number">{{$carrera->carrera}}</span>
                    </div>
                </div>
          </div>
       
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


