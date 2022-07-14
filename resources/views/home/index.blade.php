@extends('layouts.home')

@section('banner')
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    {{-- <ul class="header-contact">
                        <li>
                            <span></span> --}}
                            {{-- {!!$hometext->banner!!} --}}
                        {{-- </li>
                    </ul> --}}
                    <img src="{{URL::to('/').Storage::url("$hometext->banner")}}" alt=''>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header-right float-right">
                        <div class="header-btn">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=59171039910&text={{$hometext->mensaje}}" class="btn btn-main btn-small">contactenos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@stop




@section('header')
    <section class="banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <div class="banner-content center-heading">
                        <span class="subheading"></span>
                            <h1>{{$hometext->header}}</h1>
                            <a href="https://api.whatsapp.com/send?phone=59171039910&text=Tengo una pregunta" class="btn btn-main"><i class="fa fa-list-ul mr-2"></i>Contactanos </a>  
                            <a href="{{ route('about') }}" class="btn btn-tp ">Leer mas <i class="fa fa-angle-right ml-2"></i></a>  
                    </div>
                </div>
                
            </div> <!-- / .row -->
        </div> <!-- / .container -->
        
    </section>
@stop

@section('heading')
    <div class="row align-items-center justify-content-center border">
        <div class="col-lg-6">
            <div class="section-heading center-heading">
                <span class="subheading"></span>
                <p class="h1">{{$hometext->heading}}</p>
                <p class="text-white h4">{{$hometext->subheading}}</p>
            </div>
        </div>
    </div>
@stop



@section('guarderia')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($guarderias as $guarderia)
                <tr>
                    <td>{{$guarderia->modalidad}}</td>
                    <td>{{$guarderia->cargahoraria}}</td>
                    <td>Bs.{{$guarderia->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('inicial')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($inicials as $inicial)
                <tr>
                    <td>{{$inicial->modalidad}}</td>
                    <td>{{$inicial->cargahoraria}}</td>
                    <td>Bs.{{$inicial->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('primaria')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($primarias as $primaria)
                <tr>
                    <td>{{$primaria->modalidad}}</td>
                    <td>{{$primaria->cargahoraria}}</td>
                    <td>Bs.{{$primaria->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('secundaria')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($secundarias as $secundaria)
                <tr>
                    <td>{{$secundaria->modalidad}}</td>
                    <td>{{$secundaria->cargahoraria}}</td>
                    <td>Bs.{{$secundaria->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('preuniversitario')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($preuniversitarios as $preuniversitario)
                <tr>
                    <td>{{$preuniversitario->modalidad}}</td>
                    <td>{{$preuniversitario->cargahoraria}}</td>
                    <td>Bs.{{$preuniversitario->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('instituto')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($institutos as $instituto)
                <tr>
                    <td>{{$instituto->modalidad}}</td>
                    <td>{{$instituto->cargahoraria}}</td>
                    <td>Bs.{{$instituto->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('profesional')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Modadidad</th>
            <th scope="col">Horas</th>
            <th scope="col">Costo</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($profesionals as $profesional)
                <tr>
                    <td>{{$profesional->modalidad}}</td>
                    <td>{{$profesional->cargahoraria}}</td>
                    <td>Bs.{{$profesional->costo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

@section('schedule')
    @foreach ($homeschedules as $homeschedule)
        <div class="about-text-block">
            <i class="bi bi-calendar"></i>
            <h4>{{$homeschedule->title}}</h4>
            <p>{{$homeschedule->description}}</p>
        </div>
    @endforeach
@stop

@section('feriado')
    <div class="row no-gutters">
        @foreach ($feriados as $feriado)
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-calendar"></i>
                    </div>
                    <div class="feature-text">
                        <h4>{{date('d/m/Y', strtotime($feriado->fecha))}}</h4>
                        <p>{{$feriado->festividad}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('docente')
    @foreach ($docentes as $docente)
        <div class="col-lg-4 col-sm-6">
            <div class="team-block">
                <div class="team-img">
                    <img src="{{ Storage::url($docente->persona->foto) }}" alt="" class="img-fluid">
                </div>
                <div class="team-info">
                    <h4>{{$docente->persona->nombre}} {{$docente->persona->apellidop}}</h4>
                    <p> {{$docente->persona->observacion}} </p>
                </div>
            </div>
        </div>
    @endforeach
@stop




