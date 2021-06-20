

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="introduzca nombre de usuario" autofocus>
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



        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Escriba correo eletronico">
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

        {{-- Register button --}}
        <button type="submit" class="btn btn-block">
            <span class="fas fa-user-plus text-primary"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

