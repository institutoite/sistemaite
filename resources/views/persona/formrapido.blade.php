<div class="card">
    <div class="card-header bg-secondary">
        FORMULARIO REGISTRO RAPIDO
    </div>
    <div class="card-body">
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
                    @if($errors->has('telefono'))
                        <span class="text-danger"> {{ $errors->first('telefono')}}</span>
                    @endif
                </div>
            </div>
            <hr>
            <legend class="text-gray">Datos del Estudiante</legend> 
            {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO NOMBRE %%%%%%%%%%%%%%%%%%%%%% --}}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" > 
                    <div class="form-floating mb-3 text-gray">
                        <input  type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre',$persona->nombre ?? '')}}">
                        <label for="nombre">nombre</label>
                    </div>
                </div>

                {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <input  type="text" name="apellidop" class="form-control @error('apellidop') is-invalid @enderror" value="{{old('apellidop',$persona->apellidop ?? '')}}">
                        <label for="apellidop">apellidop</label>
                    </div>    
                </div>
                {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO APELLIDO MATERNO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <input class="form-control" type="tel" id="phone" name="telefono" value="{{old('telefono',$persona->telefono ?? '')}}">
                        <label for="telefono">Telefono*</label>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3" >
                    <div class="row">
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" >
                            <div class="form-floating mb-3 text-gray">
                                <select onchange="mostrarModal();" onfocus="this.selectedIndex = -1;" class="form-control @error('como') is-invalid @enderror"  name="como" id="como">
                                    <option value="">Como se enteró</option>
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
                                <label for="como">como</label>
                            </div>
                        </div>
                        {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO REFERENCIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3" >
                            <div class="form-floating mb-3 text-gray">
                                <input  type="text" readonly id="persona_id" name="persona_id" class="form-control @error('carnet') is-invalid @enderror" value="{{old('persona_id',$persona->persona_id ?? '')}}">
                            </div>
                        </div>
                    </div>
                
                </div>
                
            </div> {{-- FIN DEL ROW DE LOS INPUT DE ESTUDIANTE  --}}

            <hr>
            <legend class="text-gray">Datos del familiar</legend> 
           
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" > 
                    <div class="form-floating mb-3 text-gray">
                        <input  type="text" name="nombrefamiliar" class="form-control @error('nombrefamiliar') is-invalid @enderror" value="{{old('nombrefamiliar',$persona->nombrefamiliar ?? '')}}">
                        <label for="nombrefamiliar">nombrefamiliar</label>
                    </div>
                </div>

                {{-- %%%%%%%%%%%%%%% CAMPO APELLIDO PATERNO --}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <input  type="text" name="apellidopfamiliar" class="form-control @error('apellidopfamiliar') is-invalid @enderror" value="{{old('apellidopfamiliar',$persona->apellidopfamiliar ?? '')}}">
                        <label for="apellidopfamiliar">apellidopfamiliar</label>
                    </div>    
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <input class="form-control" type="tel" id="phone" name="telefonofamiliar" value="{{old('telefonofamiliar',$persona->telefonofamiliar ?? '')}}">
                        <label for="telefonofamiliar">Telefonofamiliar*</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" >
                    <div class="form-floating mb-3 text-gray">
                        <select class="form-control @error('parentesco') is-invalid @enderror"  name="parentesco" id="parentesco">
                            <option value="">Grado Parentesco</option>
                                @isset($registro_pivot)
                                
                                    <option value="PAPA" @if($registro_pivot[0]->parentesco == 'PAPA') {{'selected'}} @endif>PAPA</option>
                                    <option value="MAMA" @if($registro_pivot[0]->parentesco == 'MAMA') {{'selected'}} @endif>MAMA</option>    
                                
                                    <option value="ABUELO" @if($registro_pivot[0]->parentesco == 'ABUELO') {{'selected'}} @endif>ABUELO</option>
                                    <option value="ABUELA" @if($registro_pivot[0]->parentesco == 'ABUELA') {{'selected'}} @endif>ABUELA</option>
                                
                                    <option value="HERMANO" @if($registro_pivot[0]->parentesco == 'HERMANO') {{'selected'}} @endif>HERMANO</option>
                                    <option value="HERMANA" @if($registro_pivot[0]->parentesco == 'HERMANA') {{'selected'}} @endif>HERMANA</option>
                                
                                    <option value="TIO" @if($registro_pivot[0]->parentesco == 'TIO') {{'selected'}} @endif>TIO</option>
                                    <option value="TIA" @if($registro_pivot[0]->parentesco == 'TIA') {{'selected'}} @endif>TIA</option>
                                
                                    <option value="ESPOSO" @if($registro_pivot[0]->parentesco == 'ESPOSO') {{'selected'}} @endif>ESPOSO</option>
                                    <option value="ESPOSA" @if($registro_pivot[0]->parentesco == 'ESPOSA') {{'selected'}} @endif>ESPOSA</option>
                                
                                    <option value="OTRO" @if($registro_pivot[0]->parentesco == 'OTRO') {{'selected'}} @endif>OTRO</option>
                                    
                                @else 
                                
                                    <option value="PAPA" @if(old('parentesco') == 'PAPA') {{'selected'}} @endif>PAPA</option>
                                    <option value="MAMA" @if(old('parentesco') == 'MAMA') {{'selected'}} @endif>MAMA</option>    
                                
                                    <option value="ABUELO" @if(old('parentesco') == 'ABUELO') {{'selected'}} @endif>ABUELO</option>
                                    <option value="ABUELA" @if(old('parentesco') == 'ABUELA') {{'selected'}} @endif>ABUELA</option>
                                
                                    <option value="HERMANO" @if(old('parentesco') == 'HERMANO') {{'selected'}} @endif>HERMANO</option>
                                    <option value="HERMANA" @if(old('parentesco') == 'HERMANA') {{'selected'}} @endif>HERMANA</option>
                                
                                    <option value="TIO" @if(old('parentesco') == 'TIO') {{'selected'}} @endif>TIO</option>
                                    <option value="TIA" @if(old('parentesco') == 'TIA') {{'selected'}} @endif>TIA</option>
                                
                                    <option value="ESPOSO" @if(old('parentesco') == 'ESPOSO') {{'selected'}} @endif>ESPOSO</option>
                                    <option value="ESPOSA" @if(old('parentesco') == 'ESPOSA') {{'selected'}} @endif>ESPOSA</option>
                                
                                    <option value="OTRO" @if(old('parentesco') == 'OTRO') {{'selected'}} @endif>OTRO</option>
                                @endisset
                        </select>
                        <label for="apellidop">apellidop</label>
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
        
        <textarea rows="5" placeholder="Ingrese un requerimiento inicial por que esta registrando el cliente el motivo escuchar bien al cliente"  name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror" >{{old('observacion',$observacion ?? '')}}</textarea>

        </div>
    </div>
</div>


    
    






    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" >
            @if($errors->has('como'))
                <span class="text-danger"> {{ $errors->first('como')}}</span>
            @endif
        </div>
        
    </div>
    {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO GENERO  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}

    
        {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO COMO SE INFORMO  --}}
        
        
    </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO OCULTO CON QUE PAPEL LLEGA A ITE papel de profesor papel de practico etc ---}}
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
        
    </div>

    {{-- %%%%%%%%%%%%%%%%%%%%%%%%%%% CAMPO NOMBRE %%%%%%%%%%%%%%%%%%%%%% --}}

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




