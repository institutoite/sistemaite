@extends('layouts.home')

@section('docente')
    @foreach ($docentes as $docente)
        <div class="cs-slide">
            <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
                <a href="#" class="cs-card_thumb cs-zoom_effect">
                    <img src="{{URL::to('/')}}/storage/{{$docente->persona->foto}}" alt="Image" class="cs-zoom_item">
                </a>
                <div class="cs-card_info">
                    <a href="#" class="cs-avatar cs-white_bg">
                    <span></span>
                    </a>
                    <h3 class="cs-card_title">{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h3>
                    <div class="cs-card_price">{!!$docente->perfil!!}</div>
                    
                </div>
            </div>
        </div><!-- .cs-slide -->
    @endforeach
@stop


@section('convenios')
    @foreach ($convenios as $convenio)
        <div class="col-lg-3 col-sm-6">
            <div class="cs-iconbox cs-style1 cs-white_bg">
            <div class="cs-iconbox_icon">
                <img src="{{URL::to('/')}}/storage/{{$convenio->foto}}" alt="Logo">                                  
            </div>
            <h2 class="cs-iconbox_title">{{$convenio->titulo}}</h2>
            <div class="cs-iconbox_subtitle">{!!$convenio->descripcion!!}</div>
            <a href="{{route('plan', $convenio->id)}}" class="cs-btn cs-style1 cs-btn_lg"><span>Ver detalles</span></a>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
        </div>
        
    @endforeach
@stop


@section('colegios')
    @foreach ($colegios as $colegio)
        <div class="cs-single_moving_item">
            <div class="cs-partner">
            <div class="cs-partner_in cs-center cs-white_bg"><img src="{{URL::to('/')}}/storage/{{$colegio->imagen}}" alt="escudos colegios"></div>
            </div>
        </div>
    @endforeach
@stop





