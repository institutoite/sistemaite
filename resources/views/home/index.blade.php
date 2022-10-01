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




