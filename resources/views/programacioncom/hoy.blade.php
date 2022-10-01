<div class="card">
    <div class="card-header {{$clase}}">
        <h3 class="card-title">CLASES DE COMPUTACIÓN <i class="fa-solid fa-desktop"></i> </h3>
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
                            <th>INI</th>
                            <th>FIN</th>

                            <th>ESTADO</th>
                            <th>DOCENTE</th>
                            <th>AULA</th>
                            
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    {{-- es llenado desde ajax --}}
                </table>
        </div>
</div>
