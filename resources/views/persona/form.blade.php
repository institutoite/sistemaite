    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('nombre'))
                <span class="text-danger"> {{ $errors->first('nombre')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">    
            @if($errors->has('apellidop'))
                <span class="text-danger"> {{ $errors->first('apellidop')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('apellidom'))
                <span class="text-danger"> {{ $errors->first('apellidom')}}</span>
            @endif
        </div>
    </div>


    {{-- $$$$$$$$$$$ CAMPO NOMBRE INICIO --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Nombre</p> 
                <input  type="text" name="nombre" class="form-control col-9 @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona->nombre ?? '')}}" placeholder="Ingrese un  nombre">
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Paterno</p> 
                <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}" placeholder="Ingrese  apellido Paterno(Obligatorio)">
            </div>    
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
            <p class="col-3 form-control bg-secondary text-sm p-1" for="">Materno</p> 
            <input  type="text" name="apellidom" class="form-control @error('apellidom') is-invalid @enderror" value="{{old('apellidom',$persona->apellidom ?? '')}}" placeholder="Ingrese su apellido Materno(Opcional)">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('fechanacimiento'))
                <span class="text-danger"> {{ $errors->first('fechanacimiento')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('carnet'))
                <span class="text-danger"> {{ $errors->first('carnet')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('expedido'))
                <span class="text-danger"> {{ $errors->first('expedido')}}</span>
            @endif
        </div>    
    </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  FECHA NACIMIENTO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    {{--\Carbon::createFromFormat('Y-m-d', $persona->fechanacimiento)--}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @isset($persona)
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Fecha N.</p> 
                    <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento',$persona->fechanacimiento->format('Y-m-d') ?? '')}}">
                </div>
            @else
                <div class="input-group mb-2" >
                    <p class="col-3 form-control bg-secondary p-1" for="">Fecha N.</p> 
                    <input  type="date" name="fechanacimiento" class="form-control col-9 @error('fechanacimiento') is-invalid @enderror" value="{{old('fechanacimiento' ?? '')}}">
                </div>
            @endisset
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  CARNET  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">C.I.</p> 
                <input  type="text" name="carnet" class="form-control col-9 @error('carnet') is-invalid @enderror" value="{{old('carnet',$persona->carnet ?? '')}}" placeholder="Ingrese un numero de carnet">
            </div>
        </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO  expedido del carnet  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
                <p class="col-3 form-control bg-secondary p-1" for="">DPTO</p> 
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
        </div>
        
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('genero'))
                <span class="text-danger"> {{ $errors->first('genero')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('como'))
                <span class="text-danger"> {{ $errors->first('como')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            @if($errors->has('papel'))
                <span class="text-danger"> {{ $errors->first('papel')}}</span>
            @endif
        </div>
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 p-1" for="">Género</p> 
                <select class="form-control @error('expedido') is-invalid @enderror" name="genero" id="genero">
                    <option value=""> Elija tu género</option>
                
                    @isset($persona)      
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
                    @endisset    
                </select>
            </div>
        </div>
        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 input-group text-sm" >
                    <div class="input-group" >
                        <p class="col-3 form-control bg-secondary p-1" for="">Como?</p> 
                        <select onchange="mostrarModal();" onfocus="this.selectedIndex = -1;" class="form-control @error('como') is-invalid @enderror"  name="como" id="como">
                            <option value=""> Elija una manera</option>
                                @isset($persona)
                                    <option value="PASANDO" @if($persona->como == 'PASANDO') {{'selected'}} @endif>Pasando por el lugar</option>
                                    <option value="REFERENCIA" @if($persona->como == 'REFERENCIA') {{'selected'}} @endif>Por referencia</option>
                                    <option value="FACEBOOK" @if($persona->como == 'FACEBOOK') {{'selected'}} @endif>Facebook</option>    
                                    <option value="GOOGLE" @if($persona->como == 'GOOGLE') {{'selected'}} @endif>Google</option>
                                    <option value="YOUTUBE" @if($persona->como == 'YOUTUBE') {{'selected'}} @endif>Google</option>
                                    <option value="OTRO" @if($persona->como == 'OTRO') {{'selected'}} @endif>Otra Forma</option>
                                @else 
                                    <option value="PASANDO" @if(old('como') == 'PASANDO') {{'selected'}} @endif>Pasando por el lugar</option>
                                    <option value="REFERENCIA" @if(old('como') == 'REFERENCIA') {{'selected'}} @endif>Por referencia</option>
                                    <option value="FACEBOOK" @if(old('como') == 'FACEBOOK') {{'selected'}} @endif>Facebook</option>    
                                    <option value="GOOGLE" @if(old('como') == 'GOOGLE') {{'selected'}} @endif>Google</option>
                                    <option value="YOUTUBE" @if(old('como') == 'YOUTUBE') {{'selected'}} @endif>Google</option>
                                    <option value="OTRO" @if(old('como') == 'OTRO') {{'selected'}} @endif>Otra Forma</option>
                                @endisset
                        </select>
                    </div>
                </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO REFERENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-sm" >
                    <input  type="text" readonly id="persona_id" name="persona_id" class="form-control @error('carnet') is-invalid @enderror" value="{{old('persona_id',$persona->persona_id ?? '')}}">
                </div>
            </div>
            
        </div>

{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 " for="">Persona</p> 
                <select class="form-control @error('papel') is-invalid @enderror"  name="papel" id="papel">
                    <option value=""> Elija Papel</option>
                        @isset($persona)
                            <option value="estudiante" @if($persona->papelinicial == 'estudiante') {{'selected'}} @endif>Estudiante</option>
                            <option value="docente" @if($persona->papelinicial == 'docente') {{'selected'}} @endif>Docente</option>
                            <option value="cliservicio" @if($persona->papelinicial == 'cliservicio') {{'selected'}} @endif>Servicio Técnico</option>
                            <option value="clicopy" @if($persona->papelinicial == 'clicopy') {{'selected'}} @endif>Fotocopia e Impresiones</option>
                            <option value="administrativo" @if($persona->papelinicial == 'administrativo') {{'selected'}} @endif>Adminitrativo</option>
                            <option value="proveedor" @if($persona->papelinicial == 'proveedor') {{'proveedor'}} @endif>Proveedor</option>
                            <option value="apoderado" @if($persona->papelinicial == 'apoderado') {{'apoderado'}} @endif>Apoderado</option>
                        @else 
                            <option value="estudiante" @if(old('papel') == 'estudiante') {{'selected'}} @endif>Estudiante</option>
                            <option value="docente" @if(old('papel') == 'docente') {{'selected'}} @endif>Docente</option>
                            <option value="cliservicio" @if(old('papel') == 'cliservicio') {{'selected'}} @endif>Servicio Técnico</option>
                            <option value="clicopy" @if(old('papel') == 'clicopy') {{'selected'}} @endif>Fotocopia e Impresiones</option>
                            <option value="administrativo" @if(old('papel') == 'administrativo') {{'selected'}} @endif>Adminitrativo</option>
                            <option value="proveedor" @if(old('papel') == 'proveedor') {{'proveedor'}} @endif>Proveedor</option>
                            <option value="proveedor" @if(old('papel') == 'apoderado') {{'apoderado'}} @endif>Apoderado</option>
                        @endisset
                        
                </select>
            </div> 
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('pais_id'))
                <span class="text-danger"> {{ $errors->first('pais_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('ciudad_id'))
                <span class="text-danger"> {{ $errors->first('ciudad_id')}}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('zona_id'))
                <span class="text-danger"> {{ $errors->first('zona_id')}}</span>
            @endif
        </div>
    </div>

    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO PAIS  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row"> 
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 p-1" for="">PAIS</p> 
                <select class="form-control @error('pais_id') is-invalid @enderror" data-old="{{ old('pais_id') }}" name="pais_id" id="country">
                    <option value="1" selected> Bolivia</option>
                    @foreach ($paises as $pais)
                        @isset($persona)     
                            <option  value="{{$pais->id}}" {{$pais->id==$persona->pais_id ? 'selected':''}}>{{$pais->nombrepais}}</option>     
                        @else
                            <option value="{{ $pais->id }}" {{ old('pais') == $pais->id ? 'selected':'' }} >{{ $pais->nombrepais }}</option>
                        @endisset 
                    @endforeach
                </select>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO CIUDAD  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1 p-1" for="">CITY</p> 
                <select class="form-control @error('ciudad_id') is-invalid @enderror" name="ciudad_id" id="city">
                    <option value=""> Elija una ciudad</option>
                        @foreach ($ciudades as $item)
                            @isset($persona) 
                                <option value="{{ $item->id }}" {{ $item->id==$persona->ciudad_id ? 'selected':''}} >{{ $item->ciudad }}</option>
                            @endisset
                        @endforeach 
                </select>
            </div>
        </div>
        {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO ZONA  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
            <p class="col-3 form-control bg-secondary p-1" for="">ZONA</p> 
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
        </div>
        </div>
    </div>


    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO DIRECCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 input-group text-sm" >
                @if($errors->has('direccion'))
                    <span class="text-danger"> {{ $errors->first('direccion')}}</span>
                @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 input-group text-sm">
            @if($errors->has('telefono'))
                <span class="text-danger"> {{ $errors->first('telefono')}}</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 input-group text-sm" > 
            <div class="input-group mb-2" >
                <p class="col-2 form-control bg-secondary p-1" for="">Dirección</p> 
                <input  type="text" name="direccion" class="form-control col-10 @error('direccion') is-invalid @enderror" value="{{old('direccion',$persona->direccion ?? '')}}" placeholder="Ingrese una dirección">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
            <div class="input-group mb-2" >
                <p class="col-3 form-control bg-secondary p-1" for="">Teléfono</p> 
                <input class="form-control" type="tel" id="phone" name="telefono" value="{{old('telefono',$persona->telefono ?? '')}}" placeholder="teléfono de la persona">
            </div>
        </div>
    </div>
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
                @if($errors->has('observacion'))
                    <span class="text-danger"> {{ $errors->first('observacion')}}</span>
                @endif
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group text-sm" >
            <div class="input-group mb-2" >
                <textarea placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" rows="3" class="form-control @error('observacion') is-invalid @enderror" >{{old('observacion',$observacion ?? '')}}</textarea>
            </div>
        </div>
    </div>

    @isset($persona)
        <div class="row">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group border" style="position: relative" >
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    <div class="input-group mb-2" >
                        <div class="text-center p-4" >
                            <img with="25" height="25" src="{{URL::to('/').Storage::url("$persona->foto")}}" class="rounded img-thumbnail img-fluid border-primary border-5" alt="{{$persona->nombre}}">        
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    <div class="input-group mb-2" >
                        <div class="text-center" >
                            <a href="{{ route('tomar.foto.persona',$persona)}}"> <i class="fas fa-camera"></i> Tomar Foto </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- $$$$$$$$$$$ CAMPO REPETIR FOTOGRAFIA --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 input-group text-sm" >
                <div class="border-danger input-group text-center">
                    <input type="file" data-initial-preview="{{isset($persona->foto) ? URL::to('/').Storage::url("$persona->foto") : URL::to('/').Storage::url("estudiantes/foto.jpeg") }}" accept=".png, .jpg, .jpeg, .gif" name="foto" id="foto" data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
                </div>
            </div>
        </div>
    @endisset
    

    
    {{-- <img src="{{URL::to('/').'/storage/'.$persona->foto}}"  width="250" height="250" alt="fsdfds">
    <img src="{{URL::to('/').Storage::url("$persona->foto")}}" alt=""> --}}


<div class="modal" tabindex="-1" id="modal-ite">
    <div class="modal-dialog modal-lg modalito">
        <div class="modal-content">
            <div class="modal-header">
                Seleccione la persona referenciadora
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





