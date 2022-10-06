    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('apellidom'))
                <span class="text-danger"> {{ $errors->first('apellidom')}}</span>
            @endif
        </div>
    </div>


    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO NOMBRE %%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$comentario->nombre ?? '')}}">
                <label for="nombre">nombre</label>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}">
                <label for="apellidop">apellidop</label>
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
            <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona->apellidom ?? '')}}">
            <label for="apellidom">apellidom</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('fechanacimiento'))
                <span class="text-danger"> {{ $errors->first('fechanacimiento')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('carnet'))
                <span class="text-danger"> {{ $errors->first('carnet')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('expedido'))
                <span class="text-danger"> {{ $errors->first('expedido')}}</span>
            @endif
        </div>    
    </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @isset($persona)
                <div class="form-floating mb-3 text-gray">
                    @if(isset($persona->fechanacimiento))
                        <input  type="date" name="fechanacimiento" class="form-control @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento',$persona->fechanacimiento->format('Y-m-d') ?? '')}}">
                        <label for="fechanacimiento">fechanacimiento</label>    
                    @else 
                        <input  type="date" name="fechanacimiento" class="form-control @error('fechanacimiento') is-invalid @enderror" value="">
                        <label for="fechanacimiento">fechanacimiento</label>    
                    @endif
                    
                </div>
            @else
                <div class="form-floating mb-3 text-gray">
                    <input  type="date" name="fechanacimiento" class="form-control @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento' ?? '')}}">
                    <label for="fechanacimiento">fechanacimiento</label>
                </div>
            @endisset
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  CARNET  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input  type="number" min="100000" name="carnet" class="form-control @error('carnet') is-invalid @enderror" value="{{old('carnet',$persona->carnet ?? '')}}">
                <label for="carnet">carnet</label>
            </div>
        </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  expedido del carnet  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('expedido') is-invalid @enderror"  name="expedido" id="expedido">
                    <option value=""> Elija Expedido</option>
                        @isset($persona)
                            <option value="SCZ" @if($persona->expedido == 'SCZ') {{'selected'}} @endif>Santa Cruz</option>
                            <option value="LPZ" @if($persona->expedido == 'LPZ') {{'selected'}} @endif>La Paz</option>
                            <option value="CBBA" @if($persona->expedido == 'CBBA') {{'selected'}} @endif>Cochabamba</option>

                            <option value="BEN" @if($persona->expedido == 'BEN') {{'selected'}} @endif>Beni</option>
                            <option value="TAR" @if($persona->expedido == 'TAR') {{'selected'}} @endif>Tarija</option>
                            <option value="PND" @if($persona->expedido == 'PND') {{'selected'}} @endif>Pando</option>

                            <option value="ORU" @if($persona->expedido == 'ORU') {{'selected'}} @endif>Oruro</option>
                            <option value="POT" @if($persona->expedido == 'POT') {{'selected'}} @endif>Potosí</option>
                            <option value="CHU" @if($persona->expedido == 'CHU') {{'selected'}} @endif>Chuquisaca</option>
                        @else 
                            <option value="SCZ" @if(old('expedido') == 'SCZ') {{'selected'}} @endif>Santa Cruz</option>
                            <option value="LPZ" @if(old('expedido') == 'LPZ') {{'selected'}} @endif>La Paz</option>
                            <option value="CBBA" @if(old('expedido') == 'CBBA') {{'selected'}} @endif>Cochabamba</option>

                            <option value="BEN" @if(old('expedido') == 'BEN') {{'selected'}} @endif>Beni</option>
                            <option value="TAR" @if(old('expedido') == 'TAR') {{'selected'}} @endif>Tarija</option>
                            <option value="PND" @if(old('expedido') == 'PND') {{'selected'}} @endif>Pando</option>

                            <option value="ORU" @if(old('expedido') == 'ORU') {{'selected'}} @endif>Oruro</option>
                            <option value="POT" @if(old('expedido') == 'POT') {{'selected'}} @endif>Potosí</option>
                            <option value="CHU" @if(old('expedido') == 'CHU') {{'selected'}} @endif>Chuquisaca</option>
                        @endisset 
                </select> 
                <label for="expedido">Elija departamento de expedido</label>
            </div>
        
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('genero'))
                <span class="text-danger"> {{ $errors->first('genero')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('como_id'))
                <span class="text-danger"> {{ $errors->first('como_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('papel'))
                <span class="text-danger"> {{ $errors->first('papel')}}</span>
            @endif
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('genero') is-invalid @enderror" name="genero" id="genero">
                    <option value=""> Elija tu género</option>
                    @isset($persona)
                        @if(isset($persona->genero))
                            @if($persona->genero=="MUJER")
                                <option value="{{ $persona->genero }}" {{ "MUJER"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                                <option value="HOMBRE">HOMBRE</option>
                            @else
                                <option value="{{ $persona->genero }}" {{ "HOMBRE"==$persona->genero ? 'selected':''}} >{{ $persona->genero }}</option>
                                <option value="MUJER" >MUJER</option>
                            @endif
                        @else  
                            <option value="MUJER" @if(old('genero') == 'MUJER') {{'selected'}} @endif>MUJER</option>
                            <option value="HOMBRE" @if(old('genero') == 'HOMBRE') {{'selected'}} @endif>HOMBRE</option>
                        @endif 
                    @else
                        <option value="MUJER" @if(old('genero') == 'MUJER') {{'selected'}} @endif>MUJER</option>
                        <option value="HOMBRE" @if(old('genero') == 'HOMBRE') {{'selected'}} @endif>HOMBRE</option>
                    @endisset    
                </select>
                <label for="genero">Elija género*</label>
            </div>
        </div>

        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="row">
                {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO REFERENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
                    <div class="form-floating mb-3 text-gray">
                        <select onchange="mostrarModal();" onfocus="this.selectedIndex = -1;"  class="form-control @error('como_id') is-invalid @enderror" data-old="{{ old('como_id') }}" name="como_id" id="como_id">
                            <option value="" selected>Seleccionen como se enteró?</option>
                            @foreach ($comos as $como)
                                @isset($comentario)     
                                    <option  value="{{$como->id}}" {{$como->id==$comentario->como_id ? 'selected':''}}>{{$como->como}}</option>     
                                @else
                                    <option value="{{ $como->id}}" {{ old('como_id') == $como->id ? 'selected':'' }} >{{ $como->como }}</option>
                                @endisset 
                            @endforeach
                        </select>
                        <label for="">Como se enteró?</label>  
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <input  type="text" readonly id="persona_id" name="persona_id" class="form-control @error('carnet') is-invalid @enderror" value="{{old('persona_id',$persona->persona_id ?? '')}}">
                    </div>
                    <label for=""></label>  
                </div>
            </div>
            
        </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('papel') is-invalid @enderror"  name="papel" id="papel">
                    <option value=""> Elija Papel</option>
                        @isset($persona)
                            <option value="estudiante" @if($persona->papelinicial == 'estudiante') {{'selected'}} @endif>Estudiante</option>
                            <option value="docente" @if($persona->papelinicial == 'docente') {{'selected'}} @endif>Docente</option>
                            <option value="computacion" @if($persona->papelinicial == 'computacion') {{'computacion'}} @endif>Computacion</option>
                            <option value="cliservicio" @if($persona->papelinicial == 'cliservicio') {{'selected'}} @endif>Servicio Técnico</option>
                            <option value="clicopy" @if($persona->papelinicial == 'clicopy') {{'selected'}} @endif>Fotocopia e Impresiones</option>
                            <option value="administrativo" @if($persona->papelinicial == 'administrativo') {{'selected'}} @endif>Adminitrativo</option>
                            <option value="proveedor" @if($persona->papelinicial == 'proveedor') {{'proveedor'}} @endif>Proveedor</option>
                            <option value="apoderado" @if($persona->papelinicial == 'apoderado') {{'apoderado'}} @endif>Apoderado</option>
                            <option value="contacto" @if($persona->papelinicial == 'contacto') {{'contacto'}} @endif>Contacto</option>
                        @else 
                            <option value="estudiante" @if(old('papel') == 'estudiante') {{'selected'}} @endif>Estudiante</option>
                            <option value="docente" @if(old('papel') == 'docente') {{'selected'}} @endif>Docente</option>
                            <option value="computacion" @if(old('papel') == 'computacion') {{'computacion'}} @endif>Computacion</option>
                            <option value="cliservicio" @if(old('papel') == 'cliservicio') {{'selected'}} @endif>Servicio Técnico</option>
                            <option value="clicopy" @if(old('papel') == 'clicopy') {{'selected'}} @endif>Fotocopia e Impresiones</option>
                            <option value="administrativo" @if(old('papel') == 'administrativo') {{'selected'}} @endif>Adminitrativo</option>
                            <option value="proveedor" @if(old('papel') == 'proveedor') {{'proveedor'}} @endif>Proveedor</option>
                            <option value="proveedor" @if(old('papel') == 'apoderado') {{'apoderado'}} @endif>Apoderado</option>
                            <option value="contacto" @if(old('papel') == 'contacto') {{'contacto'}} @endif>Contacto</option>
                        @endisset
                </select>
                <label for="papel">papel*</label>
            </div> 
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('pais_id'))
                <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('ciudad_id'))
                <span class="text-danger"> {{ $errors->first('ciudad_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('zona_id'))
                <span class="text-danger"> {{ $errors->first('zona_id')}}</span>
            @endif
        </div>
    </div>

    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('pais_id') is-invalid @enderror" data-old="{{ old('pais_id') }}" name="pais_id" id="country">
                    <option value="1" selected> Bolivia</option>
                    @foreach ($paises as $pais)
                        @isset($persona)     
                            <option  value="{{$pais->id}}" {{$pais->id==$persona->pais_id ? 'selected':''}}>{{$pais->nombrepais}}</option>     
                        @else
                            <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected':'' }} >{{ $pais->nombrepais }}</option>
                        @endisset 
                    @endforeach
                </select>
                <label for="pais">Elija pais*</label>
            </div>
        </div>

        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" id="city">
                    <option value=""> Elija una ciudad</option>
                        @foreach ($ciudades as $item)
                            @isset($persona) 
                                <option value="{{ $item->id }}" {{ $item->id==$persona->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                            @endisset
                        @endforeach 
                </select>
                <label for="pais">Elija Ciudad*</label>
            </div>
        </div>

        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO ZONA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <select class="form-control @error('zona_id') is-invalid @enderror" name="zona_id" id="zona">
                    <option value="" > Seleccione una Zona</option>
                    @foreach ($zonas as $zona)
                        @isset($persona)     
                            <option  value="{{$zona->id}}" {{$zona->id==$persona->zona_id ? 'selected':''}}>{{$zona->zona}}</option>     
                        @else
                            <option value="{{ $zona->id }}" {{ old('zona_id') == $zona->id ? 'selected':'' }} >{{ $zona->zona }}</option>
                        @endisset  
                    @endforeach
                </select>
                <label for="zona_id">Elija zona*</label>
            </div>
        </div>

    </div>


    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DIRECCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8" >
                @if($errors->has('direccion'))
                    <span class="text-danger"> {{ $errors->first('direccion')}}</span>
                @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            @if($errors->has('telefono'))
                <span class="text-danger"> {{ $errors->first('telefono')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" > 
            <div class="form-floating mb-3 text-gray">
                <input  type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{old('direccion',$persona->direccion ?? '')}}" >
                <label for="direccion">Dirección*</label>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" >
            <div class="form-floating mb-3 text-gray">
                <input class="form-control" type="tel" id="phone" name="telefono" value="{{old('telefono',$comentario->telefono ?? '')}}">
                <label for="telefono">Telefono*</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                @if($errors->has('interests'))
                    <span class="text-danger"> {{ $errors->first('interests')}}</span>
                @endif
        </div>
    </div>
 
    <div class="row">
        <div class="card bg-warning">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 @error('interests') is-invalid @enderror">
                @isset($comentario)
                    @foreach ($interests_currents as $current)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" type="checkbox" name="interests[{{$current->id}}]" checked value="{{$current->interest}}" id="{{$current->interest}}">
                            <label class="form-check-label" for="{{$current->id}}">{{$current->interest}}</label>
                        </div>
                    @endforeach
                    @foreach ($interests_faltantes as $faltante)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" type="checkbox" name="interests[{{$faltante->id}}]"  value="{{$faltante->interest}}" id="{{$faltante->interest}}">
                            <label class="form-check-label" for="{{$faltante->id}}">{{$faltante->interest}}</label>
                        </div>
                    @endforeach
                @else
                    @foreach ($interests as $interest)
                        <div class="form-check form-switch form-check-inline mb-2 mt-2 ml-2 mr-2">
                            <input class="form-check-input" type="checkbox" name="interests[{{$interest->id}}]" value="{{$interest->interest}}" id="{{$interest->interest}}">
                            <label class="form-check-label" for="{{$interest->id}}">{{$interest->interest}}</label>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                @if($errors->has('observacion'))
                    <span class="text-danger"> {{ $errors->first('observacion')}}</span>
                @endif
        </div>
    </div>
    
    <textarea placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror" >{{old('observacion',$comentario->comentario ?? '')}}</textarea>
    
    <input type="hidden" name="comentario_id" value="{{$comentario->id}}">

    
<div class="modal" tabindex="-1" id="modal-ite">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header">
                Seleccione la persona referenciadorax
                <button class="btn btn-danger close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="personas" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>OLD</th>
                            <th>NOMBRE</th>
                            <th>APATERNO</th>
                            <th>AMATERNO</th>
                            <th>FOTO</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>

            </div>
            <div class="modal-footer">
                pie del modal 
            </div>
        </div>
    </div>
</div>
