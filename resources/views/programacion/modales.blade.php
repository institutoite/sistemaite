{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  M O S T R A R   U N A   P R O G R A M A C I O M  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

<div class="modal" tabindex="-1" id="modal-mostrar">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                MOSTRAR PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="programacion" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-programacion">
                            
                        </tbody>
                    </table>
                    <table id="observaciones" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-observaciones">
                            
                        </tbody>
                    </table>
                    <table id="clases" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>HoraIni</th>
                                <th>HoraFin</th>
                                <th>Docente</th>
                                <th>Aula</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-clases">
                            
                        </tbody>
                    </table>
                    


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>


{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  M O S T R A R   U N A   P R O G R A M A C I O CON SUS CLASES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

<div class="modal" tabindex="-1" id="modal-mostrar-clase">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                DETALLE DE LA CLASE
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-editar-pago">
                <div class="container p-4">
                    <table id="programacion" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-programacion">
                            
                        </tbody>
                    </table>
                    <table id="observaciones" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-observaciones">
                            
                        </tbody>
                    </table>
                    <table id="clases" class="table table-bordered table-hover table-striped">
                        <thead class="bg-primary">
                            <tr>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>HoraIni</th>
                                <th>HoraFin</th>
                                <th>Docente</th>
                                <th>Materia</th>
                                <th>Aula</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-mostrar-clases">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">cerrar &times;</button>
            </div>
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A   E D I T A R %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar">
    <div class="modal-dialog modal-xl modalito">
        <div class="modal-content">
            <div class="modal-header bg-    primary">
                EDITAR PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-primary">
                        <span class="card-title">Actualizar Programacion</span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('programacions.update', $programacion->id) }}"  role="form" enctype="multipart/form-data"> --}}
                        <form id="formulario-editar" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            {{-- @include('programacion.form') --}}
                            @include('include.botones')
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-gregar-observacion">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL OBSERVACION DE PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-guardar-observacion" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="text" name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror" value="{{old('observacion')}}">
                                    <label for="observacion">Observación</label>
                                </div>  
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="form-floating mb-3 text-gray">
                                    <input  type="number" hidden name="id_programacion" id="id_programacion" class="form-control">
                                </div>  
                            </div>
                            
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacion" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% M O D A L   P A R A  A G R E G A R O B S E R V A C I O N   A LA P R O G R A MA C I O N %$$$$$$%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
<div class="modal" tabindex="-1" id="modal-editar-programacion-hoy">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                MODAL OBSERVACION DE PROGRAMACION
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Agregar Observación</span>
                    </div>
                    <div class="card-body">
                        <form id="formulario-guardar-observacio" method="POST" action="{{route('programacion.actualizar')}}">
                            @csrf
                            
                           <div class="row">
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   F E C H A  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3 text-gray">
                                        <input type="date" name='fecha' class="form-control texto-plomo" id="floatingInput" placeholder="fecha" value="">
                                        <label for="fecha">Fecha</label>
                                    </div>
                                </div>
                                {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  I N I C I O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <input  type="time" name="hora_ini" class="form-control @error('hora_ini') is-invalid @enderror" value="">
                                        <label for="hora_ini">Hora inicio</label>
                                    </div>    
                                </div>
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   H O R A  F I N  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <input  type="time" name="hora_fin" class="form-control @error('hora_fin') is-invalid @enderror" value="">
                                        <label for="hora_fin">Hora fin</label>
                                    </div>  
                                </div>
                            </div>

                            <div class="row">
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   E S T A D O  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
                                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" > 
                                    <div class="form-floating mb-3"> 
                                        <select class="form-control @error('estado') is-invalid @enderror"  name="estado" id="estado">
                                            <option value=""> Elija estado</option>
                                                @isset($programacion)
                                                    <option value="PRESENTE" @if($programacion->estado == 'PRESENTE') {{'selected'}} @endif>PRESENTE</option>
                                                    <option value="FINALIZADO" @if($programacion->estado == 'FINALIZADO') {{'selected'}} @endif>FINALIZADO</option>
                                                    <option value="INDEFINIDO" @if($programacion->estado == 'INDEFINIDO') {{'selected'}} @endif>INDEFINIDO</option>
                                                @else 
                                                    <option value="PRESENTE" @if(old('habilitado') == 'PRESENTE') {{'selected'}} @endif>PRESENTE</option>
                                                    <option value="FINALIZADO" @if(old('habilitado') == 'FINALIZADO') {{'selected'}} @endif>FINALIZADO</option>
                                                    <option value="INDEFINIDO" @if(old('habilitado') == 'INDEFINIDO') {{'selected'}} @endif>INDEFINIDO</option>
                                                @endisset
                                                
                                        </select>
                                        <label for="estado">Elija estado</label>
                                    </div>
                                </div> --}}
                                {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  H A B I L I T A D O   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control @error('activo') is-invalid @enderror"  name="activo" id="activo">
                                                <option value=""> Elija habilitación</option>
                                                    @isset($programacion)
                                                        <option value="1" @if($programacion->activo == 1) {{'selected'}} @endif>Pagado</option>
                                                        <option value="0" @if($programacion->activo == 0) {{'selected'}} @endif>No Pagada</option>
                                                    @else 
                                                        <option value="1" @if(old('activo') == 1) {{'selected'}} @endif>Pagada</option>
                                                        <option value="0" @if(old('activo') == 0) {{'selected'}} @endif>No Pagada</option>
                                                    @endisset
                                                    
                                            </select>
                                        <label for="activo">Elija estado de pago</label>
                                    </div>    
                                </div>
                                
                            </div> --}}

                            {{-- %%%%%%%%%%%%%%% C A M P O  I N S C R I P C I O N   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                            {{-- <input  type="text" hidden readonly name="inscripcione_id"  value="{{old('inscripcione_id',$programacion->inscripcione_id ?? '')}}">

                            <div class="row">
                                {{-- %%%%%%%%%%%%%%%%%%%%%%% C A M P O   D O C E N T E %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
                                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
                                    <div class="form-floating mb-3">
                                        <select class="form-control @error('docente_id') is-invalid @enderror" data-old="{{ old('docente_id') }}" name="docente_id" id="docente_id">
                                            @foreach ($docentes as $docente)
                                                @isset($programacion)     
                                                    <option  value="{{$docente->id}}" {{$docente->id==$programacion->docente_id ? 'selected':''}}>{{$docente->nombre}}</option>     
                                                @else
                                                    <option value="{{ $docente->id }}" {{ old('docente_id') == $docente->id ? 'selected':'' }} >{{ $docente->nombre }}</option>
                                                @endisset 
                                            @endforeach
                                        </select>
                                        <label for="docente_id">Elija Docente</label>
                                    </div>
                                </div> --}} --}}
                                {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  M A T E R I A   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control @error('materia_id') is-invalid @enderror" data-old="{{ old('materia_id') }}" name="materia_id" id="materia_id">
                                            @foreach ($materias as $materia)
                                                @isset($programacion)     
                                                    <option  value="{{$materia->id}}" {{$materia->id==$programacion->materia_id ? 'selected':''}}>{{$materia->materia}}</option>     
                                                @else
                                                    <option value="{{ $materia->id }}" {{ old('docente_id') == $materia->id ? 'selected':'' }} >{{ $materia->materia }}</option>
                                                @endisset 
                                            @endforeach
                                        </select>
                                        <label for="materia_id">Elija Materia</label>
                                    </div>    
                                </div> --}}
                                {{-- %%%%%%%%%%%%%%% C A M P O  H O R A  A U L A    %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                                {{-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
                                    <div class="form-floating mb-3 text-gray">
                                        <select class="form-control @error('aula_id') is-invalid @enderror" data-old="{{ old('aula_id') }}" name="aula_id" id="aula_id">
                                            @foreach ($aulas as $aula)
                                                @isset($programacion)     
                                                    <option  value="{{$aula->id}}" {{$aula->id==$programacion->aula_id ? 'selected':''}}>{{$aula->aula}}</option>     
                                                @else
                                                    <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected':'' }} >{{ $aula->aula }}</option>
                                                @endisset 
                                            @endforeach
                                        </select>
                                        <label for="aula_id">Seleccione Aula</label>
                                    </div>    
                                </div>
                            </div> --}}
                            
                            <div class="container-fluid h-100 mt-3"> 
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="guardar-observacioxn" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                    </div>	
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div> 
            </div>
           
        </div>
    </div>
</div>
