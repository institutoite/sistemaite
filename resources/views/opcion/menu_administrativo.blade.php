

<div class="card">
    <div class="card-header bg-primary">
        <h3 class="card-title">ADMINISTRATIVO: <strong>{{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom}}</strong></h3>
    </div>
    <div class="card-body">
        <div class="row text-center">
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-green">
                    <i class="fas fa-edit"></i>DATOS
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-fuchsia" href="{{ route('telefonos.persona',$persona)}}">
                    <i class="fas fa-phone"></i> Telefonos
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-fuchsia">
                    <i class="fas fa-pause"></i> Prácticos
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-indigo">
                    <i class="fas fa-save"></i> Pagos
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-pink">
                    <i class="fas fa-save"></i> clases
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-purple">
                    <i class="fas fa-save"></i> Modalidades
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app">
                    <i class="fas fa-save text-teal"></i> Niveles
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-red">
                    <i class="fas fa-save"></i> Observaciones
                </a>
            </div>
            <div class="col-6 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <a class="btn btn-app text-secondary">
                    <i class="fas fa-save"></i> Familiares
                </a>
            </div>
        </div>
    </div>
</div>

