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
            width: min(92vw, 520px);
        }
        .auth-white-container {
            background: #ffffff;
            padding: 24px 10px 15px 10px;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.15);
        }
        .auth-white-container .card {
            margin-bottom: 0;
        }
        .login-card-body {
            padding-left: 12px;
            padding-right: 12px;
        }
        .login-box .input-group .form-control {
            min-width: 0;
            flex: 1 1 auto;
        }
        @media (max-width: 420px) {
            .login-box .input-group .form-control {
                font-size: 0.9rem;
                padding-left: 0.6rem;
                padding-right: 0.6rem;
            }
            .login-box .input-group-text {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
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
        // Frases motivadoras para estudiantes
        const frasesMotivadoras = [
            "Cada día es una nueva oportunidad para aprender.",
            "Tu esfuerzo de hoy es tu éxito de mañana.",
            "Confía en tu proceso, vas avanzando.",
            "La disciplina supera a la motivación.",
            "Pequeños pasos también construyen grandes logros.",
            "Si te equivocas, estás aprendiendo.",
            "Tu futuro se construye con lo que haces hoy.",
            "Nunca es tarde para mejorar.",
            "Cree en ti: puedes más de lo que imaginas.",
            "Estudia con propósito, sueña en grande."
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
            const loginForm = document.querySelector('form[action="{{ $login_url }}"]');
            if (loginForm) {
                loginForm.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        loginForm.submit();
                    }
                });
            }
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
   
@stop
