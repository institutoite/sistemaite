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
                <a href="#" class="cs-avatar cs-white_bg">
                <img src="fronted/assets/img/avatar/avatar_12.png" alt="Avatar">
                <span>{{$docente->perfil}} </span>
                </a>
                <h3 class="cs-card_title"><a href="#"></a>{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h3>
                <div class="cs-card_price">Fecha Ingreso: <b class="cs-primary_color">03/05/2003</b></div>
                <hr>
                <div class="cs-card_footer">
                {{-- <span class="cs-card_btn_1" data-modal="#history_1">
                    <i class="fas fa-redo fa-fw"></i>
                    View History
                </span> --}}
                <span class="cs-card_btn_2" data-modal="#bid_1"><span>Leer mas...</span></span>
                </div>
            </div>
            </div>
        </div>
    
    @endforeach
@stop




