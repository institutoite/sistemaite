


         <div class="row p-3">
            {{-- %%%%%%%%%%%%%%%%%%%%%%% CAMPO OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}} 
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 input-group" style="position: relative" >
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    {{-- Name field --}}
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name',$user->name ?? '')}}" placeholder="introduzca nombre de usuario" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user "></span>
                            </div>
                        </div>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                <span class="text-danger"> {{ $errors->first('name')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    {{-- Email field --}}
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{old('email',$user->email ?? '')}}" placeholder="Escriba correo eletronico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    {{-- Password field --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Introduzca la contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                     {{-- Confirm password field --}}
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Vuelva a escribir la contraseña para confirmar">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger"> {{ $errors->first('password_confirmation')}}</span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 input-group" >
                    <div class="input-group mb-3">
                        <input type="file" class="form-control"  data-initial-preview="{{isset($persona->foto) ? URL::to('/').Storage::url("$persona->foto") : URL::to('/').Storage::url("estudiantes/foto.jpeg") }}" accept=".png, .jpg, .jpeg, .gif" name="foto" id="foto" data-classButton="btn btn-success" data-input="false" data-classIcon="icon-plus">                
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-camera"></span>
                            </div>
                        </div>
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger"> {{ $errors->first('password_confirmation')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- $$$$$$$$$$$ CAMPO REPETIR FOTOGRAFIA --}}
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 input-group text-sm" >
                <div class="border-danger input-group text-center">
                    @isset ($user)
                        <div class="text-center">
                            <img class="img-thumbnail" src="{{URL::to('/').'/storage/'.$user->foto}}" alt="">
                        </div>
                    @else
                        <div class="text-center">
                            <img class="img-thumbnail" src="{{URL::to('/').'/storage/usuarios/sinfoto.jpg'}}" alt="">
                        </div>
                    @endisset
                </div>
            </div>
        </div>

            {{-- Register button --}}
        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                <span class="fas fa-user-plus text-white"></span> Guardar
            </button>
        </div>
        

