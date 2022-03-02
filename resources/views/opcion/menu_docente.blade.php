<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">DOCENTE: <strong>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</strong></h3>
    </div>
    <div class="card-body">
        <div class="row text-center">
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app" href="{{route('docentes.gestionar.niveles',$persona)}}">
                    <i class="fa-solid fa-cubes fa-3x text-primary"></i>Niveles
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app" href="{{ route('telefonos.persona',$persona)}}">
                    <i class="fa-solid fa-phone fa-3x text-primary"></i>Teléfonos
                </a>
            </div>
            
        </div>
    </div>
</div>
