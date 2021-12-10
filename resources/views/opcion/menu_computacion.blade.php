

<div class="pt-4">
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">OPCIONES COMPUTACION: <strong>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</strong></h3>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                    <a class="btn btn-app text-green" href="{{route('configuracion.gestionar.carreras',$persona->id)}}">
                        <i class="fas fa-edit"></i> Carreras
                    </a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                    <a class="btn btn-app text-green" href="{{route('miscarreras.listar',$persona->computacion)}}">
                        <i class="fas fa-edit"></i> Matricular
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

