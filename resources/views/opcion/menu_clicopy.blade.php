
<p>Gestión clientes de fotocopia e impresión</p>
<div class="row">
        <div class="col-6 col-sm-6 col-md-3">
            <a href="{{route('listar_inscripciones',$persona->estudiante->id)}}">
            <div class="info-box bg-green elevation-2">
                <span class="info-box-icon bg-primary elevation-2"><i class="fas fa-baby"></i></span>

                <div class="info-box-content">
                    
                        <span class="info-box-number">Inscripciones</span>
                        <span class="info-box-number">
                        <small>Inscripciones para todos los niveles</small>
                        </span>
                    
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
                <!-- /.info-box -->
        </div>
    
    <div class="col-6 col-sm-6 col-md-3">
        <a href="{{route('personas.index')}}">
            <a href="{{route('personas.index')}}">
            <div class="info-box">

                <span class="info-box-icon bg-secondary elevation-1"><i class="fab fa-amilia"></i></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Inicial</span>
                    <span class="info-box-number"> 10
                        <small>%</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </a>
    </div>
    <div class="col-6 col-sm-6 col-md-3">
        <a href="{{route('personas.index')}}">
        <div class="info-box">

            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Primaria</span>
                <span class="info-box-number"> 10
                    <small>%</small>
                </span>
            </div>
            <!-- /.info-box-content -->
            </div>
        </a>
            <!-- /.info-box -->
    </div>
    <div class="col-6 col-sm-6 col-md-3">
        <a href="{{route('personas.index')}}">
        <div class="info-box">

            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-school"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Secundaria</span>
                <span class="info-box-number"> 10
                    <small>%</small>
                </span>
            </div>
            <!-- /.info-box-content -->
            </div>
        </a>
            <!-- /.info-box -->
    </div>
</div>