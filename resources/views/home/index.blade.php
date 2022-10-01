@extends('layouts.home')

@section('docente')
    @foreach ($docentes as $docente)
        <div class="cs-slide">
            <div class="cs-card cs-style4 cs-box_shadow cs-white_bg">
            {{-- <span class="cs-card_like cs-primary_color">
                <i class="fas fa-heart fa-fw"></i> 
                2.1K
            </span> --}}
            <a href="#" class="cs-card_thumb cs-zoom_effect">
                <img src="{{URL::to('/')}}/storage/{{$docente->persona->foto}}" alt="Image" class="cs-zoom_item">
            </a>
            <div class="cs-card_info">
                <h3 class="cs-card_title"><a href="#"></a>{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h3>
                <div class="cs-card_price">{{$docente->perfil}}</div>
                <hr>
                <div class="cs-card_footer">
                
                </div>
            </div>
            </div>
        </div>
    
    @endforeach
@stop




