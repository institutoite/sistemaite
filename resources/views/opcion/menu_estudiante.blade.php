
@if ($grados->first()!=null)
    @if ($grados->first()->pivot->anio==Carbon\Carbon::now()->isoFormat('Y'))
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
        <div class="timeline">
            <!-- timeline item -->
            <div>
                <i class="fas fa-plus bg-success"></i>
                <div class="timeline-item">
                    <div class="timeline-footer">
                        <a class="btn btn-success btn-sm" id="crear">Nueva Gestión</a>
                    </div>
                </div>
            </div>
            <!-- END timeline item -->
        @foreach ($grados as $grado)
            <div class="time-label">
                <span class="bg-secondary">{{$grado->pivot->anio}}</span>
            </div>

            <!-- timeline item -->
            <div>
                <i class="fas fa-school bg-primary"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i>{{Carbon\Carbon::now()}}</span>
                    @php
                        $colegio=App\Models\Colegio::find($grado->pivot->colegio_id)
                    @endphp
                    <h3 class="timeline-header"><a href="#">{{'Colegio:'.$colegio->nombre.', Grado:'.$grado->grado}}</a> </h3>
                    <div class="timeline-body">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Mostrar Colegio detallado</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>Atributo</th>
                                                <th>Valor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nombre</td>
                                                <td>{{$colegio->nombre}}</td>
                                            </tr>
                                            <tr>
                                                <td>Director</td>
                                                <td>{{$colegio->director}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Direccion</td>
                                                <td>{{$colegio->direccion}}</td>
                                            </tr>
                                            <tr>
                                                <td>Telefono</td>
                                                <td>{{$colegio->telefono}}</td>
                                            </tr>
                                            <tr>
                                                <td>Celular</td>
                                                <td>{{$colegio->direccion}}</td>
                                            </tr>
                                            <tr>
                                                <td>Dependencia</td>
                                                <td>{{$colegio->dependencia}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nivel</td>
                                                <td>{{$colegio->nivel}}</td>
                                            </tr>
                                            <tr>
                                                <td>Turno</td>
                                                <td>{{$colegio->turno}}</td>
                                            </tr>
                                            <tr>
                                                <td>Area Geográfica</td>
                                                <td>{{$colegio->areageografica}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        
        </div>
    @endif
@else

@endif






