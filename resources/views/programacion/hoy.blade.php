<div class="card">
    <div class="card-header text-white {{$clase}}">
        <h3 class="card-title">CLASE CORRESPONDIENTE AL DIA DE HOY</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    
        <div class="card-body">
            
                <table id="tabla_hoy" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            {{-- <th>ID</th> --}}
                            <th>FECHA</th>
                            <th>H INI</th>
                            <th>H FIN</th>

                            <th>DOCENTE</th>
                            <th>MATERIA</th>
                            <th>AULA</th>
                            
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    {{-- es llenado desde ajax --}}
                </table>
        </div>
</div>

