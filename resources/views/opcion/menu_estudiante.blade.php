@if ($grados->last()!=null)
    @if ($grados->last()->pivot->anio==Carbon\Carbon::now()->isoFormat('Y'))
        <div class="pt-4">
            <div class="card">
                <div class="card-header bg-primary">
                    Estudiante
                </div>
                <div class="card-body">
                    <a class="btn btn-app elevation-1">
                        <i class="fas fa-edit "></i> Edit
                    </a>
                    <a class="btn btn-app elevation-1">
                        <i class="fas fa-play"></i> Play
                    </a>
                    <a class="btn btn-app elevation-1">
                        <i class="fas fa-pause"></i> Pause
                    </a>
                    <a class="btn btn-app elevation-1">
                        <i class="fas fa-save"></i> Save
                    </a>
                    <a class="btn btn-app elevation-1">
                        <i class="fas fa-save"></i> Save
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary">
                    Opciones
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-3">
                            <a href="{{route('listar_inscripciones',$persona)}}">
                            <div class="info-box elevation-1">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-baby"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-number">Inscripciones</span>
                                    <span class="info-box-number">
                                    <small>Inscripciones</small>
                                    </span>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                        <div class="col-6 col-sm-6 col-md-3">
                                <a href="{{route('tus.inscripciones',$persona->estudiante->id)}}">
                                <div class="info-box">
                                    <span class="info-box-icon bg-secondary elevation-1"><i class="fab fa-amilia"></i></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text"> Pagos </span>
                                        <span class="info-box-number">10 
                                            <small>%</small>
                                        </span>
                                    </div>
                                    </div>
                                </a>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <a href="{{route('personas.index')}}">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Asistencia</span>
                                    <span class="info-box-number"> 10
                                        <small>%</small>
                                    </span>
                                </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-3">
                            <a href="{{route('personas.index')}}">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-school"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Practicos</span>
                                    <span class="info-box-number"> 10
                                        <small>%</small>
                                    </span>
                                </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-3">
                            <a href="{{route('telefonos.persona',$persona)}}">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-hand-holding-usd"></i></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Teléfonos</span>
                                    <span class="info-box-number"> Gestionar
                                    </span>
                                </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @else
    <ul>
        @foreach ($grados as $grado)
            
        @endforeach
    </ul>
    @endif
@else
    Aqui registrar grado e intentar actualizar telefonos 
    {{dd($grados)}}
@endif









