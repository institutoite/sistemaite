@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <style>
        body.login-page {
            background: linear-gradient(135deg, rgb(38,186,165) 0%, rgb(55,95,122) 100%);
            min-height: 100vh;
        }
        .motivational-banner {
            width: 100%;
            background: rgba(255,255,255,0.95);
            color: rgb(55,95,122);
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
            padding: 12px 0 10px 0;
            letter-spacing: 1px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .login-box, .register-box, .password-reset-box {
            margin-top: 70px !important;
        }
    </style>
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
    <div class="motivational-banner" id="motivationalBanner"></div>
    <form action="{{ $login_url }}" method="post">
        {{ csrf_field() }}

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field con icono de ojo --}}
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                
                <div class="input-group-text" style="cursor:pointer;" onclick="togglePassword()">
                    <span id="togglePasswordIcon" class="fas fa-eye"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">{{ __('adminlte::adminlte.remember_me') }}</label>
                </div>
            </div>
            <div class="col-5">
                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>
        </div>

    </form>
    <script>
        // Frases motivadoras para el personal de administración
        const frasesMotivadoras = [
            "¡Tu trabajo hace la diferencia cada día!",
            "La excelencia administrativa comienza contigo.",
            "Gracias por tu dedicación y compromiso.",
            "El éxito de la institución es gracias a tu esfuerzo.",
            "¡Sigue adelante, tu labor inspira a todos!",
            "La organización y pasión son tu sello.",
            "¡Juntos logramos grandes resultados!",
            "Tu actitud positiva transforma el ambiente de trabajo.",
            "Cada tarea que realizas suma al bienestar de todos.",
            "¡Eres parte fundamental de nuestro equipo!"
        ];

        let fraseIndex = 0;
        function mostrarFrase() {
            const banner = document.getElementById('motivationalBanner');
            if (banner) {
                banner.textContent = frasesMotivadoras[fraseIndex];
                fraseIndex = (fraseIndex + 1) % frasesMotivadoras.length;
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            mostrarFrase();
            setInterval(mostrarFrase, 5000);
        });

        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePasswordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@stop

@section('auth_footer')
    {{-- Password reset link --}}
    @if($password_reset_url)
        <p class="my-0">
            <a href="{{ $password_reset_url }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

    {{-- Register link --}}
    @if($register_url)
        <p class="my-0">
            <a href="{{ $register_url }}">
                {{ __('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
    @endif
@stop
